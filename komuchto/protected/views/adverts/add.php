<div class="form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'addadvert-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
    
    <div class="row">
        <?php echo $form->label($model, 'act', array('label' => 'Действие')); ?>
        <?php echo $form->dropDownList($model,'act', CHtml::listData(Act::model()->findAll('type=:type', array(':type'=>0)),'id','name')) ?>
    </div>
 
   <div class="row">
        <?php echo $form->label($model, 'rub', array('label' => 'Рубрика')); ?>
        <?php echo $form->dropDownList($model, 'rub', CHtml::listData(Rub::model()->findAll(),'id','name'),
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
        <?php echo $form->label($model, 'sub', array('label' => 'Подрубрика')); ?>
        <?php echo $form->dropDownList($model,'sub', CHtml::listData(Sub::model()->findAll('rub=:rub', array(':rub'=>1)),'id','name')) ?>
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
        <?php echo $form->label($model,'text',array('label'=>'Текст объявления')); ?>
        <?php echo $form->textArea($model,'text') ?>
         <?php echo $form->error($model,'text'); ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Подать объявление'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->