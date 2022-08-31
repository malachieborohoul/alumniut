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
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/public/Adm/editslider"><?= $titre ?></a></li>
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
                <?= form_open_multipart(base_url() . '/public/adm/editslider') ?>
                <?php if (session()->getTempdata('error')) : ?>
                    <div id='hidemsg' class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                <?php endif; ?>

                <?php if (session()->getTempdata('success')) : ?>
                    <div id='hidemsg' class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                <?php endif; ?>
                <form class="irs-login-form">

                    <br>
                    <div class="form-group">
                        <img src="<?= $slider->image1 ?>" width="10%" alt="">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image1" class="custom-file-input" id="image1" value="<?= $slider->image1 ?>">
                                <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Importer</span>
                            </div>
                        </div>
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'image1') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Text gras 1</label>
                        <input type="text" name="textGras1" class="form-control" value="<?= $slider->textGras1 ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'textGras1') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Text normal 1</label>
                        <input type="text" name="textNormal1" class="form-control" value="<?= $slider->textNormal1 ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'textNormal1') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <img src="<?= $slider->image2 ?>" width="10%" alt="">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image2" class="custom-file-input" id="image2" value="<?= $slider->image2 ?>">
                                <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Importer</span>
                            </div>
                        </div>
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'image2') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Text gras 1</label>
                        <input type="text" name="textGras2" class="form-control" value="<?= $slider->textGras2 ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'textGras2') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Text normal 1</label>
                        <input type="text" name="textNormal2" class="form-control" value="<?= $slider->textNormal2 ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'textNormal2') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <img src="<?= $slider->image3 ?>" width="10%" alt="">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image3" class="custom-file-input" id="image3" value="<?= $slider->image3 ?> ">
                                <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Importer</span>
                            </div>
                        </div>
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'image3') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Text gras 1</label>
                        <input type="text" name="textGras3" class="form-control" value="<?= $slider->textGras3 ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'textGras3') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Text normal 1</label>
                        <input type="text" name="textNormal3" class="form-control" value="<?= $slider->textNormal3 ?>">
                        <span class="text text-danger"><?= isset($validation) ? display_error($validation, 'textNormal3') : '' ?></span>
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