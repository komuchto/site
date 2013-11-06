<?php

class StatController extends Controller
{

        
	/**
	 * Displays the contact page
	 */
	public function actionIndex()
	{

            $this->render('stats');
	}
        
        public function actionUsersService()
        {          
            $res = Yii::app()->db->createCommand()
                ->select('service, count(id) count')
                ->from('users')
                ->group('service')
                ->queryAll();
            echo json_encode($res);
        }
	
        public function actionUsers()
        {           
            $res = Yii::app()->db->createCommand()
                ->select('DATE(created) as date, count(created) as count')
                ->from('users')
                ->group('DATE(created)')
                ->order('created DESC')
                ->queryAll();
            echo json_encode($res);
        }
        
        public function actionAdvertsRub()
        {
            $res = Yii::app()->db->createCommand()
                ->select('name, count(DISTINCT a.id) count')
                ->from('rub r')
                ->join('adverts a', 'r.id=a.rub')
                ->group('r.name')
                ->queryAll();
            echo json_encode($res);
        }
        
        public function actionAdverts()
        {
            $res = Yii::app()->db->createCommand()
                ->select('DATE(created) as date, count(created) as count')
                ->from('adverts')
                ->group('DATE(created)')
                ->order('created DESC')
                ->queryAll();
            echo json_encode($res);
        }
	
}
