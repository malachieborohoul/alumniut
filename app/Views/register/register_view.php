<?=$this->extend('layouts/main')?>
<?=$this->section('content')?>
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
           
<script>
    setTimeout(function(){
        $('#hidemsg').hide();
    },3000);

</script>


<div class="container" >
    <div class="row" style="margin-top: 15%;" > 
        <div class="col-md-5 col-md-offset-3">
        <?= form_open(base_url(). '/public/register') ?>
        <?php if(session()->getTempdata('error')) :?>
            <div id='hidemsg' class="alert alert-danger"><?=session()->getTempdata('success')?></div>
        <?php endif;?>
        
        <?php if(session()->getTempdata('success')) :?>
            <div id='hidemsg' class="alert alert-success"><?=session()->getTempdata('success')?></div>
        <?php endif;?>
        <div class="animated fadeInUp delay-2300">


           <form class="irs-login-form" >
           <h3>Rejoindre la communauté <span class="flaticon-key"></span></h3>
        	<p>Rejoingnez notre communauté aujourd'huii:</p>


                <div class="form-group">
                    <label>Nom et prenom</label>
                    <input type="text" name="nom" class="form-control">
                    <span   class="text text-danger"><?=isset($validation) ? display_error($validation, 'nom'): '' ?></span>
                </div>

                <div class="form-group">
                    <label>Matricule</label>
                    <input type="text" name="matricule" class="form-control">
                    <span   class="text text-danger"><?=isset($validation) ? display_error($validation, 'matricule'): '' ?></span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                    <span   class="text text-danger"><?=isset($validation) ? display_error($validation, 'email'): '' ?></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input  type="password" name="password" class="form-control">
                    <span  class="text text-danger"><?=isset($validation) ? display_error($validation, 'password'): '' ?></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input  type="password" name="cpassword" class="form-control">
                    <span  class="text text-danger"><?=isset($validation) ? display_error($validation, 'cpassword'): '' ?></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-default irs-button-styledark btn-block" type="submit">Envoyer</button>
                </div>

           </form>
        <?= form_close()?>


        </div>
    </div>
    </div>
</div>
<br><br><br><br>
   
<?=$this->endSection()?>
