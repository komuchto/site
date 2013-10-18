<?
class Users extends CActiveRecord
{        

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    // Указываем имя таблицы с которой работает данная модель
    public function tableName()
    {
        return 'users';
    }

    public function new_user() {
        // ...
    }

    public function edit_user($id) {
        // ...
    }
}