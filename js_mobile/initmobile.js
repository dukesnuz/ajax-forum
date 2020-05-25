/**
 * @author David
 */


$(document).bind( "mobileinit", function () { 
  $.mobile.page.prototype.options.headerTheme = "a";
  $.mobile.page.prototype.options.footerTheme = "a";
});
function checkForMobile (){
  if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)){
    $("#border").css({ "background-image":'url(../images/phone.png)',
      height:700, width:350});
    $("#frame").css({height:475, width:267, "margin-top":112, "margin-left":40,
      position:"absolute", overflow:"hidden" });
  }
}
