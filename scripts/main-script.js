// This script is loaded both on the frontend page and in the Visual Builder.
function pbc_divi_woocommerce_menu_main(){



    function pbc_divi_woo_menu(){
      jQuery(function($){

        $('.pbc_woocommerce_menu_child').each(function(){

          var $this = $(this);
          var $link = $this.find('.pbc-divi-woocommerce-menu-wrapper-parent-link');
          var $mainwrapperwidth = '';
          var $linkheight = $link.outerHeight();
          var $linkpos = $link.position();
          var $iframewidth = $('#et-core-frame').outerWidth();
          var $datawidth = $this.parents('.pbc-divi-woocommerce-menu-main-wrapper').attr('data-width');
          if($datawidth === 'menu'){
            $mainwrapperwidth = $this.parents('.pbc-divi-woocommerce-menu-main-wrapper-inner').outerWidth();
            $this.parents('.pbc-divi-woocommerce-menu-main-wrapper-inner').css({position: 'relative'});
          }
          if($datawidth === 'module'){
            $mainwrapperwidth = $this.parents('.pbc-divi-woocommerce-menu-main-wrapper').outerWidth();
            $this.parents('.pbc-divi-woocommerce-menu-main-wrapper-inner').css({position: ''});
          }


          // Adjust Parent Row
          $this.parents('.et_pb_row').css({zIndex: 999});

          //Adjust parents rown on header
          if($this.parents('header').length !== 0){
            $this.parents('.et_pb_row').css({zIndex: 9999});
          }




            // desktop function
            $this.hover(


            function(){
              $iframewidth = $('#et-core-frame').outerWidth();

              if(!$this.parents('.pbc-divi-woocommerce-menu-main-wrapper').hasClass('pbc-is-mobile') || $iframewidth >= 980){
                // Adjust content position
                $linkpos = $link.position();
                $linkheight = $link.outerHeight();
                if($datawidth === 'menu'){
                  $mainwrapperwidth = $this.parents('.pbc-divi-woocommerce-menu-main-wrapper-inner').outerWidth();
                }
                if($datawidth === 'module'){
                  $mainwrapperwidth = $this.parents('.pbc-divi-woocommerce-menu-main-wrapper').outerWidth();
                }

                $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').css({top:(parseInt($linkpos.top) + parseInt($linkheight)), width:$mainwrapperwidth})

                $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').css({position: 'absolute', display: 'block'}, 500);
                $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').stop().animate({opacity: 1}, 500);
              }

            },

            function(){

              if(!$this.parents('.pbc-divi-woocommerce-menu-main-wrapper').hasClass('pbc-is-mobile')  || $iframewidth >= 980){
                $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').stop().animate({opacity: 0}, 500, function(){
                  $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').css({position: '', display: 'none'}, 500);
                });
              }

            }


          );


          // mobile function

          $this.find('.pbc-divi-woocommerce-menu-wrapper-parent-link').on('touchstart, click', function(){
            $iframewidth = $('#et-core-frame').outerWidth();

            if($this.parents('.pbc-divi-woocommerce-menu-main-wrapper').hasClass('pbc-is-mobile') || $iframewidth < 980 && $iframewidth !== null){
              var $windowheight = $(window).height();
              if($datawidth === 'menu'){
                $mainwrapperwidth = $this.parents('.pbc-divi-woocommerce-menu-main-wrapper-inner').outerWidth();
              }
              if($datawidth === 'module'){
                $mainwrapperwidth = $this.parents('.pbc-divi-woocommerce-menu-main-wrapper').outerWidth();
              }

              $this.parents('.pbc-divi-woocommerce-menu-main-wrapper').find('.pbc-divi-woocommerce-menu-wrapper-item-content').css({width:$mainwrapperwidth})

              if($this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').hasClass('pbc-divi-woo-menu-closed')) {
                $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').css({display: 'block', height: '0'})
                $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').stop().animate({height: ($windowheight*1.1), opacity: 1}, 500, function(){
                  $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').css({height: '100%'})
                  $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').removeClass('pbc-divi-woo-menu-closed');
                  $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').addClass('pbc-divi-woo-menu-opened');
                })
              }
              else if($this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').hasClass('pbc-divi-woo-menu-opened')){
                $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').stop().animate({height: '0', opacity: 0}, 500, function(){
                  $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').css({display: 'none'})
                  $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').removeClass('pbc-divi-woo-menu-opened');
                  $this.find('.pbc-divi-woocommerce-menu-wrapper-item-content').addClass('pbc-divi-woo-menu-closed');
                })

              }
            }

          })








        }); //end of each menu_child


        $('.pbc-divi-woocommerce-menu-main-wrapper').each(function(){
          var $this = $(this);
          var $mobileicon = $this.find('.pbc-divi-woocommerce-menu-mobile-icon');
          var $mobileopen = $this.attr('data-open');
          var $mobileclose = $this.attr('data-close');
          var $menuheight = $this.find('.pbc-divi-woocommerce-menu-main-wrapper-inner').outerHeight();




          $mobileicon.html($mobileopen);


          // Mobile icon function to display menu on click
          $mobileicon.on('touchstart, click', function(){
            if($(this).hasClass('pbc-divi-woo-icon-closed')){
              $mobileicon.removeClass('pbc-divi-woo-icon-closed');
              $mobileicon.html($mobileclose);
              $this.find('.pbc-divi-woocommerce-menu-main-wrapper-inner').css({display: 'block'});
              $this.find('.pbc-divi-woocommerce-menu-main-wrapper-inner').stop().animate({opacity: '1', height: parseInt($menuheight)}, 300, function(){
                $mobileicon.addClass('pbc-divi-woo-icon-opened');
              });
            }
            else if($(this).hasClass('pbc-divi-woo-icon-opened')){
              $mobileicon.removeClass('pbc-divi-woo-icon-opened');
              $mobileicon.html($mobileopen);
              $this.find('.pbc-divi-woocommerce-menu-main-wrapper-inner').stop().animate({opacity: '0', height: '0'}, 300, function(){
                $this.find('.pbc-divi-woocommerce-menu-main-wrapper-inner').css({display: 'none'});
                $mobileicon.addClass('pbc-divi-woo-icon-closed');
              });
            }


          })
        })

      })  // end of jquery function



    } // end of pbc_divi_woo_menu

    function pbc_window_resize(){
      jQuery(function($){
        $(window).on('resize', function(){
          var $windowwidth = $(window).width();
          if($windowwidth < 980){
            $('.pbc-divi-woocommerce-menu-main-wrapper').addClass('pbc-is-mobile');
            $('.pbc-divi-woo-icon-closed').next('.pbc-divi-woocommerce-menu-main-wrapper-inner').css({display: 'none', height: '0', opacity: 0});
          }
          else {
            if($('.pbc-divi-woocommerce-menu-main-wrapper').hasClass('pbc-is-mobile')){
              $('.pbc-divi-woocommerce-menu-main-wrapper').removeClass('pbc-is-mobile');
              $('.pbc-divi-woocommerce-menu-main-wrapper-inner').css({height: '', opacity: 1, display: 'block'});
              $('.pbc-divi-woocommerce-menu-wrapper-item-content').css({display: 'none', height: ''});
            }
          }

        })
      })
    }


  return {
    pbc_divi_woo_menu: pbc_divi_woo_menu,
    pbc_window_resize: pbc_window_resize,

  }

} // end of pbc_divi_woocommerce_menu_main

jQuery(document).ready(function(){

    pbc_divi_woocommerce_menu_main().pbc_divi_woo_menu();
    pbc_divi_woocommerce_menu_main().pbc_window_resize();

});
