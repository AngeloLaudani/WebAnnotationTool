jQuery(document).ready(function($) {

  // PAGE LOAD FADE
  $('body').removeClass('fade-out');

  // SCROLL TO
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });

  // ANIMATIONS
  $('.js--wp-1').addClass('animated fadeIn');
  $('.js--wp-2').addClass('animated zoomIn');
  $('.js--wp-3').addClass('animated fadeIn');
  $('.js--wp-9').addClass('animated zoomIn');
  $('.js--wp-10').addClass('animated fadeInRight');
  $('.js--wp-11').addClass('animated fadeIn');
  $('.js--wp-12').addClass('animated fadeInRight');
  $('.js--wp-13').addClass('animated fadeIn');
  $('.js--wp-14').addClass('animated fadeInRight');


  $('.js--wp-4').waypoint(function(direction) {
    $('.js--wp-4').addClass('animated fadeInLeft');
  }, {
    offset: '50%'
  });
  $('.js--wp-5').waypoint(function(direction) {
    $('.js--wp-5').addClass('animated fadeInRight');
  }, {
    offset: '50%'
  });
  $('.js--wp-6').waypoint(function(direction) {
    $('.js--wp-6').addClass('animated fadeIn');
  }, {
    offset: '50%'
  });
  $('.js--wp-7').waypoint(function(direction) {
    $('.js--wp-7').addClass('animated fadeInUp');
  }, {
    offset: '80%'
  });
  $('.js--wp-15').waypoint(function(direction) {
    $('.js--wp-15').addClass('animated fadeInDown');
  }, {
    offset: '50%'
  });

  $('.js--wp-8').addClass('animated fadeInDown');

  window.sr = ScrollReveal({
    duration: 2000
  });
  sr.reveal('.ontology-image', 80);

  // MOBILE NAV
  $('.js--nav-icon').click(function() {
    var header = $('.js--main-header');
    var nav = $('.js--main-nav');
    var icon = $('.js--nav-icon i');

    nav.slideToggle(200);

    if (icon.hasClass('ion-navicon-round')) {
      icon.addClass('ion-close-round');
      icon.removeClass('ion-navicon-round');
    } else {
      icon.addClass('ion-navicon-round');
      icon.removeClass('ion-close-round');
    }
    if (header.hasClass('header-height')) {
      header.removeClass('header-height');
    } else {
      header.addClass('header-height');
    }
  });

});

$(document).on('click', '.details-next-btn', function(e) {
  $('.detail-2').removeClass('hide').addClass('show');
  $('.detail-1').removeClass('show').addClass('hide');
});

$(document).on('click', '.details-back-btn', function(e) {
  $('.detail-1').removeClass('hide').addClass('show');
  $('.detail-2').removeClass('show').addClass('hide');
});

//USER PAGE
$(document).on('click', '.info-box', function(e) {
  $('.user-info').removeClass('hide').addClass('show');
  $('.user-annotations').removeClass('show').addClass('hide');
  $('.user-settings').removeClass('show').addClass('hide');

  $('html,body').animate({
      scrollTop: $(".user-info").offset().top - 60
    },
    'slow');
});

$(document).on('click', '.annotations-box', function(e) {
  $('.user-annotations').removeClass('hide').addClass('show');
  $('.user-info').removeClass('show').addClass('hide');
  $('.user-settings').removeClass('show').addClass('hide');

  $('html,body').animate({
      scrollTop: $(".user-annotations").offset().top - 60
    },
    'slow');
});

$(document).on('click', '.settings-box', function(e) {
  $('.user-settings').removeClass('hide').addClass('show');
  $('.user-info').removeClass('show').addClass('hide');
  $('.user-annotations').removeClass('show').addClass('hide');

  $('html,body').animate({
      scrollTop: $(".user-settings").offset().top - 60
    },
    'slow');
});
