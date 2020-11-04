	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Agence De Voyage</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" >

			<link rel="stylesheet" href='{{ asset("css/owl.carousel.css")}}'>
			<link rel="stylesheet" href='{{ asset("css/main.css")}}'>

		</head>
		<body>
			<!-- start banner Area -->
			<section class="banner-area" id="home">
				<!-- Start Header Area -->
				<header class="default-header">
					<nav class="navbar navbar-expand-lg  navbar-light">

						<div class="container">


							  <a class="navbar-brand" href="index.html">
                                  <img src="img/img/logo.png" alt="">
                               <span class="text-white text-warning"> BOUCHELLIA</span>  <span class="text-white text-white">TRAVEL</span>
							  </a>
							  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							    <span class="text-white lnr lnr-menu"></span>
							  </button>

							  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
								<div class="top-bar smoothie hidden-xs">


                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
								<div class="form-inline">
                                    <div>
                                    <input id="email" type="email" placeholder="Email" class="form-control mr-sm-2  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-warning h6">Email ou mot de Passe incorrect</strong>
                                    </span>
                                @enderror


                                </div>
                                    <div>
                                    <input id="password" type="password" placeholder="Mot De Passe" class="form-control mr-sm-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                    <button class="btn btn btn-outline-warning my-2 my-sm-0" type="submit">Connexion</button>



                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
                                </form>
                              </div>
                            </div>
						</div>
						</div>

					</nav>
				</header>

				<!-- End Header Area -->
			</section>



			<section class="default-banner">
				<div class="row">
				<div class="active-blog-slider">
					<div class="item-slider relative" style="background: url(img/slider1.jpg);background-size: cover;">
						<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
						<div class="container">
							<div class="row fullscreen justify-content-center align-items-center">

								<div class="col-md-10 col-12">
									<div class="banner-content text-center">
									<h4 class="text-white mb-20 text-uppercase">Ou Voulez Vous Aller?</h4>
										<h1 class="text-uppercase text-white">NOUVELLE EXPERIENCE</h1>
										<p class="text-white">découvrez   voyagez....<br>
										</p>
                                        <a href="#inscrire" class="text-uppercase header-btn clickinscrire">inscription</a>
									</div>
								</div>


							</div>
						</div>
					</div>
					<div class="item-slider relative" style="background: url(img/slider2.jpg);background-size: cover;">
						<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
						<div class="container">
							<div class="row fullscreen justify-content-center align-items-center">
								<div class="col-md-10 col-12">
									<div class="banner-content text-center">
									<h4 class="text-white mb-20 text-uppercase">Ou Voulez Vous Aller?</h4>
										<h1 class="text-uppercase text-white">NOUVELLE EXPERIENCE</h1>
										<p class="text-white">découvrez   voyagez....<br>
										</p>
                                        <a href="#inscrire" class="text-uppercase header-btn clickinscrire">inscription</a>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item-slider relative" style="background: url(img/slider3.jpg);background-size: cover;">
						<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
						<div class="container">
							<div class="row fullscreen justify-content-center align-items-center">
								<div class="col-md-10 col-12">
									<div class="banner-content text-center">
										<h4 class="text-white mb-20 text-uppercase">Ou Voulez Vous Aller?</h4>
										<h1 class="text-uppercase text-white">NOUVELLE EXPERIENCE</h1>
										<p class="text-white">découvrez   voyagez....<br>
										</p>
                                        <a href="#inscrire" class="text-uppercase header-btn clickinscrire">inscription</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>

				</div>

				</section>


<section>
    <div class="w-100 text-center my-5"><h4 class="display-4">Pourquoi nous choisir</h4></div>
    <div class=" mx-2 card-deck">
        <div class="card">
          <img src="img/s.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">Meilleure sélection</h5>
            <p class="card-text text-center lead">Notre processus de sélection rigoureux signifie que vous ne voyez que les agences avec de la meilleure qualité services.</p>

          </div>
        </div>
        <div class="card">
          <img src="img/s1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">Partout dans le monde</h5>
            <p class="card-text">Nous travaillons avec des partenaires du monde entier.</p>

          </div>
        </div>
        <div class="card">
          <img src="img//s2.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">Garantie du meilleur prix</h5>
            <p class="card-text">Si vous trouvez moins cher ailleurs, Caravane2 vous offre ce tarif avec une réduction de 10%.</p>

          </div>
        </div>
      </div>
</section>


                <section class="bg-dark my-5">
                    <div class="row ">
                        <div class="col-12 text-center my-4">
                       <h4 class="text-white display-4">Les meilleurs Voyages organisé <br/>  aux meilleurs prix</h4>
                          </div>
                          <div class=" col-12 text-white h5 text-center"><br/>Des lieux qui construisent des souvenirs sans précédent.
                           Ouvrir les portes d'un monde de raffinement et d'émerveillement.
                           Trouvez votre<br/> <br/> départ parmi nos +120  départs dans le monde entier, des voyages économique aux voyages de luxe. Economisez dès maintenant !
                       </div>

                   </div>
                       <div class="d-flex justify-content-around my-5">

                           <div class=" h5 text-center text-white font-weight-bolder">

                               +1450<br/>
                               Clients satisfaits
                       </div>
                       <div class=" h5 text-center text-white font-weight-bolder">
                           +800<br/>
                           Agents collaborateurs
                   </div>
                   <div class=" h5 text-center text-white font-weight-bolder">
                       +430 <br/>
            Agences sélectionnées
               </div>
                       </div>
<div style="height: 20px"></div>
          </section>


				<section class="inscrire mb-5" id="inscrire">

					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="row justify-content-sm-center  p-5">




								<div class="col-6 wizard-header text-center ">
									<h3 class="heading ">coordonnées D'agence</h3>
									<p>Veuillez saisir vos informations de agence et passez à l'étape suivante afin que nous puissions créer vos comptes.  </p>

								</div>
								<div class="w-100"></div>

							<div class="col-12 col-md-7">


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
								<div class="col-6">

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
                          <button id="buttonsend" class="nav-link active send  btn  btn-outline-warning " type="button">s'inscrire<span class=" "></span></button>
						</li>

					  </ul>
                    </div>


				</section>
			<!-- Start about Area -->



			<!-- End about Area -->


			<!-- Start project Area -->

			<!-- End project Area -->


			<!-- Start feature Area -->

			<!-- End feature Area -->


			<!-- Start gallery Area -->

			<!-- End gallery Area -->

<section>
    <div class="w-100 text-center my-5"><h5 class="display-4">Découvrez nos meilleures destinations</h5></div>
    <div class="w-100 text-center my-5"><h5 class="lead">Plus de 8000 idées de voyage à découvrir et à personnaliser</h5></div>

            <div class="card-columns">
                <div class="card bg-warning text-white">
                  <img src="img/g1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-white">japan Fin d'année</h5>
                    <p class="card-text">City Tours, Hôtel 4</p>
                  </div>
                </div>
                <div class="card ">
                    <img src="img/g3.jpg" class="card-img-top" alt="...">
                    <div class="card-body ">
                      <h5 class="card-title">paris</h5>
                      <p class="card-text">Difficile d'organiser votre voyage en Turquie sans savoir à quoi vous attendre ? Vous vous demandez quels sont les lieux à visiter en priorité, quelles sont les formalités d'entrée, quel budget prévoir pour l'hébergement, la nourriture, les visites et les transports ? Pas de panique, les équipes Caravane2.com ont rédigé, pour vous</p>
                    </div>
                  </div>
                <div class="card">
                  <img src="img/g2.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Sofia,Bucarest</h5>
                    <p class="card-text">City Tours, Historique, parc</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card bg-warning text-white">
                    <img src="img/g4.jpg" class="card-img" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-white">italai</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text">Last updated 3 mins ago</p>
                    </div>
                  </div>
                  <div class="card bg-warning text-white">
                    <img src="img/g5.jpg" class="card-img" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-white">Sharm, Caire</h5>
                      <p class="card-text">City Tours, Hôtel 5</p>
                      <p class="card-text">Last updated 3 mins ago</p>
                    </div>
                  </div>
                <div class="card">
                  <img src="img/g3.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title ">amrica</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>


              </div>
</section>
              <section class="gallery-area my-2" id="gallery">
                <div class="container-fluid">
                    <div class="row no-padding">
                        <div class="active-gallery">
                            <div class="item single-gallery">
                                <img src="img/g1.jpg" alt="" style="height: 250px">
                            </div>
                            <div class="item single-gallery">
                                <img src="img/g2.jpg" alt="" style="height: 250px">
                            </div>
                            <div class="item single-gallery">
                                <img src="img/g3.jpg" alt="" style="height: 250px">
                            </div>
                            <div class="item single-gallery">
                                <img src="img/g4.jpg" alt="" style="height: 250px">
                            </div>
                            <div class="item single-gallery">
                                <img src="img/g5.jpg" alt="" style="height: 250px">
                            </div>
                            <div class="item single-gallery">
                                <img src="img/g6.jpg" alt="" style="height: 250px">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @error('etat')
            <div class="modal d-block" id="exampleModaldelete" style="background-color:rgba(0,0,0,0.6) "    role="dialog" aria-labelledby="exampleModalCenterTitle" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-warning text-center" id="exampleModalLongTitle">message</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-dark">
                        Ce compte a été refusé ... Vous pouvez demander à nouveau
                    </div>

                  </div>
                </div>
              </div>
            @enderror

            <button id="pdf" class="btn  d-print-none rounded-pill btn-outline-warning"
            onclick="window.print()">telecharger pdf</button>

			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6 class="text-white">About Us</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            		<p class="footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            		<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
						</div>
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6 class="text-white">Newsletter</h6>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">

										<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="d-flex flex-row">

											<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">


				                            	<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
				                            	<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>

											<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
										</div>
										<div class="info"></div>
										</form>
								</div>
								</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6 class="text-white">Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>





			<!-- End footer Area -->

            <script src='{{ asset("js/jquery-2.2.4.min.js")}}'></script>

			<script src='{{ asset("js/jquery.magnific-popup.min.js")}}'></script>
			<script src='{{ asset("js/jquery.sticky.js")}}'></script>
			<script src='{{ asset("js/jquery.counterup.min.js")}}'></script>
			<script src='{{ asset("js/jquery.steps.js")}}'></script>
            <script src='{{ asset("js/owl.carousel.min.js")}}'></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
            <script>
                $('.close').click(function(){
                    $(".modal").removeClass("d-block");
                })
                </script>
            <script src='{{ asset("js/main.js")}}'></script>
		</body>
	</html>
