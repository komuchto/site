$(document).ready(function(){
    
    render();
    
    $(window).bind('hashchange', function(e) { 
        
        //alert(pathname + hash);
        render();
        

    });
    
    var render = function(){
        var hash = window.location.hash.substring(2);
        var pathname = window.location.pathname;
        $.ajax({
            type: "POST",
            url: pathname + hash
        }).done(function( msg ) {
            //alert(msg)
            $( "#main" ).html( msg );
        });
    }
});


