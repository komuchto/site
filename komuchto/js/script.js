var findByPathname = function(pathname){
    
    $.ajax({url:'art/listajax',data: 'pathname='+pathname, type:'POST',
    success:function(html){
        $('#content').replaceWith(html);
    }});
}

var render = function(bool){
    var hash = window.location.hash.substring(2);
    var pathname = window.location.pathname;
    if(hash < 10000000 && hash > 1000000){
        $.ajax({
            type: "POST",
            url: pathname + hash
        }).done(function( msg ) {
            $( "#content" ).html( msg );
        });
    }
    
    if(bool != true && hash > 10000000){
        findByPathname(hash);
    }
}

render();

$(window).bind('hashchange', function(e) { 
    render(true);
});

 $('.fav').click(function(){
    var el = $(this);
    $.ajax({url: el.attr('href')}).done(function(){
        el.toggleClass('active');
    });
    return false;
});

var find = function(sub, search){
    var query = "";
    var notQuery = 0;
    
    if(sub){
        if(sub.hasClass('active') == false)
            query = "&Adverts[sub][]="+sub.attr('data-id');
        else
            notQuery = sub.attr('data-id');
    }
    
    if(search)
        query += "&Adverts[search]="+$('#searchInput').val();

    
    $('#find .btn-group a.active').each(function(){
        if(notQuery != $(this).attr('data-id')) query += '&Adverts[sub][]='+$(this).attr('data-id');
    });
    
    var data = $('#find').serialize()+(query ? query : "");
    console.log(data);
    $.ajax({url:'art/search', data: data,type:'POST',dataType:'json',
    success:function(msg){
        window.location.hash = '!'+msg.id;
    }});
    $.ajax({url:'art/listajax',data: data, type:'POST',
    success:function(html){
        $('#content').replaceWith(html);
    }});
}

$('#find select').change(function(){
   find();      
});
$('#find #filters .btn-group a').bind('click', function(){
    find($(this));      
});
$('#rub_find a').click(function(){
    var el = $(this);
    $('#rub_find a').hide( "fast", function() {     
        $('#filters').show(500);
        $("#Adverts_rub option[value='"+el.attr('data-id')+"']").attr('selected','selected');
        $('#rub_find').css('display','none');
    });
});

var otherParams = function(bool){
    if(bool === true) {$( "#otherParams" ).empty(); return false;}
    $.ajax({url:'art/otherparamsajax', data: $('#find').serialize(),type:'POST',
    success:function(msg){
        $( "#otherParams" ).html( msg );
    }});
    
}