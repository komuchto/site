<?php

class UsersController extends Controller
{
        
	public function actionIndex()
	{
            //$list = Users::model()->findAll();
            $dataProvider = new CActiveDataProvider('Users', array(
                'criteria'=>array(
                  'order'=>'id DESC',
                ),
            ));
            var_dump($dataProvider);
            $this->render('users', array('dataProvider'=>$dataProvider));
	}
	
	
}
