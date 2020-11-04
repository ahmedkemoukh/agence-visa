
@extends('layout_agence.app')
@section('content')

  <!-- Page content holder -->


    <!-- MultiStep Form -->
<div class="container-fluid mt-2 m-1" id="grad1">
    <div class="row justify-content-center ">
        <div class="col-11 text-center p-0  mb-2">
            <div class="card  px-0 pt-4 pb-0  mb-3">
                <label class="display-4 h6 mb-2">Créez Nouveau Compte Agence Cliente</label>

                  <div class="alert  alert-success @if(!old('email')) d-none @endif alert-dismissible fade show" role="alert">
                    <strong> {{ old('name') }} {{ old('prenome') }}  </strong> ajouter avec success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form  method="POST" action="/user" >
                    @csrf
            <div class="form-row ml-5 col-10">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>

                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="inputEmail4" value="{{ old('email') }}" required placeholder="Ex:utilisateur@gmail.com">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Mot De Passe</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" minlength="4" id="inputPassword4" required placeholder="****">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            </div>
            <div class="form-row ml-5 col-10">
            <div class="form-group col-6">
              <label for="inputAddress">Nom</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputAddress" placeholder="Ex: Nom" required>
            </div>
            <div class="form-group col-6">
              <label for="inputAddress2">Prénom</label>
              <input type="text" name="prenome" value="{{ old('prenome') }}" class="form-control" id="inputAddress2" placeholder="Ex: Prénom" required>
            </div>
            </div>
              <div class="form-group col-md-6 ml-5">
                <label for="inputCity">mobile</label>
                <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" id="inputCity" required placeholder="Ex: 06595959">
              </div>
              <div class="form-group col-12 text-center">
              <button type="submit" class=" btn btn-outline-warning  rounded-pill">ajouter</button>
              </div>
            </form>

            </div>
        </div>
    </div>
</div>


  </div>

    <!-- MultiStep Form -->

  <!-- End demo content -->


  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="save" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  @endsection
