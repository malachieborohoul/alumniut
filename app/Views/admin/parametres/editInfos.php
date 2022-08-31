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
                    <li class="breadcrumb-item"><a href="admin-dashboard">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="admin-editInfos"><?= $titre ?></a></li>
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
                <?= form_open_multipart('/admin-editInfos') ?>
                <?php if (session()->getTempdata('error')) : ?>
                    <div id='hidemsg' class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                <?php endif; ?>

                <?php if (session()->getTempdata('success')) : ?>
                    <div id='hidemsg' class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                <?php endif; ?>
                <form class="irs-login-form">

                    <br>
                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Téléphone </label>
                        <input type="text" name="telephone" class="form-control" value="<?= $infosite->telephone ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'telephone') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Adresse</label>
                        <input type="text" name="adresse" class="form-control" value="<?= $infosite->adresse ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'adresse') : '' ?></span>
                    </div>

                  
                    <div class="form-group">
                    <img src="<?= $infosite->logo ?>" width="10%" alt="logo">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="logo">
                        <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Importer</span>
                      </div>
                    </div>
                    <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'logo') : '' ?></span>
                  </div>



                    <div class="form-group">
                        <label><span class="text text-danger"> </span>Facebook</label>
                        <input type="text" name="facebook" class="form-control" value="<?= $infosite->facebook ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'facebook') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger"> </span>Twitter</label>
                        <input type="text" name="twitter" class="form-control" value="<?= $infosite->twitter ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'twitter') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label><span class="text text-danger"> </span>Instagram</label>
                        <input type="text" name="instagram" class="form-control" value="<?= $infosite->instagram ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'instagram') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label><span class="text text-danger"> </span>Whatsapp</label>
                        <input type="text" name="whatsapp" class="form-control" value="<?= $infosite->whatsapp ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'whatsapp') : '' ?></span>
                    </div>







                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Modifier</button>
                    </div>



                </form>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>