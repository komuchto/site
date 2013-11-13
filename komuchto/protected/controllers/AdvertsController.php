<?php

class AdvertsController extends Controller{
    
    public function actionAdd()
    {
        if(!Yii::app()->user->id)
        {
            $this->redirect('/login');
        }
        
        $model = new Adverts;

        if (isset($_POST['Adverts']))
        {
                $model->user = Yii::app()->user->id;
                foreach($_POST['Adverts'] as $name=>$value){  
                    $model->$name=$value;  
                } 

                if($model->validate())
                {
                    //$image = CUploadedFile::getInstanceByName('Adverts[img]');
                    $model->img = EUploadedImage::getInstance($model,'img');
                    $model->img->maxWidth = 600;
                    $model->img->maxHeight = 300;

                    $model->img->thumb = array(
                        'maxWidth' => 200,
                        'maxHeight' => 160,
                        'prefix' => 'min_',
                        'dir'=>'thumb'
                    );
                    $filename = date('YmdHis').'_'.Yii::app()->user->id;
                    if ($model->img->saveAs(Yii::getPathOfAlias('webroot').'/images/adverts/'.$filename.'.jpg'))
                            $model->img = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    
                    $model->created = date('Y-m-d H:i:s'); 
                            
                    if (!$model->save()) {
                        throw new Exception(CVarDumper::dumpAsString($model->getErrors()));
                    }
                }
        }
        
        $this->render('add', array('model'=>$model));
    }
    
    public function actionView()
    {
        $model = Adverts::model()->findByPk($_GET['id']);
        $this->render('view', array('model'=>$model));
    }
    
    public function actionList()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('act', 'sub', 'rub');
        $criteria->order = 't.id DESC';
        
        $dataProvider = new CActiveDataProvider('Adverts', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['advertsPerPage'],
            ),
        ));
        $this->render('list', array('dataProvider'=>$dataProvider));
    }
    
    public function actionDynamicrubric()
    {
        $data=Sub::model()->findAll('rub=:id', 
              array(':id'=>(int) $_POST['Adverts']['rub']));

        $data=CHtml::listData($data,'id','name');

        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
        }
    }
    
    public function actionFav()
    {
        if(!Yii::app()->user->isGuest)
        {
            $fav = Favorits::model()->findByPk(array('user'=>Yii::app()->user->id, 'advert'=>(int)$_GET['id']));

            if($fav)
                $fav->delete();
            else{
                $fav = new Favorits;
                $fav->user = Yii::app()->user->id;
                $fav->advert = $_GET['id'];
                $fav->save();
            }
        }    
    }

}

?>
