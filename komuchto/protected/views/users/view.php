<div class="form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'account-form',
    'enableAjaxValidation'=>false,
)); ?>
 
    <?php// echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->label($model, 'Псевдоним пользователя'); ?>
        <?php echo $form->textField($model,'name') ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->emailField($model,'email') ?>
    </di
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Изменить'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
