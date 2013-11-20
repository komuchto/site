

<div class="art">
    <?$img = explode(',', $data->img)?>
    <a href="/<?=$data->id?>" rel="tooltip" class="art-img">
        <img src="/komuchto/images/art/<?=$img[1]?>" alt="">
    </a>
    
    <div class="info">
        <a class="fav" href="/fav/<?=$data->id?>"></a>
        <a href="/#!<?=$data->id?>"><?=$data->act->name?> <?=$data->sub->name?></a>  
    <span><?=$data->text?></span>
    <span class="price"><?=$data->price?> руб.</span>
    </div>
    
</div>