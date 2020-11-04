
  @extends('layout_agence.app')
  @section('css')
  <link rel="stylesheet" href={{ asset("css/main.css")}}>
  @endsection
    <!-- End vertical navbar -->


    @section('content')
    <section class="inscrire d-block mb-5" id="inscrire">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row justify-content-sm-center  p-5">




                    <div class="col-6 wizard-header text-center ">
                        <h3 class="heading ">coordonnées D'agence</h3>
                        <p>Veuillez saisir vos informations de agence et passez à l'étape suivante afin que nous puissions créer vos comptes.  </p>

                    </div>
                    <div class="w-100"></div>

                <div class="col-12 col-md-12">


                    <form id='formagence'>




                    <div class="form-group">
                      <label for="inputAddress" class="heading">Nom d'agence</label>
                      <input type="text" name="nome" class="form-control" id="inputname" placeholder="Ex:Agence Travel">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Adresse </label>
                      <input type="text" name="addresse" class="form-control" id="inputAddress" placeholder="Ex:17 Rue nationnal">
                    </div>


                        <div class="form-group">
                          <label for="inputEmail4">Email d'agence</label>
                          <input type="email" name="email1" class="form-control" id="inputEmail4" placeholder="Ex:agence@email.com">
                          <label id="inputEmail" class="error1 text-danger" for="inputEmail" style="display: none" >Email exist déja</label>
                        </div>


                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">ville*</label>
                        <input type="text" name="ville" class="form-control" id="inputvill" placeholder="Ex:alger">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputCity">Code postale* </label>
                        <input type="text" name="codPosta" class="form-control" id="codepostale" placeholder="Ex:160000">
                      </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputCity">Mobile*</label>
                          <input type="text" name="mobile1" class="form-control" id="mobile" placeholder="Ex:0659393756">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputCity">Télephone* </label>
                          <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Ex:031478369">
                        </div>

                      </div>


                    </form>
                </div>
                </div>


            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row justify-content-sm-center  p-5">
                    <div class="col-6 wizard-header text-center ">
                        <h3 class="heading">Les Informations personnelles</h3>

                        <p>Vérifiez les informations bien avant l'envoi</p>
                    </div>
                    <div class="w-100"></div>

                  <div class="alert alert-success d-none" >
                   ajouter agence avec success .
                     </div>
                    <div class="col-12">

                            <form  id="formUser">
                                @csrf
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input id="inputEmail1" type="email" name="email" class="form-control" id="inputEmail4" placeholder="Ex:nom@email.com">
                            <span  class="error1 text-danger invalid-feedback" for="inputEmail" >Email exist déja</span>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Mot De Passe</label>
                            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="*****">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputAddress">Nom</label>
                          <input type="text" name="name" class="form-control" id="inputAddress" placeholder="Ex:Ali">
                        </div>
                        <div class="form-group">
                          <label for="inputAddress2">Prénom</label>
                          <input type="text" name="prenome" class="form-control" id="inputAddress2" placeholder="Ex:pMouhamed">
                        </div>

                          <div class="form-group col-md-6">
                            <label for="inputCity">mobile</label>
                            <input type="text" name="mobile" class="form-control" id="inputCity" placeholder="Ex:0659393756">
                          </div>





                        </form>

                    </div>

            </div>
          </div>




          </div>


          <div class="d-flex justify-content-center">
          <ul class=" ml-5 nav nav-pills mb-3 center" id="pills-tab" role="tablist">
            <li class="nav-item  mx-2" role="presentation">
              <a class="nav-link  active Previous btn btn-outline-warning" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Précedent</a>
            </li>
            <li class="nav-item" role="presentation">
              <button class="  nav-link send send1 btn btn  btn-outline-warning" data-toggle="pill1"  role="tab" aria-controls="pills-profile" aria-selected="false">suivant</button>
              <button id="buttonsend" class="nav-link active send  btn  btn-outline-warning " type="button">Ajouter<span class=" "></span></button>
            </li>

          </ul>
        </div>


    </section>


@section('js')
<script src={{asset("jsagence/ajouteragence.js")}}></script>
@endsection
    @endsection
