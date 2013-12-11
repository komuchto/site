<div class="art">
    <?$img = explode(',', $data->img)?>
    <a href="/#!<?=$data->id?>" rel="tooltip" class="art-img">
        <img src="<?if(!empty($img[1])):?>/komuchto/images/art/<?=$img[1]?><?endif;?>" alt="">
    </a>
    <?
    $favorits_users = array();
    foreach($data->favorits_adv as $f)
        $favorits_users[] = $f->user;
    ?>
    <div class="info">
        <a onclick="fav(this);return false" class="fav <?=(in_array(Yii::app()->User->id, $favorits_users) ? "active" : "")?>" href="/fav/<?=$data->id?>"></a>
        <a href="/#!<?=$data->id?>"><?=$data->act->name?> <?=$data->sub->name?></a>
        <?if($data->user_id == Yii::app()->User->id):?><a href="/edit/<?=$data->id?>">Редактировать</a><?endif;?>
        <span class="date"><?php echo ((Yii::app()->dateFormatter->format('yMd', $data->created) == date('Ymd')) ? 'Сегодня '.Yii::app()->dateFormatter->format('H:m', $data->created) : Yii::app()->dateFormatter->format('d MMMM yyyy H:m', $data->created));?></span>
    <span><?=mb_substr($data->text, 0, 100, 'UTF-8');?></span>
    <span class="price"><?=$data->price?> руб.</span>
    </div>
    
</div>