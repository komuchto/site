<?php
class Adverts extends CActiveRecord
{     
    
    public $count;
    public $date;
    public $maxprice;
    public $minprice;
    
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
        );
    }
    
    public function rules()
    {
        return array(
            array('phone', 'required', 'message'=>'Номер телефона обязателен'),
            array('text', 'required', 'message'=>'Текст объявления обязателен'),
            array('phone', 'numerical', 'integerOnly'=>true),
            array('price', 'numerical', 'integerOnly'=>true),
            array('img', 'file', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
            array('img1', 'file', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
            array('img2', 'file', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
            array('img3', 'file', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
            array('img4', 'file', 'types'=>'jpg, jpeg, gif, png', 'message'=>'Разрешено загрузать лишь фотографии с расширением jpg, jpeg, gif, png',),
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
        if(isset($_POST['pathname']))
        {
            $query = Search::model()->findByPk($_POST['pathname']);
            parse_str($query->query, $_POST);
        }
        
        $criteria = new CDbCriteria;
        $criteria->with = array('act', 'sub', 'rub');
        $criteria->condition = 't.moderate = 1';
        
        if(isset($_POST['Adverts']['sort'])) $_GET = $_POST['Adverts'];
        
        if(isset($_POST['Adverts']['search'])) $criteria->compare('text', $_POST['Adverts']['search'], true);
        if(isset($_POST['Adverts']['act']) && $_POST['Adverts']['transmission'] > 0) $criteria->addCondition("t.act_id = ".$_POST['Adverts']['act']);
        if(isset($_POST['Adverts']['transmission']) && $_POST['Adverts']['transmission'] > 0) $criteria->addCondition("t.transmission = ".$_POST['Adverts']['transmission']);
        if(isset($_POST['Adverts']['type_object']) && $_POST['Adverts']['type_object'] > 0) $criteria->addCondition("t.type_object' = ".$_POST['Adverts']['type_object']);
        if(isset($_POST['Adverts']['rub']) && $_POST['Adverts']['rub'] > 0) $criteria->addCondition("t.rub_id = ".$_POST['Adverts']['rub']);
        if(isset($_POST['Adverts']['maxprice'])) $criteria->addCondition("t.price <= ".$_POST['Adverts']['maxprice']);
        if(isset($_POST['Adverts']['minprice'])) $criteria->addCondition("t.price >= ".(int)$_POST['Adverts']['minprice']);
        if(isset($_POST['Adverts']['sub']) && $_POST['Adverts']['sub'] > 0) $criteria->addInCondition("t.sub_id", $_POST['Adverts']['sub']);
        
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
                'pageSize' => Yii::app()->params['advertsPerPage'], 
            ),
        ));
    }
    public function find()
    {
        $rub = Yii::app()->db->createCommand("SELECT rub.*, count(DISTINCT rub.id), count(adverts.id) as count FROM rub LEFT OUTER JOIN adverts ON  rub.id = adverts.rub_id GROUP BY rub.id")->queryAll(); 
        foreach($rub as $r){
            $rubs[$r['id']] = $r['name'].' <span>('.$r['count'].')</span>';
            $rub_array[] = array('label'=>$r['name']." <span>(".$r['count'].")</span>", 'encodeLabel'=>false, 'htmlOptions'=>array('data-id'=>$r['id']));
        }
        $act = Act::model()->findAll();
        
        $subs = Yii::app()->db->createCommand("SELECT sub.*, count(DISTINCT sub.id), count(adverts.id) as count FROM sub LEFT OUTER JOIN adverts ON  sub.id = adverts.sub_id WHERE sub.rub = 1 GROUP BY sub.id")->queryAll();
        foreach($subs as $r){
            $sub[] = array('label'=>$r['name']." <span>(".$r['count'].")</span>", 'encodeLabel'=>false, 'htmlOptions'=>array('data-id'=>$r['id']));
        }

        return array('rub'=>$rubs, 'act'=>$act, 'sub'=>$sub, 'rub_array'=>$rub_array);
    }
    
    public function minmax()
    {
        $criteria = new CDbCriteria;
        $criteria->select='MAX(price) as maxprice, count(DISTINCT id)';
        $price = $this->findAll($criteria);
        $this->maxprice = $price[0]->maxprice;
        $this->minprice = $price[0]->minprice;
    }
    
}
?>
