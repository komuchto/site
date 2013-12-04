<?php

class SiteController extends Controller
{


	/**
	 * Displays the contact page
	 */
	public function actionIndex()
	{
		
	}
        
        public function actionPage()
        {
            
        }
	
        public function actionError()
        {
             if($error=Yii::app()->errorHandler->error)
                $this->render('error', $error);
        }
	
}
