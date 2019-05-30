'use strict';
;(function($, TweenLite){

  var animations = function(animatioTime){
    var $body = $('body');
    var $brand = $('.brand');
    var $lines = $brand.find('.line');
    var $words = $brand.find('.words');

    var letters = $words.text();
    $words.html('');
    for(var l = 0; l < letters.length; ++l){
      $words.append('<span>'+ letters[l] +'</span>');
    }
    var $letters = $words.find('span');

    var rds = [];
    $letters.each(function(i, el){
      if(i == $letters.length - 1){
        rds.push(rds[0]);
      }else{
        rds.push( Math.random() * (animatioTime * 3/4) );
      }
      TweenLite.to( el, (animatioTime * 1/4) + rds[i], {
        opacity: 1,
        ease: Power4.easeIn
      });
    });

    TweenLite.to( $lines.first(), (animatioTime * 1/4) + rds[0], {
      'flex': 1.2,
      opacity: 1,
      ease: Power4.easeIn,
      onComplete: function(){
        // TweenLite.to('#main', 1, {
        //   opacity: 1, ease: Power4.easeIn
        // });
        $body.addClass('animation-complete');
      }
    });

    TweenLite.to( $lines.last(), (animatioTime * 1/4) + rds[$letters.length - 1], {
      'flex': 1.2,
      opacity: 1,
      ease: Power4.easeIn,
      onComplete: function(){}
    });

  }

  window.Animations = animations;

}(jQuery, TweenLite));

