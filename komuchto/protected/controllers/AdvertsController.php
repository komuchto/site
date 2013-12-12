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
                    if(!empty($_POST['Adverts']['img'])){
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
                    }
                    if(!empty($_POST['Adverts']['img1'])){
                        $model->img1 = EUploadedImage::getInstance($model,'img1');
                        $model->img1->maxWidth = 800;
                        $model->img1->maxHeight = 600;

                        $model->img1->thumb = array(
                            'maxWidth' => 400,
                            'maxHeight' => 400,
                            'prefix' => 'min_',
                            'dir'=>'thumb'
                        );
                        $filename = date('YmdHis').'1_'.Yii::app()->user->id;
                        if ($model->img1->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                                $model->img1 = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    
                    }
                    if(!empty($_POST['Adverts']['img2'])){
                        $model->img2 = EUploadedImage::getInstance($model,'img2');
                        $model->img2->maxWidth = 800;
                        $model->img2->maxHeight = 600;

                        $model->img2->thumb = array(
                            'maxWidth' => 400,
                            'maxHeight' => 400,
                            'prefix' => 'min_',
                            'dir'=>'thumb'
                        );
                        $filename = date('YmdHis').'2_'.Yii::app()->user->id;
                        if ($model->img2->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                                $model->img2 = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    }
                    if(!empty($_POST['Adverts']['img3'])){
                        $model->img3 = EUploadedImage::getInstance($model,'img3');
                        $model->img3->maxWidth = 800;
                        $model->img3->maxHeight = 600;

                        $model->img3->thumb = array(
                            'maxWidth' => 400,
                            'maxHeight' => 400,
                            'prefix' => 'min_',
                            'dir'=>'thumb'
                        );
                        $filename = date('YmdHis').'3_'.Yii::app()->user->id;
                        if ($model->img3->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                                $model->img3 = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    }
                    if(!empty($_POST['Adverts']['img4'])){
                        $model->img4 = EUploadedImage::getInstance($model,'img4');
                        $model->img4->maxWidth = 800;
                        $model->img4->maxHeight = 600;

                        $model->img4->thumb = array(
                            'maxWidth' => 400,
                            'maxHeight' => 400,
                            'prefix' => 'min_',
                            'dir'=>'thumb'
                        );
                        $filename = date('YmdHis').'4_'.Yii::app()->user->id;
                        if ($model->img4->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                                $model->img4 = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    }
                    
                    $model->created = date('Y-m-d H:i:s'); 
                            
                    if (!$model->save()) {
                        throw new Exception(CVarDumper::dumpAsString($model->getErrors()));
                    }
                }else{
                    Yii::app()->user->setFlash('success', "<h2>Объявление добавлено! После модерации будет доступно для поиска.</h2>");
                }
        }
        
        $this->render('add', array('model'=>$model));
    }
    
    public function actionEdit()
    {
        if(!Yii::app()->user->id)
        {
            $this->redirect('/login');
        }
        
        $model = Adverts::model()->findByPk($_GET['id']);    
        
        if($model->user_id != Yii::app()->User->id) 
            throw new CHttpException(403, 'Доступ запрещен!');
        
        if (isset($_POST['Adverts']))
        {
                $model->user_id = Yii::app()->user->id;
                foreach($_POST['Adverts'] as $name=>$value){  
                    $model->$name=$value;  
                } 
                
                if($model->validate())
                {
                    if(!empty($_POST['Adverts']['img'])){
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
                    }
                    if(!empty($_POST['Adverts']['img1'])){
                        $model->img1 = EUploadedImage::getInstance($model,'img1');
                        $model->img1->maxWidth = 800;
                        $model->img1->maxHeight = 600;

                        $model->img1->thumb = array(
                            'maxWidth' => 400,
                            'maxHeight' => 400,
                            'prefix' => 'min_',
                            'dir'=>'thumb'
                        );
                        $filename = date('YmdHis').'1_'.Yii::app()->user->id;
                        if ($model->img1->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                                $model->img1 = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    
                    }
                    if(!empty($_POST['Adverts']['img2'])){
                        $model->img2 = EUploadedImage::getInstance($model,'img2');
                        $model->img2->maxWidth = 800;
                        $model->img2->maxHeight = 600;

                        $model->img2->thumb = array(
                            'maxWidth' => 400,
                            'maxHeight' => 400,
                            'prefix' => 'min_',
                            'dir'=>'thumb'
                        );
                        $filename = date('YmdHis').'2_'.Yii::app()->user->id;
                        if ($model->img2->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                                $model->img2 = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    }
                    if(!empty($_POST['Adverts']['img3'])){
                        $model->img3 = EUploadedImage::getInstance($model,'img3');
                        $model->img3->maxWidth = 800;
                        $model->img3->maxHeight = 600;

                        $model->img3->thumb = array(
                            'maxWidth' => 400,
                            'maxHeight' => 400,
                            'prefix' => 'min_',
                            'dir'=>'thumb'
                        );
                        $filename = date('YmdHis').'3_'.Yii::app()->user->id;
                        if ($model->img3->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                                $model->img3 = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    }
                    if(!empty($_POST['Adverts']['img4'])){
                        $model->img4 = EUploadedImage::getInstance($model,'img4');
                        $model->img4->maxWidth = 800;
                        $model->img4->maxHeight = 600;

                        $model->img4->thumb = array(
                            'maxWidth' => 400,
                            'maxHeight' => 400,
                            'prefix' => 'min_',
                            'dir'=>'thumb'
                        );
                        $filename = date('YmdHis').'4_'.Yii::app()->user->id;
                        if ($model->img4->saveAs(Yii::getPathOfAlias('webroot').'/images/art/'.$filename.'.jpg'))
                                $model->img4 = $filename.'.jpg,thumb/min_'.$filename.'.jpg';
                    }
                    
                    $model->created = date('Y-m-d H:i:s'); 
                            
                    if (!$model->save()) {
                        throw new Exception(CVarDumper::dumpAsString($model->getErrors()));
                    }
                }else{
                    Yii::app()->user->setFlash('success', "<h2>Объявление добавлено! После модерации будет доступно для поиска.</h2>");
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
        $this->render('list', array('model'=>$model));
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
    
    public function actionFilter()
    {
        if(isset($_POST['pathname']))
        {
            $query = Search::model()->findByPk($_POST['pathname']);
            parse_str($query->query, $_POST);
        } 
        $model = new Adverts; 
        foreach($_POST['Adverts'] as $k=>$v)
        {
            if($k != 'sort' && $k != 'search') $model->$k = $v;
        }
        $model->minmax();
        $this->renderPartial('filters', array('model'=>$model));
    }
    
    public function actionDynamicrubric()
    {
        $data=Sub::model()->findAll('rub=:id or rub=0', 
              array(':id'=>(int) $_POST['Adverts']['rub_id']));

        $data=CHtml::listData($data,'id','name');

        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
        }
    }
       
    public function actionSubAjax()
    {
        $subs = Yii::app()->db->createCommand("SELECT sub.*, count(DISTINCT sub.id), count(adverts.id) as count FROM sub LEFT OUTER JOIN adverts ON  sub.id = adverts.sub_id WHERE sub.rub = ".$_POST['Adverts']['rub_id']." GROUP BY sub.id")->queryAll();
        foreach($subs as $r){
            $sub[] = array('label'=>$r['name']." <span>(".$r['count'].")</span>", 'encodeLabel'=>false, 'htmlOptions'=>array('data-id'=>$r['id'],'onclick'=>'find($(this))','class'=>((isset($_POST['Adverts']['sub']) && in_array($r['id'], $_POST['Adverts']['sub'])) ? 'active' : '')));
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
        $model = new Adverts;
        $model->probeg();
        $model->volume();
        $this->render('otherParams', array('rub'=>$_POST['Adverts']['rub_id'], 'model'=>$model));
    }
    
    public function actionAddOtherParamsAjax()
    {
        $this->render('addOtherParams', array('rub'=>$_POST['Adverts']['rub_id']));
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
    
    
    public function actionFish()
    {
        for($i = 0 ; $i < 10000; $i++)
        {
            $model = new Adverts;
            $model->fish();
        }
    }

}

?>
