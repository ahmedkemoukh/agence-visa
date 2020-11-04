$(".btn_action").click(function(){

    window.open($(this).attr('url'));
})

$(".btn_delete").click(function(){
    $btn=$(this);
    $url=$btn.attr('url');
    $('#exampleModaldelete').modal('show');
    $('#delete').click(function(){

        $('#exampleModaldelete').modal('hide');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: $url,
        type: "POST",
        contentType: false, // Not to set any content header
        processData: false, // Not to process data
        async: false,
        success: function (result) {
            if(result['succes']!=null)

$btn.parent().parent().remove();
        },
        error: function (err) {
            alert(err.statusText);
        }
    });
       $( "#delete").unbind( "click" );
    });
})

$('.infoD').click(function(){
    $(this).parent().find(".collapsible-body").slideToggle( "slow" );
})

$('.deletedossier').click(function(){
    $btn=$(this);
    $url=$btn.attr('url');

    $('#exampleModaldelete').modal('show');
    $('#delete').click(function(){

        $('#exampleModaldelete').modal('hide');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: $url,
        type: "POST",
        contentType: false, // Not to set any content header
        processData: false, // Not to process data
        async: false,
        success: function (result) {
            if(result['succes']!=null)

$btn.parent().parent().parent().parent().parent().parent().remove();
        },
        error: function (err) {
            alert(err.statusText);
        }
    });
       $( "#delete").unbind( "click" );
    });
})
