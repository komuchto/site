<?php

class UsersController extends CController
{


	/**
	 * Displays the contact page
	 */
	public function actionIndex()
	{
        $this->layout='admin';

        $this->render('users');
	}
	
	
}
