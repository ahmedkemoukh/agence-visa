
$(document).ready(function(){
$(".send1").click(function(){
    $("#formagence").submit();
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


$("#buttonsend").click(function(){

    $("#formUser").submit();
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

             if(data['agence']!=null)
             {
                $(".alert").addClass("alert-success");
                $(".alert").removeClass("alert-danger");
                $(".alert").removeClass("d-none").delay(3000).queue(function(next){
                   $(this).addClass("d-none");
                   next();
               });
             }


             },

         error: function (err) {
            console.log(err);
        }

                })

      }
})

})
