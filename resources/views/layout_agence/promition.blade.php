@extends('layout_agence.app')
@section('css')
<link rel="stylesheet" href={{ asset("cssagence/visacss.css")}}>
@endsection
  <!-- End vertical navbar -->

  @section('content')


  <!-- Page content holder -->


    <!-- MultiStep Form -->
<div class="container-fluid row mt-2 " id="grad1">
        <div class="col-9 table-responsive">
            <div class="table-wrapper">
                <div class="table-title m-0">
                    <div class="d-flex justify-content-between">
                        <div class=""><h2 class="font-weight-normal">LA LISTE DE PROMOTION</h2></div>

                        <div class="">
                        <form class="form-inline "  action="/visa/promotion_recharche" method="GET">
                            <input class="form-control " type="search" name='search' placeholder="Rechercher" aria-label="Search" required>
                            <button class="btn btn-outline-warning mx-2" type="submit"><i class="fa fa-search fa-6" aria-hidden="true"></i></button>
                          </form>
                        </div>
                    </div>
                </div>
                <form id="form"  method="GET" enctype="multipart/form-data">

                    <div class="alert alert-success d-none">
                        Promotion ajouté avec succès
                         </div>
                <table class="table">
                    <thead class="table bg-warning text-center" >
                        <tr class="">
                            <th>Paye</th>
                            <th>Type visa</th>
                            <th>Tarif visa</th>


                            <th class="text-center">PROMOTION</th>
                            <th>Jusqu'a</th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($data as $visa)


                        <tr id={{$visa->id}}>
                        <td name="payev">{{$visa->payev}}</td>
                            <td name="typeVisa">{{$visa->typevisa}}</td>
                            <td name="tarifv">{{$visa->tarifv}}</td>
                            <td name="tarifvn" type="number" class="promotion">{{$visa->tarifvn}}</td>
                            <td name="date" type="date" class="promotion">{{$visa->date}}</td>
                                <td>
                                    @if(Auth::user()->type==1 && (Auth::user()->etat=='valider' || Auth::user()->etat=='deblock' ))
                                    <a type="submit" class="add" title="Add" data-toggle="tooltip"><i class="fa fa-plus fa-6" aria-hidden="true"></i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="far fa-edit text-warning" aria-hidden="true"></i></a>

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
    <a class="delete" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt text-danger" aria-hidden="true"></i></i></a>
</div>
    <!-- MultiStep Form -->

  <!-- End demo content -->

  <script src={{asset("jsagence/promotion.js")}}></script>


  @endsection
