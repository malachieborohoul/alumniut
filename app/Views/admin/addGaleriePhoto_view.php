<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('admin') ?>

<?= $this->section('email') ?>
<?= $userdata->email ?>
<?= $this->endSection() ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $titre ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/public/Adm">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/public/Adm/galerie"><?= $titre ?></a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?= $this->include('admin/cmps/titre') ?>

<script>
    setTimeout(function() {
        $('#hidemsg').hide();
    }, 3000);
</script>

<div class="card card-outline card-warning">


    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-9 col-md-offset-6">
                <?= form_open_multipart(base_url() . '/public/adm/addGaleriePhoto') ?>
                <?php if (session()->getTempdata('error')) : ?>
                    <div id='hidemsg' class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                <?php endif; ?>

                <?php if (session()->getTempdata('success')) : ?>
                    <div id='hidemsg' class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                <?php endif; ?>
                <form class="irs-login-form">

                    <br>
               

                   

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo[]" id="files" class="custom-file-input" multiple="multiple"  >
                                <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Importer</span>
                            </div>
                        </div>
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'banniere') : '' ?></span>
                    </div>

                   




                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Ajouter</button>
                    </div>



                </form>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>