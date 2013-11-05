<div class="form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'account-form',
    'enableAjaxValidation'=>false,
)); ?>
 
    <?php //echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->label($model, 'rub', array('label' => 'Рубрика')); ?>
        <?php echo $form->dropDownList($model, 'rub', CHtml::listData(Rub::model()->findAll(),'id','name'),
            array(
                'ajax' => array(
                'type'=>'POST', //request type
                'url'=>CController::createUrl('/admin/adverts/dynamicrubric'), //url to call.
                //Style: CController::createUrl('currentController/methodToCall')
                'update'=>'#Adverts_sub', //selector to update
                //'data'=>'js:javascript statement' 
                //leave out the data key to pass all form values through
            ))); ?>
        <?php// echo $form->dropDownList($model, 'rub', CHtml::listData(Rub::model()->findAll(),'id','name')); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'sub', array('label' => 'Подрубрика')); ?>
        <?php echo $form->dropDownList($model,'sub', CHtml::listData(Sub::model()->findAll('rub=:rub', array(':rub'=>$model->rub)),'id','name')) ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'user', array('label' => 'Пользователь')); ?>
        <?php echo $form->textField($model,'user') ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model,'text', array('label' => 'Текст объявления')); ?>
        <?php echo $form->textArea($model,'text') ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Изменить'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
