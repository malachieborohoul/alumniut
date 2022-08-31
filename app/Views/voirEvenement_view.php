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

<section class="ftco-section ftco-consult  " style="background-image: url('<?=base_url()?>/public/importer/apropos/1629812693_aa1be7b72b47d5dd8fa6.png');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread " style="color:white;">Evènements</h1>
        <p class="breadcrumbs" style="color:white;"><span class="mr-2" ><a style="color:white;" href="/">Accueil <i class="ion-ios-arrow-forward"></i></a></span> <span>Evènements <i class="ion-ios-arrow-forward"></i></span> </p>
      </div>
    </div>
  </div>

</section>


<section class="ftco-section bg-light">
  <div class="container-fluid px-4">
    <div class="row eventsdata">


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
    getAllEventsLimit();
    //Lorsqu'on ecrit sur la barre de recherche
    $(document).on('keyup', '.rechercher', function() {
      var rechercher = $(this).val();
      if (rechercher != "") {
        rechercherUsers(rechercher);

        $('.eventsdata').html('');
      } else {
        $('.eventsdata').html();
        getAllEventsLimit();
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
          console.log(response.events);
          $.each(response.events, function(index, value) {
            $('.eventsdata').append('\
              <div class="col-md-3 course  ">\
                    <div class="img" style="background-image: url('+value.banniere+');"></div>\
                    <div class="text pt-4">\
                        <p class="meta d-flex">\
                            <span><i class="icon-user mr-2">'+value.nom+'</i></span>\
                            <span><i class="icon-calendar mr-2">'+value.dateDebut+'</i></span>\
                            <span><i class="icon-calendar mr-2"></i>'+value.dateFin+'</span>\
                            <span><i class="icon-building mr-2"></i>'+value.lieu+'</span>\
                        </p>\
                        <h3><a href="#"></a>'+value.titre+'</h3>\
                        <p></p>\
                        <p><a href="#" class="btn btn-primary">Voir plus</a></p>\
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
      getAllEventsLimit(id);
      $('.eventsdata').html('');
      $('.pagination').html('');
      $('.total_data').html('');
    });
  });



  function getAllEventsLimit(page) {
    $.ajax({
      method: "POST",
      url: "/getAllEventsLimit",
      data: {
        'page': page
      },
      dataType: "json",
      success: function(response) {
        console.log(response.events)
        if(response.events=="")
        {
          $('.eventsdata').append('\
              <div class="container">\
                <div class="justify-content-center">\
                  <h1>Aucun évènement disponible pour le moment</h1>\
                </div>\
              </div>')
        }
        else
        {
          $.each(response.events, function(index, value) {
          $('.eventsdata').append('\
              <div class="col-md-3 course  ">\
                    <div class="img" style="background-image: url('+value.banniere+');"></div>\
                    <div class="text pt-4">\
                        <p class="meta d-flex">\
                            <span><a href="<?=base_url()?>/public/user/voirProfileMembre/'+value.idUsers+'"><i class="icon-user mr-2">'+value.nom+'</i></a></span>\
                            <span><i class="icon-calendar mr-2">'+value.dateDebut+'</i></span>\
                            <span><i class="icon-calendar mr-2"></i>'+value.dateFin+'</span>\
                            <span><i class="icon-building mr-2"></i>'+value.lieu+'</span>\
                        </p>\
                        <h3><a href="#"></a>'+value.titre+'</h3>\
                        <p>'+value.description+'</p>\
                        <p><a href="#" class="btn btn-primary">Participer</a></p>\
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
