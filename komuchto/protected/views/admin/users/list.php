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
            'name' => 'name',
            'header' => 'Псевдоним пользователя',
        ),
        array(
            'name' => 'email',
            'header' => 'E-mail',
        ),
        array(
            'name' => 'identity',
            'header' => 'Страница пользователя',
        ),
       array(
            'name' => 'permission',
            'header' => 'Права пользователя',
            'value'=>'($data->permission == 0) ? "Пользователь" : (($data->permission == 1) ? "Модератор" : "Администратор")',
        ),
       array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>