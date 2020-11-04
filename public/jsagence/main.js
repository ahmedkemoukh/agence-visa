

$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
    $('.btn-togle').toggleClass('btn-togle-left');

  });



});





var agence;
var idVisa=""; //FormData object
$urlDemand=""
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
var doc = new jsPDF();
$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

$('#pdf').click(function(){
    window.print();
})

$('.menu').click(function(){
    $('.listU').slideToggle('slow');
})
    $('#refuse').change(function(){
        alert($(this).prop('checked'));
    })
$(".collapsible-header").click(function(){

$(this).parent().find(".collapsible-body").slideToggle( "slow" );
})
    $(".next").click(function(){
        current_fs = $(this).parent();

    switch(current_fs.index())
    {
        case 1:
           $("#agenceform").submit();
            break;
            case 2:
                $("#voyageurform").submit();
                break;
                default:
                    $("#inFile").html("");
                    $markup= "<tr  id='filedocument'><td>filedocument</td><td class='text-center'>";

                    $markup=$markup+"<button type='button'  class='ml-2 btn-outline-warning  btn rounded-pill'><a class='text-decoration-none text-secondary'   href='/"+idVisa+"/filedocument'  target='blank'>ouvrir</a></button></td></tr>";
                    $("#FilesList").clone().appendTo($("#inFile"));
                    $("#inFile").find("#FilesList").append($markup);
                    nextfieldset($(this).parent());
    }

    });

    $(".previous").click(function(){

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;

    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 600
    });
    });


    $('#save').click(function(){
       $('#exampleModalCenter').modal('hide');
       $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '/demande/status',
        type: "POST",
        contentType: false, // Not to set any content header
        processData: false, // Not to process data
        async: false,
        success: function (result) {
            if(result['error']!=null)
alert(result['error']);
            else
            {
alert("la demande ajouter avec success");
          window.open("/listDemand",'_self');

            }

        },
        error: function (err) {
            alert(err.statusText);
        }
    });

    })

    $('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
    });

    $(".submit").click(function(){
    return false;
    })
   /* $("#btn").submit(function(e){
        e.preventDefault();

        $(this).submit();
    })*/

    $('#file').change(function(e){


       $data=new FormData();


       for(var entryForm of $data.entries()) {
        console.log(entryForm[0]+ ', '+ entryForm[1]);
     }
        /*var file = new Array();
        file=$("#file").val();
        alert(this.val());

        for(i=0;i<this.files.length;i++)
        {
            alert(this.files[i]);
        }*/







    });





		$("#fileInput").on("change", function () {
            var formdata = new FormData();
            var fileInput = document.getElementById('fileInput');
			//Iterating through each files selected in fileInput
			for (i = 0; i < fileInput.files.length; i++) {

				var sfilename = fileInput.files[i].name;
			//	let srandomid = Math.random().toString(36).substring(7);

				formdata.append('file[]', fileInput.files[i]);


			}

            $('#fileInput').val('');


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
				url: '/fileupload',
				type: "POST",
				contentType: false, // Not to set any content header
				processData: false, // Not to process data
				data: formdata,
				async: false,
				success: function (result) {
					if (result != "") {

                        $data= result["id"];
                        for( $pair in $data) {
                            var sfilename=$pair;
                             $markup= "<tr  id='" + sfilename.replace(".", "") + "'><td '>" + sfilename + "</td><td class='text-center'><button class='delete btn-outline-danger btn rounded-pill' type='button' url='/fileupload/"+$data[$pair]+"'  class='btn btn-danger'>supprimer</button>";


                           $markup=$markup+"<button type='button'  class='ml-2 btn-outline-warning  btn rounded-pill'><a class='text-decoration-none text-secondary'   href='/fileupload/"+$data[$pair]+"'  target='blank'>ouvrir</a></button></td></tr>";

                            console.log($pair+ ', '+ $data[$pair]);

                            $("#FilesList").append($markup);
                            $(".delete").unbind();
                            $(".delete").on('click',DeleteFile);
                         }



                  chkatchtbl();
					}
				},
				error: function (err) {
					alert(err.statusText);
				}
			});
        });

  $('.btn-etat').click(function(){
    $('.btn-etat').toggle();
    $('.tagvalid').toggle();
  })
        $("#formvalid").validate({

            rules: {
                evisa:
                {
                    required:true
                },
            },
                submitHandler: function(form) {


                    $file=new FormData(form);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        url:window.location.href+'/uploadfile',
                        type: "POST",
                        contentType: false, // Not to set any content header
                        processData: false, // Not to process data
                        data:  $file,
                        async: false,
                        success: function (result) {
                            if (result["success"] !=null) {
                                window.open("/listDossier",'_self');

                            }
                            else
                            {
                                alert("error");
                            }
                        },
                        error: function (err) {
                            alert(err.statusText);
                        }
                    });
                }



        })




$("#formrefus").submit(function(e){
    e.preventDefault();
     $formdata = new FormData(this);
    for( $pair of $formdata.entries()) {
        console.log($pair[0]+ ', '+ $pair[1]);


     }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url:window.location.href+'/refuse',
        method:"POST",
        data:$formdata,
        dataType:"JSON",
        contentType:false,
        cache:false,
     processData:false,
        success: function (result) {
            if (result["success"] !=null) {
                window.open("/listDossier",'_self');

            }
            else
            {
                alert("error");
            }
        },
        error: function (err) {
            alert(err.statusText);
        }
    });
})








        $("#voyageurform").validate({
            rules: {



               nomeV:
               {
                required:true,
                minlength: 3,
               },
               prenomeV:
               {
                required:true,
                minlength: 3,
               },

               mobileV:
               {
                required:true,
                minlength: 3,
               },

        imageofficial:
        {
            required:false
        }

            },

            messages:
            {
                   nomeV: {
                           required:"Ce champ est requis.",
                           minlength: "Veuillez saisir au moins 3 caractères.",
                       },

                       prenomeV:
                       {
                           required:"Ce champ est requis.",
                          minlength: "Veuillez saisir au moins 2 caractères.",
                       },

                       mobileV:
                       {
                           required:"Ce champ est requis.",
                           minlength: "Veuillez saisir au moins 2 caractères.",
                       },
                    },
            submitHandler: function(form) {


                $voyageur=new FormData(form);

                for( $pair of agence.entries()) {
                    console.log($pair[0]+ ', '+ $pair[1]);
                    $voyageur.append($pair[0],$pair[1]);


                 }

                console.log($voyageur);
                 $url=$(form).attr("action");

                 $.ajax({

                    url:$url,
                    method:"POST",
                    data:$voyageur,
                    dataType:"JSON",
                    contentType:false,
                    cache:false,
                 processData:false,
                 success:function(data)
                 {
                     if(data['email']!=null)
                     {

                        $('#inputEmail-error1').css({'display':'block'});
                        $('fieldset').eq(1).toggle();
                        $('fieldset').eq(0).toggle().css({'opacity':1});
                       }
                       else
                    if(data['etat']!=null)
                    {
                        alert("votre compte dans etat : "+data['etat'] + " Impossible continu cet action");
                    }
                     else
                     {
                    idVisa=data['id'];

                  $(form).attr("action","/demande/"+data["id"]);
                      $("#information").html("");

                    $(".information").eq(1).clone().appendTo($("#information"));
                    $(".information").eq(0).clone().appendTo($("#information"));
                    $('#layout_file').html("");
                    $('#layout_file').append("<img class='img-fluid' src='/"+idVisa+"/"+"filedocument'" + "onerror=$(this).attr('src','/img/a.png')>");

                    nextfieldset($(form).parent());

                     }
                 },
                 error: function (err) {
                    alert(err.statusText);
                }

                        })
              }
        })

   $("#inputEmail").click(function(){
    $('#inputEmail-error1').css({'display':'none'});
   })

        $("#agenceform").validate({
            rules: {

                nationalite:{
                  required: true,
                  minlength: 2,
               },
               payeV:
               {
                  required:true,
                  minlength: 2,
               },

               typeVisa:
               {
                  required:true,

               },
               dateA:
               {
                required:true,

               }


            },
     messages:
     {
            nationalite: {
                    required:"Ce champ est requis.",
                    minlength: "Veuillez saisir au moins 2 caractères.",
                },

                payeV:
                {
                    required:"Ce champ est requis.",
                   minlength: "Veuillez saisir au moins 2 caractères.",
                },

                name:
                {
                    required:"Ce champ est requis.",
                    minlength: "Veuillez saisir au moins 2 caractères.",
                },
                typeVisa:
                {
                    required:"Ce champ est requis.",
                    minlength: "Veuillez saisir au moins 2 caractères.",
                },

                dateA:
                {
                    required:"Ce champ est requis.",

                },


            },

            submitHandler: function(form) {


              agence=new FormData(form);

                for( $pair of agence.entries()) {
                    console.log($pair[0]+ ', '+ $pair[1]);


                 }

                 nextfieldset($(form).parent());
              }
        })





   /*     $("#voyageurform").submit(function(e){
            e.preventDefault();
alert("Dd");
            $data=new FormData(this)

            for( $pair of $data.entries()) {

                console.log($pair[0]+ ', '+ $pair[1]);
             }
             $form=$(this);
             $url=$form.attr("action");

             $.ajax({

                url:$url,
                method:"POST",
                data:$data,
                dataType:"JSON",
                contentType:false,
                cache:false,
             processData:false,
             success:function(data)
             {

                $form.attr("action","visademand/"+data["id"]);
                $("#information").html("");

                $(".information").eq(1).clone().appendTo($("#information"));
                $(".information").eq(0).clone().appendTo($("#information"));

          idVisa=data['id'];
                 alert(data['id']+"pppppp");
             },
             error: function (err) {
                alert(err.statusText);
            }

                    })
        });*/



        function nextfieldset($index)
        {

            current_fs = $index;
            next_fs = $index.next();
             //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 600
        });
        }




        $('#payev').keyup(function()
        {

        $data=$(this).val();
        $('#typeVisa').html("");
           $.ajax({

        url:'/distination/listitem',
        method:"GET",
        data:{"payeV":$data},
        dataType:"JSON",

        success:function(data)
        {
           $('#listItem').html("");
         if(data['listItem']!=null)
         {
            data['listItem'].forEach(element => {
                $('#listItem').append('<option class="form-control"  value="'+element['paye']+'">');


           });
         }

         else
         {
            $(".alert").removeClass("d-none");
         }

        },
        error:function($err)
        {
        console.log($err);
        }

            })
        });



        $("#typeVisa").focus(function(){
            $data=$("#payev").val();

            $.ajax({

         url:'/visa/listitem',
         method:"GET",
         data:{"payeV":$data},
         dataType:"JSON",

         success:function(data)
         {
            $('#typeVisa').html("");
          if(data['listItem']!=null)
          {
             data['listItem'].forEach(element => {
                 $('#typeVisa').append('<option class="form-control" tarif="'+element['tarifv']+'" tarifn="'+element['tarifvn']+'" value="'+element['id']+'">'+element['typevisa']+'</option>');


            });
            $("#tarif").removeClass("text-overline");
            $("#tarif").html("");
            $("#tarifn").html("");
            $("#tarif").addClass("text-success");
            $("#tarif").html($("#typeVisa option:selected").attr('tarif')+".00 DA");
            if($("#typeVisa option:selected").attr('tarifn')!='null')
            {
                $("#tarif").addClass("text-overline");
                $("#tarif").removeClass("text-success");
                $("#tarifn").html($("#typeVisa option:selected").attr('tarifn')+".00 DA");
            }
          }

          else
          {
             $(".alert").removeClass("d-none");
          }

         },
         error:function($err)
         {
         console.log($err);
         }

             })
        });

        $("#typeVisa").change(function(){
            $("#tarif").html($(this).find("option:selected").attr('tarif')+".00 DA");
            console.log()
        })

        $('.delete').on("click",DeleteFile);

        $("#voyageurform input[type=file]").change(function(){
          console.log(this.value);
          var filR=new FileReader();
          $img= $(this).parent().find(".img");
           filR.onload=function(e)
           {
          $img.eq(0).attr('src',e.target.result);
           }
           filR.readAsDataURL(this.files[0]);
        });
    });


	function DeleteFile(Fileid, FileName) {

     $tr=$(this).parent().parent();
      $url=$(this).attr('url');
      alert($(this).attr('url')+"ssfds");
        if($url=="#")
        {
        formdata.delete(FileName)
        $("#" + Fileid).remove();
		chkatchtbl();
        }
        else{


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url:$url,
                type:'DELETE',
                dataType:"JSON",

             success:function(data)
             {
                 alert(data['s']+"aaaa");
                 $tr.remove();

             }

                    })
        }

    }

    function uploadFile()
    {
        alert($(this).attr("url")+"dddddd");
    }
	function chkatchtbl() {
		if ($('#FilesList tr').length > 1) {
			$("#FilesList").css("visibility", "visible");
		} else {
			$("#FilesList").css("visibility", "hidden");
		}
    }



