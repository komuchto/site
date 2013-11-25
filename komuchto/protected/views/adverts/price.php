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
            'slide'=>'js:function(event,ui){$("#amount-range").val("Цена: "+ui.values[0]+\'-\'+ui.values[1]);}',
        ),
    ));
  ?>