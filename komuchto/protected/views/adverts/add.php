<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="left">
        <?$this->renderPartial('filters', array('model'=>$model))?>
        <div class="art-info">Объявлений за месяц: <span>549221</span></div>
    </div>
<?endif;?>
<div id="content" class="head span8">
<?if(Yii::app()->user->hasFlash('success')):?>
    <? echo Yii::app()->user->getFlash('success');?>
<?else:?>
    
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'addadvert-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
    
    <div class="row">
        <?php echo $form->error($model,'city_id'); ?>
        <?php echo $form->label($model, 'city_id', array('label' => 'Город')); ?>
        <?php echo $form->dropDownList($model,'city_id', CHtml::listData(City::model()->findAll(),'id','name')) ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'act_id', array('label' => 'Действие')); ?>
        <?php echo $form->dropDownList($model,'act_id', CHtml::listData(Act::model()->findAll('type=:type', array(':type'=>0)),'id','name')) ?>
    </div>
 
   <div class="row">
        <?php echo $form->label($model, 'rub_id', array('label' => 'Рубрика')); ?>
        <?php echo $form->dropDownList($model, 'rub_id', CHtml::listData(Rub::model()->findAll(),'id','name'),
            array(
                'ajax' => array(
                'type'=>'POST', //request type
                'url'=>CController::createUrl('/adverts/dynamicrubric'), //url to call.
                'update'=>'#Adverts_sub_id', //selector to update
            ))); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'sub_id', array('label' => 'Подрубрика')); ?>
        <?php echo $form->dropDownList($model,'sub_id', CHtml::listData(Sub::model()->findAll('rub=:rub or rub=0', array(':rub'=>1)),'id','name'),
            array(
                'ajax' => array(
                'type'=>'POST', //request type
                'url'=>CController::createUrl('/adverts/addotherparamsajax'), //url to call.
                'update'=>'#other', //selector to update
            )));
        ?>
    </div>
    <div id="other">
        
    </div>
    <div class="row">
        <?php echo $form->label($model,'phone',array('label'=>'Номер телефона')); ?>
        <?php echo $form->telField($model,'phone') ?>
        <?php echo $form->error($model,'phone'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->error($model,'img'); ?>
        <?php echo $form->label($model,'img',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img') ?>
    </div>
    <div class="row">
        <?php echo $form->error($model,'img1'); ?>
        <?php echo $form->label($model,'img1',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img1') ?>
    </div>
    <div class="row">
        <?php echo $form->error($model,'img2'); ?>
        <?php echo $form->label($model,'img2',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img2') ?>
    </div>
    <div class="row">
        <?php echo $form->error($model,'img3'); ?>
        <?php echo $form->label($model,'img3',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img3') ?>
    </div>
    <div class="row">
        <?php echo $form->error($model,'img4'); ?>
        <?php echo $form->label($model,'img4',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img4') ?>
    </div>
    
     <div class="row">
        <?php echo $form->label($model,'text',array('label'=>'Текст объявления')); ?>
        <?php echo $form->textArea($model,'text') ?>
         <?php echo $form->error($model,'text'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->error($model,'price'); ?>
        <?php echo $form->label($model,'price',array('label'=>'Цена (руб)')); ?>
        <?php echo $form->telField($model,'price') ?>
    </div>
    
    <div class="row submit">
        <?php echo CHtml::submitButton('Подать объявление'); ?>
    </div>
 
<?php $this->endWidget(); ?>
<?endif;?>   
    
</div><!-- form -->
<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="right">
        <a class="btn-link" href="/reklama/">Рекламодателям</a>
        <img width="173" height="240" src="/komuchto/images/banners/avtolombard.jpg">
        <img width="173" height="240" src="/komuchto/images/banners/avtolombard.jpg">
        <!--<img width="173" height="240" src="/komuchto/images/banners/avtolombard.jpg">-->
        <div class="user-info">Посетителей за месяц: <span>549221</span></div>
    </div>
<?endif;?>