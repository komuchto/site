<?php

class UsersController extends Controller
{
       public function actionLogin()
	{

            $serviceName = Yii::app()->request->getQuery('service');
            if (isset($serviceName)) {
                /** @var $eauth EAuthServiceBase */
                $eauth = Yii::app()->eauth->getIdentity($serviceName);
                $eauth->redirectUrl = Yii::app()->user->returnUrl;
                $eauth->cancelUrl = $this->createAbsoluteUrl('login');

                try {
                    if ($eauth->authenticate()) {
                        $identity = new EAuthUserIdentity($eauth);
                        
                        // successful authentication
                        if ($identity->authenticate()) {
                            
                            //Yii::app()->user->login($identity);
                            $user = new Users();
                            $id = $user->login($identity);
                            //var_dump(Yii::app()->user->id);exit;

                            // special redirect with closing popup window
                            $eauth->redirect('/users/'.$id);
                        }
                        else {
                            // close popup window and redirect to cancelUrl
                            $eauth->cancel();
                        }
                    }

                    // Something went wrong, redirect to login page
                    $this->redirect(array('login'));
                }
                catch (EAuthException $e) {
                    // save authentication error to session
                    Yii::app()->user->setFlash('error', 'EAuthException: '.$e->getMessage());

                    // close popup window and redirect to cancelUrl
                    $eauth->redirect($eauth->getCancelUrl());
                }

            }
            $this->render('login');
	}
        
        public function actionLogout()
        {
            Yii::app()->user->logout();
            $this->redirect('/');
        }
    
        public function actionView()
        {
            $model = new Users;
            $user = $_GET['id'];
                        
            if($_GET['id'] != Yii::app()->user->id)
                throw new CHttpException(403,'Доступ запрещен.');
            
            else {
                $model = Users::model()->findByPk(Yii::app()->user->id);
                
                $favorits = Adverts::model()->favoritsAdverts();
                $myAdverts = Adverts::model()->myAdverts();
                
                if (Yii::app()->request->getPost('Users')) {
                    
                    foreach($_POST['Users'] as $name=>$value){  
                        $model->$name=$value;  
                    }  

                    if (!$model->save()) {
                        throw new Exception(CVarDumper::dumpAsString($model->getErrors()));
                    }
                }
                                             
                $this->render('view', array(
                    'model' => $model, 'favorits'=>$favorits, 'myAdverts'=>$myAdverts
                ));
            }
        }
		
}
