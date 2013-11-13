<?
class Users extends CActiveRecord
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
        return 'users';
    }
    
    public function relations()
    {
        return array(
            'adverts'=>array(self::HAS_MANY, 'Adverts', 'user'),
            'favorits'=>array(self::MANY_MANY, 'Adverts', 'favorits(user, advert)'),
        );
    }
    
    public function login($identity)
    {
        
        $criteria=new CDbCriteria;
        $criteria->condition='identity=:id';
        $criteria->params=array(':id'=>$identity->getId());
        $criteria->select = 'id, permission, name, identity';
        $user = $this->find($criteria);
        $ip = CHttpRequest::getUserHostAddress();
        $location = Yii::app()->geoip->lookupLocation($ip);
        
        if(!$user){ 
            $this->identity = $identity->getId();
            $this->name = $identity->name;
            $this->created = date('Y-m-d H:i:s');
            $this->lastvisited = date('Y-m-d H:i:s');
            $this->ip = $ip;
            $this->city = $location->city;
            $this->save();
            $id = Yii::app()->db->getLastInsertID();
            Yii::app()->user->id = $id;
            Yii::app()->user->name = $this->name;
            Yii::app()->user->setState('permission', 0);
        }else{
            Yii::app()->user->id = $user->id;
            Yii::app()->user->setState('identity', $user->identity);
            Yii::app()->user->name = $user->name;
            Yii::app()->user->setState('permission', $user->permission);
            $user->lastvisited = date('Y-m-d H:i:s');
            $user->ip = $ip;
            $user->city = $location->city;
            $user->save();
        }

        return Yii::app()->user->id;
    }

    public function getUser($id)
    {
        $criteria=new CDbCriteria;
        $criteria->condition='identity=:identity AND id=:id';
        $criteria->params=array(':identity'=>Yii::app()->user->identity, ':id'=>$id);
        $criteria->select = '*';
        return $this->find($criteria);
    }
}