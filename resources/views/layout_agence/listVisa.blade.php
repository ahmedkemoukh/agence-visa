@extends('layout_agence.app')
@section('css')
<link rel="stylesheet" href={{ asset("cssagence/visacss.css")}}>
@endsection
  <!-- End vertical navbar -->

  @section('content')

  <!-- Page content holder -->


    <!-- MultiStep Form -->
<div class="container-fluid row mt-2" id="grad1">
        <div class="col-9 table-responsive">
            <div class="table-wrapper">
                <div class="table-title m-0">
                    <div class="d-flex justify-content-between">
                        <div class=""><h2 class="font-weight-normal">La Liste Des Visas</h2></div>

                        <div class="">
                        <form class="form-inline "  action="/visa/visa_recharche" method="GET">
                            <input class="form-control " type="search" name='search' placeholder="rechercher" aria-label="Search" required>
                            <button class="btn mx-2 btn-outline-warning" type="submit"><i class="fa fa-search fa-6" aria-hidden="true"></i></button>
                          </form>
                        </div>
                    </div>
                </div>
                <form id="form"   method="GET" enctype="multipart/form-data">

                    <div class="alert alert-danger d-none">
                        paye n'est exist pas
                         </div>
                <table class="table">
                    <thead class="table bg-warning" >
                        <tr class="">
                            <th valign="middle">Paye</th>
                            <th>Type visa</th>
                            <th>Tarif visa</th>
                            <th>Disponibilite</th>
                            <th>Remboursable</th>
                            <th class="text-right">
                                @if(Auth::user()->type==1  && (Auth::user()->etat=='valider' || Auth::user()->etat=='deblock' ))
                                <div class="">
                                    <button type="button" class="btn p-1  btn-dark add-new"><i class="text-warning fa fa-plus"></i> </button>
                                </div>
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $visa)


                        <tr id={{$visa->id}}>
                        <td name="payev" type='text'>{{$visa->payev}}</td>
                            <td name="typevisa" type='text'>{{$visa->typevisa}}</td>
                            <td name="tarifv" type='number'>{{$visa->tarifv}}</td>

                            <td name="disponibilitev" type='select'>{{$visa->disponibilitev}}</td>
                            <td name="remboursablev" type='select'>{{$visa->remboursablev}}</td>

                                <td>
                                    @if(Auth::user()->type==1 && (Auth::user()->etat=='valider' || Auth::user()->etat=='deblock'))
                                    <a type="submit" class="add" title="Add" data-toggle="tooltip"><i class="fa fa-plus fa-6" aria-hidden="true"></i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="far fa-edit text-warning" aria-hidden="true"></i></a>
                                    <a class="deletev" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt text-danger" aria-hidden="true"></i></a>
                                    @endif
                                </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>
                </form>
            </div>
        </div>


        <div class="col-3 pub">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset("img/al.jpg")}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset("img/al1.jpg")}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset("img/al2.jpg")}}" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">


  </div>

  <div id="action" class='d-none'>
    <a type="submit" class="add" title="Add" data-toggle="tooltip"><i class="fa fa-plus fa-6" aria-hidden="true"></i></a>
    <a class="edit" title="Edit" data-toggle="tooltip"><i class="far fa-edit text-warning" aria-hidden="true"></i></a>
    <a class="deletev" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt text-danger" aria-hidden="true"></i></i></a>
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
            voulez-vous vraiment supprimer l'élément sélectionné
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

  <script src={{asset("jsagence/visajs.js")}}></script>

  @endsection
