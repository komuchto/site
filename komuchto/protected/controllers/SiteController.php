<?php

class SiteController extends Controller
{


	/**
	 * Displays the contact page
	 */
	public function actionIndex()
	{
		echo '12';
	}
	
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
                        //var_dump($eauth->getIsAuthenticated(), $eauth->getAttributes());
                        $identity = new EAuthUserIdentity($eauth);

                        // successful authentication
                        if ($identity->authenticate()) {
                            Yii::app()->user->login($identity);
                            
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
        
        public function actionError()
        {
             if($error=Yii::app()->errorHandler->error)
                $this->render('error', $error);
        }
	
}
