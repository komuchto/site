<div class="select">
<?if($_POST['Adverts']['rub_id'] == 1){
    echo CHtml::dropDownList('Adverts[mark]', 0, CHtml::listData(Mark::model()->findAll(),'id','name'),array('onchange'=>'find()'));
    echo CHtml::dropDownList('Adverts[transmission]', 0, CHtml::listData(Transmission::model()->findAll(),'id','name'),array('onchange'=>'find()'));
    echo CHtml::dropDownList('Adverts[drive]', 0, CHtml::listData(Drive::model()->findAll(),'id','name'),array('onchange'=>'find()'));
    echo CHtml::dropDownList('Adverts[type_body]', 0, CHtml::listData(TypeBody::model()->findAll(),'id','name'),array('onchange'=>'find()'));
    echo CHtml::dropDownList('Adverts[type_engine]', 0, CHtml::listData(TypeEngine::model()->findAll(),'id','name'),array('onchange'=>'find()'));
    for($i = 1960; $i <= (int)date('Y'); $i++){
        $year[] = $i;
    }
    $year[-1]='Год выпуска';
    echo CHtml::dropDownList('Adverts[year]', 0, array_reverse($year),array('onchange'=>'find()'));
    echo '<input type="text" id="amount-range-probeg" style="border:0; font-weight:bold;" value="Пробег: '.$model->minprobeg.'-'.$model->maxprobeg.'" readonly/>';
    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
            'model'=>$model,
            'attribute'=>'minprobeg',
            'maxAttribute'=>'maxprobeg',
            'event'=>'change',
            'options'=>array(
                'step'=>10000,
                'animate'=>true,
                'values'=>array($model->minprobeg, $model->maxprobeg),
                'range'=>true,
                'min'=>0,
                'max'=>500000,
                'slide'=>'js:function(event,ui){$("#amount-range-probeg").val("Пробег: "+ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minprobeg\').val(v[0]); jQuery(\'#Adverts_minprobeg_end\').val(v[1]);find() }',
            ),
        ));
    echo '<input type="text" id="amount-range-volume" style="border:0; font-weight:bold;" value="Объем двигателя: '.$model->minvolume.'-'.$model->maxvolume.'" readonly/>';
    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
            'model'=>$model,
            'attribute'=>'minvolume',
            'maxAttribute'=>'maxvolume',
            'event'=>'change',
            'options'=>array(
                'step'=>0.1,
                'animate'=>true,
                'values'=>array($model->minvolume, $model->maxvolume),
                'range'=>true,
                'min'=>0,
                'max'=>10,
                'slide'=>'js:function(event,ui){$("#amount-range-volume").val("Объем двигателя: "+ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minvolume\').val(v[0]); jQuery(\'#Adverts_minvolume_end\').val(v[1]);find() }',
            ),
        ));
} ?>
<?if($_POST['Adverts']['rub_id'] == 2) 
    echo '<input type="text" id="amount-range-etazh" style="border:0; font-weight:bold;" value="Этаж: '.$model->minetazh.'-'.$model->maxetazh.'" readonly/>';
    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
            'model'=>$model,
            'attribute'=>'minetazh',
            'maxAttribute'=>'maxetazh',
            'event'=>'change',
            'options'=>array(
                'step'=>1,
                'animate'=>true,
                'values'=>array($model->minetazh, $model->maxetzh),
                'range'=>true,
                'min'=>1,
                'max'=>50,
                'slide'=>'js:function(event,ui){$("#amount-range-etazh").val("Этаж: "+ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minetazh\').val(v[0]); jQuery(\'#Adverts_minetazh_end\').val(v[1]);find() }',
            ),
        ));
    
    echo '<input type="text" id="amount-range-komnaty-count" style="border:0; font-weight:bold;" value="Этаж: '.$model->minkomnaty_count.'-'.$model->maxkomnaty_count.'" readonly/>';
    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
            'model'=>$model,
            'attribute'=>'minkomnaty_count',
            'maxAttribute'=>'maxkomnaty_count',
            'event'=>'change',
            'options'=>array(
                'step'=>1,
                'animate'=>true,
                'values'=>array($model->minkomnaty_count, $model->maxkomnaty_count),
                'range'=>true,
                'min'=>1,
                'max'=>10,
                'slide'=>'js:function(event,ui){$("#amount-range-komnaty-count").val("Этаж: "+ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minkomnaty_count\').val(v[0]); jQuery(\'#Adverts_minkomnaty_count_end\').val(v[1]);find() }',
            ),
        ));
    
    echo '<input type="text" id="amount-range-komnaty-count" style="border:0; font-weight:bold;" value="Этаж: '.$model->minkomnaty_count.'-'.$model->maxkomnaty_count.'" readonly/>';
    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
            'model'=>$model,
            'attribute'=>'minkomnaty_count',
            'maxAttribute'=>'maxkomnaty_count',
            'event'=>'change',
            'options'=>array(
                'step'=>1,
                'animate'=>true,
                'values'=>array($model->minkomnaty_count, $model->maxkomnaty_count),
                'range'=>true,
                'min'=>1,
                'max'=>10,
                'slide'=>'js:function(event,ui){$("#amount-range-komnaty-count").val("Этаж: "+ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minkomnaty_count\').val(v[0]); jQuery(\'#Adverts_minkomnaty_count_end\').val(v[1]);find() }',
            ),
        ));
    echo '<input type="text" id="amount-range-etazh-build" style="border:0; font-weight:bold;" value="Этажей в доме: '.$model->minetazh_build.'-'.$model->maxetazh_build.'" readonly/>';
    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
            'model'=>$model,
            'attribute'=>'minetazh_build',
            'maxAttribute'=>'maxetazh_build',
            'event'=>'change',
            'options'=>array(
                'step'=>1,
                'animate'=>true,
                'values'=>array($model->minetazh_build, $model->maxetazh_build),
                'range'=>true,
                'min'=>1,
                'max'=>30,
                'slide'=>'js:function(event,ui){$("#amount-range-minetazh-build").val("Этажей в доме: "+ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minetazh_build\').val(v[0]); jQuery(\'#Adverts_minetazh_build_end\').val(v[1]);find() }',
            ),
        ));
    echo CHtml::dropDownList('Adverts[vid_object]', 0, CHtml::listData(VidObject::model()->findAll(),'id','name'),array('onchange'=>'find()'));
    echo CHtml::dropDownList('Adverts[type_object]', 0, CHtml::listData(TypeObject::model()->findAll(),'id','name'),array('onchange'=>'find()'));
    echo '<input type="text" id="amount-range-plosch" style="border:0; font-weight:bold;" value="Площадь: '.$model->minplosch.'-'.$model->maxplosch.'" readonly/>';
    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
            'model'=>$model,
            'attribute'=>'minetazh_build',
            'maxAttribute'=>'maxetazh_build',
            'event'=>'change',
            'options'=>array(
                'step'=>10,
                'animate'=>true,
                'values'=>array($model->minplosch, $model->maxplosch),
                'range'=>true,
                'min'=>1,
                'max'=>500,
                'slide'=>'js:function(event,ui){$("#amount-range-minetazh-build").val("Этажей в доме: "+ui.values[0]+\'-\'+ui.values[1])}',
                'stop'=>'js:function(e,ui){ v=ui.values; jQuery(\'#Adverts_minplosch\').val(v[0]); jQuery(\'#Adverts_minplosch_end\').val(v[1]);find() }',
            ),
        ));
?>

</div>