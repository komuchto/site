<div class="form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'account-form',
    'enableAjaxValidation'=>false,
)); ?>
 
    <?php //echo $form->errorSummary($model); ?>
    
    <div class="row">
        <?php echo $form->label($model,'name', array('label' => 'Имя пользователя')); ?>
        <?php echo $form->textField($model,'name') ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model,'email', array('label' => 'E-mail')); ?>
        <?php echo $form->emailField($model,'email') ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'permission', array('label' => 'Права пользователя')); ?>
        <?php echo $form->dropDownList($model,'permission', array('Пользователь','Модератор','Администратор')) ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Изменить'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
