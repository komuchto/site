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
    <?php echo $form->dropDownListRow($model, 'city', CHtml::listData(City::model()->findAll(),'id','name'), array('labelOptions' => array("label" => false),'onchange'=>'find()','class'=>'selectpicker')); ?>
    </div>
    <div id="amount-range">Цена: <span><?=(!empty($model->minprice) ? $model->minprice : 0 ).'-'.$model->maxprice?></span></div>
    <?php $this->widget('zii.widgets.jui.CJuiSliderInput', array(
            'model'=>$model,
            'attribute'=>'minprice',
            'maxAttribute'=>'maxprice',
            'event'=>'change',
            'options'=>array(
                'step'=>10000,
                'animate'=>true,
                'values'=>array((!empty($model->minprice) ? $model->minprice : 0 ),$model->maxprice),
                'range'=>true,
                'min'=>(!empty($model->minprice) ? $model->minprice : 0 ),
                'max'=>$model->maxprice,
                'slide'=>'js:function(event,ui){$("#amount-range span").html(ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minprice\').val(v[0]); jQuery(\'#Adverts_minprice_end\').val(v[1]);find() }',
            ),
        ));
      ?>
    <!-- Доп Фильтры -->
    <!--
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Больше параметров',
        'buttonType'=>'link',
        'type'=>'link',
        'htmlOptions'=>array('onclick'=>'otherParams()','class'=>'otherParams'),
    )); ?>-->
    <div id="otherParams">
    <?$this->renderPartial('/adverts/otherParams', array('model'=>$model))?>
    </div>
    <!--
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Меньше параметров',
        'buttonType'=>'link',
        'type'=>'link',
        'htmlOptions'=>array('onclick'=>'$("#otherParams").css("display","none").empty();$(".otherParams").show();$(this).hide()','class'=>'otherParamsClose'),
    )); ?>
    -->
</div>
<?php $this->endWidget(); ?>

<script>
    $(document).ready(function(){       
       
        $('#rub_find a').click(function(){
            var el = $(this);

            if(el.siblings('a.hide').length){
                el.siblings('a.hide').removeClass('hide').show("fast"); 
               $('#filters').hide(500);
            }else{                  
                el.siblings('a').addClass('hide').hide("fast");

                $("#sub_find").load("/art/subajax", 
                {Adverts: {rub_id: el.attr('data-id')}}, 
                function(){
                    $('#filters').show(500);
                }, 'post');  
            }    
        });
        $('select:visible').selectpicker();
    });
</script>