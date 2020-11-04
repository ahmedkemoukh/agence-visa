
 @extends('layout_agence.app')
  @section('content')

  <!-- Page content holder -->


    <!-- MultiStep Form -->
<div class="container-fluid mt-2 pt-2 m-1" id="grad1">
    <div class="col-12 d-flex justify-content-between">
        <div class=""><h2 class="font-weight-normal">La Liste Des Dossiers
        </h2></div>
        <div class="">
        <form class="form-inline "  action='/listDossier/dossier_recharche' method="GET">
            <input class="form-control " type="search" name='search' placeholder="rechercher"
            aria-label="Search" required>
            <button class="btn mx-2 btn-outline-warning" type="submit"><i class="fa fa-search fa-6" aria-hidden="true"></i> </button>
          </form>
        </div>
    </div>
        @foreach ($data as $item)
<div class="d-flex flex-column bg-white mt-3 position-relative ">
        <div class="d-flex justify-content-between  m-2 collapsible-header ">
            <div class="col-4">
                <ul class="list-unstyled">
                    <li class="h4">{{$item->voyageur()[0]->nomeV}} {{$item->voyageur()[0]->prenomeV}} </li>
                    <li class=" h6 lead ml-2">Ref : {{$item->id}}</li>
                    <li class=" h6 lead ml-2">{{$item->created_at}}</li>
                      <ul>
                </div>
            <div class="align-self-center text-center col-4"><span class=" rounded-lg p-1  @if($item->status=='rejeter') badge-danger @elseif($item->status=='en cour')badge-info @else badge-success  @endif">{{$item->status}}</span></div>
            <div class="mx-2 col-4 text-right"> <ul class="list-unstyled">
                <li class="h5">{{$item->payeV}} {{$item->visa()[0]->typevisa}}</li>
                <li class="ml-2 text-right text-success">{{$item->visa()[0]->tarifv}} DA</li>

                  <ul></div>


        </div>
 <div style="display:none" class="collapsible-body">
        <div class="d-flex justify-content-around  m-2" >
            <div>
                <ul class="list-unstyled">
                    <li class="h3 font-weight-bold">{{$item->voyageur()[0]->nomeV}} {{$item->voyageur()[0]->prenomeV}} </li>
                    <li class="ml-2 mb-5 font-weight-bold">Numéro de passeport
                        : {{$item->voyageur()[0]->numeroV}}</li>
                    <li class="ml-2 lead mb-3">Type de document :
                        {{$item->voyageur()[0]->documentV}}
                    </li>

                    <li class="ml-2">Date d'expiration :
                        {{$item->voyageur()[0]->dateEV}}
                    </li>

                    <li class="ml-2">Date et lieu de naissance :
                        {{$item->voyageur()[0]->dateNV}} - {{$item->voyageur()[0]->lieuNV}}
                    </li>

                <li class="ml-2">Adresse :
                    {{$item->voyageur()[0]->adressV}}
                </li>
            </ul>

                </div>
            <div class="align-self-center">
                <ul class="list-unstyled">
                    @if($item->status=='accorder')
                <li><button type="button" class="btn rounded-pill btn_action btn-outline-warning" url="/{{$item->id}}/evisa">imprimer</button></li>
                @endif

               <li><button type="button" class="btn rounded-pill mt-2 btn_action btn-outline-warning" url="/listDemand/{{$item->id}}">plus de détaille</button></li>
               <li><button type="button" class="btn rounded-pill mt-2 deletedossier btn-outline-danger" url="/listDemand/{{$item->id}}">suprimer dossier</button></li>
            </ul>
        </div>
        </div>
    </div>

    <i class="fas fa-chevron-circle-down text-warning infoD"></i></i>
</div>
@endforeach
<div class="h-25"></div>
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
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MultiStep Form -->

  <!-- End demo content -->

  <script src={{asset("jsagence/listvisademand.js")}}></script>
  @endsection
