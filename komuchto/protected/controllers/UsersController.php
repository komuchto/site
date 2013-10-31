<?php

class UsersController extends Controller
{
       
        public function actionView()
        {
            $model = new Users;
            $user = $_GET['id'];
                        
            if($_GET['id'] != Yii::app()->user->id)
                throw new CHttpException(403,'Доступ запрещен.');
            
            else {
                $model = Users::model()->findByPk(Yii::app()->user->id);
                
                if (Yii::app()->request->getPost('Users')) {
                    
                    foreach($_POST['Users'] as $name=>$value){  
                        $model->$name=$value;  
                    }  

                    if (!$model->save()) {
                        throw new Exception(CVarDumper::dumpAsString($model->getErrors()));
                    }
                }
                                             
                $this->render('view', array(
                    'model' => $model
                ));
            }
        }
		
}
