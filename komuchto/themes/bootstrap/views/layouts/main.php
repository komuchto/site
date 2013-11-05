<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
</head>

<body>
        <div style="width:950px;height:90px;margin:10px auto;border:1px solid gray;text-align: center;">950x90</div>
        
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
            'type'=>'inverse', // null or 'inverse'
            'brand'=>'',
            'brandUrl'=>'',
            'fixed'=>false,
            'collapse'=>true, // requires bootstrap-responsive.css
            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'items'=>array(
                        array('label'=>'Афиша', 'url'=>'/billboard/'),
                        array('label'=>'Новости', 'url'=>'/news/'),
                        array('label'=>'Гороскоп', 'url'=>'/horoscope/'),
                        array('label'=>'Контакты', 'url'=>'/contacts/'),
                    ),
                ),
                 array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'htmlOptions'=>array('class'=>'pull-right'),
                    'items'=>array(
                        ((Yii::app()->user->isGuest) ? array('label'=>'Войти', 'url'=>'/login') : array('label'=>Yii::app()->user->name, 'url'=>'/users/'.Yii::app()->user->id))

                    ),
                ),
            ),
        )); ?>

	<div class="container">
            
            <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'searchForm',
                'type'=>'search',
                'method'=>'get',
                'htmlOptions'=>array('class'=>'well'),
            )); ?>
            
            <a style="width:150px;float:left;margin-right:100px" href="/" class="thumbnail" rel="tooltip" data-title="Tooltip">
                <img src="http://placehold.it/150x50" alt="">
            </a>
            
            <?php echo CHtml::textField('search', $_GET['search'], array('class'=>'input-medium')) ?>

            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Поиск','htmlOptions'=>array('name'=>''))); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 'type'=>'danger', 'label'=>'Подать объявление','url'=>'/adverts/add','htmlOptions'=>array('name'=>'','class'=>'pull-right'))); ?>
            <div style="clear:both"></div>
            <?php $this->endWidget(); ?>
            
            <?php echo $content; ?>
	
        </div>
	<footer class="footer">
		<div class="container">

		</div>
	</footer>
	
</body>
</html>