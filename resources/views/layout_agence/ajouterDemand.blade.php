
  <!-- End vertical navbar -->
  @extends('layout_agence.app')
  @section('content')
  <!-- Page content holder -->


    <!-- MultiStep Form -->
<div class="container-fluid mt-2 m-1" id="grad1">
    <div class="row justify-content-center ">
        <div class="col-12 text-center  p-0   mb-2">
            <div class="card px-0 pt-4 pb-0  mb-3">
                <label class=" h3  mb-2">Demande Evisa</label>
                <label class="lead mb-2">Veuillez noter que les renseignements que vous fournissez doivent correspondre à l'information figurant sur votre passeport.</label>

                <div class="row">
                    <div class="col-md-12 mx-0" id="msform">


                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><label class=" h6 text-muted">Nouvelle Demande</label></li>
                                <li id="personal"><label class=" h6 text-muted">Voyageurs</label></li>
                                <li id="payment"><label class=" h6 text-muted">Fichier </label></li>
                                <li id="confirm"><label class=" h6 text-muted">Terminer</label></li>
                            </ul> <!-- fieldsets -->

                            <fieldset >
                                <form id="agenceform"  action="">


                                <div class="form-card form1 text-dark">

                                    <div class="d-flex justify-content-center">
                                    <h2 class="fs-title h4 ">Tarif Visa</h2>

                                </div>
                                <div class="d-flex justify-content-center">
                                    <h2 class="text-success h6" id="tarif"> 0.00 DA</h2>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <h2 class="fs-title text-success h4" id="tarifn"></h2>
                                </div>
                                    <div class="information">
                                    <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <label for="inputAddress">Nationalité <label class="text-danger h5">*</label></label>
                                        <input class="form-control" id="inputEmail" name="nationalite" placeholder="Algérien"
                                    @if(isset($demand))value='{{$demand->nationalite}}' @endif>
                                    <label id="inputEmail-error1" class="error1 text-danger" for="inputEmail" style="display: none" >Email exist déja</label>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="inputAddress">Pays de déstination <label class="text-danger h5">*</label></label>
                                        <input type="text" class="form-control" list="listItem" id="payev" name="payeV" placeholder="EX:Dubai"
                                        @if(isset($demand))value='{{$demand->payeV}}'@endif/>
                                        <datalist id="listItem">

                                        </datalist>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">type de visa <label class="text-danger h5">*</label></label>
                                            <select class="form-control" name="typeVisa" id="typeVisa" >
                                            @if(isset($demand))<option value="{{$demand->visa()[0]->id}}">{{$demand->visa()[0]->typevisa}}</option>@endif
                                              </select>
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label for="inputAddress">Date d'arrivée <label class="text-danger h5">*</label></label>
                                            <input type="date" class="form-control" id="inputArrive" name="dateA"
                                            @if(isset($demand))value='{{$demand->dateA}}'@endif>
                                          </div>
                                        </div>
                                        <div class="text-center form-group col-md-12">

                                            </div>

                                </div>
                                </div>
                                </form>
                                <button type="button" name="next" class="next btn-outline-warning btn rounded-pill" value="suivant" >suivant</button>

                            </fieldset>
                            <fieldset class="">
                                <form id="voyageurform" method="POST" @if (isset($demand))  action="/demande/{{$demand->id}}"   @else action="{{ route('demande.store') }}"@endif>
                                    @csrf
                                <div class="form-card text-dark">
                                    <h2 class="fs-title text-center">VOYAGEUR</h2>
                                    <div class="form-group">
                                        <label for="inputAddress"><em>voyageur exist</em></label>
                                        <input type="text" class="form-control" id="inputVisa" placeholder="id voyageur">
                                      </div>

                                    <div class="information">
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress"><em>Nom </em> <label class="text-danger h5">*</label></label>
                                      <input type="text" class="form-control" name="nomeV" id="inputNom" placeholder="Nom"
                                      @if(isset($demand))value='{{$demand->voyageur()[0]->nomeV}}'@endif>

                                          </div>
                                          <div class="form-group col-md-6">
                                            <label for="inputAddress"><em>Prénom </em><label class="text-danger h5">*</label></label>
                                            <input type="text" class="form-control" name="prenomeV" id="inputprenom" placeholder="Prénom"
                                            @if(isset($demand))value='{{$demand->voyageur()[0]->prenomeV}}'@endif>
                                          </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress"><em>Date de Naissance</em></label>
                                                <input type="date" class="form-control" name="dateNV" id="inputnaissance"
                                                @if(isset($demand))value='{{$demand->voyageur()[0]->dateNV}}'@endif>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label for="inputAddress"><em>Lieu De Naissance</em></label>
                                                <input type="text" class="form-control" name="lieuNV" id="inputArrive" placeholder="EX:Alger"
                                                @if(isset($demand))value='{{$demand->voyageur()[0]->lieuNV}}'@endif>
                                              </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="inputAddress"><em>Documents De Voyage</em></label>
                                                <input type="text" class="form-control" id="inputnaissance" name="documentV" placeholder="Passeport Ordinaire"
                                                @if(isset($demand))value='{{$demand->voyageur()[0]->documentV}}'@endif>
                                              </div>
                                              <div class="form-group ">
                                                <label for="inputAddress"><em>Numéro De Passeport</em></label>
                                                <input type="text" class="form-control" id="inputnaissance" name="numeroV" placeholder="Numéro De Passeport"
                                                @if(isset($demand))value='{{$demand->voyageur()[0]->numeroV}}'@endif>
                                              </div>

                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress"><em>Date de délivrance</em></label>
                                                    <input type="date" class="form-control" id="inputnaissance" name="dateDV" placeholder="1234 Main St"
                                                    @if(isset($demand))value='{{$demand->voyageur()[0]->dateDV}}'@endif>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                    <label for="inputAddress"><em>Date de d'expiration</em></label>
                                                    <input type="date" class="form-control" id="inputArrive" name="dateEV" placeholder="1234 Main St"
                                                    @if(isset($demand))value='{{$demand->voyageur()[0]->dateEV}}'@endif>
                                                  </div>

                                                </div>
                                                <div class="form-group ">
                                                    <label for="inputAddress"><em>Adresse</em></label>
                                                    <input type="text" class="form-control" id="inputnaissance" name="adressV" placeholder="Adresse"
                                                    @if(isset($demand))value='{{$demand->voyageur()[0]->adressV}}'@endif>
                                                  </div>

                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress"><em>Email De Voyageur</em></label>
                                                        <input  class="form-control" id="inputnaissance" name="emailV" placeholder="voyageur@gmail.com"
                                                        @if(isset($demand))value='{{$demand->voyageur()[0]->emailV}}'@endif>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label for="inputAddress"><em>Mobile De Voyageur <label class="text-danger h5">*</label></em></label>
                                                        <input type="text" class="form-control" id="inputArrive" name="mobileV" placeholder="0659393756"
                                                        @if(isset($demand))value='{{$demand->voyageur()[0]->mobileV}}'@endif>
                                                      </div>

                                                        <div class=" text-center d-flex justify-content-center col-12">

                                                      <div class="form-group col-md-6   text-center">



                                                            <input type="file" class="custom-file-input" id="file" name="filedocument">
                                                            <label class="custom-file-label m-1  label" for="file"><em>Document</em></label>


                                                        <img   @if(isset($demand)) src={{asset($demand->id.'/filedocument')}}  @endif class="img-fluid img mt-2">

                                                      </div>
                                                        </div>
                                                    </div>






                                </div>
                                </div>

                                </form>

                                <button type="button"  class=" previous btn rounded-pill btn-outline-secondary action-button-previous"  ><li class="fa text-black fa-chevron-left  fa-5 mr-1 text-warning"></li>précédent</button>
                                <button type="text"  id="btn_action" class=" ml-5 h-6 btn-outline-warning next btn rounded-pill  " >enregistrer</button>

                            </fieldset>
                            <fieldset >
                                <div class="form-card form1 text-dark">
                                <h3 class="mt-5 fs-title text-center">Fichiers De Voyageur</h3>
    <div class="row">
        <div class="col-sm-12">
          <div class="col-12 text-right">
          <input type="file" class="custom-file-input" id="fileInput" name='file[]' multiple>
          <label class="btn p-1 btn-outline-warning text-dark" for="fileInput" ><em><label CLASS="text-success pt-1"><i class="fa fa-plus mr-2 fa-6" aria-hidden="true"></i></label>Ajouter Fichier </em></label>
</div>
            <table class="table" id="FilesList">
                <thead>
                <tr>
                    <th>
                        fichier
                    </th>
                    <th class="text-center">
                        Action
                    </th>



                </tr>
            </thead>
            <tbody>
                @if(isset($demand))
                @foreach ($demand->file() as $file )
                @if(str_replace($demand->id.'/','',$file->idFile)!="filedocument")
                <tr>

                    <td>{{str_replace($demand->id.'/',' ',$file->idFile)}}</td>
                <td class="text-center"><button class=" delete btn-outline-danger btn rounded-pill " url="/fileupload/{{$file->id}}">supprimer</button>
                    <button class="mr-2 btn-outline-warning  btn rounded-pill" url=>
                        <a href="/{{$file->idFile}}" class="text-decoration-none text-secondary"  target='blank' >ouvrir</a></button>
                </td>
                </tr>
                 @endif
                @endforeach
                @endif
            </tbody>
            </table>
            <meta name="csrf-token" content="{{ csrf_token() }}">

        </div>
    </div>
</div>
  <button type="button"  class=" previous btn rounded-pill btn-outline-secondary action-button-previous"  ><li class="fa text-black fa-chevron-left  fa-5 mr-1 text-warning"></li>précédent</button>
  <button type="text"  id="btn_action" class=" ml-5 h-6 btn-outline-warning next btn rounded-pill  " >enregistrer</button>

</fieldset>
                            <fieldset>
                                <div class="row justify-content-md-center">
                                    <div class="col-12" id="layout_file">

                                    </div>
                                    <div class="col-11 text-left">
                                        <div id='information'   class="p-2"></div>

                                        <label class="col-12 text-center lead mb-2">les fichers</label>
                                        <div id="inFile" class="mb-5">


                                        </div>
                                    </div>
                                </div>
                                <button type="button"  class=" previous btn rounded-pill btn-outline-secondary action-button-previous"  ><li class="fa text-black fa-chevron-left  fa-5 mr-1 text-warning"></li>précédent</button>

                                  <button type="text"  id="btn_action"  data-toggle="modal"  data-target="#exampleModalCenter"
                                  class=" ml-5 h-6 btn-outline-warning  btn rounded-pill  " >demande</button>
                            </fieldset>




                    </div>
                </div>
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
          <h5 class="modal-title" id="exampleModalLongTitle">confirmer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        confirmer le demande
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="button" id="save" class="btn btn-warning">Envoyer</button>
        </div>
      </div>
    </div>
  </div>

  @endsection
