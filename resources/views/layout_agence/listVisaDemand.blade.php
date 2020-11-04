@extends('layout_agence.app')
@section('content')


    <!-- MultiStep Form -->
<div class="container-fluid mt-2 pt-2  bg-white" id="grad1">
    <div class="table-title ">
        <div class="d-flex justify-content-between">
            <div class=""><h2 class="font-weight-normal">La Liste Des Demandes</h2></div>

            <div class="">
            <form class="form-inline "  action="/listDemand/demand_recharche" method="GET">
                <input class="form-control " type="search" name='search' placeholder="rechercher" aria-label="Search" required>
                <button class="btn mx-2 btn-outline-warning" type="submit"><i class="fa fa-search fa-6" aria-hidden="true"></i></button>
              </form>
            </div>
        </div>
    </div>
                <table class="table bg-white">
                    <thead class="table bg-warning" >
                      <tr >
                        <th class=" text-center font-weight-bolder  " scope="col">TPR</th>
                        <th class=" text-center font-weight-bolder  " scope="col">DATE</th>
                        <th class=" text-center font-weight-bolder " scope="col">Agence</th>
                        <th class=" text-center font-weight-bolder  " scope="col">Destination</th>
                        <th class=" text-center font-weight-bolder  " scope="col">VISA</th>
                        <th class=" text-center font-weight-bolder  " scope="col">VOYAGEUR</th>
                        <th class=" text-center font-weight-bolder  " scope="col">TARIF</th>
                        <th class=" text-center font-weight-bolder  " scope="col">MODIFICATION</th>
                        <th class=" text-center font-weight-bolder  " scope="col">STATUS</th>
                        <th class=" text-center font-weight-bolder " scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
@foreach ($data as $item)
<tr class="text-center ">
    <td>{{$item->id}}</td>
    <td>{{$item->dateA}}</td>
       <td>{{$item->agence()[0]->nome}}</td>
        <td>{{$item->payeV}}</td>
        <td>{{$item->visa()[0]->typevisa}}</td>
        <td>{{$item->voyageur()[0]->nomeV}} {{$item->voyageur()[0]->prenomeV}}</td>
        <td>{{$item->visa()[0]->tarifv}}</td>
        <td>{{$item->updated_at}}</td>
        <td>{{$item->status}}</td>

        <th>
            <a class="btn_action mr-2" href=""  url='/demande/{{$item->id}}'> <i class="far fa-edit text-warning"></i></a>

            <a class="btn_action mr-2" href="" url="/listDemand/{{$item->id}}"><i class="fa text-warning fa-eye fa-6" aria-hidden="true"></i></a>
            <a class="mr-2 btn_delete" href="" url="/listDemand/{{$item->id}}"> <i class="fas fa-trash-alt text-danger"></i></a>
        </th>
</tr>

@endforeach
                    </tbody>
                  </table>

            </div>
        </div>
    </div>


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
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src={{asset("jsagence/listvisademand.js")}}></script>
  @endsection

