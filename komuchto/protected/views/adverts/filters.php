<?php /** @var BootActiveForm $form */
$params = $model->find();
$model->minmax();
$model->probeg();
$model->volume();
$model->nedv();
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
    <?php// echo $form->dropDownListRow($model, 'city', CHtml::listData(City::model()->findAll(),'id','name'), array('labelOptions' => array("label" => false),'onchange'=>'find()','class'=>'selectpicker')); ?>
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
    
        <div class="select">

        <div class="other-rub-1">
        <?  echo CHtml::dropDownList('Adverts[mark]', 0, CHtml::listData(Mark::model()->findAll(), 'id', 'name'), array('onchange' => 'find()'));
            echo CHtml::dropDownList('Adverts[transmission]', 0, CHtml::listData(Transmission::model()->findAll(), 'id', 'name'), array('onchange' => 'find()'));
            echo CHtml::dropDownList('Adverts[drive]', 0, CHtml::listData(Drive::model()->findAll(), 'id', 'name'), array('onchange' => 'find()'));
            echo CHtml::dropDownList('Adverts[type_body]', 0, CHtml::listData(TypeBody::model()->findAll(), 'id', 'name'), array('onchange' => 'find()'));
            echo CHtml::dropDownList('Adverts[type_engine]', 0, CHtml::listData(TypeEngine::model()->findAll(), 'id', 'name'), array('onchange' => 'find()'));
            for ($i = 1960; $i <= (int) date('Y'); $i++) {
                $year[] = $i;
            }
            $year[-1] = 'Год выпуска';
            echo CHtml::dropDownList('Adverts[year]', 0, array_reverse($year), array('onchange' => 'find()'));
            echo '<div id="amount-range-probeg">Пробег: <span>' . $model->minprobeg . '-' . $model->maxprobeg . '</span></div>';
            $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model' => $model,
                'attribute' => 'minprobeg',
                'maxAttribute' => 'maxprobeg',
                'event' => 'change',
                'options' => array(
                    'step' => 10000,
                    'animate' => true,
                    'values' => array($model->minprobeg, $model->maxprobeg),
                    'range' => true,
                    'min' => 0,
                    'max' => 500000,
                    'slide' => 'js:function(event,ui){$("#amount-range-probeg span").html(ui.values[0]+\'-\'+ui.values[1])}',
                    'stop' => 'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minprobeg\').val(v[0]); jQuery(\'#Adverts_minprobeg_end\').val(v[1]);find() }',
                ),
            ));
            echo '<div id="amount-range-volume">Объем двигателя: <span>' . $model->minvolume . '-' . $model->maxvolume . '</span></div>';
            $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model' => $model,
                'attribute' => 'minvolume',
                'maxAttribute' => 'maxvolume',
                'event' => 'change',
                'options' => array(
                    'step' => 0.1,
                    'animate' => true,
                    'values' => array($model->minvolume, $model->maxvolume),
                    'range' => true,
                    'min' => 0,
                    'max' => 10,
                    'slide' => 'js:function(event,ui){$("#amount-range-volume span").html(ui.values[0]+\'-\'+ui.values[1])}',
                    'stop' => 'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minvolume\').val(v[0]); jQuery(\'#Adverts_minvolume_end\').val(v[1]);find() }',
                ),
            ));
        ?>
        </div>
        <div class="other-rub-2">
        <?
            echo CHtml::dropDownList('Adverts[act]', 0, CHtml::listData(Act::model()->findAll(), 'id', 'name'), array('onchange' => 'find()'));

            echo '<div id="amount-range-etazh"> Этаж: <span>' . $model->minetazh . '-' . $model->maxetazh . '</span></div>';
            $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model' => $model,
                'attribute' => 'minetazh',
                'maxAttribute' => 'maxetazh',
                'event' => 'change',
                'options' => array(
                    'step' => 1,
                    'animate' => true,
                    'values' => array($model->minetazh, $model->maxetazh),
                    'range' => true,
                    'min' => 1,
                    'max' => 50,
                    'slide' => 'js:function(event,ui){$("#amount-range-etazh span").html(ui.values[0]+\'-\'+ui.values[1])}',
                    'stop' => 'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minetazh\').val(v[0]); jQuery(\'#Adverts_minetazh_end\').val(v[1]);find() }',
                ),
            ));

            echo '<div id="amount-range-komnaty-count">Кол-во комнат: <span>' . $model->minkomnaty_count . '-' . $model->maxkomnaty_count . '</span></div>';
            $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model' => $model,
                'attribute' => 'minkomnaty_count',
                'maxAttribute' => 'maxkomnaty_count',
                'event' => 'change',
                'options' => array(
                    'step' => 1,
                    'animate' => true,
                    'values' => array($model->minkomnaty_count, $model->maxkomnaty_count),
                    'range' => true,
                    'min' => 1,
                    'max' => 10,
                    'slide' => 'js:function(event,ui){$("#amount-range-komnaty-count span").html(ui.values[0]+\'-\'+ui.values[1])}',
                    'stop' => 'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minkomnaty_count\').val(v[0]); jQuery(\'#Adverts_minkomnaty_count_end\').val(v[1]);find() }',
                ),
            ));

            echo '<div id="amount-range-etazh-build">Этажей в доме: <span>' . $model->minetazh_build . '-' . $model->maxetazh_build . '</span></div>';
            $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model' => $model,
                'attribute' => 'minetazh_build',
                'maxAttribute' => 'maxetazh_build',
                'event' => 'change',
                'options' => array(
                    'step' => 1,
                    'animate' => true,
                    'values' => array($model->minetazh_build, $model->maxetazh_build),
                    'range' => true,
                    'min' => 1,
                    'max' => 30,
                    'slide' => 'js:function(event,ui){$("#amount-range-etazh-build span").html(ui.values[0]+\'-\'+ui.values[1])}',
                    'stop' => 'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minetazh_build\').val(v[0]); jQuery(\'#Adverts_minetazh_build_end\').val(v[1]);find() }',
                ),
            ));
            echo CHtml::dropDownList('Adverts[vid_object]', 0, CHtml::listData(VidObject::model()->findAll(), 'id', 'name'), array('onchange' => 'find()'));
            echo CHtml::dropDownList('Adverts[type_object]', 0, CHtml::listData(TypeObject::model()->findAll(), 'id', 'name'), array('onchange' => 'find()'));
            echo '<div id="amount-range-plosch">Площадь: <span>' . $model->minplosch . '-' . $model->maxplosch . '</span></div>';
            $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                'model' => $model,
                'attribute' => 'minplosch',
                'maxAttribute' => 'maxplosch',
                'event' => 'change',
                'options' => array(
                    'step' => 10,
                    'animate' => true,
                    'values' => array($model->minplosch, $model->maxplosch),
                    'range' => true,
                    'min' => 1,
                    'max' => 500,
                    'slide' => 'js:function(event,ui){$("#amount-range-plosch span").html(ui.values[0]+\'-\'+ui.values[1])}',
                    'stop' => 'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minplosch\').val(v[0]); jQuery(\'#Adverts_minplosch_end\').val(v[1]);find() }',
                ),
            ));
        ?>
        </div>
    </div>
 
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
                $('#sub_find a').hide();
                $("div[class*='other-rub-']").hide();
                $('#sub_find a[data-rub=\''+el.attr('data-id')+'\']').show(500);
                $('.other-rub-'+el.attr('data-id')).show(500);
                $('#filters').show(500); 
            }    
        });
        
    });
    $('select').selectpicker();
</script>