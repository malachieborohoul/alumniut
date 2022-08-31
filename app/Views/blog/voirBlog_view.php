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
        <h1 class="mb-2 bread " style="color:white;">Blog</h1>
        <p class="breadcrumbs" style="color:white;"><span class="mr-2" ><a style="color:white;" href="/">Accueil <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span> </p>
      </div>
    </div>
  </div>

</section>


<section class="ftco-section bg-light">
  <div class="container">
    <div class="row blogsdata">


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
    getAllBlogsLimit();
    //Lorsqu'on ecrit sur la barre de recherche
    $(document).on('keyup', '.rechercher', function() {
      var rechercher = $(this).val();
      if (rechercher != "") {
        rechercherUsers(rechercher);

        $('.blogsdata').html('');
      } else {
        $('.blogsdata').html();
        getAllBlogsLimit();
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
          console.log(response.blogs);
          $.each(response.blogs, function(index, value) {
            $('.blogsdata').append('\
            <div class="col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">\
              <div class="blog-entry">\
                <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('+value.banniere+');">\
                  <div class="meta-date text-center p-2">\
                    <span class="day">26</span>\
                    <span class="mos">June</span>\
                    <span class="yr">2019</span>\
                  </div>\
                </a>\
                <div class="text bg-white p-4">\
                  <h3 class="heading"><a href="#">'+value.titre+'</a></h3>\
                  <div class="d-flex align-items-center mt-4">\
                    <p class="mb-0"><a href="#" class="btn btn-primary">Lire plus <span class="ion-ios-arrow-round-forward"></span></a></p>\
                    <p class="ml-auto mb-0">\
                      <a href="#" class="mr-2">'+value.nom+'</a>\
                      <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>\
                    </p>\
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
      getAllBlogsLimit(id);
      $('.blogsdata').html('');
      $('.pagination').html('');
      $('.total_data').html('');
    });
  });



  function getAllBlogsLimit(page) {
    $.ajax({
      method: "POST",
      url: "/getAllBlogsLimit",
      data: {
        'page': page
      },
      dataType: "json",
      success: function(response) {
        console.log(response.blogs)
        $.each(response.blogs, function(index, value) {
          $('.blogsdata').append('\
          <div class="col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">\
              <div class="blog-entry">\
                <a href="<?=base_url()?>/public/blog/voirBlogDetail/'+value.uniidblog+'" class="block-20 d-flex align-items-end" style="background-image: url('+value.banniere+');">\
                  <div class="meta-date text-center p-2">\
                    <span class="day">'+value.blogcreated_at+'</span>\
                  </div>\
                </a>\
                <div class="text bg-white p-4">\
                  <h3 class="heading"><a href="/voirBlogDetail/'+value.uniidblog+'">'+value.titre+'</a></h3>\
                  <div class="d-flex align-items-center mt-4">\
                    <p class="mb-0"><a href="/voirBlogDetail/'+value.uniidblog+'" class="btn btn-primary">Détail <span class="ion-ios-arrow-round-forward"></span></a></p>\
                    <p class="ml-auto mb-0">\
                      <a href="#" class="mr-2">'+value.nom+'</a>\
                      <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>\
                    </p>\
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