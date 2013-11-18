

<div class="advert" style="clear:both">
    <?$img = explode(',', $data->img)?>
    <a style="width:150px;float:left" href="/<?=$data->id?>" class="thumbnail" rel="tooltip" data-title="Tooltip">
        <img width="150" src="/komuchto/images/art/<?=$img[1]?>" alt="">
    </a>
    
    <a href=""><?=$data->act->name?> <?=$data->sub->name?></a>
    
    <?=$data->text?>
    <?=$data->price?>
    <a style="float:right" href="/<?=$data->id?>">читать далее...</a>
    <a class="fav" style="float:right" href="/fav/<?=$data->id?>">В избранное</a>
</div>