$(document).ready(function(){
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
});


