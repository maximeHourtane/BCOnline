$(document).ready(function() {

  // Init the smooth scroll:
  smoothScroll.init({
    offset: 80
  });

  // Header size according to scroll:
  $(window).scroll(function(){
    if($(this).scrollTop() > 0) {
      $("header").find(".row").first().removeClass("topMargin15");
      $("header").addClass('compressedHeader');
    }
    else {
      $("header").find(".row").first().addClass("topMargin15");
      $("header").removeClass('compressedHeader');
    }
  });

  // Bolder the title as the section is hovered:
  $('.whiteHover').hover(function(){
    $element = '#hoverBold-' + $(this).data("element");
    $($element).css({"font-weight": "500", "font-size": "1.9em"});
  }, function() {
    $($element).css({"font-weight": "300", "font-size": "1.7em"});
  });

});