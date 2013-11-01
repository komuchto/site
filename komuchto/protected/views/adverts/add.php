<div class="form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'addadvert-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
 
    <div class="row">
        <?php echo $form->label($model, 'rub', array('label' => 'Рубрика')); ?>
        <?php echo $form->dropDownList($model,'rub', CHtml::listData(Rub::model()->findAll(array('order' => 'name ASC')), 'id', 'name')) ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'phone',array('label'=>'Номер телефона')); ?>
        <?php echo $form->telField($model,'phone') ?>
        <?php echo $form->error($model,'phone'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model,'img',array('label'=>'Изображения')); ?>
        <?php echo $form->fileField($model,'img') ?>
        <?php// echo $form->fileField($model,'img1') ?>
        <?php// echo $form->fileField($model,'img2') ?>
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