<?php

class Rub extends CActiveRecord
{        

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    // Указываем имя таблицы с которой работает данная модель
    public function tableName()
    {
        return 'rub';
    }
    
    public function relations()
    {
        return array('adverts'=>array(self::HAS_MANY, 'Adverts', 'id'));
    }
}

?>
