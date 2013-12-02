<?php $this->widget('bootstrap.widgets.TbGridView', array(
   'dataProvider' => $dataProvider,
   //'filter' => $person,
   //'template' => "{items}",
   'type'=>'striped bordered condensed',
   'columns' => array(
        array(
            'name' => 'id',
            'header' => '#',
            'htmlOptions' => array('color' =>'width: 60px'),
        ),
        array(
            'name' => 'img',
            'header' => 'Изображения',
            'type'=>'html',
            'value'=>  'CHtml::image("/komuchto/images/art/".substr($data->img, strrpos($data->img, ",")+1), "", array("width"=>"50px"))',
        ),
        array(
            'name' => 'text',
            'header' => 'Текст объявления',
        ),
        array(
            'name' => 'created',
            'header' => 'Создано',
        ),
       array(
            'name' => 'updated',
            'header' => 'Обновлено',
       ),
       array(
            'name' => 'moderate',
            'header' => 'Модерация',
       ),
       array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>