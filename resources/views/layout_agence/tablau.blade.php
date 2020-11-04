@extends('layout_agence.app')
  @section('content')
  <!-- End vertical navbar -->


  <!-- Page content holder -->


    <!-- MultiStep Form -->
<div class="container-fluid m-0 p-0 row mt-2" id="grad1">

    <div class="row col-12 m-0 p-0">

<div class="col-9 row">



@if(Auth::user()->etat=='demande' || Auth::user()->etat=='block')

    <div class="alert text-center col-12 mt-4 alert-warning" >
     etat de compte est : {{Auth::user()->etat}}
         </div>
        @endif

        <div class="col-6">
            <div class="card " >
                <div class="card-header p-4">
                    Cours officiel
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">128.6929 <br><span class="text-muted">Cours Achat</span></span>
                        <span class="">1 USD</span>
                        <span class="font-weight-bold">128.7079 <br><span class="text-muted">Cours Vente</span></span>
                      </li>


                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">152.0893<br><span class="text-muted">Cours Achat</span></span>
                        <span class="">1 EURO</span>
                        <span class="font-weight-bold">152.1327 <br><span class="text-muted">Cours Vente</span></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">167.4381 <br><span class="text-muted">Cours Achat</span></span>
                        <span class="">1 GBP</span>
                        <span class="font-weight-bold">167.5012 <br><span class="text-muted">Cours Vente</span></span>
                      </li>
                      <li class="list-group-item text-muted">Mise à jour : 10 Septembre 2020</li>
                </ul>
              </div>
          </div>
          <div class="col-6">
            <div class="card " >
                <div class="card-header p-4">
                    Cours parallèle
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">163,00 DA <br><span class="text-muted">Cours Achat</span></span>
                        <span class="">1 USD</span>
                        <span class="font-weight-bold">165,00 DA <br><span class="text-muted">Cours Vente</span></span>
                      </li>


                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">195,00 DA<br><span class="text-muted">Cours Achat</span></span>
                        <span class="">1 EURO</span>
                        <span class="font-weight-bold">197.00 DA <br><span class="text-muted">Cours Vente</span></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">212,00 DA <br><span class="text-muted">Cours Achat</span></span>
                        <span class="">1 GBP</span>
                        <span class="font-weight-bold">214,00 DA<br><span class="text-muted">Cours Vente</span></span>
                      </li>
                      <li class="list-group-item text-muted">Mise à jour : 10 Septembre 2020</li>
                </ul>
              </div>
          </div>



          <div class="card-deck mt-2 col-12">
            <div class="card bg-dark w-25 text-white">
                <img src="img/g1.jpg" class="img-fluid" alt="...">
                <div class="card-img-overlay">
                    <label class="card-title font-weight-bold text-warning  h1">Japan</label>
                    <label class="card-title font-weight-bold text-white h4">15 Départs</label>
                </div>
              </div>

              <div class="card bg-dark w-25 text-white">
                <img src="img/g2.jpg" class="img-fluid" alt="...">
                <div class="card-img-overlay">
                  <label class="card-title font-weight-bold text-warning  h2">australia</label>
                  <label class="card-title font-weight-bold text-white h4">3 Départs</label>

                </div>
              </div>

              <div class="card bg-dark w-25 text-white">
                <img src="img/g3.jpg" class="img-fluid" alt="...">
                <div class="card-img-overlay">
                    <label class="card-title font-weight-bold text-warning h1">paris</label>
                    <label class="card-title font-weight-bold text-white h4">30 Départs</label>

                </div>
              </div>


              <div class="card bg-dark w-25 text-white">
                <img src="img/g4.jpg" class="img-fluid" alt="...">
                <div class="card-img-overlay">
                    <label class="card-title font-weight-bold text-warning h1">london</label>
                    <label class="card-title font-weight-bold text-white h4">30 Départs</label>

                </div>
              </div>




          </div>


          <div class="card my-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img/g2.jpg" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h2 class="card-title text-warning">australia</h2>
                  <p class="card-text">Difficile d'organiser votre voyage en Turquie
                      sans savoir à quoi vous attendre ? Vous vous demandez quels sont les lieux à visiter en priorité, quelles sont les formalités d'entrée, quel budget prévoir pour l'hébergement, la nourriture, les visites et les transports ? Pas de panique, les équipes Caravane2.com ont rédigé, pour vous, un guide pratique Turquie pour vous aider dans vos préparatifs. Savez-vous par exemple que la monnaie nationale est la livre turque ? Qu’en tant qu’Européen, vous pouvez vous rendre en Turquie avec votre passeport et Visa. Vous apprendrez tout cela et aurez accès à bien d’autres informations pratiques,
                      conseils, et astuces dans notre guide pratique sur la Turquie.</p>

                </div>
              </div>
            </div>
          </div>



          <div class="card my-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img/g3.jpg" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h2 class="card-title text-warning">paris</h2>
                  <p class="card-text">Difficile d'organiser votre voyage en Turquie
                      sans savoir à quoi vous attendre ? Vous vous demandez quels sont les lieux à visiter en priorité, quelles sont les formalités d'entrée, quel budget prévoir pour l'hébergement, la nourriture, les visites et les transports ? Pas de panique, les équipes Caravane2.com ont rédigé, pour vous, un guide pratique Turquie pour vous aider dans vos préparatifs. Savez-vous par exemple que la monnaie nationale est la livre turque ? Qu’en tant qu’Européen, vous pouvez vous rendre en Turquie avec votre passeport et Visa. Vous apprendrez tout cela et aurez accès à bien d’autres informations pratiques,
                      conseils, et astuces dans notre guide pratique sur la Turquie.</p>

                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2 bg-white mb-5 mx-2 pb-5">
              <span class=" col-12 font-weight-bold text-center mt-2">ACCORDÉ</span>
              <span class=" col-12 text-warning text-center display-1">60.7%</span>
              <div class="p-5 col-12">
              <div class="progress p-0 col-12 " style="height: 20px;">
                <div class="progress-bar   bg-warning" role="progressbar" style="width: 60.7%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              </div>
              <div class="d-flex justify-content-around col-12">

                <div><span  class="font-weight-bold" >toute les demande</span><br><span class="ml-5">15</span></div>
                <div><span  class="font-weight-bold">En attande</span><br><span class="ml-4">14</span></div>
                <div><span  class="font-weight-bold">En cours</span><br><span class="ml-4">5</span></div>
                <div><span  class="font-weight-bold">Accordé</span><br><span class="ml-4">5</span></div>
                <div><span  class="font-weight-bold">rejetè</span><br><span class="ml-4">5</span></div>
                          </div>
          </div>


    </div>


    <div class="col-3 m-0 p-0 row">

        <div class="col-12 pub mt-5 m-0">
            <div id="carouselExampleControls" class="carousel slide m-0 p-0" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset("img/g3.jpg")}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset("img/g6.jpg")}}" class="d-block w-100" alt="...">
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

        <div class="col-12 pub m-0 ">
            <div id="carouselExampleControls" class="carousel slide m-0 p-0" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset("img/g1.jpg")}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset("img/al1.jpg")}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset("img/al.jpg")}}" class="d-block w-100" alt="...">
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

</div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">


  </div>

  <div id="action" class='d-none'>
    <a type="submit" class="add" title="Add" data-toggle="tooltip"><i class="fa fa-plus-square fa-6" aria-hidden="true"></i></a>
    <a class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil-square-o fa-6" aria-hidden="true"></i></a>
    <a class="delete" title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o fa-6" aria-hidden="true"></i></i></a>
</div>
    <!-- MultiStep Form -->

  <!-- End demo content -->
  @endsection
