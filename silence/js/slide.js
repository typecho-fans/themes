jQuery(document).ready(function($){
var s= $('#shangxia').offset().top;$(window).scroll(function (){$("#shangxia").animate({top : $(window).scrollTop() + s + "px" },{queue:false,duration:500});});
$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
$('#shang').click(function(){$body.animate({scrollTop: '0px'}, 400);});
$('#xia').click(function(){$body.animate({scrollTop:$('#footer').offset().top}, 800);});
$('#comt').click(function(){$body.animate({scrollTop:$('#comments').offset().top}, 800);});
});