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

  var $body = $('body');
  var $hamburger = $('button.hamburger');
  $hamburger.click(function(){
    var state = $(this).attr('aria-expanded');
    if( state == 'true' ){
      $body.addClass('menu-open');
    }else{
      $body.removeClass('menu-open');
    }
    $(this).attr('aria-expanded', state == 'true' ? 'false' : 'true');
  });

  var $menuMobile = $('footer > .menu-mobile');
  $menuMobile.find('a').click(function(ev){
    ev.preventDefault();
    var href = $(this).attr('href');
    $hamburger.trigger('click');
    setTimeout(function(){
      window.location.href = href;
    },250);
    return false;
  });

}(jQuery, Drupal, drupalSettings));
