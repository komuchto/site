<?var_dump($data)?>
<div class="advert" style="clear:both">
    <?$img = explode(',', $data->img)?>
    <a style="width:150px;float:left" href="/adverts/<?=$data->id?>" class="thumbnail" rel="tooltip" data-title="Tooltip">
        <img width="150" src="/komuchto/images/adverts/<?=$img[1]?>" alt="">
    </a>
    
    <a href=""><?=$data->act->name?> <?=$data->rub->name?> <?=$data->sub->name?></a>
    
    <?=$data->text?>
    <a style="float:right" href="/adverts/<?=$data->id?>">читать далее...</a>
    <a class="fav" style="float:right" href="/adverts/fav/<?=$data->id?>">В избранное</a>
</div>