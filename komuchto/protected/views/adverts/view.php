<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jcarousel.js"></script>
<a class="back" href="" onclick="history.go(-1);return false">Назад к объявлениям</a>
<div class="artView">
    <div class="artHead">
        <a class="fav" href="/fav/<?=$model->id?>"></a>
        <span class="title"><?=$model->act->name?> <?=$model->sub->name?></span>
        <span class="date"><?php echo ((Yii::app()->dateFormatter->format('yMd', $model->created) == date('Ymd')) ? 'Сегодня '.Yii::app()->dateFormatter->format('H:m', $model->created) : Yii::app()->dateFormatter->format('d MMMM yyyy H:m', $model->created));?></span>
    </div>
    <div class="clearfix"></div>
<?$img = explode(',', $model->img)?>
<?$this->widget('ext.lyiightbox.LyiightBox2', array(
    'thumbnail' => '/komuchto/images/art/'.$img[1],
    'image' => '/komuchto/images/art/'.$img[0],
    'title' => '',
    'group' => 'art'
));?>
<div id="carousel">
    <ul>
        <?if($model->img1): $img1 = explode(',', $model->img1)?>
            <li><a href="/komuchto/images/art/<?=$img1[0]?>"><img width="150" src="/komuchto/images/art/<?=$img1[1]?>"></a></li>
        <?endif;?>
        <?if($model->img2): $img2 = explode(',', $model->img2)?>
            <li><a href="/komuchto/images/art/<?=$img2[0]?>"><img width="150" src="/komuchto/images/art/<?=$img2[1]?>"></a></li>
        <?endif;?>
        <?if($model->img3): $img3 = explode(',', $model->img3)?>
            <li><a href="/komuchto/images/art/<?=$img3[0]?>"><img width="150" src="/komuchto/images/art/<?=$img3[1]?>"></a></li>
        <?endif;?>
        <?if($model->img4): $img4 = explode(',', $model->img4)?>
            <li><a href="/komuchto/images/art/<?=$img4[0]?>"><img width="150" src="/komuchto/images/art/<?=$img4[1]?>"></a></li>
        <?endif;?>
    </ul>
</div>

<div class="text"><?=$model->text?></div>
<div class="info">
<div class="price"><?=$model->price?> руб.</div>
<div class="user">Продавец: <?=$model->user->name?></div>
<div class="phone">Телефон: <?=$model->phone?></div>
<div class="city">Город: <?=$model->city->name?></div>
</div>
</div>
<script>
    $(document).ready(function(){$('#carousel').jCarouselLite();});
</script>