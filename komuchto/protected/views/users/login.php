<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="left">
        <?$this->renderPartial('/adverts/filters', array('model'=>new Adverts))?>
        <div class="art-info">Объявлений за месяц: <span>549221</span></div>
    </div>
<?endif;?>

<div id="content" class="head span8">
<?php
if (Yii::app()->user->hasFlash('error')) {
    echo '<div class="error">'.Yii::app()->user->getFlash('error').'</div>';
}
?>
    <h2>Авторизация:</h2>
<?php
$this->widget('ext.eauth.EAuthWidget', array('action' => 'users/login'));
?>
</div>
<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="right">
        <a class="btn-link" href="/reklama/">Рекламодателям</a>
        <img width="173" height="240" src="/komuchto/images/banners/avtolombard.jpg">
        <img width="173" height="240" src="/komuchto/images/banners/avtolombard.jpg">
        <!--<img width="173" height="240" src="/komuchto/images/banners/avtolombard.jpg">-->
        <div class="user-info">Посетителей за месяц: <span>549221</span></div>
    </div>
<?endif;?>