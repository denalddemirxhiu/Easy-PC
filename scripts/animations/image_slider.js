window.onload = init;
var index = 0;

function init() {
  reviewSlideshow();
}

function toggleVis(classname) {
  var paragraph = document.getElementsByClassName(classname);
  var show = document.getElementsByClassName('show');

    for(var i = 0; i < show.length; i++) {
      show[i].style.display = "none";
    }

    if(paragraph[0].style.display == "block") {
      paragraph[0].style.display = "none";
    } else {
      paragraph[0].style.display = "block";
    }
}

function reviewSlideshow() {

  var reviews = document.getElementsByClassName('reviewText');

  for(var i = 0; i < reviews.length; i++) {
    reviews[i].style.display = "none";
  }

  index++;

  if(index == reviews.length){
    index = 0;
  }

  reviews[index].style.display = "block";

  setTimeout(reviewSlideshow, 3000);
}

$(function() {

  var inWrap = $('.inner-wrapper');

  $('.prev').on('click',
    function() {

      inWrap.animate({left: '0%'},
      300, function(){

          inWrap.css('left', '-100%');

          $('.slide').first().before($('.slide').last());
      });
    });


    $('.next').on('click',
      function() {

        inWrap.animate({left: '-200%'}, 300, function(){

            inWrap.css('left', '-100%');

            $('.slide').last().after($('.slide').first());
        });
      });
})
