$(document).ready(function(){

  // Bolder the title as the section is hovered:
  $('.whiteHover').hover(function(){
    $element = '#hoverBold-' + $(this).data("element");
    $($element).css({"font-weight": "500", "font-size": "1.9em"});
  }, function() {
    $($element).css({"font-weight": "300", "font-size": "1.7em"});
  });

});
