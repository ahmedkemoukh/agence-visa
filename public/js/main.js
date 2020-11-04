
$(document).ready(function(){
	"use strict";
   var agence;
	var window_width 	 = $(window).width(),
	window_height 		 = window.innerHeight,
	header_height 		 = $(".default-header").height(),
	header_height_static = $(".site-header.static").outerHeight(),
	fitscreen 			 = window_height - header_height;

    $('.clickinscrire').click(function(){

        $('#inscrire').slideDown( "slow");
          });

          $(".Previous").click(function(){
            if($(this).hasClass("active")==false)
            {
                $(".send").toggle();
            }
          })
          $(".send1").click(function(){
           $("#formagence").submit();

          })

          $("#buttonsend").click(function(){
            $("#formUser").submit();
          })



	$(".fullscreen").css("height", window_height)
	$(".fitscreen").css("height", fitscreen);

  //-------- Active Sticky Js ----------//
  $(".default-header").sticky({topSpacing:0});


     if(document.getElementById("default-select")){
          $('select').niceSelect();
    };

    $('.img-pop-up').magnificPopup({
        type: 'image',
        gallery:{
        enabled:true
        }
    });

  // $('.navbar-nav>li>a').on('click', function(){
  //     $('.navbar-collapse').collapse('hide');
  // });


    //  Counter Js

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    $('.active-works-carousel').owlCarousel({
        items:1,
        loop:true,
        margin: 100,
        dots: true,
        autoplay:true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1,
            },
            768: {
                items: 1,
            }
        }
    });

    $('.active-gallery').owlCarousel({
        items:1,
        loop:true,
        dots: true,
        autoplay:true,
        nav:true,
        navText: ["<span class='lnr lnr-arrow-up'></span>",
        "<span class='lnr lnr-arrow-down'></span>"],
            responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1,
            },
            768: {
                items: 2,
            },
            900: {
                items: 6,
            }

        }
    });


$('.active-blog-slider').owlCarousel({
        loop: true,
        dots: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 2000,
        smartSpeed: 1000,
        animateOut: 'fadeOut',
      })


    // Select all links with hashes
    $('.navbar-nav a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .on('click',function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top-50
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
    });

      $(document).ready(function() {
          $('#mc_embed_signup').find('form').ajaxChimp();
      });






      $(function(){
        $("#form-total").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "fade",
            enableAllSteps: true,
            stepsOrientation: "vertical",
            autoFocus: true,
            transitionEffectSpeed: 500,
            titleTemplate : '<div class="title">#title#</div>',
            labels: {
                previous : 'Back Step',
                next : '<i class="zmdi zmdi-arrow-right"></i>',
                finish : '<i class="zmdi zmdi-check"></i>',
                current : ''
            },
        })
    });



    $(".header-btn").on('click',function(event){
      $('.active-blog-slider').carousel('pause');
    })


    $("#formagence").validate({

        rules: {

            email1:{
              required: true,
             email:true
           },
           nome:
           {
              required:true,
              minlength: 2,
           },

           addresse:
           {
              required:true,
              minlength: 2,
           },
           ville:
           {
            required:true,
            minlength: 2,
           },

           codPosta:
           {
            required:true,
            minlength: 2,
           },

           mobile1:
           {
            required:true,
            minlength: 2,
           },
           telephone:
           {
            required:true,
            minlength: 2,
           }




        },

        messages: {
            email1:
            {
                required:"Ce champ est requis.",
                email:"S'il vous plaît, mettez une adresse email valide."
            },

            nome:
            {
                required:"Ce champ est requis.",
               minlength: "Veuillez saisir au moins 2 caractères.",
            },

            addresse:
            {
                required:"Ce champ est requis.",
                minlength: "Veuillez saisir au moins 2 caractères.",
            },
            ville:
            {
                required:"Ce champ est requis.",
                minlength: "Veuillez saisir au moins 2 caractères.",
            },

            codPosta:
            {
                required:"Ce champ est requis.",
                minlength: "Veuillez saisir au moins 2 caractères.",
            },

            mobile1:
            {
                required:"Ce champ est requis.",
                minlength: "Veuillez saisir au moins 2 caractères.",
            },
            telephone:
            {
                required:"Ce champ est requis.",
                minlength: "Veuillez saisir au moins 2 caractères.",
            }
        },

        submitHandler: function(form) {


          agence=new FormData(form);

            for( var pair of agence.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);


             }

             $("#pills-home").removeClass('show active');
             $("#pills-profile").addClass('show active');
             $(".send").toggle();
             $(".Previous").removeClass("active");
          }
    })

    $("#inputEmail1").change(function(){
        $(this).removeClass("is-invalid");
    })


    $("#formUser").validate({
        rules: {

            email:{
              required: true,
               email:true
           },
           password:
           {
              required:true,
              minlength: 8,
           },

           name:
           {
              required:true,
              minlength: 2,
           },
           prenome:
           {
            required:true,
            minlength: 2,
           },

           mobile:
           {
            required:true,
            minlength: 2,
           },


        },

        messages: {
            email1:
            {
                required:"Ce champ est requis.",
                email:"S'il vous plaît, mettez une adresse email valide."
            },

            password:
            {
                required:"Ce champ est requis.",
               minlength: "Veuillez saisir au moins 8 caractères.",
            },

            name:
            {
                required:"Ce champ est requis.",
                minlength: "Veuillez saisir au moins 2 caractères.",
            },
            prenome:
            {
                required:"Ce champ est requis.",
                minlength: "Veuillez saisir au moins 2 caractères.",
            },

            mobile:
            {
                required:"Ce champ est requis.",
                minlength: "Veuillez saisir au moins 2 caractères.",
            },


        },

        submitHandler: function(form) {


         var use=new FormData(form);

            for( var pair of agence.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);

              use.append(pair[0],pair[1]);
             }
             $.ajax({

                url:'/register',
                method:"POST",
                data:use,
                dataType:"JSON",
                contentType:false,
                cache:false,
             processData:false,
             success:function(data)
             {
                 if(data['email1']!=null)
                 {
       $("#inputEmail1").addClass('is-invalid');
                 }

                 if(data['email']!=null)
                 {

                    $("#pills-home").addClass('show active');
                    $("#pills-profile").removeClass('show active');
                 //   $(".send").toggle();
                    $(".Previous").addClass("active");
                    $("#inputEmail").toggle();
                 }

                 if(data['create']!=null)
                 {
                    location.reload();
                 }


                 },

             error: function (err) {
                console.log(err);
            }

                    })

          }
    })


 });


