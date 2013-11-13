<?php

class Favorits extends CActiveRecord
{        

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    // Указываем имя таблицы с которой работает данная модель
    public function tableName()
    {
        return 'favorits';
    }
    
    public function relations()
    {
        return array( 
            'adverts'  => array( self::BELONGS_TO, 'Adverts', 'advert' ),
            'users'   => array( self::BELONGS_TO, 'Users', 'user' ),
        );
    }
    
}

?>
