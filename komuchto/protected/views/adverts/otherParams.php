<div class="select">
<?if($_POST['Adverts']['rub'] == 1) echo CHtml::dropDownList('Adverts[transmission]', 0, CHtml::listData(Transmission::model()->findAll(),'id','name'),array('onchange'=>'find()'));?>
<?if($_POST['Adverts']['rub'] == 2) echo CHtml::dropDownList('Adverts[type_object]', 0, CHtml::listData(TypeObject::model()->findAll(),'id','name'),array('onchange'=>'find()'));?>

</div>