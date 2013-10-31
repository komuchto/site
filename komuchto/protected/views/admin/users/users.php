<?php $this->widget('bootstrap.widgets.TbGridView', array(
   'dataProvider' => $dataProvider,
   //'filter' => $person,
   //'template' => "{items}",
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
    ),
)); ?>