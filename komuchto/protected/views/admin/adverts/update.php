<div class="form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'account-form',
    'enableAjaxValidation'=>false,
)); ?>
 
    <?php echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->label($model, 'rub_id', array('label' => 'Рубрика')); ?>
        <?php echo $form->dropDownList($model, 'rub_id', CHtml::listData(Rub::model()->findAll(),'id','name'),
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
        <?php echo $form->label($model, 'sub_id', array('label' => 'Подрубрика')); ?>
        <?php echo $form->dropDownList($model,'sub_id', CHtml::listData(Sub::model()->findAll('rub=:rub', array(':rub'=>$model->rub_id)),'id','name')) ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'user_id', array('label' => 'Пользователь')); ?>
        <?php echo $form->textField($model,'user_id') ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model,'text', array('label' => 'Текст объявления')); ?>
        <?php echo $form->textArea($model,'text') ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model,'moderate', array('label' => 'Модерация')); ?>
        <?php echo $form->dropDownList($model,'moderate', array(0,1)) ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Изменить'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
