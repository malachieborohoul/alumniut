<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALUMNI IUT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url() ?>/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/animate.css">

  <link rel="stylesheet" href="<?= base_url() ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/magnific-popup.css">

  <link rel="stylesheet" href="<?= base_url() ?>/css/aos.css">

  <link rel="stylesheet" href="<?= base_url() ?>/css/ionicons.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>/css/flaticon.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/icomoon.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/style1.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/admin/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>

<body>
  <div class="bg-top navbar-light">
    <div class="container">
      <div class="row no-gutters d-flex align-items-center align-items-stretch">
        <div class="col-md-4 d-flex align-items-center py-4">
          <a class="navbar-brand" href="index.html">ALUMNI. <span>IUT</span></a>
        </div>
        <div class="col-lg-8 d-block">
          <div class="row d-flex">
            <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
              <div class="icon d-flex justify-content-center align-items-center"><span class="icon icon-map-marker"></span></div>
              <div class="text">
                <span>Adresse</span>
                <span><?= $this->renderSection('adresse') ?></span>
              </div>
            </div>
            <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
              <div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
              <div class="text">
                <span>Téléphone</span>
                <span>Appelez-nous: <?= $this->renderSection('phone') ?></span>
              </div>
            </div>


            <?php if (!session()->has('loggedUser')) : ?>
              <div class="col-md topper d-flex align-items-center justify-content-end">
                <p class="mb-0">
                  <a data-toggle="modal" data-target="#registerModal" href="#" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                    <span class="rejoindre">Rejoignez-nous</span>

                  </a>


                </p>

              </div>

            <?php else : ?>
              <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4 ">
                <ul class="navbar-nav ml-auto ">
                  <!-- Notifications Dropdown Menu -->
                  <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="icon  icon-bell text-primary"></i>
                      <span class="badge badge-warning navbar-badge nombreNotif"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <span class="dropdown-item dropdown-header nombreNotifications"></span>
                      <div class="dropdown-divider"></div>
                      <div class="notif">


                      </div>


                    </div>
                    <!-- <div class="image">
                      <img width="10" src="<?= $this->renderSection('userphoto') ?>" class="img-circle elevation-2" alt="User Image">
                    </div> -->

                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                      <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                      <i class="fas fa-th-large"></i>
                    </a>
                  </li>


                </ul>

              </div>



              <div class="col-md topper d-flex align-items-center justify-content-end">

                <p class="mb-0">
                  <a href="/logout" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                    <span class="rejoindre">Déconnexion</span>
                  </a>
                </p>
              </div>

            <?php endif ?>


            <!-- Register Modal -->
            <div class="modal" id="registerModal">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <!-- Modal body -->
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <form action="<?= base_url() ?>/register" method="post" id="addUser" class="p-5 bg-light">
                      <h3 class="mb-5 h4 font-weight-bold">Rejoignez-nous</h3>
                      <div class="form-group">
                        <label for="email">Nom</label>
                        <input type="text" class="form-control nom" name="nom" id="nom">
                        <span class="text-danger error-text nom_error"></span>
                      </div>
                      <div class="form-group">
                        <label for="email">Prénom</label>
                        <input type="text" class="form-control prenom" name="prenom" id="prenom">
                        <span class="text-danger error-text prenom_error"></span>
                      </div>

                      <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" class="form-control email" name="email" id="email">
                        <span class="text-danger error-text email_error"></span>
                      </div>

                      <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LebJVkcAAAAAByOCBdpJHtU1J-YpRDsGKeW05pv"></div>

                      </div>

                      <div class="row justify-content-around">
                        <button class="btn btn-primary submit">Rejoindre</button>
                        <div class="spinner">

                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>



            <!-- Login Modal -->
            <div class="modal" id="loginModal">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <!-- Modal body -->
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <form action="<?= base_url() ?>/login" method="post" id="login" class="p-5 bg-light">
                      <h3 class="mb-5 h4 font-weight-bold">Connectez-vous</h3>
                      <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" class="form-control email" name="email" id="email">
                        <span class="text-danger error-text email_error"></span>
                      </div>

                      <div class="form-group">
                        <label for="password">Mot de passe </label>
                        <input type="password" class="form-control password" name="password" id="password">
                        <span class="text-danger error-text password_error"></span>
                      </div>
                      <button class="btn btn-primary submit">Se connecter</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center px-4">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <form action="#" class="searchform order-lg-last">
        <div class="form-group d-flex">
          <input type="text" class="form-control pl-3 rechercher" placeholder="Rechercher">
          <button type="text" placeholder="" class="form-control "><span class="ion-ios-search"></span></button>
        </div>
      </form>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"><a href="<?= base_url() ?>/" class="nav-link pl-0">Accueil</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              L'IUT
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Présentation institution</a>
              <a class="dropdown-item" href="#">Filières et formations</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Carrière
            </a>
            <?php if (session()->has('loggedUser')) : ?>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/trouverOffre">Trouver une offre</a>
                <a class="dropdown-item" href="/offre">Proposer une offre</a>
                <a class="dropdown-item" href="/trouverEvenement">Ajouter un évènement</a>
              </div>
            <?php else : ?>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url() ?>/renvoiLogin">Trouver une offre</a>
                <a class="dropdown-item" href="<?= base_url() ?>/renvoiLogin">Proposer une offre</a>
                <a class="dropdown-item" href="<?= base_url() ?>/renvoiLogin">Ajouter un évènement</a>
              </div>
            <?php endif; ?>
          </li>
          <?php if (!session()->has('loggedUser')) : ?>
            <li class="nav-item"><a href="<?= base_url() ?>/renvoiLogin" class="nav-link">Membres</a></li>
          <?php else : ?>
            <li class="nav-item"><a href="<?= base_url() ?>/voirMembre" class="nav-link">Membres</a></li>
          <?php endif; ?>
          <li class="nav-item"><a href="<?= base_url() ?>/voirEvenement" class="nav-link">Evènement</a></li>
          <li class="nav-item"><a href="<?= base_url() ?>/faq" class="nav-link">Faq</a></li>
          <!-- <li class="nav-item"><a href="<?= base_url() ?>/user/faq" class="nav-link">Faq</a></li> -->
          <li class="nav-item"><a href="<?= base_url() ?>/blog" class="nav-link">Blog</a></li>
          <?php if (!session()->has('loggedUser')) : ?>
            <li class="nav-item"><a href="#" data-toggle="modal" data-target="#loginModal" class="nav-link "><span style="color:#fd7e14" class="icon icon-lock"></span>Se connecter</a></li>
          <?php else : ?>
            <li class="nav-item"><a href="/voirProfileMembre/<?= $this->renderSection('idUser') ?>" class="nav-link "><span style="color:#fd7e14" class="icon icon-user-circle"></span>Profile</a></li>

          <?php endif; ?>


        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <!-- <section class="ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-teacher"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Certified Teachers</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-reading"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Special Education</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-books"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Book &amp; Library</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-diploma"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Sport Clubs</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
						<div class="img" style="background-image: url(images/about.jpg); border"></div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">What We Offer</h2>
						<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
						<div class="row mt-5">
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
									<div class="text pl-3">
										<h3>Safety First</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
									<div class="text pl-3">
										<h3>Regular Classes</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
									<div class="text pl-3">
										<h3>Certified Teachers</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
									<div class="text pl-3">
										<h3>Sufficient Classrooms</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
									<div class="text pl-3">
										<h3>Creative Lessons</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-kids"></span></div>
									<div class="text pl-3">
										<h3>Sports Facilities</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		

		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2 d-flex">
    			<div class="col-md-6 align-items-stretch d-flex">
    				<div class="img img-video d-flex align-items-center" style="background-image: url(images/about-2.jpg);">
    					<div class="video justify-content-center">
								<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
									<span class="ion-ios-play"></span>
		  					</a>
							</div>
    				</div>
    			</div>
          <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
            <h2 class="mb-4">Fox University</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          </div>
        </div>	
    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-12">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="18">0</strong>
		                <span>Certified Teachers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="401">0</strong>
		                <span>Students</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="30">0</strong>
		                <span>Courses</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="50">0</strong>
		                <span>Awards Won</span>
		              </div>
		            </div>
		          </div>
	          </div>
          </div>
        </div>
    	</div>
    </section>


		<section class="ftco-section">
			<div class="container-fluid px-4">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Our</span> Courses</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>	
				<div class="row">
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(images/course-1.jpg);"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-user mr-2"></i>Mr. Khan</span>
								<span><i class="icon-table mr-2"></i>10 seats</span>
								<span><i class="icon-calendar mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#">Electric Engineering</a></h3>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(images/course-2.jpg);"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-user mr-2"></i>Mr. Khan</span>
								<span><i class="icon-table mr-2"></i>10 seats</span>
								<span><i class="icon-calendar mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#">Electric Engineering</a></h3>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(images/course-3.jpg);"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-user mr-2"></i>Mr. Khan</span>
								<span><i class="icon-table mr-2"></i>10 seats</span>
								<span><i class="icon-calendar mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#">Electric Engineering</a></h3>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(images/course-4.jpg);"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-user mr-2"></i>Mr. Khan</span>
								<span><i class="icon-table mr-2"></i>10 seats</span>
								<span><i class="icon-calendar mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#">Electric Engineering</a></h3>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section bg-light">
			<div class="container-fluid px-4">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Certified Teachers</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>	
				<div class="row">
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-1.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Bianca Wilson</h3>
								<span class="position mb-2">Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-2.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Mitch Parker</h3>
								<span class="position mb-2">English Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-3.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Stella Smith</h3>
								<span class="position mb-2">Art Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-4.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Monshe Henderson</h3>
								<span class="position mb-2">Science Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-end">
    			<div class="col-md-6 py-5 px-md-5">
    				<div class="py-md-5">
		          <div class="heading-section heading-section-white ftco-animate mb-5">
		            <h2 class="mb-4">Request A Quote</h2>
		            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
		          </div>
		          <form action="#" class="appointment-form ftco-animate">
		    				<div class="d-md-flex">
			    				<div class="form-group">
			    					<input type="text" class="form-control" placeholder="First Name">
			    				</div>
			    				<div class="form-group ml-md-4">
			    					<input type="text" class="form-control" placeholder="Last Name">
			    				</div>
		    				</div>
		    				<div class="d-md-flex">
		    					<div class="form-group">
			    					<div class="form-field">
		        					<div class="select-wrap">
		                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                    <select name="" id="" class="form-control">
		                    	<option value="">Select Your Course</option>
		                      <option value="">Art Lesson</option>
		                      <option value="">Language Lesson</option>
		                      <option value="">Music Lesson</option>
		                      <option value="">Sports</option>
		                      <option value="">Other Services</option>
		                    </select>
		                  </div>
			              </div>
			    				</div>
		    					<div class="form-group ml-md-4">
			    					<input type="text" class="form-control" placeholder="Phone">
			    				</div>
		    				</div>
		    				<div class="d-md-flex">
		    					<div class="form-group">
			              <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
			            </div>
			            <div class="form-group ml-md-4">
			              <input type="submit" value="Request A Quote" class="btn btn-primary py-3 px-4">
			            </div>
		    				</div>
		    			</form>
		    		</div>
    			</div>
        </div>
    	</div>
    </section>

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Recent</span> Blog</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
				<div class="row">
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_1.jpg');">
								<div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Skills To Develop Your Child Memory</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_2.jpg');">
								<div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Skills To Develop Your Child Memory</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_3.jpg');">
								<div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Skills To Develop Your Child Memory</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Student Says About Us</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-1.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Racky Henderson</p>
                    <span class="position">Father</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-2.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Henry Dee</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-3.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mark Huff</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-4.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Rodel Golez</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-1.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Ken Bosh</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="images/image_1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/course-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section> -->

  <?= $this->renderSection('content') ?>
  <?= $this->section('scripts') ?>

  <script>
    $(document).ready(function() {

      setInterval(function() {
        getNotifSuivre();

      }, 5000);
      getNotifSuivre();

      getArticlePopulaire();



      $(document).on('click', '.notific', function() {
        // var id= $(this).find('id').text();
        var id = $(this).closest('a').find('.suivreId').text();

        $.ajax({
          method: "post",
          url: "/vuNotifSuivre",
          data: {
            "id": id
          },
          dataType: "json",
          success: function(response) {
            $('notif').html('');
            $('nombreNotif').html('');
            getNotifSuivre();
          }
        });
      });
    });

    /**
     * Ajouter un user lors de l'inscription
     */
    $('#addUser').submit(function(e) {
      e.preventDefault();
      var form = this
      $.ajax({
        method: $(form).attr('method'),
        url: $(form).attr('action'),
        data: new FormData(form),
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function() {
          $(form).find('span.error-text').text('');
          $(".spinner").append(
            '<div class="spinner-border text-primary"  role="status">\
                <span class="sr-only">Loading...</span>\
              </div>');

        },
        success: function(data) {
          if ($.isEmptyObject(data.error)) {
            if (data.code == 1) {
            $(".spinner").html("");

              $(form)[0].reset();
              $('#registerModal').modal('hide');
              $(".spinner").append('');
              swal("" + data.msg + "", "Cliquer", "success");


              // alert(data.msg);
            } else {
            $(".spinner").html("");

              swal("" + data.msg + "", "Cliquer", "error");

              // alert(data.msg);
            }
          } else {
            $(".spinner").html("");
            $.each(data.error, function(prefix, val) {
              $(form).find('span.' + prefix + '_error').text(val);
            });
          }
        }
      });

    });

    $('#login').submit(function(e) {
      e.preventDefault();
      var form = this
      $.ajax({
        method: $(form).attr('method'),
        url: $(form).attr('action'),
        data: new FormData(form),
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function() {
          $(form).find('span.error-text').text('');

        },
        success: function(response) {
          if ($.isEmptyObject(response.error)) {
            if (response.code == 1) {
              $('#loginModal').modal('hide');
              window.location = '/';
            } else {
              alert(response.msg)
            }
          } else {
            $.each(response.error, function(prefix, val) {
              $(form).find('span.' + prefix + '_error').text(val)
            });
          }
        }
      });
    });

    /**
     * Récevoir des notifications lorsqu'un membre a commencé à  suivre un autre
     *
     * @return void
     */
    function getNotifSuivre() {
      $.ajax({
        method: "GET",
        url: "/getNotifSuivre",
        data: "data",
        dataType: "json",
        success: function(response) {
          console.log(response.notifEvents);
          // console.log(response.notif);
          // console.log(response.nombreNotif);
          var nombreNotif = response.nombreNotif; //Nombre de notifications recu
          var nombreNotifications = response.nombreNotif; //Nombre de notifications recu
          $('.nombreNotif').html(nombreNotif);
          $('.nombreNotifications').html(nombreNotifications + ' Notification(s)');
          var notif = "";
          $.each(response.notif, function(index, value) {
            notif +=
              '<a  href="/voirProfileMembre/' + value.idAbon + '" class="dropdown-item notific">\
                  <p style="display:none" class="suivreId">' + value.idSuivre + '</p>\
                  <i class="icon icon-users mr-2"></i>' + value.nom + ' a commencé à vous suivre\
                  <div class="dropdown-divider"></div>\
                </a>';
          });
          $('.notif').html(notif);

        }
      });
    }

    /**
     * Récupère les acticles les plus populaires en terme du nombre commentaires
     *
     * @return void
     */
    function getArticlePopulaire() {


      $.ajax({
        method: "GET",
        url: "/getArticlePopulaire",
        dataType: "json",
        success: function(response) {
          console.log(response.populaire);
          var pop = "";
          $.each(response.populaire, function(index, value) {
            pop +=
              ' <div class="block-21 mb-4 d-flex">\
                <a class="blog-img mr-4" style="background-image: url(' + value.banniere + ');"></a>\
                <div class="text">\
                  <h3 class="heading"><a href="/voirBlogDetail/' + value.uniidblog + '">' + value.titre + '</a></h3>\
                  <div class="meta">\
                    <div><a href="#"><span class="icon-calendar"></span> ' + value.blogcreated_at + '</a></div>\
                    <div><a href="/voirProfileMembre/'+value.idUsers+'"><span class="icon-person"></span>' + value.nom + '</a></div>\
                    <div><a href="#"><span class="icon-chat"></span>' + value.nbrComment + '</a></div>\
                  </div>\
                </div>\
              </div>';

          });

          $('#populairefooter').html(pop);
        }
      });


    }
  </script>
  <?= $this->endSection() ?>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2">Nos coordonnées</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text"><?= $this->renderSection('adressepieds') ?></span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?= $this->renderSection('phonepieds') ?></span></a></li>
                <!-- <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li> -->
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-5">

            <h2 class="ftco-heading-2">Blog recent</h2>
          </div>

          <div class="ftco-footer-widget mb-5" id="populairefooter">


          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-5 ml-md-4">
            <h2 class="ftco-heading-2">Liens rapides</h2>
            <ul class="list-unstyled">
              <li><a href="/"><span class="ion-ios-arrow-round-forward mr-2"></span>Accueil</a></li>
              <!-- <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>A propos</a></li> -->
              <li><a href="voirEvenement"><span class="ion-ios-arrow-round-forward mr-2"></span>Evènement</a></li>
              <li><a href="/faq"><span class="ion-ios-arrow-round-forward mr-2"></span>Faq</a></li>
              <li><a href="blog"><span class="ion-ios-arrow-round-forward mr-2"></span>Blog</a></li>
              <!-- <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Poser une question</a></li> -->
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2">Rejoignez-nous!</h2>

            <form action="#" class="subscribe-form">
              <div class="form-group">
                <input type="text" class="form-control mb-2 text-center" placeholder="Entrez votre adresse email">
                <input type="submit" value="Rejoindre" class="form-control submit px-3">
              </div>
            </form>
          </div>
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2 mb-0">Réseaux sociaux</h2>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>Tous droits reservés à ALUMNI IUT</p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="<?= base_url() ?>/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url() ?>/js/popper.min.js"></script>
  <script src="<?= base_url() ?>/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url() ?>/js/jquery.waypoints.min.js"></script>
  <script src="<?= base_url() ?>/js/jquery.stellar.min.js"></script>
  <script src="<?= base_url() ?>/js/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url() ?>/js/aos.js"></script>
  <script src="<?= base_url() ?>/js/jquery.animateNumber.min.js"></script>
  <script src="<?= base_url() ?>/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?= base_url() ?>/js/google-map.js"></script>
  <script src="<?= base_url() ?>/js/main.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>/admin/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



  <?= $this->renderSection('scripts') ?>
</body>




</html>