<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
          <link rel="stylesheet" href="{{ asset("cssagence/main.css")}}">

</head>
<body>



<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
        <div class="media-body">
          <h4 class="m-0">agence</h4>
          <p class="font-weight-light text-muted mb-0">agence de voyage</p>
        </div>
      </div>
    </div>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic bg-light">
                  <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                  List agence
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                  Liste des distinations
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                  liste evisa
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                  listes des promotions
              </a>
      </li>
    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="/tablau" class="nav-link text-dark font-italic">
                  <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                  mes demandes
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                  tableau de bord
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
                  recherche par dossier
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
                  Line charts
              </a>
      </li>
    </ul>
  </div>
  <!-- End vertical navbar -->


  <!-- Page content holder -->
  <div class="page-content container-fluid" id="content">
    <!-- Toggle button -->
    <div class="headimage "></div>
    <div class="container-fluid generic-banner  position-relative mb-0">
      <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
          <div class="generic-banner-content">
            <h2 class="text-white">The Elements Page</h2>
            <p class="text-white">It won’t be a bigger problem to find one video game lover in your <br> neighbor. Since the introduction of Virtual Game.</p>
          </div>
        </div>
      </div>
      <button id="sidebarCollapse" type="button" class="btn-togle btn btn-light bg-white rounded-pill shadow-sm px-4 mb-2"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">voyageur</th>
            <th scope="col">visa</th>
            <th scope="col" class="text-right">@</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($data as $voyageur)


          <tr>
          <th scope="row">{{$voyageur->numero}}</th>
            <td>{{$voyageur->nome}} {{$voyageur->prenome}} </td>
            <td>{{$voyageur->visa()[0]->typeVisa}}</td>
            <td class="text-right"><button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-danger">suprimer</button>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>


  </div>

    <!-- MultiStep Form -->

  <!-- End demo content -->
  <script src={{asset("jsagence/main.js")}}></script>
</body>
</html>
