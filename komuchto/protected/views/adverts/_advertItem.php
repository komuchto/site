<div class="advert" style="clear:both">
    <?$img = explode(',', $data->img)?>
    <a style="width:150px;float:left" href="/adverts/<?=$data->id?>" class="thumbnail" rel="tooltip" data-title="Tooltip">
        <img width="150" src="/komuchto/images/adverts/<?=$img[1]?>" alt="">
    </a>
    <?=$data->text?>
    <a style="float:right" href="/adverts/<?=$data->id?>">читать далее...</a>
</div>