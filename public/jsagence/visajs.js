
$(document).ready(function(){
$url="";
$element="";
	var actions = $("#action").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
        $(this).attr("disabled", "disabled");
        $( ".edit" ).prop( "disabled", true );
		var index = $("table tbody tr:last-child").index();

    var row = '<tr>' +

    '<td name="payev" type="text">'+
    ' <input type="text" list="listItem" class="form-control" id="payev" name="payev" />'+
    '<datalist id="listItem">'+
'</datalist></td>' +
    '<td name="typevisa" type="text"><input type="text" class="form-control" name="typevisa" ></td>' +
    '<td name="tarifv" type="number"><input type="number" class="form-control" name="tarifv" ></td>' +
    '<td name="disponibilitev"  type="select"><select  name="disponibilitev" class="form-control"><option value="oui">oui</option> <option value="no">Non</option></select></td>' +
    '<td name="remboursablev" type="select"><select   name="remboursablev" class="form-control"><option value="oui">oui</option> <option value="no">Non</option></select></td>' +
    '<td>' + actions + '</td>' +
'</tr>';



    $("table tbody").prepend(row);
    $('#payev').keyup(listItem);
    $("table tbody tr").eq(0).find(".add, .edit").toggle();
        $url="/visa";
        $element="Evisa ajouté avec succès";

    });
	// Add row on add button click
	$(document).on("click", ".add", function(){


            $("#form").submit();

    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
             if($(this).attr('type')!='select')
{
			$(this).html('<input type="'+$(this).attr('type')+'" class="form-control" name="'+$(this).attr('name') + '"value="' + $(this).text() + '">');
}
else{
    $(this).html('<select  name="'+$(this).attr('name') +'" class="form-control"><option value="oui">oui</option> <option value="no">no</option></select>');
}

        });

		$(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").attr("disabled", "disabled");
        $( ".edit" ).prop( "disabled", true );
        $url="/visa/"+$(this).parents("tr").attr("id");

        $element="Evisa modifié avec succès";
    });
	// Delete row on delete button click
	$(document).on("click", ".deletev", function(){
        //tr selectioner
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
            url:"/visa/"+$id,
            type:'DELETE',
            dataType:"JSON",
         success:function(data)
         {
             $tr.remove();
            $(".add-new").removeAttr("disabled");
         },
         error:function(data)
             {
                 alert("Il est impossible suprimer cet visa ... Il y a des demandes liés à cet visa");
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
                    typevisa:
                    {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                    },
                    tarifv: {
                        required: true,
                        minlength: 2,
                        digits: true,
                        maxlength: 50,
                        min:0
                        },

                    disponibilitev:
                    {
                        required: true,

                        },

                    remboursablev:
                    {
                        required: true,

                        },

                     payev:
                     {
                        required: true,
                        minlength: 2,
                        maxlength: 50
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

                    var select =$tr.find('select');
                    select.each(function(){
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
                        $(".alert").html(data['error']);
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
