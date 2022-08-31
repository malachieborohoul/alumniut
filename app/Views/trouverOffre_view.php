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
<section class="ftco-section ftco-consult  " style="background-image: url('<?= base_url() ?>/public/importer/apropos/1629812693_aa1be7b72b47d5dd8fa6.png');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread " style="color:white;">Offres</h1>
        <p class="breadcrumbs" style="color:white;"><span class="mr-2"><a style="color:white;" href="/">Accueil <i class="ion-ios-arrow-forward"></i></a></span> <span>Offres <i class="ion-ios-arrow-forward"></i></span> </p>
      </div>
    </div>
  </div>

</section>


<section class="ftco-section bg-light">
  <div class="container-fluid px-4">
    <div class="row offresdata">


    </div>
  </div>

  <div class="container">
    <div class="row float-left">
      <div class="pagination float-left"></div>
    </div>
    <div class="row float-right">
      <div class="total_data "></div>
    </div>
  </div>










</section>




<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(document).ready(function() {
    getAllOffresLimit();
    //Lorsqu'on ecrit sur la barre de recherche
    $(document).on('keyup', '.rechercher', function() {
      var rechercher = $(this).val();
      if (rechercher != "") {
        rechercherUsers(rechercher);

        $('.offresdata').html('');
      } else {
        $('.offresdata').html();
        getAllOffresLimit();
        $('.pagination').html('');
        $('.total_data').html('');

      }
    });

    function rechercherUsers(query) {
      $.ajax({
        method: "POST",
        url: "/rechercherUsers",
        data: {
          'query': query,
        },

        success: function(response) {
          console.log(response.users);
          $.each(response.offres, function(index, value) {
            $('.offresdata').append('\
            <div class="col-md-6 course  ">\
                    <div class="text pt-4">\
                        <h3><a href="#">' + value.titre + '</a></h3>\
                        <p>' + value.description + '</p>\
                        <p class="meta d-flex">\
                            <span><a href="/voirProfileMembre/' + value.idUsers + '"><i class="icon-user mr-2">' + value.nom + '</i></a></span>\
                            <span><i class="icon-building mr-2"></i>' + value.nomEntreprise + '</span>\
                            <span><i class="icon-calendar mr-2">' + value.dateDebut + '</i>|</span>\
                            <span><i class="icon-calendar mr-2">' + value.dateFin + '</i></span>\
                        </p>\
                        <p><a style="display:' + statutLien + '" href="' + value.lien + '" class="btn btn-primary">Voir plus</a> <a style="display:' + statutAttache + '" href="' + value['attache'] + '" class="btn btn-warning" download>Télécharger fichier</a></p>\
                        <p></p>\
                    </div>\
                </div>\
                          ')
          });
        }
      });
    }
    //Lorsqu'on clique sur le le bouton de pagination
    $(document).on('click', '.pagination li', function() {
      var id = $(this).attr('id');
      getAllOffresLimit(id);
      $('.offresdata').html('');
      $('.pagination').html('');
      $('.total_data').html('');
    });
  });



  function getAllOffresLimit(page) {
    $.ajax({
      method: "POST",
      url: "/getAllOffresLimit",
      data: {
        'page': page
      },
      dataType: "json",
      success: function(response) {
        console.log(response.offres)

        if (response.offres == "") {
          $('.offresdata').append('\
              <div class="container">\
                <div class="justify-content-center">\
                  <h1>Aucune offre disponible pour le moment</h1>\
                </div>\
              </div>')

        } else {
          $.each(response.offres, function(index, value) {
            if (value['lien'] == "") {
              statutLien = "none";
            } else {
              statutLien = "";

            }

            if (value['attache'] == "") {
              statutAttache = "none";
            } else {
              statutAttache = "";

            }
            $('.offresdata').append('\
          <div class="col-md-3 course ftco-animate fadeInUp ftco-animated">\
						<div class="img" style="background-image: url(images/offre.png);"></div>\
						<div class="text pt-4">\
							<p class="meta justify-content-around">\
              <span><a href="/voirProfileMembre/' + value.idUsers + '"><i class="icon-user mr-2">' + value.nom + '</i></a>|</span>\
                            <span><i class="icon-building mr-2"></i>' + value.nomEntreprise + '|</span>\
                            <span><i class="icon-calendar mr-2">' + value.dateDebut + '</i>|</span>\
                            <span><i class="icon-calendar mr-2">' + value.dateFin + '</i></span>\
							</p>\
							<h3><a href="#">' + value.titre + '</a></h3>\
							<p>' + value.description + '</p>\
							<p><a style="display:' + statutLien + '" href="' + value.lien + '" class="btn btn-primary">Voir plus</a> <a style="display:' + statutAttache + '" href="' + value['attache'] + '" class="btn btn-warning" download>Télécharger fichier</a></p>\
						</div>\
					</div>\
               ')

          });

        }




        //Nombre total de données
        $('.total_data').append('' + response.total_data + ' donné(es) trouvé(es)')
        //pagination
        for (var i = 1; i <= response.pages; i++) {
          $('.pagination').append('<li class="page-item " id="' + i + '"><a class="page-link active" href="#">' + i + '</a></li>')
        }



      }
    });
  }
</script>
<?= $this->endSection() ?>