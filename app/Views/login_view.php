<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<script>
    setTimeout(function() {
        $('#hidemsg').hide();
    }, 3000);
</script>

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


<div class="container">
    <div class="row" style="margin-top: 15%;">
        <div class="col-md-5 col-md-offset-3">
            <div class="animated fadeInUp delay-2300">
                <?= form_open(base_url() . '/public/login') ?>
                <?php if (session()->getTempdata('error')) : ?>
                    <div id='hidemsg' class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                <?php endif; ?>

                <?php if (session()->getTempdata('success')) : ?>
                    <div id='hidemsg' class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                <?php endif; ?>
                <form class="irs-login-form">
                    <h3>Connexion <span class="flaticon-padlock"></span></h3>


                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?= set_value('email') ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>


                    </div>
                    <div class="form-group">
                        <button class="btn btn-default irs-button-styledark btn-block" type="submit">Envoyer</button>
                    </div>
                    <div class="form-group">
                        <a href="#">Vous avez oublié le mot de passe?</a>
                    </div>

                </form>
                <?= form_close() ?>


            </div>
        </div>
    </div>
</div>
<br><br><br><br>

<?= $this->endSection() ?>