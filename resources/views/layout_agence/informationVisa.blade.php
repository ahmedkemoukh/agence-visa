@extends('layout_agence.app')
  @section('content')


    <!-- MultiStep Form -->
<div class="container-fluid bg-white  mt-2 m-1" id="grad1">

                <div class="row justify-content-md-center">
                    <div class="col-6 w-100 text-center d-print-none text-center">

                                 <img src={{asset($visa->id.'/filedocument')}}  onerror="$(this).attr('src','{{ asset('img/a.png')}}')" style="height:300px" class="my-1 w-50 img-fluid">

                    </div>


                    <div class="col-11  position-relative ml-1 bg-white row " id="htmlpdf">

                        <img src={{asset($visa->id.'/filedocument')}}  onerror="$(this).attr('src','{{ asset('img/a.png')}}')" class="img-abs d-none d-print-block  img-fluid">
                    <h3 class=" text-center mt-5 w-100">status : {{$visa->status}}</h3>
                    <div class="col-12 text-center">
       <button id="pdf" class="btn  d-print-none rounded-pill btn-outline-warning">telecharger pdf</button>
                    </div>
       <h6 class=" text-center h4 mt-5 w-100">information voyageur</h6>
                        <div class="col-6 text-center">
                           <div class="form-group ">
                             <label class="font-weight-bold">Nom et Prénom : </label>
                           <label>{{$visa->voyageur()[0]->nomeV}} {{$visa->voyageur()[0]->prenomeV}}</label>
                           </div>
                           <div class="form-group mt-4">
                            <label class="font-weight-bold">Lieu de naissance : </label>
                          <label>{{$visa->voyageur()[0]->lieuNV}}</label>
                          </div>

                          <div class="form-group mt-4">
                            <label class="font-weight-bold">Numéro de passeport : </label>
                          <label>{{$visa->voyageur()[0]->numeroV}}</label>
                          </div>
                          <div class="form-group mt-4">
                            <label class="font-weight-bold"> Date d'expiration : </label>
                          <label>{{$visa->voyageur()[0]->dateEV}}</label>
                          </div>

                          <div class="form-group mt-4">
                            <label class="font-weight-bold"> Mobile du voyageur : </label>
                          <label>{{$visa->voyageur()[0]->mobileV}}</label>
                          </div>

                        </div>
                        <div class="col-6 text-center">
                            <div class="form-group ">
                                <label class="font-weight-bold">Date de naissance : </label>
                              <label>{{$visa->voyageur()[0]->dateNV}}</label>
                              </div>

                              <div class="form-group mt-4">
                                <label class="font-weight-bold">Type de document : </label>
                              <label>{{$visa->voyageur()[0]->documentV}}</label>
                              </div>

                              <div class="form-group mt-4">
                                <label class="font-weight-bold">Date de délivrance : </label>
                              <label>{{$visa->voyageur()[0]->dateDV}}</label>
                              </div>

                              <div class="form-group mt-4">
                                <label class="font-weight-bold">Adresse : </label>
                              <label>{{$visa->voyageur()[0]->adressV}}</label>
                              </div>

                              <div class="form-group mt-4">
                                <label class="font-weight-bold">Email : </label>
                              <label>{{$visa->voyageur()[0]->emailV}}</label>
                              </div>

                              <div class="form-group mt-4">
                                <label class="font-weight-bold">   nationalité : </label>
                              <label>{{$visa->nationalite}}</label>
                              </div>



                    </div>

                    <h6 class=" text-center h4  w-100">information visa</h6>


                    <div class="col-6 text-center">
                        <div class="form-group ">
                          <label class="font-weight-bold">paye : </label>
                        <label>{{$visa->payeV}}</label>
                        </div>
                        <div class="form-group mt-4">
                         <label class="font-weight-bold">type visa :</label>
                       <label>{{$visa->visa()[0]->typevisa}}</label>
                       </div>

                     </div>

                     <div class="col-6 text-center">
                        <div class="form-group ">
                          <label class="font-weight-bold">tarif : </label>
                        <label>{{$visa->visa()[0]->tarifv}}</label>
                        </div>
                        <div class="form-group mt-4">
                         <label class="font-weight-bold">date arrive:</label>
                       <label>{{$visa->dateA}}</label>
                       </div>

                     </div>
                     <label class="col-12 text-center d-print-none h4 mb-1">les fichers</label>
                     <table class="table m-2 d-print-none" id="FilesList">
                        <thead class="text-center">
                        <tr>
                            <th>
                              file
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">


                        @foreach ($visa->file() as $file )
                        <tr>
                            <td>{{str_replace($visa->id.'/',' ',$file->idFile)}}</td>
                        <td class="text-center">
                            <button class="btn rounded-pill  btn-outline-warning" url=>
                                <a href="/{{$file->idFile}}" class="text-dark"  target='blank' >imprimer</a></button>
                        </td>
                        </tr>



                        @endforeach
                    </tbody>
                     </table>

                     @if(Auth::user()->type==1 && $visa->status=='en cour')

                     <div class="d-print-none row mt-5">

                    <div class="col tagvalid  mt-5">
                    <form id="formvalid">
                    <div for="file">accepter le  demande</div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="evisa" name="evisa">
                        <label class="custom-file-label label m-1" for="evisa">ajouter evisa</label>
                         </div>
                         <div class="mt-2 text-center">
                         <button type="submit" class="btn btn-outline-warning">valider</button>
                         </div>
                    </form>
                    </div>
                    <div class="col tagvalid" >
                      <form id="formrefus">
                        <div class="form-group">
                            <label for="cause">refuser le demande</label>
                            <textarea class="form-control" id="cause" name="cause" rows="3" required></textarea>
                          </div>
                          <div class="text-center">
                          <button class="btn btn-danger" type='submit'>refuser</button>
                          </div>
                        </form>
                     </div>
                     <div class="col-12 h-50"></div>
                     </div>

                    @endif

                </div>

            </div>
        </div>
    </div>


  </div>
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- MultiStep Form -->

    @endsection
