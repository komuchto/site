<div class="row">
    <?php echo '<label>Подрубрика</label>'.CHtml::dropDownList('Adverts[sub_id]', 0, CHtml::listData(Sub::model()->findAll('rub=:rub or rub=0', array(':rub'=>$_POST['Adverts']['rub_id'])),'id','name'));?>
</div>
<div class="row">
<?if($_POST['Adverts']['rub_id'] == 1)
{
    echo '<label>Марка</label>'.CHtml::dropDownList('Adverts[mark]', 0, CHtml::listData(Mark::model()->findAll(),'id','name'));
    echo '<label>Коробка передач</label>'.CHtml::dropDownList('Adverts[transmission]', 0, CHtml::listData(Transmission::model()->findAll(),'id','name'));
    echo '<label>Привод</label>'.CHtml::dropDownList('Adverts[drive]', 0, CHtml::listData(Drive::model()->findAll(),'id','name'));
    echo '<label>Кузов</label>'.CHtml::dropDownList('Adverts[type_body]', 0, CHtml::listData(TypeBody::model()->findAll(),'id','name'));
    echo '<label>Тип двигателя</label>'.CHtml::dropDownList('Adverts[type_engine]', 0, CHtml::listData(TypeEngine::model()->findAll(),'id','name'));
    for($i = 1960; $i <= (int)date('Y'); $i++){
        $year[] = $i;
    }
    $year[-1]='Год выпуска';
    echo '<label>Год выпуска</label>'.CHtml::dropDownList('Adverts[year]', 0, array_reverse($year));
    echo '<label>Пробег (км)</label>'.CHtml::numberField('Adverts[probeg]');
    echo '<label>Объём двигателя (л)</label>'.CHtml::numberField('Adverts[volume]');
}?>   
<?if($_POST['Adverts']['rub_id'] == 2)
{
    echo '<label>Тип дома</label>'.CHtml::dropDownList('Adverts[type_object]', 0, CHtml::listData(TypeObject::model()->findAll(),'id','name'));
    echo '<label>Действие</label>'.CHtml::dropDownList('Adverts[act]', 0, CHtml::listData(Act::model()->findAll(),'id','name'));
    echo '<label>Вид объекта</label>'.CHtml::dropDownList('Adverts[vid_object]', 0, CHtml::listData(VidObject::model()->findAll(),'id','name'));
    echo '<label>Этаж</label>'.CHtml::dropDownList('Adverts[etazh]', 0, array());
    echo '<label>Количество этажей</label>'.CHtml::dropDownList('Adverts[etazh_build]', 0, array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25));
    echo '<label>Количество комнат</label>'.CHtml::dropDownList('Adverts[komnaty_count]', 0, array(1,2,3,4,5,6,7,8,9));
    echo '<label>Площадь (м)</label>'.CHtml::numberField('Adverts[plosch]');
}
?>
    
    
</div>