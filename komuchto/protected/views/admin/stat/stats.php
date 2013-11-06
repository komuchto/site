<script src="<?php echo Yii::app()->baseUrl; ?>/js/knockout-2.2.1.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/globalize.min.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/dx.chartjs.js"></script>
<div id="chartContainer" style="width: 50%; height: 440px; float:left"></div>
<div id="chartContainer2" style="width: 50%; height: 440px; float:left"></div>
<div id="chartContainer3" style="width: 50%; height: 440px; float:left"></div>
<div id="chartContainer4" style="width: 50%; height: 440px; float:left"></div>
<script type="text/javascript">
$(function (){
     $.ajax({url:'/admin/stat/usersservice',dataType:'json'}).done(function(target){

        $("#chartContainer").dxPieChart({
             size:{ 
                 width: 500
             },
             dataSource: target,
             series: [
                 {
                     argumentField: "service",
                     valueField: "count",
                     label:{
                         visible: true,
                         connector:{
                             visible:true,           
                             width: 1
                         }
                     }
                 }
             ],
             title: "Пользователи по сервисам"
         });
    });
    
    $.ajax({url:'/admin/stat/users',dataType:'json'}).done(function(target){
        
        $("#chartContainer2").dxChart({
            dataSource: target,

            series: {
                argumentField: "date",
                valueField: "count",
                name: "Новые пользователи",
                type: "bar",
                color: '#dadada'
            },
            title: "Новые пользователи"
        });
    });
    
    $.ajax({url:'/admin/stat/advertsrub',dataType:'json'}).done(function(target){
         $("#chartContainer3").dxPieChart({
             size:{ 
                 width: 500
             },
             dataSource: target,
             series: [
                 {
                     argumentField: "name",
                     valueField: "count",
                     label:{
                         visible: true,
                         connector:{
                             visible:true,           
                             width: 1
                         }
                     }
                 }
             ],
             title: "Всего объявлений"
         });
    });
     
    $.ajax({url:'/admin/stat/adverts',dataType:'json'}).done(function(target){
        
        $("#chartContainer4").dxChart({
            dataSource: target,

            series: {
                argumentField: "date",
                valueField: "count",
                name: "Новые объявления",
                type: "bar",
                color: '#dadada'
            },
            title: "Новые объявления"
        });
    });
});
    
</script>