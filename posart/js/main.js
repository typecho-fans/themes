$(document).ready(function(){
  $(document).scroll(function(){
    if ($(window).scrollTop() > $('#header').height()) {
      $('.nav-wrap').css('background', 'rgba(255, 255, 255, .95)');
    } else {
      $('.nav-wrap').css('background', '#fff');
    }
  });

  $('#commentAvatar').click(function(){
    $('#commentPanel').fadeIn();
  });

  $('#commentPanelClose').click(function(){
    $('#commentPanel').fadeOut();
  });
});
