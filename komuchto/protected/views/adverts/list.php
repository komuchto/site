<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="left">
        <?$this->renderPartial('filters', array('model'=>$model))?>
        <div class="art-info">Объявлений за месяц: <span>549221</span></div>
    </div>
<?endif;?>
<div id="content" class="head span8">
<?php $this->widget('application.widgets.AdvertsCListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_advertItem',
    'template'=>'{summary}{sorter}{items}{pager}',
    'sortableAttributes'=>array(
        'price',
        'created'
    ),
    'pager'=>array(
        'cssFile'=>'/komuchto/css/pager.css',
        'header'=>''
    ),
)); ?>
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