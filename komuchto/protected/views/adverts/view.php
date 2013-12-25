<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/magnific-popup.css"> 
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.bxslider.css"> 
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.bxslider.min.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.magnific-popup.min.js"></script>
<a class="back" href="" onclick="history.go(-1);return false">Назад к объявлениям</a>
<div class="artView">
    <div class="artHead">
        <a class="fav" href="/fav/<?=$model->id?>"></a>
        <span class="title"><?=$model->act->name?> <?=$model->sub->name?></span>
        <span class="date"><?php echo ((Yii::app()->dateFormatter->format('yMd', $model->created) == date('Ymd')) ? 'Сегодня '.Yii::app()->dateFormatter->format('H:m', $model->created) : Yii::app()->dateFormatter->format('d MMMM yyyy H:m', $model->created));?></span>
    </div>
    <div class="clearfix"></div>
<?if(!empty($model->img)):?>
    <?$img = explode(',', $model->img)?>
<?else:?>
    <?$img = array('nofoto.jpg', 'nofoto.jpg')?>
<?endif;?>
<a class="head-img" href='/komuchto/images/art/<?=$img[0]?>'>
        <img src="/komuchto/images/art/<?=$img[1]?>">
</a>
<div id="carousel">
        <?if($model->img1): $img1 = explode(',', $model->img1)?>
            <div class="slide"><a class="img" href="/komuchto/images/art/<?=$img1[0]?>"><img height="50" src="/komuchto/images/art/<?=$img1[1]?>"></a></div>
        <?endif;?>
        <?if($model->img2): $img2 = explode(',', $model->img2)?>
            <div class="slide"><a class="img" href="/komuchto/images/art/<?=$img2[0]?>"><img height="50" src="/komuchto/images/art/<?=$img2[1]?>"></a></div>
        <?endif;?>
        <?if($model->img3): $img3 = explode(',', $model->img3)?>
            <div class="slide"><a class="img"href="/komuchto/images/art/<?=$img3[0]?>"><img height="50" src="/komuchto/images/art/<?=$img3[1]?>"></a></div>
        <?endif;?>
        <?if($model->img4): $img4 = explode(',', $model->img4)?>
            <div class="slide"><a class="img" href="/komuchto/images/art/<?=$img4[0]?>"><img height="50" src="/komuchto/images/art/<?=$img4[1]?>"></a></div>
        <?endif;?>
</div>

<div class="text"><?=$model->text?></div>
<div class="info">
<div class="price"><?=number_format($model->price, 0, ' ', ' ')?> руб.</div>
<div class="user">Продавец: <?=$model->user->name?></div>
<div class="phone">Телефон: <?=$model->phone?></div>
<div class="city">Город: <?=$model->city->name?></div>
</div>
</div>
<script>
    $(document).ready(function(){
        if($('#carousel').has('div').length){
            $('#carousel').bxSlider({
                    mode: 'vertical',
                    slideWidth: 150,
                    slideMargin: 10,
                    maxSlides: 3,
                    minSlides: 3,
                    pager:false,
                    controls:true,
            });
        }
        $('.artView').magnificPopup({
                delegate: 'a.img, a.head-img',
                type: 'image',
                gallery: {
                  enabled: true,
                  navigateByImgClick: true,
                  arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
                  tPrev: 'Далее', // title for left button
                  tNext: 'Назад', // title for right button
                  tCounter: '<span class="mfp-counter">%curr% из %total%</span>' // markup of counter
                }
        });
	});
</script>