<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="left">
        <?php /** @var BootActiveForm $form */
        $params = $model->find();
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'find',
        )); ?>
        
        <!-- Рубрики -->
        <div id="rub_find">
        <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
            'toggle' => 'checkbox',
            'buttons' => $params['rub_array'],
        )); ?>
        </div>
        <!-- Рубрики -->
        <div id="filters">
            <!-- Рубрика -->
            <div class="select">
            <?php echo $form->dropDownListRow($model, 'rub', $params['rub'], array(
                'labelOptions' => array("label" => false),
                'onchange'=>'otherParams(true)', //очищает доп параметры
                'ajax' => array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('/art/subajax'),
                    'update'=>'#sub_find',
            ))); ?>
            </div>

            <!-- Подрубрики -->
            <div id="sub_find">
            <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                'toggle' => 'checkbox',
                'buttons' => $params['sub'],
            )); ?>
            </div>
            <!-- Подрубрики -->

            <!-- Фильтры -->
            <div class="select">
            <?php echo $form->dropDownListRow($model, 'act', CHtml::listData(Act::model()->findAll(),'id','name'), array('labelOptions' => array("label" => false))); ?>
            <?php echo $form->dropDownListRow($model, 'city', CHtml::listData(City::model()->findAll(),'id','name'), array('labelOptions' => array("label" => false))); ?>
            </div>
            <input type="text" id="amount-range" style="border:0; font-weight:bold;" value="<?=(!empty($model->minprice) ? $model->minprice : 0 ).'-'.$model->maxprice?>" readonly/>
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
            <!-- Доп Фильтры -->
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Больше параметров',
                'buttonType'=>'link',
                'type'=>'link',
                'htmlOptions'=>array('onclick'=>'otherParams()'),
            )); ?>
            <div id="otherParams">
            <?// echo $params['other'];?>
            </div>
        </div>
        <?php $this->endWidget(); ?>

    </div>
<?endif;?>
<div id="content" class="span8">
<?php $this->widget('application.widgets.AdvertsCListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_advertItem',
    'template'=>'{summary}{sorter}{items}{pager}',
    'sortableAttributes'=>array(
        'price',
        'created'
    )
)); ?>
</div>
<?if(!Yii::app()->request->getIsAjaxRequest()):?>
<div class="left span-2">

</div>
<?endif;?>