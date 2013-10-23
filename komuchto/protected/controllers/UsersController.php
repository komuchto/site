<?php

class UsersController extends CController
{
       
        public function actionView()
        {
            $model = new Users;
            $user = $model->getUser($_GET['id']);
                        
            if(!$user)
                throw new CHttpException(404,'The specified post cannot be found.');
            
            else {
                if (Yii::app()->request->getPost('Users')) {
                    
                    $model = Users::model()->findByPk($_GET['id']);
                    
                    foreach($_POST['Users'] as $name=>$value){  
                        $model->$name=$value;  
                    }  

                    if (!$model->save()) {
                        throw new Exception(CVarDumper::dumpAsString($model->getErrors()));
                    }
                }else{
                    $model->name = $user->name;
                    $model->email = $user->email;
                }
                                             
                $this->render('view', array(
                    'model' => $model
                ));
            }
        }
		
}
