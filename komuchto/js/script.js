var getArtOnPage = function(){
    return ($(window).height() >= 900) ? ($(window).height() - 256) / 91 : 0;
}

var findByPathname = function(pathname){
    var height = '&height='+ getArtOnPage();
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
        }, 'post');
    }
    
}

render();

$(window).bind('hashchange', function(e) { 
    render(true);
});

var fav = function(el){
    $.ajax({url: $(el).attr('href')}).done(function(){
        $(el).toggleClass('active');
    });
    return false;
}

var find = function(sub, search, rub, page){
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
    
    //$('#rub_find a.active').each(function(){
        if(rub && !rub.hasClass('active')) 
            query += '&Adverts[rub_id]='+rub.attr('data-id');
        else if(!rub)
            query += '&Adverts[rub_id]='+$('#rub_find a.active').attr('data-id');
    //});
    
    if($('.sorter a.created').hasClass('asc')) query += '&Adverts[sort]=created';
    if($('.sorter a.price').hasClass('asc')) query += '&Adverts[sort]=price';
    if($('.sorter a.price').hasClass('desc')) query += '&Adverts[sort]=price.desc'
    
    if($('.search input').attr('value') != '') query += '&Adverts[search]='+$('.search input').val();
    //if($('.page.selected')) query += '&Adverts[page]='+$('.page.selected a').text();
    
    if(page)
        query += '&Adverts_page='+page;
    
    var data = $('#find').serialize()+(query ? query : "");
    console.log(data);
    $.ajax({url:'art/search', data: data,type:'POST',dataType:'json',
    success:function(msg){
        window.location.hash = '!'+msg.id;
    }});
    var height = '&height='+ getArtOnPage();
    $.ajax({url:'art/listajax',data: data + height, type:'POST',
    success:function(html){
        $('#content').replaceWith(html);
    }});
}

var otherParams = function(bool){
    if(bool === true) {$( "#otherParams" ).empty(); return false;}
    $.ajax({url:'art/otherparamsajax', data: $('#find').serialize(),type:'POST',
    success:function(msg){
        $( "#otherParams" ).css('display','block').html( msg );
        $(".otherParams").hide();
        $(".otherParamsClose").css('display','block');
    }});
    
}

$(window).resize(function(){
    
    
});

$(window).mousewheel(function(event) {
    var page = ( event.deltaY == 1) ? parseInt($('.page.selected a').html()) - 1 : parseInt($('.page.selected a').html()) + 1;
    
    if(event.deltaY == -1 && $(window).scrollTop() == ($(document).height() - $(window).height())) 
        find(false, false, false, page);
    if(event.deltaY == 1 && $(window).scrollTop() == 0)
        find(false, false, false, page);
});

    