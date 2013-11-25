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
        
        $.ajax({
                type: "POST",
                url: '/art/filter',
                data: 'pathname='+hash,
            }).done(function( msg ) {
                $( ".left" ).html( msg );
                $('#filters').show();
                $('#rub_find').hide();
            });
        /*
         $.ajax({
                type: "POST",
                url: '/art/filters',
                data: 'pathname='+hash,
                dataType: 'JSON',
            }).done(function( msg ) {
                $('#filters').show();
                $('#rub_find').hide();

                $("#Adverts_rub option[value='"+msg.Adverts.rub+"']").attr('selected','selected');
                $("#Adverts_city option[value='"+msg.Adverts.city+"']").attr('selected','selected');
                $("#Adverts_act option[value='"+msg.Adverts.act+"']").attr('selected','selected');
                   
                var sub = '';
                if(msg.Adverts.sub){
                    for(var m in msg.Adverts.sub)
                        sub += '&Adverts[sub][]='+msg.Adverts.sub[m];
                }
                $.ajax({url:'art/subajax', data: 'Adverts[rub]='+msg.Adverts.rub+sub,type:'POST',
                success:function(msg){
                    $( "#sub_find" ).html( msg );
                }});
                
            });
            */
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

    
    $('#sub_find .btn-group a.active').each(function(){
        if(notQuery != $(this).attr('data-id')) query += '&Adverts[sub][]='+$(this).attr('data-id');
    });
    
    if($('.sorter a.created').hasClass('asc')) query += '&Adverts[sort]=created';
    if($('.sorter a.price').hasClass('asc')) query += '&Adverts[sort]=price';
    if($('.sorter a.price').hasClass('desc')) query += '&Adverts[sort]=price.desc'

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
    $('#rub_find').hide( "fast", function() {     
        $('#filters').show(500);
        $("#Adverts_rub option[value='"+el.attr('data-id')+"']").attr('selected','selected');
        $('#rub_find').css('display','none');
        find();
    });
});

var otherParams = function(bool){
    if(bool === true) {$( "#otherParams" ).empty(); return false;}
    $.ajax({url:'art/otherparamsajax', data: $('#find').serialize(),type:'POST',
    success:function(msg){
        $( "#otherParams" ).html( msg );
    }});
    
}