/*
var render = function(){
    var hash = window.location.hash.substring(2);
    var pathname = window.location.pathname;
    $.ajax({
        type: "POST",
        url: pathname + hash
    }).done(function( msg ) {
        $( "#main" ).html( msg );
    });
}

render();

$(window).bind('hashchange', function(e) { 

    //alert(pathname + hash);
    render();


});
*/
 $('.fav').click(function(){
    var href = $(this).attr('href');
    $.ajax({url: href}).done(function(){
        alert('Добавлено в избранное');
    });
    return false;
});

var find = function(query){
    var data = $('#find').serialize()+(query ? query : "");
    console.log(data);
    $.ajax({url:'adverts/search', data: data,type:'POST',dataType:'json',
    success:function(msg){
        window.location.hash = '!'+msg.id;
    }});
    $.ajax({url:'adverts/listajax',data: data, type:'POST',
    success:function(html){
        $('#content').replaceWith(html);
    }});
}

$('#find select').change(function(){
   find();      
});
$('#find .btn-group a').bind('click', function(){
    var query = "";
    var notQuery = 0;

    if($(this).hasClass('active') == false)
        query = "&Adverts[sub][]="+$(this).attr('data-id');
    else
        notQuery = $(this).attr('data-id');
    $('#find .btn-group a.active').each(function(){
        if($(this).attr('data-id') != notQuery) query += '&Adverts[sub][]='+$(this).attr('data-id');
    });
    find(query);      
});