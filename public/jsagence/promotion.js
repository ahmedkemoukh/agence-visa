
$(document).ready(function(){
    $url="";
        var actions = $("#action").html();
        // Append table with add row form on add new button click
        $(".add-new").click(function(){
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();

        var row = '<tr>' +

        '<td name="payev">'+
        ' <input type="text" list="listItem" class="form-control" id="payev" name="payev" />'+
        '<datalist id="listItem">'+
    '</datalist></td>' +
        '<td name="typevisa"><input type="text" class="form-control" name="typevisa" ></td>' +
        '<td name="tarifv"><input type="number" class="form-control" name="tarifv" ></td>' +
        '<td name="disponibilitev"><input type="text" class="form-control" name="disponibilitev" ></td>' +
        '<td name="remboursablev"><input type="text" class="form-control" name="remboursablev" ></td>' +
        '<td>' + actions + '</td>' +
    '</tr>';



        $("table tr:first").after(row);
        $('#payev').keyup(listItem);
        $("table tr").eq(1).find(".add, .edit").toggle();
            $url="/visa";

        });
        // Add row on add button click
        $(document).on("click", ".add", function(){


                $("#form").submit();

        });
        // Edit row on edit button click
        $(document).on("click", ".edit", function(){
            $(this).parents("tr").find(".promotion").each(function(){
                $(this).html('<input type="'+$(this).attr('type')+'" class="form-control" name="'+$(this).attr('name') + '"value="' + $(this).text() + '">');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
            $( ".edit" ).prop( "disabled", true );
            $url="/visa/"+$(this).parents("tr").attr("id");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function(){
            //tr selectioner
            $tr=$(this).parents("tr");

            //id de paye
            $id= $tr.attr("id");
            if($id!=null)
            {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                url:"/visa/"+$id,
                type:'DELETE',
                dataType:"JSON",
             success:function(data)
             {
                 $tr.remove();
                $(".add-new").removeAttr("disabled");
             }
                    })
                }
                else
                {
                    $tr.remove();
                    $(".add-new").removeAttr("disabled");
                }

        });






                $('#form').validate({
                    rules: {

                        tarifn: {
                            required: true,

                            },
                            date: {
                                required: true,

                                },







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
                         $tr=$("table").find('input').eq(0).parents('tr');

                        var input =$tr.find('input');
                        input.each(function(){
                            $(this).parent("td").html($(this).val());
                        });
                        $(".add-new").removeAttr("disabled");
                        $( ".edit" ).prop( "disabled", false );
                        $tr.find(".add, .edit").toggle();
                         $tr.attr('id',data['id']);
                         $(".alert").removeClass("d-none").delay(3000).queue(function(next){
                            $(this).addClass("d-none");
                            next();
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

                    }

                })
    });


    function listItem()
    {

    $data=$(this).val();

       $.ajax({

    url:'/distination/listitem',
    method:"GET",
    data:{"payev":$data},
    dataType:"JSON",

    success:function(data)
    {
       $('#listItem').html("");
     if(data['listItem']!=null)
     {
        data['listItem'].forEach(element => {
            $('#listItem').append('<option value="'+element['paye']+'">');


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
    }
