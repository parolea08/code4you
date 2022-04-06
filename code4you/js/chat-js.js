hideChat(0);

$('#prime').click(function() {
  toggleFab();
});


//Toggle chat and links
function toggleFab() {
  $('.prime').toggleClass('zmdi-comment-outline');
  $('.prime').toggleClass('zmdi-close');
  $('.prime').toggleClass('is-active');
  $('.prime').toggleClass('is-visible');
  $('#prime').toggleClass('is-float');
  $('.chata').toggleClass('is-visible');
  $('.faba').toggleClass('is-visible');
  
}

  $('#chat_first_screen').click(function(e) {
        hideChat(1);
  });

  $('#chat_second_screen').click(function(e) {
        hideChat(2);
  });

  $('#chat_third_screen').click(function(e) {
        hideChat(3);
  });

  $('#chat_fourth_screen').click(function(e) {
        hideChat(4);
  });

  $('#chat_fullscreen_loadera').click(function(e) {
      $('.fullscreen').toggleClass('zmdi-window-maximize');
      $('.fullscreen').toggleClass('zmdi-window-restore');
      $('.chata').toggleClass('chat_fullscreena');
      $('.faba').toggleClass('is-hide');
      $('.header_img').toggleClass('change_imga');
      $('.img_container').toggleClass('change_imga');
      $('.chat_headera').toggleClass('chat_header2a');
      $('.fab_fielda').toggleClass('fab_field2a');
      $('.chat_conversea').toggleClass('chat_converse2');
      //$('#chat_conversea').css('display', 'none');
     // $('#chat_bodya').css('display', 'none');
     // $('#chat_forma').css('display', 'none');
     // $('.chat_logina').css('display', 'none');
     // $('#chat_fullscreena').css('display', 'block');
  });

function hideChat(hide) {
    switch (hide) {
      case 0:
            $('#chat_conversea').css('display', 'none');
            $('#chat_bodya').css('display', 'none');
            $('#chat_forma').css('display', 'none');
            $('.chat_logina').css('display', 'block');
            $('.chat_fullscreen_loadera').css('display', 'none');
             $('#chat_fullscreena').css('display', 'none');
            break;
      case 1:
            $('#chat_conversea').css('display', 'block');
            $('#chat_bodya').css('display', 'none');
            $('#chat_forma').css('display', 'none');
            $('.chat_logina').css('display', 'none');
            $('.chat_fullscreen_loadera').css('display', 'block');
            break;
      case 2:
            $('#chat_conversea').css('display', 'none');
            $('#chat_bodya').css('display', 'block');
            $('#chat_forma').css('display', 'none');
            $('.chat_logina').css('display', 'none');
            $('.chat_fullscreen_loadera').css('display', 'block');
            break;
      case 3:
            $('#chat_conversea').css('display', 'none');
            $('#chat_bodya').css('display', 'none');
            $('#chat_forma').css('display', 'block');
            $('.chat_logina').css('display', 'none');
            $('.chat_fullscreen_loadera').css('display', 'block');
            break;
      case 4:
            $('#chat_conversea').css('display', 'none');
            $('#chat_bodya').css('display', 'none');
            $('#chat_forma').css('display', 'none');
            $('.chat_logina').css('display', 'none');
            $('.chat_fullscreen_loadera').css('display', 'block');
            $('#chat_fullscreena').css('display', 'block');
            break;
    }
}


// JavaScript Document