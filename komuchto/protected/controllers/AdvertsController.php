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
                    if ($model->img->saveAs(Yii::getPathOfAlias('webroot').'/uploads/adverts/'.$filename.'.jpg'))
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
        
    }
    
    public function actionList()
    {
        $dataProvider = new CActiveDataProvider('Adverts', array(
            'criteria'=>array(
              'order'=>'id DESC',
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->params['advertsPerPage'],
            ),
        ));
        $this->render('list', array('dataProvider'=>$dataProvider));
    }

}

?>
