
$(document).ready(function(){
    $url="";
    $type="";
    $element="";

        var actions = $("#action").html();
        // Append table with add row form on add new button click
        $(".add-new").click(function(){
            $(this).attr("disabled", "disabled");
            $( ".edit" ).prop( "disabled", true );
            var index = $("table tbody tr:last-child").index();

        var row = '<tr>' +
        '<td name="paye"><input type="text" class="form-control" name="paye" ></td>' +

        '<td>' + actions + '</td>' +
    '</tr>';

            $("table tbody").prepend(row);
            $("table tbody tr").eq(0).find(".add, .edit").toggle();
            $url="/distination";
            $type="POST";
            $element="pays ajouté avec succès";


        });
        // Add row on add button click
        $(document).on("click", ".add", function(){


                $("#form").submit();



        });



        // Edit row on edit button click
        $(document).on("click", ".edit", function(){
            $(this).parents("tr").find("td:not(:last-child)").each(function(){
                $(this).html('<input type="text" class="form-control" name="'+$(this).attr('name') + '"value="' + $(this).text() + '">');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
            $( ".edit" ).prop( "disabled", true );
            $url="/distination/"+$(this).parents("tr").attr("id");
            $type="PATCH";
            $element="pays modifié avec succès";


        });




        // Delete row on delete button click
        $(document).on("click", ".deleteD", function(e){

            //tr selectioner
            e.preventDefault();
            $tr=$(this).parents("tr");

            //id de paye
            $id= $tr.attr("id");



            if($id!=null)
            {
                $('#exampleModaldelete').modal('show');
                $('#delete').click(function(){

                    $('#exampleModaldelete').modal('hide');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                url:"/distination/"+$id,
                type:'DELETE',
                dataType:"JSON",
             success:function(data)
             {
                 $tr.remove();
                $(".add-new").removeAttr("disabled");
             },
             error:function(data)
             {
                 alert("Il est impossible suprimer ce pays ... Il y a des voyages liés à ce pays");
             }
                    })
                    $( "#delete").unbind( "click" );
                });

                }
                else
                {
                    $tr.remove();
                    $(".add-new").removeAttr("disabled");
                }

        });


                $('#form').validate({
                    rules: {
                        paye:
                        {
                        required: true,
                        minlength: 2,
                        maxlength: 50
                        }

                    },
                    submitHandler: function(form) {

                        $data=new FormData(form);
                        for( $pair of $data.entries()) {
                         console.log($pair[0]+ ', '+ $pair[1]);
                      }

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                    url:$url,
                  method:"POST",
                    data:$data,
                    dataType:"JSON",
                    contentType:false,
                    cache:false,
                 processData:false,
                 success:function(data)
                 {

                     if(data['id']!=null)
                     {
                         $tr=$("table").find('input[type="text"]').eq(0).parents('tr');

                        var input =$tr.find('input[type="text"]');
                        input.each(function(){
                            $(this).parent("td").html($(this).val());
                        });
                        $(".add-new").removeAttr("disabled");
                        $( ".edit" ).prop( "disabled", false );
                        $tr.find(".add, .edit").toggle();
                         $tr.attr('id',data['id']);
                         $(".alert").html($element);
                         $(".alert").addClass("alert-success");
                         $(".alert").removeClass("alert-danger");
                         $(".alert").removeClass("d-none").delay(3000).queue(function(next){
                            $(this).addClass("d-none");
                            next();
                        });
                     }

                     else
                     {


                        $(".alert").removeClass("alert-success");
                        $(".alert").addClass("alert-danger");
                        $(".alert").html("pays exist déjà");
                        $(".alert").removeClass("d-none").delay(3000).queue(function(next){
                            $(this).addClass("d-none");
                            next();
                        });
                     }

                 },
                 error:function($err)
                 {
                    console.log($err);
                 }

                        })

                    }

                })

                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar, #content').toggleClass('active');
                    $('.btn-togle').toggleClass('btn-togle-left');

                  });


    });



