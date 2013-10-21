<?php
if (Yii::app()->user->hasFlash('error')) {
    echo '<div class="error">'.Yii::app()->user->getFlash('error').'</div>';
}
?>
    <h2>Авторизация:</h2>
<?php
$this->widget('ext.eauth.EAuthWidget', array('action' => 'site/login'));
?>