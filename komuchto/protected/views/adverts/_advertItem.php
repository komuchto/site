<div class="art" onclick="window.location='/#!<?=$data->id?>'">
    <?if(!empty($data->img)):?>
        <?$img = explode(',', $data->img)?>
    <?else:?>
        <?$img = array(1=>'nofoto.jpg')?>
    <?endif;?>

    
    <a href="/#!<?=$data->id?>" rel="tooltip" class="art-img">
        <img src="<?if(!empty($img[1])):?>/komuchto/images/art/<?=$img[1]?><?endif;?>" alt="">
    </a>
    <?
    $favorits_users = array();
    foreach($data->favorits_adv as $f)
        $favorits_users[] = $f->user;
    ?>
    <div class="info">
        <a class="fav <?=(in_array(Yii::app()->User->id, $favorits_users) ? "active" : "")?>" href="/fav/<?=$data->id?>"></a>
        <a href="/#!<?=$data->id?>"><?=$data->act->name?> <?=  strip_tags($data->sub->name)?></a>
        <?if($data->user_id == Yii::app()->User->id):?><a href="/edit/<?=$data->id?>">Редактировать</a><?endif;?>
        <span class="date">
            <?php if(Yii::app()->dateFormatter->format('yMd', $data->created) == date('Ymd')){
                echo 'Сегодня '.Yii::app()->dateFormatter->format('H:mm', $data->created);
            }
            elseif(Yii::app()->dateFormatter->format('yMd', $data->created) == date('Ymd', strtotime('-1 day'))){
                echo 'Вчера '.Yii::app()->dateFormatter->format('H:mm', $data->created);
            }else{
                echo Yii::app()->dateFormatter->format('d MMMM yyyy H:mm', $data->created);
            }?>
        </span>
    <span class="text"><?=mb_substr($data->text, 0, 100, 'UTF-8');?></span>
    <span class="price"><?=number_format($data->price, 0, ' ', ' ')?> руб.</span>
    </div>
    
</div>