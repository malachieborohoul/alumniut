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
          <h3 class="card-title text-center">Ajouter une offre</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
     
          <form action="/ajouterOffre" method="post" id="ajouterOffre">
            <div class="form-group ">
              <label>Titre<span class="text-danger">*</span></label>
              <input type="text" name="titre" class="form-control titre ">
              <span id='' class="text text-danger error_titre"></span>

            </div>

            <div class="form-group ">

              <label>Nom de l'entreprise<span class="text-danger">*</span></label>
              <input type="text" name="nomEntreprise" class="form-control nomEntreprise">
              <span id='' class="text text-danger error_nomEntreprise"></span>

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
              <label>Adresse de l'entreprise</label>
              <input type="text" name="adresseEntreprise" class="form-control adresseEntreprise">
              <!-- <span id='error_adresseEntreprise' class="text text-danger"></span> -->
            </div>

            <div class="form-group ">
              <label>Téléphone de l'entreprise</label>
              <input type="text" name="telephoneEntreprise" class="form-control telephoneEntreprise">
              <!-- <span id='error_telephoneEntreprise' class="text text-danger"></span> -->
            </div>

            <div class="form-group ">
              <label>Email de l'entreprise</label>
              <input type="email" name="emailEntreprise" class="form-control emailEntreprise">
              <!-- <span id='error_telephoneEntreprise' class="text text-danger"></span> -->
            </div>

            <div class="form-group ">
              <label>Lien du site de l'entreprise</label>
              <input type="text" name="lien" class="form-control lien">
              <!-- <span id='error_telephoneEntreprise' class="text text-danger"></span> -->
            </div>

            
            <div class="form-group ">
              <label>Fichier attaché
                <span class="text-danger">Format pdf, word. Max 1 Mo</span>
              </label>
              <input type="file" name="attache" class="form-control attache">
              <!-- <span id='error_telephoneEntreprise' class="text text-danger"></span> -->
            </div>

            


            <div class="form-group ">
              <label>Salaire</label>
              <input type="number" name="salaire" class="form-control salaire">
              <!-- <span id='error_salaire' class="text text-danger"></span> -->
            </div>



            <div class="form-group ">
              <label>Exigence</label>
              <input type="text" name="exigence" class="form-control exigence">
              <!-- <span id='error_exigence' class="text text-danger"></span> -->
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
   $('#ajouterOffre').submit(function (e) { 
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
          if ($.isEmptyObject(response.error)) {
            if (response.code == 1) {
              $('.titre').val("");
              $('.nomEntreprise').val("");
              $('.dateDebut').val("");
              $('.dateFin').val("");
              $('.adresseEntreprise').val("");
              $('.telephoneEntreprise').val("");
              $('.emailEntreprise').val("");
              $('.salaire').val("");
              $('.exigence').val("");
              $('.description').val("");
              $('.lien').val("");
              $('.attache').val("");
              suc(response.msg);

            } else {
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

   //Ajouter CV

   $('#addAttache').submit(function(e) {
            e.preventDefault();
            var form=this
            $.ajax({
                method: $(form).attr('method'),
                url: $(form).attr('action'),
                data: new FormData(form),
                dataType: "json",
                processData:false,
                contentType:false,
                success: function (response) {
                    if($.isEmptyObject(response.error))
                    {
                        if(response.code==1)
                        {
                            $('#addAttache').find('input').val('');
                            $('.attache_error').html('');
                            
                            suc(response.msg);
                            


                        }
                        else
                        {
                            err(response.msg);
                        }
                    }
                    else
                    {
                        $.each(response.error, function (prefix, val) { 
                             $(form).find('span.'+prefix+'_error').text(val);
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
            icon: 'error',
            title: msg

        });

    }
</script>
<?= $this->endSection() ?>