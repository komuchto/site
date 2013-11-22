<?php

class AdvertsController extends Controller{
    
    public function actionAdd()
    {
        if(!Yii::app()->user->id)
        {
            $this->redirect('/login');
        }
        
        $model = new Adverts;

        if (isset($_POST['Adverts']))
        {
                $model->user_id = Yii::app()->user->id;
                foreach($_POST['Adverts'] as $name=>$value){  
                    $model->$name=$value;  
                } 

                if($model->validate())
                {
                    //$image = CUploadedFile::getInstanceByName('Adverts[img]');
                    $model->img = EUploadedImage::getInstance($model,'img');
                    $model->img->maxWidth = 800;
                    $model->img->maxHeight = 600;

                    $model->img->thumb = array(
                        'maxWidth' => 400,
                        'maxHeight' => 400,
                        'prefix' => 'min_',
                        'dir'=>'thumb'
                    );
                    $filename = date('YmdHis').'_'.Yii::app()->user->id;
                    if ($model->img->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                            $model->img = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    
                    $model->created = date('Y-m-d H:i:s'); 
                            
                    if (!$model->save()) {
                        throw new Exception(CVarDumper::dumpAsString($model->getErrors()));
                    }
                }
        }
        
        $this->render('add', array('model'=>$model));
    }
    
    public function actionView()
    {
        $model = Adverts::model()->findByPk($_GET['id']);
        $this->render('view', array('model'=>$model));
    }
    
    public function actionList()
    {
        $model = new Adverts;
        $model->minmax();
        $this->render('list', array('model'=>$model,'find'=>$model->find()));
    }
    
    public function actionSearch()
    {
        $model = new Search;
        $criteria=new CDbCriteria;
        $criteria->condition='query=:url';
        $criteria->params=array(':url'=> urldecode(http_build_query($_POST)));
        $url = $model->find($criteria);
        if(!$url){
            $model->query = urldecode(http_build_query($_POST));
            $model->save();
            $uri = $model->query;
            $id = Yii::app()->db->getLastInsertID();
        }else{
            $id = $url->id;
            $uri = $url->query;   
        }
        echo json_encode(array('id'=>$id,'url'=>$uri));
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
    
    public function actionSubAjax()
    {
        $subs = Yii::app()->db->createCommand("SELECT sub.*, count(DISTINCT sub.id), count(adverts.id) as count FROM sub LEFT OUTER JOIN adverts ON  sub.id = adverts.sub_id WHERE sub.rub = ".$_POST['Adverts']['rub']." GROUP BY sub.id")->queryAll();
        foreach($subs as $r){
            $sub[] = array('label'=>$r['name']." <span>(".$r['count'].")</span>", 'encodeLabel'=>false, 'htmlOptions'=>array('data-id'=>$r['id'],'onclick'=>'find()'));
        }
        $this->widget('bootstrap.widgets.TbButtonGroup', array(
            'toggle' => 'checkbox',
            'buttons' => $sub,
        ));
    }
    
    public function actionListAjax()
    {
        $model = new Adverts;
        $this->render('list', array('model'=>$model));
    }
    
    public function actionOtherParamsAjax()
    {
        $this->render('otherParams', array('rub'=>$_POST['Adverts']['rub']));
    }
    
    public function actionFav()
    {
        if(!Yii::app()->user->isGuest)
        {
            $fav = Favorits::model()->findByPk(array('user'=>Yii::app()->user->id, 'advert'=>(int)$_GET['id']));

            if($fav)
                $fav->delete();
            else{
                $fav = new Favorits;
                $fav->user = Yii::app()->user->id;
                $fav->advert = $_GET['id'];
                $fav->save();
            }
        }    
    }

}

?>
