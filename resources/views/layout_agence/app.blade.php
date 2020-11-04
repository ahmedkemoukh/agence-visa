<!DOCTYPE html>
<html>
<head>

          <script src="{{ asset("js/jquery.min.js")}}"></script>
          <script src="{{ asset("js/jquery.validate.min.js")}}"></script>
          <script src="{{ asset("js/bootstrap.min1.js")}}" ></script>
          <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css")}}" >
          <link rel="stylesheet" href="{{ asset("css/all.css")}}" >
          <link rel="stylesheet" href="{{ asset("css/fontawesome.min.css")}}" >




          <link rel="stylesheet" href="{{ asset("cssagence/main.css")}}">
          @yield('css')

</head>

<body>



<!-- Vertical navbar -->
<div class="vertical-nav bg-white d-print-none overflow-auto" id="sidebar">
    <div class=" mb-3 position-relative p-3 bg-light">
        <div class="media  d-flex align-items-center">



                <img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 bg-warning rounded-circle border border-warning img-thumbnail shadow-sm">


            <div class="media-body mb-2 p-0">

              <h4 class="m-0">{{Auth::user()->agence()[0]->nome}}</h4>
              <p class="font-weight-light text-muted mb-0">{{Auth::user()->name}} {{Auth::user()->prenome}}</p>

          </div>



        </div>
        <i class="fas fa-chevron-circle-down text-warning menu"></i></i>

      </div>

      <ul class="list-group listU mb-1 p-0 " style="display: none">
        <li class="list-group-item border-0 text-center h6">
             @if(Auth::user()->type==1)
            <i class="fas mr-2 fa-crown text-warning"></i>Administrateur
            @else

            <i class="far fa-user h5 text-warning mr-2"></i>Agence Cliente
          @endif
        </li>

          <li class="list-group-item border-0"><i class="fa fa-user text-warning fa-6" aria-hidden="true"></i><a href="/agence/1" class="@if(Auth::user()->etat!='valider')disabled @else text-dark @endif"> profile</a></li>

          <li class="list-group-item border-0">    <i class="fas text-warning fa-sign-out-alt"></i></i>
              <a  href="{{ route('logout') }}" class="text-dark"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               Déconnecter
           </a></li>




        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-2 mb-0">PRINCIPE</p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="/tablau" class="nav-link text-dark font-italic bg-light">
                  <i class="fa fa-th-large mr-3 text-warning fa-fw"></i>
                  TABLEAU DE BORD
              </a>
      </li>
      @if(Auth::user()->type==1)
      <li class="nav-item">
        <a href="/user" class="@if(Auth::user()->etat!='valider'  && Auth::user()->etat!='deblock')disabled @else text-dark @endif nav-link  font-italic ">
            <i class=" mr-3 fa fa-user-plus text-warning fa-6" aria-hidden="true"></i>
                  Ajouter Agence cliente
              </a>
      </li>
@endif
    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-2 mb-0">DEMANDE E VISA</p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="/demande" class="nav-link @if(Auth::user()->etat!='valider' && Auth::user()->etat!='deblock')disabled @else text-dark @endif  font-italic">
            <i class=" mr-3 fa fa-user-plus text-warning fa-6" aria-hidden="true"></i>
                  Ajouter voyageur
              </a>
      </li>
      @if(Auth::user()->type==1)
      <li class="nav-item">
        <a href="/agence/ajouterAgence" class="nav-link @if(Auth::user()->etat!='valider'  && Auth::user()->etat!='deblock')disabled @else text-dark @endif  font-italic">
            <i class=" mr-3 far fa-building text-warning fa-6" aria-hidden="true"></i>
                  Ajouter agence
              </a>
      </li>
      @endif
      <li class="nav-item">
        <a href="/listDemand" class="nav-link @if(Auth::user()->etat!='demande')text-dark @else disabled @endif  font-italic">
            <i class="mr-3 fa fa-list fa-6 text-warning" aria-hidden="true"></i>
                  La liste des demandes
              </a>
      </li>

    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-2 mb-0"> PARAMETRES </p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="/listagence" class="nav-link @if(Auth::user()->etat!='valider'  && Auth::user()->etat!='deblock')disabled @else text-dark @endif  font-italic">
            <i class="mr-3 fa fa-list fa-6 text-warning" aria-hidden="true"></i>
                La liste des  Agences
              </a>
      </li>
      <li class="nav-item">
        <a href="/distination" class="nav-link @if(Auth::user()->etat!='demande')text-dark @else disabled @endif  font-italic">
            <i class="mr-3 fa fa-plane fa-6 text-warning" aria-hidden="true"></i>
                  Déstination
              </a>
      </li>

      <li class="nav-item">
        <a href="/visa/promotion" class="nav-link @if(Auth::user()->etat!='demande')text-dark @else disabled @endif  font-italic">
            <i class="mr-3 fa fa-bullhorn fa-6 text-warning" aria-hidden="true"></i>
                  Promotion
              </a>
      </li>

    </ul>


    <p class="text-gray font-weight-bold text-uppercase px-3 small py-2 mb-0"> DOSSIERS </p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="/listDossier" class="nav-link @if(Auth::user()->etat!='demande')text-dark @else disabled @endif  font-italic">
            <i class="mr-3 fa fa-list fa-6 text-warning" aria-hidden="true"></i>
                  La liste des dossiers
              </a>
      </li>


    </ul>


    <p class="text-gray font-weight-bold text-uppercase px-3 small py-2 mb-0"> E VISA </p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="/visa" class="nav-link @if(Auth::user()->etat!='demande')text-dark @else disabled @endif  font-italic">
            <i class="mr-3 fa fa-list fa-6 text-warning" aria-hidden="true"></i>
                  Liste E visa
              </a>
      </li>
      <p class="text-gray font-weight-bold text-uppercase px-3 small py-2 mb-0">  VOL </p>
      <p class="text-gray font-weight-bold text-uppercase px-3 small py-1 mb-0">  HOTEL	</p>
      <p class="text-gray font-weight-bold text-uppercase px-3 small py-1 mb-0"> TRANSFERT </p>




    </ul>

<div class="h-25"></div>


  </div>

  <div class="pl-2 page-content container-fluid" id="content">
    <!-- Toggle button -->

    <div class="container-fluid p-0 d-print-none position-relative ">
        <nav class=" flex-row-reverse navbar navbar-light bg-white">

            <a class="navbar-brand" href="index.html">
            <span class="lead">{{Auth::user()->agence()[0]->sold}}.00</span>
                <img src={{asset('img/img/logo.png')}} alt="">
             <span
                   class="text-white text-warning"> <strong> BOUCHELLIA </strong>
                   </span>
                     <span class="text-white text-dark"> <strong> TRAVEL </strong>
                        </span>
                </a>
          </nav>
          <button id="sidebarCollapse" type="button" class="btn-togle btn btn-light bg-white rounded-lg shadow-sm"><i class="fa text-warning fa-bars"></i></button>
        </div>
  @yield('content')
  <script src={{asset("jsagence/jspdf.min.js")}}></script>
  <script src={{asset("jsagence/main.js")}}></script>
@yield('js')

</body>
</html>
