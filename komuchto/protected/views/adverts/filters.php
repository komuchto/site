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
    <?php echo $form->dropDownListRow($model, 'rub_id', $params['rub'], array(
        'labelOptions' => array("label" => false),
        'encode'=>false,
        'onchange'=>'find();otherParams(true)', //очищает доп параметры
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
    <div class="select sub">
    <?php echo $form->dropDownListRow($model, 'act', CHtml::listData(Act::model()->findAll(),'id','name'), array('labelOptions' => array("label" => false),'onchange'=>'find()')); ?>
    <?php echo $form->dropDownListRow($model, 'city', CHtml::listData(City::model()->findAll(),'id','name'), array('labelOptions' => array("label" => false),'onchange'=>'find()')); ?>
    </div>
    <input type="text" id="amount-range" style="border:0; font-weight:bold;" value="Цена: <?=(!empty($model->minprice) ? $model->minprice : 0 ).'-'.$model->maxprice?>" readonly/>
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
                'slide'=>'js:function(event,ui){$("#amount-range").val("Цена: "+ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minprice\').val(v[0]); jQuery(\'#Adverts_minprice_end\').val(v[1]);find() }',
            ),
        ));
      ?>
    <!-- Доп Фильтры -->
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Больше параметров',
        'buttonType'=>'link',
        'type'=>'link',
        'htmlOptions'=>array('onclick'=>'otherParams()','class'=>'otherParams'),
    )); ?>
    <div id="otherParams">
    <?// echo $params['other'];?>
    </div>
</div>
<?php $this->endWidget(); ?>

<script>
    $(document).ready(function(){       
        $('#Adverts_minprice_slider').slider({
            'step':1000,
            'animate':true,
            'values':[<?=$model->minprice?>,<?=$model->maxprice?>],
            'range':true,
            'min':<?=$model->filterminprice?>,
            'max':<?=$model->filtermaxprice?>,
            'slide':function(e,ui){$("#amount-range").val('Цена: '+ui.values[0]+'-'+ui.values[1]);},
            'stop':function(e,ui){ v=ui.values; jQuery('#Adverts_minprice').val(v[0]); jQuery('#Adverts_minprice_end').val(v[1]);find() }
        });
        $('#rub_find a').click(function(){
            var el = $(this);
            $('#rub_find').hide( "fast", function() {     
                $("#sub_find").load("/art/subajax", 
                {Adverts: {rub_id: el.attr('data-id')}}, 
                function(){
                    //$('#filters').show();
                    //$('#rub_find').hide();
                }, 'post');
                $('#filters').show(500);
                $("#Adverts_rub_id option[value='"+el.attr('data-id')+"']").attr('selected','selected');
                $('#rub_find').css('display','none');
                find();
            });
        });
    });
</script>