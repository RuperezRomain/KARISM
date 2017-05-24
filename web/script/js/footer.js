$(document).ready(function(){

  function putFooter(){
    var wh = $(window).height();
    var dh = $('body').height();
    if(dh < wh - 104) { /*104: #thefooter height in px*/
      $("#footer").addClass("footerissticky");
      }
    else {
      $("#footer").removeClass("footerissticky");
      }
    }

  putFooter();
  $(window).bind("load", function(){ putFooter(); });
  $(window).resize(function(){ putFooter(); });

});