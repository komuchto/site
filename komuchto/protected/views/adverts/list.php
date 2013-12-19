<div id="content" class="head span8">
<?php $this->widget('application.widgets.AdvertsCListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_advertItem',
    'template'=>'{summary}{sorter}{items}{pager}',
    'ajaxUpdate'=>false,
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
<script>
    $(function(){
        $('li.page a').click(function(){
          $(this).parent('li').addClass('selected').siblings('li').removeClass('selected');
          find('pager')
          return false;
        });
        $('.sorter a').click(function(){
            if($(this).hasClass('desc'))
                $(this).toggleClass('desc').toggleClass('asc');
            else
                $(this).toggleClass('asc').addClass('desc');
            
            find();
            return false;
        });
    });  
</script>