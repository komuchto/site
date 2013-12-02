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
        $("#content").load(pathname + hash, 
        function(){}, 'post');
        
    }
    
    if(bool != true && hash > 10000000){
        findByPathname(hash);
       
        $(".left").load("/art/filter", 
        {pathname: hash}, 
        function(){
            $('#filters').show();
            $('#rub_find').hide();
        }, 'post');
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
    
    if($('.search input').attr('value') != '') query += '&Adverts[search]='+$('.search input').val();
    //if($('.page.selected')) query += '&Adverts[page]='+$('.page.selected a').text();
    
    
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

var otherParams = function(bool){
    if(bool === true) {$( "#otherParams" ).empty(); return false;}
    $.ajax({url:'art/otherparamsajax', data: $('#find').serialize(),type:'POST',
    success:function(msg){
        $( "#otherParams" ).html( msg );
    }});
    
}