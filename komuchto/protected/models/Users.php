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
    
    public function login($identity)
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
    }
}