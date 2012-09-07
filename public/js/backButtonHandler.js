$(function () {
  var tabContainers = $('div.tabs > div');
  tabContainers.hide().filter(':first').show();
  
  $(window).bind('hashchange', function () {
    var hash = window.location.hash || '#first';
    
    tabContainers.hide();
    tabContainers.filter(hash).show();
    $('div.tabs ul.tabNavigation a').removeClass('selected');
    $('a[hash=' + hash + ']').addClass('selected');
  });
  
  $(window).trigger("hashchange");
});
