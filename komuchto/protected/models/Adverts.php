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
        if(isset($_POST['Adverts']['rub_id']) && $_POST['Adverts']['rub_id'] > 0) $criteria->addCondition("t.rub_id = ".$_POST['Adverts']['rub_id']);
        if(isset($_POST['Adverts']['sub']) && $_POST['Adverts']['sub'] > 0) $criteria->addInCondition("t.sub_id", $_POST['Adverts']['sub']);  
        if(isset($_POST['Adverts']['city']) && $_POST['Adverts']['city'] > 0) $criteria->addCondition("t.city_id=".$_POST['Adverts']['city']);
        
        if($_POST['Adverts']['rub_id'] == 1)
        {
            if(isset($_POST['Adverts']['transmission']) && $_POST['Adverts']['transmission'] > 0) $criteria->addCondition("t.transmission = ".$_POST['Adverts']['transmission']);
            if(isset($_POST['Adverts']['mark']) && $_POST['Adverts']['mark'] > 0) $criteria->addCondition("t.mark=".$_POST['Adverts']['mark']);
            if(isset($_POST['Adverts']['drive']) && $_POST['Adverts']['drive'] > 0) $criteria->addCondition("t.drive=".$_POST['Adverts']['drive']);
            if(isset($_POST['Adverts']['type_body']) && $_POST['Adverts']['type_body'] > 0) $criteria->addCondition("t.type_body=".$_POST['Adverts']['type_body']);
            if(isset($_POST['Adverts']['year']) && $_POST['Adverts']['year'] > 0) $criteria->addCondition("t.year=".$_POST['Adverts']['year']);
            if(isset($_POST['Adverts']['maxvolume']) && !empty($_POST['Adverts']['maxvolume'])) $criteria->addCondition("t.volume <= ".$_POST['Adverts']['maxvolume']);
            if(isset($_POST['Adverts']['minvolume']) && !empty($_POST['Adverts']['minvolume'])) $criteria->addCondition("t.volume >= ".(int)$_POST['Adverts']['minvolume']);
            if(isset($_POST['Adverts']['maxprobeg']) && !empty($_POST['Adverts']['maxprobeg'])) $criteria->addCondition("t.probeg <= ".$_POST['Adverts']['maxprobeg']);
            if(isset($_POST['Adverts']['minprobeg']) && !empty($_POST['Adverts']['minprobeg'])) $criteria->addCondition("t.probeg >= ".(int)$_POST['Adverts']['minprobeg']);       
        }
        
        if($_POST['Adverts']['rub_id'] == 2)
        {
            if(isset($_POST['Adverts']['maxetazh']) && !empty($_POST['Adverts']['maxetazh'])) $criteria->addCondition("t.etazh <= ".$_POST['Adverts']['maxetazh']);
            if(isset($_POST['Adverts']['minetazh']) && !empty($_POST['Adverts']['minetazh'])) $criteria->addCondition("t.etazh >= ".(int)$_POST['Adverts']['minetazh']);
            if(isset($_POST['Adverts']['maxkomnaty_count']) && !empty($_POST['Adverts']['maxkomnaty_count'])) $criteria->addCondition("t.komnaty_count <= ".$_POST['Adverts']['maxkomnaty_count']);
            if(isset($_POST['Adverts']['minkomnaty_count']) && !empty($_POST['Adverts']['minkomnaty_count'])) $criteria->addCondition("t.komnaty_count >= ".(int)$_POST['Adverts']['minkomnaty_count']);
            if(isset($_POST['Adverts']['maxetazh_build']) && !empty($_POST['Adverts']['maxetazh_build'])) $criteria->addCondition("t.etazh_build <= ".$_POST['Adverts']['maxetazh_build']);
            if(isset($_POST['Adverts']['minetazh_build']) && !empty($_POST['Adverts']['minetazh_build'])) $criteria->addCondition("t.etazh_build >= ".(int)$_POST['Adverts']['minetazh_build']);
            if(isset($_POST['Adverts']['maxplosch']) && !empty($_POST['Adverts']['maxplosch'])) $criteria->addCondition("t.plosch <= ".$_POST['Adverts']['maxplosch']);
            if(isset($_POST['Adverts']['minplosch']) && !empty($_POST['Adverts']['minplosch'])) $criteria->addCondition("t.plosch >= ".(int)$_POST['Adverts']['minplosch']);
            if(isset($_POST['Adverts']['type_object']) && $_POST['Adverts']['type_object'] > 0) $criteria->addCondition("t.type_object = ".$_POST['Adverts']['type_object']);
        }
          
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
        $this->rub_id = $_POST['Adverts']['rub_id'];
        
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
                
            $rub_array[] = array('label'=>'<div class="icon"></div><div>'.$r['name']."</div> <span>(".$r['count'].")</span>", 'encodeLabel'=>false, 'htmlOptions'=>array('class'=>$class, 'onclick'=>'find(false, false, $(this))', 'data-id'=>$r['id']));
        }
        $act = Act::model()->findAll();
        
        $subs = Yii::app()->db->createCommand("SELECT sub.*, count(DISTINCT sub.id), count(adverts.id) as count FROM sub LEFT OUTER JOIN adverts ON  sub.id = adverts.sub_id GROUP BY sub.id")->queryAll();
        foreach($subs as $r){
            $class = (isset($_POST['Adverts']['sub']) && in_array($r['id'], $_POST['Adverts']['sub']) ? 'active' : '' );
            if($r['rub'] != $_POST['Adverts']['rub_id']) $class .= ' hide';
            $sub[] = array('label'=>'<div>'.$r['name']."</div> <span>(".$r['count'].")</span>", 'encodeLabel'=>false, 'htmlOptions'=>array('data-id'=>$r['id'], 'data-rub'=>$r['rub'], 'onclick'=>'find($(this))', 'class'=>$class));
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
        $this->minprice = round($this->minprice, -4);
        $this->maxprice = round($this->maxprice, -4);
    }
    
    public function fish()
    {
        $text = array();
        $text[] = "Иные буквы встречаются с языками, использующими латинский алфавит, могут возникнуть небольшие. Том языке, который планируется использовать в качестве рыбы текст. Собственные варианты текста сыграет на название, не имеет никакого отношения к обитателям. Текста исключительно демонстрационная, то и демонстрации. Веб-дизайнерами для вставки на название.";
        $text[] = "Собственные варианты текста сыграет на. Что такое текст-рыба использованием lorem философу цицерону, ведь именно из его. Лучше использовать в качестве рыбы текст этот, несмотря на сайтах. Шрифтов, абзацев, отступов и даже с языками, использующими латинский алфавит, могут возникнуть. Ipsum, кроме того, нечитабельность текста сыграет на руку при.";
        $text[] = "Который планируется использовать при запуске проекта отсюда напрашивается вывод что. Книгопечатании еще в длине наиболее распространенных слов при оценке качества. Том языке, который планируется использовать. Является знаменитый lorem текст-рыбу, широко используемый. Фразы и демонстрации внешнего вида. Название, не имеет никакого отношения.";
        $text[] = "Или иные буквы встречаются с языками. Могут возникнуть небольшие проблемы: в книгопечатании еще в различных. Lorem ipsum обязан древнеримскому философу цицерону, ведь именно из его. Оригинального трактата, благодаря чему появляется возможность. Использующими латинский алфавит, могут возникнуть небольшие проблемы. Ему нести совсем необязательно к обитателям водоемов.";
        $text[] = "Кроме того, нечитабельность текста исключительно демонстрационная, то и проектах ориентированных. Вариантов lorem связанные с использованием lorem ipsum обязан. Собственные варианты текста на руку при запуске проекта различных языках те. Распространенных слов различных языках те. Частотой, имеется разница в различных. Книгопечатник вырвал отдельные фразы и даже с языками, использующими латинский алфавит.";
        $text[] = "Ipsum на интернет-страницы и смысловую. Напрашивается вывод, что такое текст-рыба слова. Что такое текст-рыба известным рыбным текстом является. О пределах добра и зла средневековый книгопечатник вырвал отдельные фразы и на. Своим появлением lorem слова, получив текст-рыбу. Сайтах и смысловую нагрузку ему нести совсем.";
        
        $img = array();
        $img[] = "";
        $img[] = "201312021400311_3.jpg,thumb/min_201312021400311_3.jpg";
        $img[] = "201312021400312_3.jpg,thumb/min_201312021400312_3.jpg";
        $img[] = "201312021400313_3.jpg,thumb/min_201312021400313_3.jpg";
        $img[] = "201312021400314_3.jpg,thumb/min_201312021400314_3.jpg";
        $img[] = "20131126160926_3.jpg,thumb/min_20131126160926_3.jpg";
        $img[] = "201311261609261_3.jpg,thumb/min_201311261609261_3.jpg";
        
        
        $sub = Sub::model()->findAllByAttributes(array('rub'=>1));
        foreach($sub as $s){
            $sub_array[] = $s->id;
        }


        $this->rub_id = 1;
        $this->sub_id = $sub_array[array_rand($sub_array)];
        $this->city_id = rand(1,2);
        //$this->act = array_rand(array(1,2));
        $this->img = $img[array_rand($img)];
        $this->img1 = $img[array_rand($img)]; 
        $this->img2 = $img[array_rand($img)];
        $this->img3 = $img[array_rand($img)];
        $this->img4 = $img[array_rand($img)];
        $this->text = $text[array_rand($text)];
        
        /*
         * Недвижимость
         
        $this->etazh = rand(1,25);
        $this->komnaty_count = rand(1,6);
        $this->etazh_build = rand($this->etazh,25);
        $this->vid_object = rand(1,2);
        $this->type_object = rand(1,3);
        $this->plosch = rand(10,250);
        * 
        */
        
        $this->mark = rand(1,4);
        $this->volume = rand(8, 60) / 10;
        $this->type_body = rand(1,5);
        $this->type_engine = rand(1,3);
        $this->transmission = rand(1,2);
        $this->drive = rand(1,3);
        $this->year = rand(1970, 2013);
        $this->probeg = rand(5000, 200000);
        
        $this->phone = 89173238930;
        $this->user_id = 3;
        $this->moderate = 1;
        $this->price = rand(10000, 1500000);
        $this->created = date('Y-m-d H:i:s');
        //$this->save(false);
        if (!$this->save())
            throw new Exception(CVarDumper::dumpAsString($this->getErrors()));

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
    
    public function nedv()
    {
        $criteria = new CDbCriteria;

        $criteria->select='MAX(t.etazh) as maxetazh, MIN(t.etazh) as minetazh, MAX(t.komnaty_count) as maxkomnaty_count, MIN(t.komnaty_count) as minkomnaty_count, MAX(t.etazh_build) as maxetazh_build, MIN(t.etazh_build) as minetazh_build, MAX(t.plosch) as maxplosch, MIN(t.plosch) as minplosch, count(DISTINCT t.id) as count';
        $data = $this->findAll($criteria);
        $this->minetazh = $data[0]->minetazh; 
        $this->maxetazh = $data[0]->maxetazh;
        $this->minkomnaty_count = $data[0]->minkomnaty_count; 
        $this->maxkomnaty_count = $data[0]->maxkomnaty_count;
        $this->minetazh_build = $data[0]->minetazh_build; 
        $this->maxetazh_build = $data[0]->maxetazh_build;
        $this->minplosch = $data[0]->minplosch; 
        $this->maxplosch = $data[0]->maxplosch;
    }

}
?>
