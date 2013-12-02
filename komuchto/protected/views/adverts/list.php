<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="left">
        <?$this->renderPartial('filters', array('model'=>$model))?>
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
        <div style="width:173px;height:240px;margin:10px auto;border:1px solid gray;text-align: center;">950x90 <?=$this->city?></div>
        <div style="width:173px;height:240px;margin:10px auto;border:1px solid gray;text-align: center;">950x90 <?=$this->city?></div>
    </div>
<?endif;?>