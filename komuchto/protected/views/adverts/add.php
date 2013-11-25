<div class="form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'addadvert-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
    
    <div class="row">
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
                //Style: CController::createUrl('currentController/methodToCall')
                'update'=>'#Adverts_sub', //selector to update
                //'data'=>'js:javascript statement' 
                //leave out the data key to pass all form values through
            ))); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'sub_id', array('label' => 'Подрубрика')); ?>
        <?php echo $form->dropDownList($model,'sub_id', CHtml::listData(Sub::model()->findAll('rub=:rub', array(':rub'=>1)),'id','name')) ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'phone',array('label'=>'Номер телефона')); ?>
        <?php echo $form->telField($model,'phone') ?>
        <?php echo $form->error($model,'phone'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model,'img',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img') ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'img1',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img1') ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'img2',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img2') ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'img3',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img3') ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'img4',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img4') ?>
    </div>
    
     <div class="row">
        <?php echo $form->label($model,'text',array('label'=>'Текст объявления')); ?>
        <?php echo $form->textArea($model,'text') ?>
         <?php echo $form->error($model,'text'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model,'price',array('label'=>'Цена (руб)')); ?>
        <?php echo $form->telField($model,'price') ?>
        <?php echo $form->error($model,'price'); ?>
    </div>
    
    <div class="row submit">
        <?php echo CHtml::submitButton('Подать объявление'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->