<?php
class Adverts extends CActiveRecord
{     
    
    public $count;
    public $date;
    public $maxprice;
    public $minprice;
    public $maxprobeg;
    public $minprobeg;
    public $maxvolume;
    public $minvolume;
    public $filterminprice;
    public $filtermaxprice;
    public $favorits;
    public $minetazh; 
    public $maxetazh;
    public $minkomnaty_count; 
    public $maxkomnaty_count;
    public $minetazh_build; 
    public $maxetazh_build;
    public $minplosch; 
    public $maxplosch;
            
            
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    // Указываем имя таблицы с которой работает данная модель
    public function tableName()
    {
        return 'adverts';
    }
    
    public function relations()
    {
        return array(
            'user'=>array(self::BELONGS_TO, 'Users', 'user_id'),
            'favorits'=>array(self::MANY_MANY, 'Users', 'favorits(advert, user)'),
            'act'=>array(self::BELONGS_TO, 'Act', 'act_id'),
            'rub'=>array(self::BELONGS_TO, 'Rub', 'rub_id'),
            'sub'=>array(self::BELONGS_TO, 'Sub', 'sub_id'),
            'city'=>array(self::BELONGS_TO, 'City', 'city_id'),
            'favorits_adv'=>array(self::HAS_MANY, 'Favorits', 'advert'),
        );
    }
    
    public function rules()
    {
        return array(
            array('phone', 'required', 'message'=>'Номер телефона обязателен'),
            array('text', 'required', 'message'=>'Текст объявления обязателен'),
            array('phone', 'numerical', 'integerOnly'=>true),
            array('price', 'numerical', 'integerOnly'=>true),
            array('img', 'file', 'allowEmpty'=>'true', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
            array('img1', 'file', 'allowEmpty'=>'true', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
            array('img2', 'file', 'allowEmpty'=>'true', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
            array('img3', 'file', 'allowEmpty'=>'true', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
            array('img4', 'file', 'allowEmpty'=>'true', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
        );
    }
    
    public function favoritsAdverts()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('favorits');
        $criteria->condition = 'favorits_favorits.user=:user';
        $criteria->params = array(':user'=>Yii::app()->user->id);
        $criteria->together = true;

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,

            'pagination' => array(
                'pageSize' => Yii::app()->params['advertsPerPage'],
            ),
        ));
    }
    
    public function myAdverts()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'user_id=:user';
        $criteria->params = array(':user'=>Yii::app()->user->id);
        $criteria->together = true;

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,

            'pagination' => array(
                'pageSize' => Yii::app()->params['advertsPerPage'],
            ),
        ));
    }
    
    public function search()
    {
        $advertsPerPage = (isset($_POST['height']) && $_POST['height'] > 0) ? floor($_POST['height']) : Yii::app()->params['advertsPerPage'];
        if(isset($_POST['pathname']))
        {
            $query = Search::model()->findByPk($_POST['pathname']);
            parse_str($query->query, $_POST);
        }
        if(isset($_GET['ajax']))
        {
            $_POST['Adverts'] = $_GET;
        }
        
        $criteria = new CDbCriteria;
        $criteria->with = array('act', 'sub', 'rub', 'favorits_adv');
        $criteria->condition = "t.moderate = '1'";

        if(!Yii::app()->User->isGuest){
            $favorits = Favorits::model()->findAll('user=:id', array(':id'=>Yii::app()->User->id));
            foreach($favorits as $f){
                $this->favorits[] = $f->advert;
            }
        }

        if(isset($_POST['Adverts']['sort'])) $_GET = $_POST['Adverts'];
        
        if(isset($_POST['Adverts_page'])) $_GET['Adverts_page'] = $_POST['Adverts_page'];
        
        if(isset($_POST['Adverts']['search'])) $criteria->compare('text', $_POST['Adverts']['search'], true);
        if(isset($_POST['Adverts']['act_id']) && $_POST['Adverts']['act_id'] > 0) $criteria->addCondition("t.act_id = ".$_POST['Adverts']['act_id']);
        if(isset($_POST['Adverts']['transmission']) && $_POST['Adverts']['transmission'] > 0) $criteria->addCondition("t.transmission = ".$_POST['Adverts']['transmission']);
        if(isset($_POST['Adverts']['type_object']) && $_POST['Adverts']['type_object'] > 0) $criteria->addCondition("t.type_object' = ".$_POST['Adverts']['type_object']);
        if(isset($_POST['Adverts']['rub_id']) && $_POST['Adverts']['rub_id'] > 0) $criteria->addCondition("t.rub_id = ".$_POST['Adverts']['rub_id']);
        if(isset($_POST['Adverts']['sub']) && $_POST['Adverts']['sub'] > 0) $criteria->addInCondition("t.sub_id", $_POST['Adverts']['sub']);  
        if(isset($_POST['Adverts']['city']) && $_POST['Adverts']['city'] > 0) $criteria->addCondition("t.city_id=".$_POST['Adverts']['city']);
        
        if(isset($_POST['Adverts']['maxprice']) && !empty($_POST['Adverts']['maxprice'])) $criteria->addCondition("t.price <= ".$_POST['Adverts']['maxprice']);
        if(isset($_POST['Adverts']['minprice']) && !empty($_POST['Adverts']['minprice'])) $criteria->addCondition("t.price >= ".(int)$_POST['Adverts']['minprice']);
        
        $sort = new CSort();
        $sort->defaultOrder = 't.created DESC';
        $sort->attributes = array(
            'price'=>array(
                'asc'=>'t.price ASC',
                'desc'=>'t.price DESC',
            ),
            'created'=>array(
                'asc'=>'t.created ASC',
                'desc'=>'t.created DESC',
            ),
        );
        
        return new CActiveDataProvider('Adverts', array(
            'criteria'=>$criteria,
            'sort'=> $sort,
            'pagination' => array(
                'pageSize' => $advertsPerPage, 
            ),
        ));
    }
    
    public function find()
    {
        $rub = Yii::app()->db->createCommand("SELECT rub.*, count(DISTINCT rub.id), count(adverts.id) as count FROM rub LEFT OUTER JOIN adverts ON  rub.id = adverts.rub_id GROUP BY rub.id")->queryAll(); 
        foreach($rub as $r){
            $rubs[$r['id']] = $r['name'].' <span>('.$r['count'].')</span>';
            if((isset($_POST['Adverts']['rub_id'])) ? 'active' : '' ){
                if($r['id'] == $_POST['Adverts']['rub_id'])
                    $class = 'active';
                else 
                    $class = 'hide';
            }
            else                
                $class = '';
                
            $rub_array[] = array('label'=>$r['name']." <span>(".$r['count'].")</span>", 'encodeLabel'=>false, 'htmlOptions'=>array('class'=>$class, 'onclick'=>'find(false, false, $(this))', 'data-id'=>$r['id']));
        }
        $act = Act::model()->findAll();
        
        $subs = Yii::app()->db->createCommand("SELECT sub.*, count(DISTINCT sub.id), count(adverts.id) as count FROM sub LEFT OUTER JOIN adverts ON  sub.id = adverts.sub_id WHERE sub.rub = ".(isset($_POST['Adverts']['rub_id'])? (int)$_POST['Adverts']['rub_id'] : '1')." GROUP BY sub.id")->queryAll();
        foreach($subs as $r){
            $sub[] = array('label'=>$r['name']." <span>(".$r['count'].")</span>", 'encodeLabel'=>false, 'htmlOptions'=>array('data-id'=>$r['id'], 'onclick'=>'find($(this))', 'class'=>(isset($_POST['Adverts']['sub']) && in_array($r['id'], $_POST['Adverts']['sub']) ? 'active' : '' )));
        }

        return array('rub'=>$rubs, 'act'=>$act, 'sub'=>$sub, 'rub_array'=>$rub_array);
    }
    
    public function minmax()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('act', 'sub', 'rub');
        $criteria->condition = "t.moderate = '1'";

        if(isset($_POST['Adverts']['search'])) $criteria->compare('text', $_POST['Adverts']['search'], true);
        if(isset($_POST['Adverts']['act_id']) && $_POST['Adverts']['act_id'] > 0) $criteria->addCondition("t.act_id = ".$_POST['Adverts']['act_id']);
        if(isset($_POST['Adverts']['transmission']) && $_POST['Adverts']['transmission'] > 0) $criteria->addCondition("t.transmission = ".$_POST['Adverts']['transmission']);
        if(isset($_POST['Adverts']['type_object']) && $_POST['Adverts']['type_object'] > 0) $criteria->addCondition("t.type_object' = ".$_POST['Adverts']['type_object']);
        if(isset($_POST['Adverts']['rub_id']) && $_POST['Adverts']['rub_id'] > 0) $criteria->addCondition("t.rub_id = ".$_POST['Adverts']['rub_id']);
        if(isset($_POST['Adverts']['sub']) && $_POST['Adverts']['sub'] > 0) $criteria->addInCondition("t.sub_id", $_POST['Adverts']['sub']);
        $criteria->select='MAX(t.price) as filtermaxprice, MIN(t.price) as filterminprice, count(DISTINCT t.id) as count';
        $price = $this->findAll($criteria);
        $this->filtermaxprice = $price[0]->filtermaxprice;
        $this->filterminprice = $price[0]->filterminprice;
        
        $this->minprice = (isset($_POST['Adverts']['minprice']) ? $_POST['Adverts']['minprice'] : $this->filterminprice );
        $this->maxprice = (isset($_POST['Adverts']['maxprice']) ? $_POST['Adverts']['maxprice'] : $this->filtermaxprice );
    }
    
    public function probeg()
    {
        $criteria = new CDbCriteria;

        $criteria->select='MAX(t.probeg) as maxprobeg, MIN(t.probeg) as minprobeg, count(DISTINCT t.id) as count';
        $price = $this->findAll($criteria);
        $this->maxprobeg = $price[0]->maxprobeg;
        $this->minprobeg = $price[0]->minprobeg;
    }
    
    public function volume()
    {
        $criteria = new CDbCriteria;

        $criteria->select='MAX(t.volume) as maxvolume, MIN(t.volume) as minvolume, count(DISTINCT t.id) as count';
        $price = $this->findAll($criteria);
        $this->minvolume = round($price[0]->minvolume, 1);
        $this->maxvolume = round($price[0]->maxvolume, 1);
    }
    
}
?>
