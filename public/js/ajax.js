$(document).ready(function() {  
      
    // Check for hash value in URL  
    var hash = window.location.hash.substr(1);  
    var href = $('#sidebar-content ul li a').each(function(){  
        var href = $(this).attr('href');  
        if(hash==href.substr(0,href.length-5)){  
            var toLoad = hash+'.html #content';  
            $('#page').load(toLoad)  
        }   
    });  
  
    $('#sidebar-content ul li a').click(function(){  
      
    var toLoad = $(this).attr('href')+' #content';  
    $('#content').hide('fast',loadContent);  
    $('#load').remove();  
    $('#wrapper').append('<span id="load">LOADING...</span>');  
    $('#load').fadeIn('normal');  
    window.location.hash = $(this).attr('href');  
    function loadContent() {  
        $('#page').load(toLoad,'',showNewContent())  
    }  
    function showNewContent() {  
        $('#page').show('normal',hideLoader());  
    }  
    function hideLoader() {  
        $('#load').fadeOut('normal');  
    }  
    return false;  
      
    });  
}); 

