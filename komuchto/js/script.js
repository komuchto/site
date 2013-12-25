var getArtOnPage = function(){
    if($(window).height() >= 900){
        var h = $(window).height() - 256 - $('.items').height();
        var c = ($(window).height() - 256) / 91;
        //$('.art').css('height', (h/c+91) + 'px');
    }
    //$('#content').css('height', ($(window).height() - 256) + 'px')
    return ($(window).height() >= 900) ? c : 0;
}

var findByPathname = function(pathname){
    var height = '&height=0';+ getArtOnPage();
    $.ajax({url:'/art/listajax',data: 'pathname='+pathname, type:'POST',
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

    if(hash > 10000000){
        findByPathname(hash);
        
        if(bool === 1){
            $.ajax({url:'/art/find',data: 'pathname='+hash, type:'POST', dataType:'JSON',
            success:function(data){
                for(var s in data.Adverts.sub){
                    $("#sub_find a[data-id='"+data.Adverts.sub[s]+"']").addClass('active');
                }
                for(var i in data.Adverts){
                    $("select[name='Adverts["+i+"]'] option[value='"+data.Adverts[i]+"']").attr('selected', 'selected');
                }
                $('select').selectpicker('deselectAll');
                $('select').selectpicker('render');
                
                $('#rub_find a[data-id!=\''+data.Adverts.rub_id+'\']').addClass('hide');
                $('#rub_find a[data-id=\''+data.Adverts.rub_id+'\']').addClass('active');
                $('#sub_find a').hide();
                $("div[class*='other-rub-']").hide();
                $('#sub_find a[data-rub=\''+data.Adverts.rub_id+'\']').show(500);
                $('.other-rub-'+data.Adverts.rub_id).show(500);
                $('#filters').show(500); 
            }});
        }
    }
    
}

render(1);

$(window).bind('hashchange', function(e) { 
    render(true);
});

$('a.fav').click(function(event){
    $(this).toggleClass('active');
    $.ajax({url: $(this).attr('href')});
    //event.stopPropagation();
    return false;
});

var find = function(sub, search, rub){
    var query = "";
    var notQuery = 0;
    
    if(sub && sub != 'pager'){
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
    if(sub == 'pager') query += '&'+$('.pager .selected a').attr('href').split('?')[1];

    var data = $('#find').serialize()+(query ? encodeURI(query) : "");
    console.log(data);
    $.ajax({url:'/art/search', data: data,type:'POST',dataType:'json',
    success:function(msg){
        window.location.hash = '!'+msg.id;
    }});
    var height = '&height=0';//+ getArtOnPage();
    $.ajax({url:'/art/listajax',data: data + height, type:'POST',
    success:function(html){
        $('#content').replaceWith(html);
        if($(window).height() >= 900){
            var h = $(window).height() - 256 - $('.items').height();
            var c = ($(window).height() - 256) / 91;
            //$('.art').css('height', (h/c+91) + 'px');
        }
    }});
}

$(window).resize(function(){
    /*
    if($(window).height() < 900)
        $('body').addClass('h900');
    else
        $('body').removeClass('h900');
    */
});

$(window).mousewheel(function(event) {
    var page = ( event.deltaY == 1) ? parseInt($('.page.selected a').html()) - 1 : parseInt($('.page.selected a').html()) + 1;
    
    /*
    if(event.deltaY == -1 && $(window).scrollTop() == ($(document).height() - $(window).height())) 
        find(false, false, false, page);
    if(event.deltaY == 1 && $(window).scrollTop() == 0)
        find(false, false, false, page);
    */
});

$(document).ready(function(){
    
});