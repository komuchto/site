<?php

class UsersController extends Controller
{

        
	/**
	 * Displays the contact page
	 */
	public function actionIndex()
	{
            echo'users';
            $this->render('users');
	}
	
	
}