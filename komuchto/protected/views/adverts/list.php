<?if(!Yii::app()->request->getIsAjaxRequest()):?>
    <div class="left">
        <?$this->renderPartial('filters', array('model'=>$model))?>
    </div>
<?endif;?>
<div id="content" class="span8">
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

</div>
<?endif;?>