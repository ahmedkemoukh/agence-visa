@extends('layout_agence.app')
  @section('content')


    <!-- MultiStep Form -->
<div class="container-fluid mt-2  pt-2 row " id="grad1">



  @if(Auth::user()->type==1 && !isset($data['show']))

    <div class="col-12 d-flex justify-content-between">
        <div class=""><h2 class="font-weight-normal">La Liste Des Agences</h2></div>
        <div class="">
        <form class="form-inline "  action="/agence/agence_charche" method="GET">
            <input class="form-control " type="search" name='search' placeholder="rechercher" aria-label="Search" required>
            <button class="btn mx-2 btn-outline-warning" type="submit"><i class="fa fa-search fa-6" aria-hidden="true"></i></button>
          </form>
        </div>
    </div>

  <div class="col-12 ">
  @foreach($data as $user)

  <div class="card bg-white mt-1  position-relative pb-2  mb-3 " id='{{$user->agence()[0]->id}}' >
    <div class="row no-gutters">


      <div class="col-md-12 row">
        <span class="col-12 my-3 h5 text-warning text-center etat item">etat : {{$user->etat}}  </span>
        <div class="col-6 text-center item">
            <h6>Les Informations Personnelles</h6>
            <ul class="list-group list-group-flush mt-3 ">
                <li class="list-group-item"><label class="font-weight-bold">Nom : </label>
                <label>{{$user->name}}</label>
                </li>
                <li class="list-group-item"><label class="font-weight-bold">Prénom : </label>
                    <label>{{$user->prenome}}</label>
                    </li>
                    <li class="list-group-item listitem" style="display: none"><label class="font-weight-bold">Email : </label>
                        <label>{{$user->email}}</label>
                        </li>
                        <li class="list-group-item listitem"  style="display: none"><label class="font-weight-bold">mobile : </label>
                            <label>{{$user->mobile}}</label>
                            </li>

              </ul>

        </div>
        <div class="col-6 text-center item">
            <h6>Les Informations D'agence</h6>
            <ul class="list-group list-group-flush mt-3">
                <li class="list-group-item"><label class="font-weight-bold">Nom : </label>
                    <label>{{$user->agence()[0]->nome}}</label>
                    </li>


                <li class="list-group-item"><label class="font-weight-bold">addresse : </label>
                    <label>{{$user->agence()[0]->addresse }}</label>
                    </li>

                    <li class="list-group-item listitem" style="display: none"><label class="font-weight-bold">Email : </label>
                        <label>{{$user->agence()[0]->email1 }}</label>
                        </li>


                    <li class="list-group-item listitem" style="display: none"><label class="font-weight-bold"> ville : </label>
                        <label>{{$user->agence()[0]->ville }}</label>
                        </li>



                          <li class="list-group-item listitem" style="display: none"><label class="font-weight-bold">code postale: </label>
                              <label>{{$user->agence()[0]->codPosta }}</label>
                    </li>

                    <li class="list-group-item listitem" style="display: none"><label class="font-weight-bold">mobile: </label>
                        <label>{{$user->agence()[0]->mobile1 }}</label>
              </li>

              <li class="list-group-item listitem" style="display: none"><label class="font-weight-bold">telephone: </label>
                <label>{{$user->agence()[0]->telephone }}</label>
              </li>


              </ul>
            </div>
             <div class="text-center col-12 listitem" style="display: none !important">
                 @if($user->etat=="demande")

                 <button class=" btn rounded-pill  btn_action btn-outline-warning changEtat  mr-5" etat="valider" id='{{$user->id}}'>valider</button>
                 <button class="  btn rounded-pill  btn_action btn-outline-danger  changEtat " etat="invalid" id='{{$user->id}}'>Non valider</button>
                 <button class="btn rounded-pill  btn_action btn-outline-danger  changEtat  mr-5 block " style="display: none" etat="block" id='{{$user->id}}'>block</button>
                 <button class="btn rounded-pill  btn_action btn-outline-warning   changEtat " style="display: none"  etat="update" id='{{$user->id}}'><a class="text-dark" href='/user/{{$user->id}}'>modifier</a></button>
                 <button class="btn rounded-pill  btn_action btn-outline-danger   changEtat " style="display: none" etat="delete" id='{{$user->id}}'>suprimer</button>

                @else
             <button class="btn rounded-pill  btn_action btn-outline-danger   changEtat mr-5  block " etat="  @if($user->etat=='block') deblock @else block @endif" id='{{$user->id}}'>   @if($user->etat=="block")deblock @else block @endif</button>
             <button class="btn rounded-pill  btn_action btn-outline-warning  changEtat "  etat="update" id='{{$user->id}}'><a class="text-dark" href='/user/{{$user->id}}'>modifier</a></button>
             <button class="btn rounded-pill  btn_action btn-outline-danger  changEtat " etat="delete" id='{{$user->id}}'>suprimer</button>

             @endif
             @csrf
                 {{method_field('PATCH')}}
             </div>

      </div>
    </div>
    <i class="fas fa-chevron-circle-down text-warning infoD"></i></i>
  </div>
@endforeach
@else
<div class="col-9 bg-white">
<section class="inscrire mb-5" id="inscrire">

    <div class="tab-content" id="pills-tabContent">
        @if($errors->any())
        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        @else
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        @endif
            <div class="row justify-content-sm-center  p-5">
                <div class="col-6 wizard-header text-center ">
                    <h3 class="heading ">Coordonnées D'agence</h3>

                </div>
                <div class="w-100"></div>

            <div class="col-12 col-md-10">


                <form id='formagence'>


                <div class="form-group">
                  <label for="inputAddress" class="heading">Nom d'agence</label>
                  <input type="text" name="nome" value='{{$data[0]->agence()[0]->nome}}' class="form-control" id="inputname" placeholder="name agence">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Adresse </label>
                  <input type="text" name="addresse" class="form-control"  value='{{$data[0]->agence()[0]->addresse}}' id="inputAddress" placeholder="Apartment, studio, or floor">
                </div>


                    <div class="form-group">
                      <label for="inputEmail4">Email d'agence</label>
                      <input type="email" name="email1" class="form-control"  value='{{$data[0]->agence()[0]->email1}}' id="inputEmail4" placeholder="Ex:agence@enail.com">
                      <label id="inputEmail" class="error1 text-danger" for="inputEmail" style="display: none" >Email exist déja</label>
                    </div>


                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity"> ville</label>
                    <input type="text" name="ville" class="form-control"  value='{{$data[0]->agence()[0]->ville}}' id="inputvill" placeholder="Ex:160000">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputCity">Code postale </label>
                    <input type="text" name="codPosta" class="form-control"  value='{{$data[0]->agence()[0]->codPosta}}' id="codepostale" placeholder="Ex:160000">
                  </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputCity">Mobile</label>
                      <input type="text" name="mobile1" class="form-control" id="mobile"  value='{{$data[0]->agence()[0]->mobile1}}' placeholder="Ex:0659393756">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputCity">Telephone* </label>
                      <input type="text" class="form-control" name="telephone"  value='{{$data[0]->agence()[0]->telephone}}' id="telephone" placeholder="Ex:031478369">
                    </div>

                  </div>


                </form>
            </div>
            </div>
            <div class="d-flex justify-content-center">
                <ul class=" ml-5 nav nav-pills mb-3 center" id="pills-tab" role="tablist">
                  <li class="nav-item  mx-2" role="presentation">
                    <a class="nav-link  active Previous rounded-pill  btn-outline-dark" id="pills-home-tab1" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Précedent</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="  nav-link send send1 btn  rounded-pill  btn-outline-warning" type="button" data-toggle="pill1"  role="tab" aria-controls="pills-profile" aria-selected="false">Suivant</button>
                  </li>

                </ul>
              </div>

        </div>
        @if($errors->any())
        <div class="tab-pane show active fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @else
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            @endif
            <div class="row justify-content-sm-center  p-3">



                <div class="col-12 wizard-header text-center ">
                    <div class="alert  alert-success modifier d-none alert-dismissible fade show" id="modifier" role="alert">
                        <strong> modifier les Informations avec success </strong>
                        <button type="button" class="close" id="close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>


                    <h4 >Les Informations Personnelles</h4>


                </div>
                <div class="w-100"></div>
                <div class="col-9">


                <form  id="formUser" action="/user/{{$data[0]->id}}">
                            @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" id="inputEmail1"  value='{{$data[0]->email}}' class="form-control" id="inputEmail4">
                        <span  class="error1 text-danger invalid-feedback" for="inputEmail1" >Email exist déja</span>
                       </div>
                    </div>


                    <div class="form-group">
                      <label for="inputAddress">Nom</label>
                      <input type="text" name="name" class="form-control"  value='{{$data[0]->name}}' id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Prénom</label>
                      <input type="text" name="prenome" class="form-control"  value='{{$data[0]->prenome}}' id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>

                      <div class="form-group col-md-8">
                        <label for="inputCity">mobile</label>
                        <input type="text" name="mobile" class="form-control"  value='{{$data[0]->mobile}}' id="inputCity">
                      </div>

                      <div class="d-flex justify-content-center">
                        <ul class=" ml-5 nav nav-pills mb-3 center" id="pills-tab" role="tablist">

                          <li class="nav-item" role="presentation">
                            <button id="buttonsend"  class="nav-link  send  btn  rounded-pill  btn-outline-warning " type="button">Modifier<span class=" "></span></button>
                          </li>

                        </ul>
                      </div>
                    </form>

                                    <label class="h4 col-12">{{ __('réinitialiser le mot de passe') }}</label>


                                        <form method="POST"  id="formrest" action="{{ route('password.update') }}">
                                            @csrf
                                           @error('success')
                                           <div class="alert  alert-success text-center  alert-dismissible fade show" role="alert">
                                          <strong> {{$message}} </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                           @enderror


                                            <div class="form-group">
                                                <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="oldpassword" class="col-md-12 col-form-label">Ancien mot de passe</label>

                                                <div class="col-md-12">
                                                    <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="new-password">

                                                    @error('oldpassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="password" class="col-md-12 col-form-label ">Nouveau mot de passe</label>

                                                <div class="col-md-12">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="passwordconfirm" class="col-md-12 col-form-label ">{{ __('confirmè mot de passe') }}</label>

                                                <div class="col-md-12">
                                                    <input id="passwordconfirm" type="password" class="form-control" name="passwordconfirm" required autocomplete="new-password">
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Mot de passe ne pas correcte</strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group  mb-0 ml-5">
                                                <div class="col-md-12 offset-md-4">
                                                    <button id="rest" type="button" class="btn btn-outline-warning  rounded-pill">
                                                        {{ __('modifier') }}
                                                    </button>
                                                </div>
                                            </div>


      <div class="d-flex justify-content-center mt-5 mr-5">
        <ul class=" ml-5 nav nav-pills mb-3 center" id="pills-tab" role="tablist">
          <li class="nav-item  mx-2" role="presentation">
            <a class="nav-link active   Previous rounded-pill btn btn-outline-dark" id="pills-home-tab2" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Précedent</a>
          </li>


        </ul>
      </div>
                                        </form>


                            </div>




                </div>

        </div>
      </div>





</section>

</div>


<div class="col-3 pub">


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/al.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/img/al1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/img/al2.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Précedent</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Suivant</span>
        </a>
      </div>


</div>
@endif
  </div>
  <div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-warning text-center" id="exampleModalLongTitle">confirmer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            voulez-vous vraiment <label class="labelEtat"></label> l'élément sélectionné
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="button" id="delete" class="btn btn-warning">confirmer</button>
        </div>
      </div>
    </div>
  </div>
    <!-- MultiStep Form -->

  <!-- End demo content -->

<script>

$("#pills-home-tab2").click(function(){
    $(this).removeClass("active");
})
$("#rest").click(function(){

$('#formrest').submit();


});
$("#formrest").validate({
rules: {

    password:{
      required: true,
      minlength:8,

   },
   passwordconfirm:
   {
      required:true,
      minlength: 8,
      equalTo:"#password"
   },

   oldpassword:
   {
      required:true,
      minlength: 8,
   },
   email:
   {
    required:true,
    email:true
   }


},

messages:
{
    email: {
               required:"Ce champ est requis.",
               email:"S'il vous plaît, mettez une adresse email valide."
           },

           password:
           {
               required:"Ce champ est requis.",
              minlength: "Veuillez saisir au moins 8 caractères.",
           },

           passwordconfirm:
           {
               required:"Ce champ est requis.",
               minlength: "Veuillez saisir au moins 8 caractères.",
               equalTo:"entrez à nouveau la même valeur."
           },
           oldpassword:
           {
               required:"Ce champ est requis.",
               minlength: "Veuillez saisir au moins 8 caractères.",
           },
        },
submitHandler: function(form) {
    form.submit();
}
});

$("#close").click(function(){
    $("#modifier").addClass('d-none');
})

$(".changEtat").on("click",function(){


  $btn=$(this);
  if($btn.attr("etat")!='update')
  $('#exampleModaldelete').modal('show');
  $('.labelEtat').html($btn.html());
    $('#delete').click(function(){

        $('#exampleModaldelete').modal('hide');

$.ajax({
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"

    },
   url:"agence/"+$btn.attr("id"),
   type:"PATCH",
   data:{"etat":$btn.attr("etat")},
   dataType: 'JSON',


success:function(data)
{
    if(data['etat']=='valider')
    {

        $btn.parent().find(".changEtat").toggle();
        $btn.parent().parent().find(".etat").html('etat : valider');
    }

     if(data['etat']=='block')
     {
        $btn.parent().find(".block").attr('etat',"deblock").html("deblock");
        $btn.parent().parent().find(".etat").html('etat : block');
     }

 if(data['etat']=='deblock')
     {
     $btn.parent().find(".block").attr('etat',"block").html("block");
     $btn.parent().parent().find(".etat").html('etat : deblock');
     }

     if(data['etat']=='invalid' || data['etat']=='delete' )
     {

        $btn.parent().parent().parent().parent().remove();
     }

}

       });
       $( "#delete").unbind( "click" );
    });


});

$(".item").click(function(){
    $(this).parent().find('.listitem').toggle('slow');
})
$('.clinscrireick').click(function(){

$('#inscrire').slideDown( "slow");
  });


  $(".send1").click(function(){
   $("#formagence").submit();

  })

  $("#buttonsend").click(function(){
    $("#formUser").submit();
  })

  $("#formagence").validate({
        rules: {

            email:{
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

           mobile:
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

        submitHandler: function(form) {


          agence=new FormData(form);

            for( var pair of agence.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);


             }

             $("#pills-home").removeClass('show active');
             $("#pills-profile").addClass('show active');


          }
    })
    $("#formUser").validate({
        rules: {

            email1:{
              required: true,
             email:true
           },
           password:
           {
              required:true,
              minlength: 2,
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

           mobile1:
           {
            required:true,
            minlength: 2,
           },


        },

        submitHandler: function(form) {

            $("#modifier").addClass('d-none');
         var use=new FormData(form);

            for( var pair of agence.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);

              use.append(pair[0],pair[1]);
             }
             $.ajax({

                url:$(form).attr('action'),
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

                 if(data['update']!=null)
                 {

                    $("#modifier").removeClass('d-none');
                 }


                 },

             error: function (err) {
                console.log(err);
            }

                    })

          }


    })

    $('.infoD').click(function(){
    $(this).parent().find(".listitem").toggle( "slow" );
})
</script>

@endsection
