<?php
class Adverts extends CActiveRecord
{     
    
    public $count;
    public $date;

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
            'user'=>array(self::BELONGS_TO, 'Users', 'id'),
            'favorits'=>array(self::MANY_MANY, 'Users', 'favorits(advert, user)'),
            'act'=>array(self::HAS_ONE, 'Act', 'id'),
            'rub'=>array(self::HAS_ONE, 'Rub', 'id'),
            'sub'=>array(self::HAS_ONE, 'Sub', 'id'),
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
        $criteria->condition = 'user=:user';
        $criteria->params = array(':user'=>Yii::app()->user->id);
        $criteria->together = true;

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,

            'pagination' => array(
                'pageSize' => Yii::app()->params['advertsPerPage'],
            ),
        ));
    }
    
    /*public function login($identity)
    {
        $criteria=new CDbCriteria;
        $criteria->condition='identity=:id';
        $criteria->params=array(':id'=>$identity->id);
        $criteria->select = 'id';
        
        $count = $this->find($criteria);
        
        if(!$count->id){ 
            $this->identity = $identity->id;
            $this->name = $identity->name;
            $this->save();
            $count->id = Yii::app()->db->getLastInsertID();
        }
        
        return $count->id;
    }

    public function getUser($id)
    {
        $criteria=new CDbCriteria;
        $criteria->condition='identity=:identity AND id=:id';
        $criteria->params=array(':identity'=>Yii::app()->user->id, ':id'=>$id);
        $criteria->select = '*';
        return $this->find($criteria);
    }*/
}
?>
