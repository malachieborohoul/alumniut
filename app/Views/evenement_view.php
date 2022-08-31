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
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title text-center">Ajouter un évènement</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <form action="/ajouterEvent" method="post" id="ajouterEvent">
            <div class="form-group ">
              <label>Titre<span class="text-danger">*</span></label>
              <input type="text" name="titre" class="form-control titre">
              <span id='' class="text text-danger error_titre"></span>


            </div>

            <div class="form-group ">
              <label>Lieu<span class="text-danger">*</span></label>
              <input type="text" name="lieu" class="form-control lieu">
              <span id='' class="text text-danger error_lieu"></span>


            </div>

            <div class="form-group ">
              <label>Date de début<span class="text-danger">*</span></label>
              <input type="date" name="dateDebut" class="form-control dateDebut">
              <span id='' class="text text-danger error_dateDebut"></span>


            </div>

            <div class="form-group ">
              <label>Date de fin<span class="text-danger">*</span></label>
              <input type="date" name="dateFin" class="form-control dateFin">
              <span id='' class="text text-danger error_dateFin"></span>


            </div>


            <div class="form-group ">
              <label>Heure de début<span class="text-danger">*</span></label>
              <input type="time" name="heureDebut" class="form-control heureDebut">
              <span id='' class="text text-danger error_heureDebut"></span>


            </div>

            <div class="form-group ">
              <label>Heure de fin<span class="text-danger">*</span></label>
              <input type="time" name="heureFin" class="form-control heureFin">
              <span id='' class="text text-danger error_heureFin"></span>

            </div>

            <div class="form-group ">
              <label>Bannière<span class="text-danger">*</span></label>
              <input type="file" name="banniere" class="form-control banniere">
              <span id='' class="text text-danger error_banniere"></span>

            </div>

            <br><br>

            <div class="form-group">
              <label>Description<span class="text-danger">*</span></label>
              <textarea class="form-control description" name="description" rows="8"></textarea>
              <span id='' class="text text-danger error_description"></span>

            </div>





            <button class="btn btn-primary float-right">Sauvegarder</button>

          </form>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
  </div>
</div>

<br><br>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(document).ready(function() {
    $('#ajouterEvent').submit(function(e) {
      e.preventDefault();
      var form = this
      $.ajax({
        method: $(form).attr('method'),
        url: $(form).attr('action'),
        data: new FormData(form),
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
          console.log(response.error)
          console.log(response.abon)
          if ($.isEmptyObject(response.error)) {
            if (response.code == 1) {
              $('.titre').val("");
              $('.lieu').val("");
              $('.dateDebut').val("");
              $('.dateFin').val("");
              $('.heureDebut').val("");
              $('.heureFin').val("");
              $('.banniere').val("");
              $('.description').val("");

              $('.error_titre').html("");
              $('.error_lieu').html("");
              $('.error_dateDebut').html("");
              $('.error_dateFin').html("");
              $('.error_heureDebut').html("");
              $('.error_heureFin').html("");
              $('.error_banniere').html("");
              $('.error_description').html("");
              // swal(+response.msg+"", "Cliquer", "success");
              suc(response.msg)

            } else {
              swal(response.msg, "Cliquer", "error");
              err(response.msg);
            }
          } else {
            $.each(response.error, function(prefix, val) {
              $(form).find('span.error_' + prefix + '').text(val);
            });
          }
        }
      });

    });
  });

  function suc(msg) {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      icon: 'success',
      title: msg

    });

  }

  function err(msg) {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      icon: 'danger',
      title: msg

    });

  }
</script>
<?= $this->endSection() ?>