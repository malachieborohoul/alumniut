<?= $this->extend('layouts/main') ?>
<?= $this->section('phone') ?>
<?php if (isset($infosite->telephone)) : ?>
  <?= $infosite->telephone ?>



<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('phonepieds') ?>
<?php if (isset($infosite->telephone)) : ?>
  <?= $infosite->telephone ?>



<?php endif ?>
<?= $this->endSection() ?>


<?= $this->section('adresse') ?>
<?php if (isset($infosite->adresse)) : ?>
  <?= $infosite->adresse ?>



<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('adressepieds') ?>
<?php if (isset($infosite->adresse)) : ?>
  <?= $infosite->adresse ?>



<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('logo') ?>
<?php if (isset($infosite->logo)) : ?>
  <?= $infosite->logo ?>

<?php endif ?>
<?= $this->endSection() ?>

<!-- Section lien réseaux sociaux -->
<?= $this->section('facebook') ?>
<?php if (isset($infosite->facebook)) : ?>
  <?= $infosite->facebook ?>



<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('whatsapp') ?>
<?php if (isset($infosite->whatsapp)) : ?>
  <?= $infosite->whatsapp ?>



<?php endif ?>
<?= $this->endSection() ?>
<!--  -->

<!-- Slider -->
<?= $this->section('image1') ?>
<?php if (isset($slider->image1)) : ?>
  <?= $slider->image1 ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('textGras1') ?>
<?php if (isset($slider->textGras1)) : ?>
  <?= $slider->textGras1 ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('textNormal1') ?>
<?php if (isset($slider->textNormal1)) : ?>
  <?= $slider->textNormal1 ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('image2') ?>
<?php if (isset($slider->image2)) : ?>
  <?= $slider->image2 ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('textGras2') ?>
<?php if (isset($slider->textGras2)) : ?>
  <?= $slider->textGras2 ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('textNormal2') ?>
<?php if (isset($slider->textNormal2)) : ?>
  <?= $slider->textNormal2 ?>

<?php endif ?>
<?= $this->endSection() ?>


<?= $this->section('image3') ?>
<?php if (isset($slider->image3)) : ?>
  <?= $slider->image3 ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('textGras3') ?>
<?php if (isset($slider->textGras3)) : ?>
  <?= $slider->textGras3 ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('textNormal3') ?>
<?php if (isset($slider->textNormal3)) : ?>
  <?= $slider->textNormal3 ?>

<?php endif ?>
<?= $this->endSection() ?>
<!--  -->

<!-- Information Apropos -->
<?= $this->section('titre') ?>
<?php if (isset($apropos->titre)) : ?>
  <?= $apropos->titre ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('description') ?>
<?php if (isset($apropos->description)) : ?>
  <?= $apropos->description ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('photo') ?>
<?php if (isset($apropos->photo)) : ?>
  <?= $apropos->photo ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('banniere') ?>
<?php if (isset($apropos->banniere)) : ?>
  <?= $apropos->banniere ?>

<?php endif ?>
<?= $this->endSection() ?>

<!--  -->
<?= $this->section('idUser') ?>
<?= $userdata->idUsers ?>

<?= $this->endSection() ?>


<?= $this->section('content') ?>
<br><br>
<section>
  <div class="container ">
    <div class="row ">
      <div class="col-md-4 ">

        <!-- Profile Image -->
        
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <?php if ($userprofile['photo']==0) : ?>
                <?php if ($userprofile['genre']=='FEMME') : ?>
                  <img class="profile-user-img img-fluid img-circle" width="80" src="<?= base_url() ?>/importer/profiles/avatarfemme.png" alt="User profile picture">
                 <?php else : ?>
                  <img class="profile-user-img img-fluid img-circle" width="80" src="<?= base_url() ?>/importer/profiles/avatarman.png" alt="User profile picture">
                <?php endif; ?>
              <?php else : ?>
                <img class="profile-user-img img-fluid img-circle" width="80" src="<?= $userprofile['photo'] ?>" alt="User profile picture">
              <?php endif; ?>

            </div>

            <h3 class="profile-username text-center"><?= strtoupper($userprofile['nom']) ?> <?= strtoupper($userprofile['prenom']) ?></h3>

            <p class="text-muted text-center"><?= $userprofile['nomS'] ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item nombreabonne">

              </li>
              <li class="list-group-item nombreabonnement">
              </li>

            </ul>


            <?php if ($idLoggedUser == $idProfile) : ?>

            <?php else : ?>
              <div class="follow">


              </div>
            <?php endif; ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
      <div class="col-md-8">
        <div class="card">
          <?php if ($idLoggedUser == $idProfile) : ?>
            <div class="card-header">
              <h3 class="card-title">Profile du membre <a class="btn btn-primary float-right" href="/editProfile">Modifier profile</a></h3>
            </div>
          <?php else : ?>
            <div class="card-header">
              <h3 class="card-title">Profile du membre</h3>
            </div>
          <?php endif; ?>

          <!-- /.card-header -->

          <div class="card-body">

            <div class="container text-center">
              <h4>Informations personnelles</h4>
            </div>
            <div class="container justify-content-center">
              <div class="row">
                <div class="col-sm-6">
                  <h6 class="mb-0"><strong>Nom</strong></h6>
                </div>
                <div class="col-sm-6 text-primary"> <?= strtoupper($userprofile['nom']) ?> <?= strtoupper($userprofile['prenom']) ?></div>
              </div>
              <br>


              <div class="row">
                <div class="col-sm-6">
                  <h6 class="mb-0"><strong>Genre</strong></h6>
                </div>
                <div class="col-sm-6 text-primary"> <?= $userprofile['genre'] ?></div>
              </div>
              <br>

              <?php if ($userprofile['vuDn'] == 0) : ?>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="mb-0"><strong>Date de naissance</strong></h6>
                  </div>
                  <div class="col-sm-6 text-primary"> <?= $userprofile['dateNaiss'] ?></div>
                </div>
                <br>


              <?php else : ?>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="mb-0"><strong>Date de naissance</strong></h6>
                  </div>
                  <div class="col-sm-6 text-primary"> Masqué</div>
                </div>

              <?php endif ?>


            </div>

            <hr>
              <div class="container text-center">
                <h4>Parcours d'étude</h4>
              </div>
              <div class="container justify-content-center">
              <?php if($userprofile['anneeODUT']==0 && $userprofile['nomDUT']=='null'): ?>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="mb-0"><strong>Année d'obtention et filière DUT</strong></h6>
                  </div>
                  <div class="col-sm-6 text-primary"> <a href="<?= base_url() ?>/public/user/voirMembreObtentionFiliereDUT/<?= $userprofile['idODUT'] ?>/<?= $userprofile['idDUT'] ?>">Non mentionnées</a></div>
                </div>
              <?php else: ?>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="mb-0"><strong>Année d'obtention et filière DUT</strong></h6>
                  </div>
                  <div class="col-sm-6 text-primary"> <a href="<?= base_url() ?>/public/user/voirMembreObtentionFiliereDUT/<?= $userprofile['idODUT'] ?>/<?= $userprofile['idDUT'] ?>"><?= $userprofile['anneeODUT'] ?> en <?= $userprofile['nomDUT'] ?></a></div>
                </div>
              <?php endif; ?>
              
                <br>
                
              <?php if($userprofile['anneeOL']==0 && $userprofile['nomLI']=='null'): ?>

                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="mb-0"><strong>Année d'obtention et filière Licence</strong></h6>
                  </div>
                  <div class="col-sm-6 text-primary"> Non mentionnées </div>
                </div>
              <?php else: ?>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="mb-0"><strong>Année d'obtention et filière Licence</strong></h6>
                  </div>
                  <div class="col-sm-6 text-primary"> <a href="<?= base_url() ?>/public/user/voirMembreObtentionFiliereLicence/<?= $userprofile['idOL'] ?>/<?= $userprofile['idLI'] ?>"><?= $userprofile['anneeOL'] ?> en <?= $userprofile['nomLI'] ?></a> </div>
                </div>
              <?php endif; ?>


              </div>




            <hr>

            <div class="container text-center">
              <h4>Parcours professionnel</h4>
            </div>
            <div class="container justify-content-center">
                <?php if($userprofile['nomS']=='null'): ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Situation actuelle</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary">Non mentionnée</div>
                  </div>
                <?php else: ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Situation actuelle</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> <?= $userprofile['nomS'] ?></div>
                  </div>
                <?php endif; ?>
             
                <br>
                <?php if($userprofile['nomE']=='null'): ?>

                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Entreprise actuelle</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary">Non mentionnée</div>
                  </div>
                <?php else: ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Entreprise actuelle</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> <?= $userprofile['nomE'] ?></div>
                  </div>
                <?php endif; ?>

               
                <br>
                <?php if($userprofile['poste']==''): ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Poste actuel</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> Non mentionné</div>
                  </div>
                <?php else: ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Poste actuel</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> <?= $userprofile['poste'] ?></div>
                  </div>
                <?php endif; ?>

              
                <br>


                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="mb-0"><strong>CV</strong></h6>
                  </div>
                  <div class="col-sm-6 text-primary"> <a href="<?= $userprofile['cv'] ?> " download> Télécharger le CV de <?= $userprofile['nom'] ?></a></div>
                </div>
             

            </div>


            <hr>

            <div class="container text-center">
              <h4>Contact</h4>
            </div>
                <div class="container justify-content-center">
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Adresse email</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> <?= $userprofile['email'] ?></div>
                  </div>
                  <br>

                <?php if($userprofile['adresse']==''): ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Adresse </strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> Non mentionnée</div>
                  </div>
                <?php else: ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Adresse </strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> <?= $userprofile['adresse'] ?></div>
                  </div>
                <?php endif; ?>

             
                  <br>
              <?php if ($userprofile['vuTel'] == 0) : ?>
                  <?php if($userprofile['telephone']==''): ?>
                    <div class="row">
                      <div class="col-sm-6">
                        <h6 class="mb-0"><strong>Numero de téléphone </strong></h6>
                      </div>
                      <div class="col-sm-6 text-primary"> Non mentionné</div>
                    </div>
                  <?php else: ?>
                    <div class="row">
                      <div class="col-sm-6">
                        <h6 class="mb-0"><strong>Numero de téléphone </strong></h6>
                      </div>
                      <div class="col-sm-6 text-primary"> <?= $userprofile['telephone'] ?></div>
                    </div>
                  <?php endif; ?>

                
                  <br>
              <?php else : ?>

                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Numero de téléphone </strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> Masqué</div>
                  </div>
                  <br>
              <?php endif ?>

              <?php if($userprofile['facebook']==''): ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Facebook</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> Non mentionné</div>
                  </div>
                <?php else: ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h6 class="mb-0"><strong>Facebook</strong></h6>
                    </div>
                    <div class="col-sm-6 text-primary"> <?= $userprofile['facebook'] ?></div>
                  </div>
                <?php endif; ?>


                 
                  <br>
                  <?php if($userprofile['twitter']==''): ?>
                    <div class="row">
                      <div class="col-sm-6">
                        <h6 class="mb-0"><strong>Twitter</strong></h6>
                      </div>
                      <div class="col-sm-6 text-primary">Non mentionné </div>
                    </div>
                  <?php else: ?>
                    <div class="row">
                      <div class="col-sm-6">
                        <h6 class="mb-0"><strong>Twitter</strong></h6>
                      </div>
                      <div class="col-sm-6 text-primary"> <?= $userprofile['twitter'] ?></div>
                    </div>
                  <?php endif; ?>


                 
                  <br>

                  <?php if($userprofile['linkedln']==''): ?>
                    <div class="row">
                      <div class="col-sm-6">
                        <h6 class="mb-0"><strong>Linkedln</strong></h6>
                      </div>
                      <div class="col-sm-6 text-primary">Non mentionné</div>
                    </div>
                  <?php else: ?>
                    <div class="row">
                      <div class="col-sm-6">
                        <h6 class="mb-0"><strong>Linkedln</strong></h6>
                      </div>
                      <div class="col-sm-6 text-primary"> <?= $userprofile['linkedln'] ?></div>
                    </div>
                  <?php endif; ?>

              

            </div>




            <!-- /.tab-content -->
          </div><!-- /.card-body -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->


  

</section>
<br><br>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(document).ready(function() {
    isSuivre();
    nombreAbonneSuivre();
    var idM = <?= $idProfile ?>

    $(document).on('click', '.suivre', function() {
      $.ajax({
        method: "POST",
        url: "/suivre",
        data: {
          'idM': idM
        },
        dataType: "json",

        success: function(response) {
          $('.follow').html("");
          isSuivre();
          $('.nombreabonne').html("");
          $('.nombreabonnement').html("");
          getNotifSuivre();

          nombreAbonneSuivre();

        }
      });
    });

    $(document).on('click', '.abonne', function() {
      $.ajax({
        method: "POST",
        url: "<?= base_url() ?>/desabonne",
        data: {
          'idM': idM
        },
        dataType: "json",

        success: function(response) {
          $('.follow').html("");
          isSuivre();
          $('.nombreabonne').html("");
          $('.nombreabonnement').html("");
          getNotifSuivre();

          nombreAbonneSuivre();

        }
      });
    });

    function isSuivre() {
      var id = <?= $idProfile ?>;
      $.ajax({
        method: "POST",
        url: "/isSuivre",
        data: {
          'id': id
        },
        dataType: "json",
        success: function(response) {
          // console.log(response.isSuivre)
          if (response.isSuivre == 1) {
            $('.follow').append('<button  class="btn btn-primary btn-block abonne">Se déabonner</button>')
          } else {
            $('.follow').append('<button  class="btn btn-primary btn-block suivre">Suivre</button>')

          }
        }
      });
    }

    function nombreAbonneSuivre() {
      var id = <?= $idProfile ?>;
      $.ajax({
        method: "POST",
        url: "/nombreAbonneSuivre",
        data: {
          'id': id
        },
        dataType: "json",
        success: function(response) {
          console.log(response.essai)
          $('.nombreabonne').append('<b>Abonnés</b> <a class="float-right">' + response.abonne + '</a>');
          $('.nombreabonnement').append('<b>Abonnement</b> <a class="float-right">' + response.abonnement + '</a>');
        }
      });
    }




  });
</script>
<?= $this->endSection() ?>