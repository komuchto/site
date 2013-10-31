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
                $model->attributes = $_POST['Adverts'];
                $model->attributes['user'] = Yii::app()->user->id;

                if($model->validate())
                {

                }
               

        }
        
        $this->render('add', array('model'=>$model));
    }
    
    public function actionView()
    {
        
    }
    
    public function actionList()
    {
        
    }
}

?>
