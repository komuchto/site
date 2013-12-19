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
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/main.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
        <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap-select.min.js"></script>
        <?Yii::app()->bootstrap->register();?>
</head>

<body>
	<div class="container">
            <img width="1000" height="90" style="margin:10px auto" src="/komuchto/images/banners/banner.jpg">
            <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'searchForm',
                'type'=>'search',
                'method'=>'post',
            )); ?>
            
            <a href="/" class="logo"></a>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 'label'=>'','url'=>(Yii::app()->user->isGuest ? '/login' : '/users/'.Yii::app()->user->id),'htmlOptions'=>array('name'=>'','class'=>'user pull-right'))); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 'type'=>'danger', 'label'=>'Подать объявление','url'=>'/art/add','htmlOptions'=>array('name'=>'','class'=>'pull-right'))); ?>
            <div class="search">
                <?php echo CHtml::textField('search', '', array('class'=>'input-medium','id'=>'searchInput')) ?>
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Поиск', 'htmlOptions'=>array('name'=>'','onclick'=>'find(false, true);return false'))); ?>
            </div>
            <div style="clear:both"></div>
            <?php $this->endWidget(); ?>
            
            
            <?if(!Yii::app()->request->getIsAjaxRequest()):?>
            <div class="left">
                <?$this->renderPartial('/adverts/filters', array('model'=>new Adverts))?>
                <div class="art-info">Объявлений за месяц: <span>549221</span></div>
            </div>
            <?endif;?>
            
             <?php echo $content; ?>
            
            <?if(!Yii::app()->request->getIsAjaxRequest()):?>
                <div class="right">
                    <a class="btn-link" href="/reklama/">Рекламодателям</a>
                    <img width="173" height="220" src="/komuchto/images/banners/avtolombard.jpg">
                    <img width="173" height="220" src="/komuchto/images/banners/zhbk2.jpg">
                    <img width="173" height="220" src="/komuchto/images/banners/alibi.jpg">
                    <div class="user-info">Посетителей за месяц: <span>54922</span></div>
                </div>
            <?endif;?>
            
            <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/script.js"></script>
        </div>
	
</body>
</html>