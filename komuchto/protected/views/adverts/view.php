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

<div class="text"><?=$model->text?></div>
<div class="info">
<div class="price"><?=$model->price?> руб.</div>
<div class="user">Продавец: <?=$model->user->name?></div>
<div class="phone">Телефон: <?=$model->phone?></div>
<div class="city">Город: <?=$model->city->name?></div>
</div>
</div>