<?php $page_session = \Config\Services::session() ?>
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

<?= $this->extend('admin/layouts/main') ?>

<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>


<script>
  setTimeout(function() {
    $('#hidemsg').hide();
  }, 3000);
</script>

<section class="ftco-section ftco-consult  " style="background-image: url('<?= base_url() ?>/public/importer/apropos/1629812693_aa1be7b72b47d5dd8fa6.png');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread " style="color:white;">Faq</h1>
        <p class="breadcrumbs" style="color:white;"><span class="mr-2"><a style="color:white;" href="/">Accueil <i class="ion-ios-arrow-forward"></i></a></span> <span>Faq <i class="ion-ios-arrow-forward"></i></span> </p>
      </div>
    </div>
  </div>

</section>


<section class="ftco-section bg-light">
<div class="container justify-content-center">

<div class="irs-ip-faq-content-one ">

<div class="irs-faq-content">
  <div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">

    <div class="col-18 " id="accordion">
      <?php foreach ($faq as $faq) : $id=$faq['idFaq'] ?>
        <!-- <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $faq['idFaq'] ?>" aria-expanded="true" aria-controls="collapseOne">
              <i class="flaticon-signs-1 icon-1"></i>
              <i class="flaticon-signs-1 icon-2"></i>
              <?= $faq['question'] ?>
            </a>
          </h4>
        </div>
        <div id="<?= $faq['idFaq'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <p><?= $faq['reponse'] ?> </p>
          </div>
        </div> -->
        <div class="card card-primary card-outline">
          <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
            <div class="card-header">
              <h4 class="card-title w-100">
              <?= $faq['question'] ?>
              </h4>
            </div>
          </a>
          <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
            <div class="card-body">
            <?= $faq['reponse'] ?>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>




  </div>
</div>

</div>

</div>





</section>





<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(document).on('click', '.view_offre_btn', function() {
    var offreId = $(this).closest('style:none').find('.offreId').text()
    alert(offreId)
  });
</script>
<?= $this->endSection() ?>