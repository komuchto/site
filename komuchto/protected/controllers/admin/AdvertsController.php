<?php

class AdvertsController extends Controller
{

        
	/**
	 * Displays the contact page
	 */
	public function actionIndex()
	{
             $dataProvider = new CActiveDataProvider('Adverts', array(
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
            $model = Adverts::model()->findByPk($_GET['id']);
                
            if (Yii::app()->request->getPost('Adverts')) {

                foreach($_POST['Adverts'] as $name=>$value){  
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
            $model = Adverts::model()->findByPk($_GET['id']);
            $this->render('view', array('model'=>$model));
        }
	
        public function actionDelete()
        {
            $post=Adverts::model()->findByPk($_GET['id']);
            $post->delete();
            $this->redirect('/admin/adverts/');
        }
	
        public function actionDynamicrubric()
        {
            $data=Sub::model()->findAll('rub=:id', 
                  array(':id'=>(int) $_POST['Adverts']['rub']));

            $data=CHtml::listData($data,'id','name');
            
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
            }
        }
}
