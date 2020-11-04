@extends('layout_agence.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">{{ __('réinitialiser le mot de passe') }}</div>

                <div class="card-body">
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


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="oldpassword" class="col-md-4 col-form-label text-md-right">Ancien mot de passe</label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="new-password">

                                @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordconfirm" class="col-md-4 col-form-label text-md-right">{{ __('confirmè mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="passwordconfirm" type="password" class="form-control" name="passwordconfirm" required autocomplete="new-password">
                                <span class="invalid-feedback" role="alert">
                                    <strong>Mot de passe ne pas correcte</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="rest" type="button" class="btn btn-outline-warning  rounded-pill">
                                    {{ __('modifier') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

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

</script>
@endsection
