

<div class="art">
    <?$img = explode(',', $data->img)?>
    <a href="/<?=$data->id?>" rel="tooltip" class="art-img">
        <img src="/komuchto/images/art/<?=$img[1]?>" alt="">
    </a>
    
    <div class="info">
        <a class="fav <?=$data->favorits->user?>" href="/fav/<?=$data->id?>"></a>
        <a href="/#!<?=$data->id?>"><?=$data->act->name?> <?=$data->sub->name?></a>
        <span class="date"><?php echo ((Yii::app()->dateFormatter->format('yMd', $data->created) == date('Ymd')) ? 'Сегодня '.Yii::app()->dateFormatter->format('H:m', $data->created) : Yii::app()->dateFormatter->format('d MMMM yyyy H:m', $data->created));?></span>
    <span><?=mb_substr($data->text, 0, 100, 'UTF-8');?></span>
    <span class="price"><?=$data->price?> руб.</span>
    </div>
    
</div>