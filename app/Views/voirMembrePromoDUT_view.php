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
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?=base_url()?>/public/importer/apropos/1629812693_aa1be7b72b47d5dd8fa6.png');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Membres</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url() ?>/public/accueil">Accueil <i class="ion-ios-arrow-forward"></i></a></span> <span>Membres <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section bg-light">
  <div class="container-fluid px-4">
    <div class="row usersdata">


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
    getAllUsersLimitPromoDUT();
    //Lorsqu'on ecrit sur la barre de recherche
    // $(document).on('keyup', '.rechercher', function() {
    //   var rechercher = $(this).val();
    //   if (rechercher != "") {
    //     rechercherUsersPromoDUT(rechercher);

    //     $('.usersdata').html('');
    //   } else {
    //     $('.usersdata').html();
    //     getAllUsersLimitPromoDUT();
    //     $('.pagination').html('');
    //     $('.total_data').html('');

    //   }
    // });

    function rechercherUsersPromoDUT(query) {
      var idPromoDUT=<?=$idPromoDUT?>;
      $.ajax({
        method: "POST",
        url: "<?= base_url() ?>/public/user/rechercherUsersPromoDUT",
        data: {
          'query': query,
          'id': idPromoDUT

        },

        success: function(response) {
          console.log(response.users);
          $.each(response.users, function(index, value) {
            $('.usersdata').append('\
                      <div class="col-md-2 ">\
                            <div class="staff ">\
                              <div class="img-wrap d-flex align-items-stretch ">\
                                <div class="img align-self-stretch" style="background-image: url(' + value['photo'] + ');">\
                                </div>\
                              </div>\
                              <div class="text pt-3 text-center ">\
                                <h3>' + value['nom'] + '</h3>\
                                <span class="position mb-2 ">' + value['situation'] + '</span>\
                                <div class="faded">\
                                  <p>' + value['attente'] + '</p>\
                                  <ul class="ftco-social text-center ">\
                                    <li class=""><a href="#"><span class="icon-twitter"></span></a></li>\
                                    <li class=""><a href="#"><span class="icon-facebook"></span></a></li>\
                                    <li class=""><a href="#"><span class="icon-google-plus"></span></a></li>\
                                    <li class=""><a href="#"><span class="icon-instagram"></span></a></li>\
                                    <li ><a href="<?= base_url() ?>/public/user/voirProfileMembre/' + value['idUsers'] + '"><span class="icon-eye"></span></a></li>\
                                  </ul>\
                                </div>\
                              </div>\
                            </div>\
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
      getAllUsersLimitPromoDUT(id);
      $('.usersdata').html('');
      $('.pagination').html('');
      $('.total_data').html('');
    });
  });



  function getAllUsersLimitPromoDUT(page) {
    var idPromoDUT=<?=$idPromoDUT?>;
    var idDiplomeDUT=<?=$idDiplomeDUT?>;
    $.ajax({
      method: "POST",
      url: "<?= base_url() ?>/public/user/getAllUsersLimitPromoDUT",
      data: {
        'page': page,
        'id': idPromoDUT,
        'idD': idDiplomeDUT

      },
      dataType: "json",
      success: function(response) {
        console.log(response.users)
        $.each(response.users, function(index, value) {
          $('.usersdata').append('\
          <div class="col-md-2 ">\
                <div class="staff ">\
                  <div class="img-wrap d-flex align-items-stretch ">\
                    <div class="img align-self-stretch" style="background-image: url(' + value['photo'] + ');">\
                    </div>\
                  </div>\
                  <div class="text pt-3 text-center ">\
                    <h3>' + value['nom'] + '</h3>\
                    <span class="position mb-2 ">' + value['nomS'] + '</span>\
                    <div class="faded">\
                      <p>' + value['attente'] + '</p>\
                      <ul class="ftco-social text-center ">\
                        <li class=""><a href="#"><span class="icon-twitter"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-facebook"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-google-plus"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-instagram"></span></a></li>\
                        <li ><a href="<?= base_url() ?>/public/user/voirProfileMembre/' + value['idUsers'] + '"><span class="icon-eye"></span></a></li>\
                      </ul>\
                    </div>\
                  </div>\
                </div>\
            </div>\
          </div>\
               ')
        });

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