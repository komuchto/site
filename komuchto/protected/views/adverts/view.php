<?$img = explode(',', $model->img)?>
<?$this->widget('ext.lyiightbox.LyiightBox2', array(
    'thumbnail' => '/komuchto/images/art/'.$img[1],
    'image' => '/komuchto/images/art/'.$img[0],
    'title' => '',
    'group' => 'advert'
));?>
<p><?=$model->text?></p>
<span class="phone"><b>Тел:</b> <?=$model->phone?></span>
