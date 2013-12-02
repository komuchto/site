<div class="row">
<?if($_POST['Adverts']['rub_id'] == 1) 
    echo '<label>Коробка передач</label>'.CHtml::dropDownList('Adverts[transmission]', 0, CHtml::listData(Transmission::model()->findAll(),'id','name'));?>
<?if($_POST['Adverts']['rub_id'] == 2) 
    echo '<label>Тип объекта</label>'.CHtml::dropDownList('Adverts[type_object]', 0, CHtml::listData(TypeObject::model()->findAll(),'id','name'));?>
</div>