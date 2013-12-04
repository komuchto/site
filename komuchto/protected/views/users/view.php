<div class="left form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'account-form',
    'enableAjaxValidation'=>false,
)); ?>
 
    <?php //echo $form->errorSummary($model); ?>
    <?=CHtml::link('Выйти', '/logout')?>
    <div class="row">
        <?php echo $form->label($model, 'name', array('label' => 'Псевдоним пользователя')); ?>
        <?php echo $form->textField($model,'name') ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'email', array('label' => 'E-mail')); ?>
        <?php echo $form->emailField($model,'email') ?>
    </di
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Изменить'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
<div id="content" class="span8">
<h4>Избранные объявления</h4>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$favorits,
    'itemView'=>'/adverts/_advertItem',
    
)); ?>
<h4 style="clear:both">Мои объявления</h4>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$myAdverts,
    'itemView'=>'/adverts/_advertItem',
    
)); ?>