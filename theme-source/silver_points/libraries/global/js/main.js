'use strict';
;(function($, Drupal, drupalSettings){
  window.Animations(2.5);
  var $mainMenu = $('ul.menu.main');
  $mainMenu.find('li').mouseover(function(){
    $mainMenu.find('li').not(this).addClass('temp-off');
    $(this).mouseleave(function(){
      $mainMenu.find('li').removeClass('temp-off');
    });
  });
}(jQuery, Drupal, drupalSettings));
