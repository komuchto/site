<?php

class UsersController extends Controller
{
        
	public function actionIndex()
	{
            $dataProvider = new CActiveDataProvider('Users', array(
                'criteria'=>array(
                  'order'=>'id DESC',
                ),
                'pagination' => array(
                    'pageSize' => Yii::app()->params['adminPerPage'],
                ),
            ));
            $this->render('list', array('dataProvider'=>$dataProvider));
	}
	
	public function actionUpdate()
        {
            $model = Users::model()->findByPk($_GET['id']);
                
            if (Yii::app()->request->getPost('Users')) {

                foreach($_POST['Users'] as $name=>$value){  
                    $model->$name=$value;  
                }  

                if (!$model->save()) {
                    throw new Exception(CVarDumper::dumpAsString($model->getErrors()));
                }
            }
            
            $this->render('update', array('model'=>$model));
        }
        public function actionView()
        {
            
        }
        public function actionDelete()
        {
            
        }
}
