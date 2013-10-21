<?
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
    'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
    'modules'=>array(
        'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),
    ),
    'components'=>array(
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
    ),
);