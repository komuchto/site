<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="left span3">
        <?php /** @var BootActiveForm $form */
        $params = $model->find();
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'find',
        )); ?>

        <!-- Рубрика -->
        <?php echo $form->dropDownListRow($model, 'rub', $params['rub'], array(
            'labelOptions' => array("label" => false),
            'ajax' => array(
                'type'=>'POST',
                'url'=>CController::createUrl('/art/subajax'),
                'update'=>'#sub_find',
        ))); ?>

        <!-- Подрубрики -->
        <div id="sub_find">
        <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
            'toggle' => 'checkbox',
            'buttons' => $params['sub'],
        )); ?>
        </div>
        <!-- Подрубрики -->

        <!-- Фильтры -->
        <?php echo $form->dropDownListRow($model, 'act', CHtml::listData(Act::model()->findAll(),'id','name'), array('labelOptions' => array("label" => false))); ?>
        <?php echo $form->dropDownListRow($model, 'city', CHtml::listData(City::model()->findAll(),'id','name'), array('labelOptions' => array("label" => false))); ?>
        <input type="text" id="amount-range" style="border:0; color:#f6931f; font-weight:bold;" value="<?=(!empty($model->minprice) ? $model->minprice : 0 ).'-'.$model->maxprice?>" />
        <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model'=>$model,
                'attribute'=>'minprice',
                'maxAttribute'=>'maxprice',
                'event'=>'change',
                'options'=>array(
                    'step'=>1000,
                    'animate'=>true,
                    'values'=>array((!empty($model->minprice) ? $model->minprice : 0 ),$model->maxprice),
                    'range'=>true,
                    'min'=>(!empty($model->minprice) ? $model->minprice : 0 ),
                    'max'=>$model->maxprice,
                    'slide'=>'js:function(event,ui){$("#amount-range").val(ui.values[0]+\'-\'+ui.values[1]);}',
                ),
            ));
          ?>
        <?php $this->endWidget(); ?>

    </div>
<?endif;?>
<div id="content" class="span8">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_advertItem',
    
)); ?>
</div>
<?if(!Yii::app()->request->getIsAjaxRequest()):?>
<div class="left span-2">

</div>
<?endif;?>