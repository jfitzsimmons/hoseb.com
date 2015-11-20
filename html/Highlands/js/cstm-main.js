var mainSection = $('#locationStudioPic').height() + $('#header').height() + $('#locationContainer').height() + 100;
$(window).bind('scroll', function() {
               if ($(window).scrollTop() > mainSection) {
               $('nav').addClass('fixed');
               $('#navbuffer').show();
               }
               if ($(window).scrollTop() < (mainSection - 10)) {
               $('nav').removeClass('fixed');
               $('#navbuffer').hide();
               }
               });
$( ".mainNavLink" ).click(function() {
              
                          if ($('nav').hasClass('fixed')) {
                          var navbuffer = 120;
                          } else {
                          var navbuffer = 120;
                          }
                          
                          $('html, body').animate({
                                                  scrollTop: ($( $.attr(this, 'href') ).offset().top - navbuffer)
                                                  }, 'slow');
                          });