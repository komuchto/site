<?php

class Act extends CActiveRecord
{        

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    // Указываем имя таблицы с которой работает данная модель
    public function tableName()
    {
        return 'act';
    }

    public function relations()
    {
        return array('adverts'=>array(self::HAS_MANY, 'Adverts', 'act_id'));
    }

}

?>
