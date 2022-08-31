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
<!-- The Modal -->
<div class="modal" id="addEntreprise">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title justify-content">Ajouter une entreprise <span class="text-danger">si elle ne fait pas partie de la liste</span> </h4><br>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12">



                            <form action="/insertEntreprise" method="post" id="insertEntreprise">
                                <div class="form-group ">

                                    <input type="text" name="nomE" class="form-control " placeholder="Entrez le nom de l'entreprise">
                                    <span class="text-danger nomE_error"></span>

                                </div>



                                <button class="btn btn-primary float-right">Ajouter</button>



                            </form>

                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-personnel-tab" data-toggle="pill" href="#custom-tabs-four-personnel" role="tab" aria-controls="custom-tabs-four-personnel" aria-selected="false">Personnel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-compte-tab" data-toggle="pill" href="#custom-tabs-four-compte" role="tab" aria-controls="custom-tabs-four-compte" aria-selected="false">Compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="custom-tabs-four-password-tab" data-toggle="pill" href="#custom-tabs-four-password" role="tab" aria-controls="custom-tabs-four-password" aria-selected="true">Changer mot de passe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-etude-tab" data-toggle="pill" href="#custom-tabs-four-etude" role="tab" aria-controls="custom-tabs-four-etude" aria-selected="false">Etude</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-professionnel-tab" data-toggle="pill" href="#custom-tabs-four-professionnel" role="tab" aria-controls="custom-tabs-four-professionnel" aria-selected="false">Professionnel</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-four-personnel" role="tabpanel" aria-labelledby="custom-tabs-four-personnel-tab">
                            <div class="container ">
                                <div class="row  justify-content-center">
                                    <div class="col-md-8 ">
                                        <form action="/editPersonnel" method="post" id="editPersonnel">
                                            <div class="form-group photo">

                                            </div>
                                            <div class="form-group nom  bg-light">


                                            </div>

                                            <div class="form-group genre bg-light">



                                            </div>
                                            <div class="form-group dateNaiss bg-light">

                                            </div>


                                            <button class="btn btn-primary">Sauvegarder</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="custom-tabs-four-compte" role="tabpanel" aria-labelledby="custom-tabs-four-compte-tab">
                            <div class="container ">
                                <div class="row  justify-content-center">
                                    <div class="col-md-8 ">
                                        <form action="/editCompte" method="post" id="editCompte">

                                            <div class="form-group adresse bg-light">

                                            </div>
                                            <div class="form-group telephone bg-light">

                                            </div>
                                            <div class="form-group facebook bg-light">

                                            </div>
                                            <div class="form-group twitter bg-light">

                                            </div>
                                            <div class="form-group linkedln bg-light">

                                            </div>


                                            <div class="form-check-inline vuTel">

                                            </div>

                                            <div class="form-check-inline vuDn">

                                            </div>

                                            <button class="btn btn-primary">Sauvegarder</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="custom-tabs-four-password" role="tabpanel" aria-labelledby="custom-tabs-four-password-tab">
                            <div class="container ">
                                <div class="row  justify-content-center">
                                    <div class="col-md-8 ">
                                        <form action="/editPassword" method="post" id="editPassword">

                                            <div class="form-group oldpassword  bg-light">
                                                <label>Actuel mot de passe</label>
                                                <input type="text" name="oldpassword" class="form-control oldpassword" placeholder="Actuel mot de passe">
                                                <span class="text-danger oldpassword_error"></span>
                                            </div>

                                            <div class="form-group newpassword bg-light">
                                                <label>Nouveau mot de passe</label>
                                                <input type="text" name="newpassword" class="form-control newpassword" placeholder="Nouveau mot de passe">
                                                <span class="text-danger newpassword_error"></span>

                                            </div>

                                            <div class="form-group cnewpassword  bg-light">
                                                <label>Confirmer mot de passe</label>
                                                <input type="text" name="cnewpassword" class="form-control newpassword" placeholder="Confirmer mot de passe">
                                                <span class="text-danger cnewpassword_error"></span>

                                            </div>

                                            <button class="btn btn-primary">Modifier</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-etude" role="tabpanel" aria-labelledby="custom-tabs-four-etude-tab">
                            <div class="container ">
                                <div class="row  justify-content-center">
                                    <div class="col-md-8 ">
                                        <form action="/editEtude" method="post" id="editEtude">

                                            <div class="form-group  promotionDUT bg-light">

                                            </div>
                                            <select class="form-control promotionDUTSel" name="promotionDUT" id="">
                                                <option value="<?= $userdata->promotionDUT ?>">-------||--------</option>y

                                            </select>

                                            <div class="form-group diplomeDUT bg-light">

                                            </div>
                                            <select class="form-control diplomeDUTSel" name="dut" id="">
                                                <option value="<?= $userdata->dut ?>">-------||--------</option>

                                            </select>

                                            <div class="form-group promotionLicence bg-light">


                                            </div>
                                            <select class="form-control promotionLicenceSel" name="promotionLicence" id="">
                                                <option value="<?= $userdata->promotionLicence ?>">-------||--------</option>

                                            </select>


                                            <div class="form-group diplomeLicence bg-light">

                                            </div>
                                            <select class="form-control diplomeLicenceSel" name="licence" id="">
                                                <option value="<?= $userdata->licence ?>">-------||--------</option>

                                            </select>
                                            <br>

                                            <button class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-professionnel" role="tabpanel" aria-labelledby="custom-tabs-four-professionnel-tab">
                            <div class="container ">
                                <div class="row  justify-content-center">
                                    <div class="col-md-8 ">
                                        <form action="/addCV" method="post" id="addCV">
                                            <div class="form-group cv bg-light">
                                                <label>Ajouter votre CV</label>
                                                <div class="row">
                                                    <span class="text-danger cv_error"></span>
                                                </div>
                                                <div class="row">
                                                    <input type="file" name="cv"> <button class=" btn btn-primary"><span class="icon icon-save"></span></button>
                                                </div>
                                                <div class="pathCV">

                                                </div>
                                            </div>

                                        </form>
                                        <form action="/editProfessionnel" method="post" id="editProfessionnel">

                                            <div class="form-group situation  bg-light">


                                            </div>
                                            <select class="form-control" name="situation" id="">
                                                <option value="<?= $userdata->idS ?>">-------||--------</option>
                                                <?php foreach ($situation as $sit) : ?>
                                                    <option value="<?= $sit['idS'] ?>"><?= $sit['nomS'] ?></option>
                                                <?php endforeach; ?>
                                            </select>


                                            <div class="form-group entreprise bg-light">


                                            </div>
                                            <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#addEntreprise"><i class="icon icon-plus"></i></a>

                                            <select class="form-control " name="entreprise" id="">
                                                <option value="<?= $userdata->idE ?>">-------||--------</option>
                                                <?php foreach ($entreprise as $ent) : ?>
                                                    <option value="<?= $ent['idE'] ?>"><?= strtoupper($ent['nomE']) ?></option>
                                                <?php endforeach; ?>
                                            </select>


                                            <br>



                                            <br>




                                            <button class="btn btn-primary">Modifier</button>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="importerModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">


            <!-- Modal body -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <form action="/editPhotoProfile" method="post" id="importerPhoto">
                    <span class="text-danger photo_error"></span>
                    <div class="path">

                    </div>


                    <input type="file" name="photo">
                    <button class="btn btn-primary">Importer</button>
                </form>
            </div>




        </div>
    </div>
</div>


<br><br>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('.photo').html("");
        $('.nom').html("");
        $('.genre').html("");
        $('.dateNaiss').html("");

        getLoggedInUserPhoto();
        getLoggedInUserData();
        getLoggedInUserCV();

        //lorsqu'on clique sur compte

        $(document).on('click', '#custom-tabs-four-compte-tab', function() {
            $('.adresse').html("");
            $('.telephone').html("");
            $('.facebook').html("");
            $('.twitter').html("");
            $('.linkedln').html("");
            $('.vuTel').html("");
            $('.vuDn').html("");

            getLoggedInUserDataCompte();

        });

        //lorsqu'on clique sur etude

        $(document).on('click', '#custom-tabs-four-etude-tab', function() {
            $('.promotionDUT').html("");
            $('.diplomeDUT').html("");
            $('.promotionLicence').html("");
            $('.diplomeLicence').html("");


            getLoggedInUserDataEtude();

        });
        //lorsqu'on clique sur professionnel

        $(document).on('click', '#custom-tabs-four-professionnel-tab', function() {
            $('.situation').html("");
            $('.entreprise').html("");
            $('.poste').html("");


            getLoggedInUserDataProfessionnel();

        });






        //Importer la photo de profile

        $('#importerPhoto').submit(function(e) {
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
                    if ($.isEmptyObject(response.error)) {
                        if (response.code == 1) {
                            $('#importerModal').modal('hide');
                            $('#importerModal').find('input').val('');

                            suc(response.msg);
                            $('.photo').html('');
                            $('.photo_error').html('');

                            getLoggedInUserPhoto();

                        } else {
                            err(response.msg);
                        }
                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });

        });

        //Ajouter CV

        $('#addCV').submit(function(e) {
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
                    if ($.isEmptyObject(response.error)) {
                        if (response.code == 1) {
                            $('#addCV').find('input').val('');
                            $('.cv_error').html('');

                            suc(response.msg);
                            getLoggedInUserCV();



                        } else {
                            err(response.msg);
                        }
                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });

        });

        //Lorsqu'on sauvegarde la modification des informations personnelles
        $('#editPersonnel').submit(function(e) {
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
                            $('.nom').html("");
                            $('.genre').html("");
                            $('.dateNaiss').html("");
                            getLoggedInUserData()
                            suc(response.msg)
                        } else {
                            err(response.msg)
                        }

                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });
        });

        //Lorsqu'on sauvegarde la modification des informations du compte

        $('#editCompte').submit(function(e) {
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
                            $('.nom').html("");
                            $('.genre').html("");
                            $('.dateNaiss').html("");
                            getLoggedInUserData()
                            suc(response.msg)
                        } else {
                            err(response.msg)
                        }

                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });
        });

        //Lorsqu'on sauvegarde la modification des informations concernant les études

        $('#editEtude').submit(function(e) {
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
                            $('.promotionDUT').html("");
                            $('.diplomeDUT').html("");
                            $('.promotionLicence').html("");
                            $('.diplomeLicence').html("");


                            getLoggedInUserDataEtude();
                            suc(response.msg)
                        } else {
                            err(response.msg)
                        }

                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });
        });

        //Lorsqu'on sauvegarde la modification des informations professionnelles

        $('#editProfessionnel').submit(function(e) {
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
                            $('.situation').html("");
                            $('.entreprise').html("");
                            $('.poste').html("");


                            getLoggedInUserDataProfessionnel();
                            suc(response.msg)
                        } else {
                            err(response.msg)
                        }

                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });
        });



        //Changer de mot de passe

        $('#editPassword').submit(function(e) {
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
                            $('.oldpassword').val("");
                            $('.newpassword').val("");
                            $('.cnewpassword').val("");

                            suc(response.msg)
                        } else {
                            err(response.msg)
                        }

                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });
        });


        //Lorsqu'on coche pour masquer le numero de téléphone
        $(document).on('click', '.tel', function() {
            $.ajax({
                method: "POST",
                url: "/vuTelephone",
                dataType: "json",
                success: function(response) {

                }
            });
        });

        //Lorsqu'on coche pour masquer la date de naissance
        $(document).on('click', '.dn', function() {
            $.ajax({
                method: "POST",
                url: "/vuDateNaiss",
                dataType: "json",
                success: function(response) {

                }
            });
        });

        //Lorsqu'on clique sur ajouter un user

        $('#insertEntreprise').submit(function(e) {
            e.preventDefault();
            var form = this
            $.ajax({
                method: $(form).attr('method'),
                url: $(form).attr("action"),
                data: new FormData(form),
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response.error)

                    if ($.isEmptyObject(response.error)) {
                        if (response.code == 1) {
                            $('#addEntreprise').modal('hide');
                            $('.situation').html("");
                            $('.entreprise').html("");
                            $('.poste').html("");


                            getLoggedInUserDataProfessionnel();
                            suc(response.msg)

                            suc(response.msg)


                        } else {
                            suc(response.msg)

                        }
                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
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

    function getLoggedInUserPhoto() {
        $.ajax({
            method: "GET",
            url: "/getLoggedInUserPhoto",

            dataType: "json",
            success: function(response) {
                // console.log(response.userphoto)
                $('.photo').append('\
                <img width="80"  src="' + response.userphoto.photo + '" alt="photo de profile">\
                <!-- Button to Open the Modal -->\
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importerModal">\
                     Modifier\
                 </button>\
                ');
                $('.path').append('<input type="hidden" name="path" value="' + response.userphoto.photo + '">')

            }
        });
    }

    function getLoggedInUserCV() {
        $.ajax({
            method: "GET",
            url: "/getLoggedInUserCV",

            dataType: "json",
            success: function(response) {
                // console.log(response.userphoto)

                $('.pathCV').append('<input type="hidden" name="pathCV" value="' + response.userCV.cv + '">')

            }
        });
    }

    function getLoggedInUserData() {
        $.ajax({
            method: "GET",
            url: "/getLoggedInUserData",

            dataType: "json",
            success: function(response) {
                console.log(response.userdata)
                $('.nom').append('\
                    <label>Nom</label>\
                    <input type="text" name="nom" class="form-control " value="' + response.userdata.nom + '">\
                    <span class="text-danger nom_error"></span>\
                ')
                $('.genre').append('\
                    <label>Genre <strong>' + response.userdata.genre + '</strong></label>\
                        <select class="form-control" name="genre" id="">\
                            <option value="' + response.userdata.genre + '">------</option>\
                            <option value="Homme">Homme</option>\
                            <option value="Femme">Femme</option>\
                        </select>\
                        <span class="text-danger genre_error"></span>\
                ')

                $('.dateNaiss').append('\
                    <label>Date de naissance</label>\
                    <input type="date" name="dateNaiss" class="form-control " value="' + response.userdata.dateNaiss + '">\
                    <span class="text-danger dateNaiss_error"></span>\
                ')

            }
        });
    }

    function getLoggedInUserDataCompte() {
        $.ajax({
            method: "GET",
            url: "/getLoggedInUserData",

            dataType: "json",
            success: function(response) {
                console.log(response.userdata)

                $('.adresse').append('\
                    <label>Adresse </label>\
                    <input type="text" name="adresse" class="form-control " value="' + response.userdata.adresse + '">\
                    <span class="text-danger adresse_error"></span>\
                ')

                $('.telephone').append('\
                    <label>Téléphone </label>\
                    <input type="text" name="telephone" class="form-control " value="' + response.userdata.telephone + '">\
                    <span class="text-danger telephone_error"></span>\
                ')

                $('.facebook').append('\
                    <label>Facebook </label>\
                    <input type="text" name="facebook" class="form-control " value="' + response.userdata.facebook + '">\
                    <span class="text-danger facebook_error"></span>\
                ')

                $('.twitter').append('\
                    <label>Twitter </label>\
                    <input type="text" name="twitter" class="form-control " value="' + response.userdata.twitter + '">\
                    <span class="text-danger twitter_error"></span>\
                ')

                $('.linkedln').append('\
                    <label>LinkedLn </label>\
                    <input type="text" name="linkedln" class="form-control " value="' + response.userdata.linkedln + '">\
                    <span class="text-danger linkedln_error"></span>\
                ')
                if (response.userdata.vuTel == 0) {
                    $('.vuTel').append('\
                    <label class="form-check-label">\
                        <input type="checkbox" class="form-check-input tel" value="" >Masquer numero de téléphone\
                    </label>\
                ')

                } else if (response.userdata.vuTel == 1) {
                    $('.vuTel').append('\
                    <label class="form-check-label">\
                        <input type="checkbox" class="form-check-input tel" value="" checked>Masquer numero de téléphone\
                    </label>\
                ')

                }

                if (response.userdata.vuDn == 0) {
                    $('.vuDn').append('\
                        <label class="form-check-label">\
                            <input type="checkbox" class="form-check-input dn" value="">Masquer date de naissance\
                        </label>\
                    ')

                } else if (response.userdata.vuDn == 1) {
                    $('.vuDn').append('\
                        <label class="form-check-label">\
                            <input type="checkbox" class="form-check-input dn" value="" checked>Masquer date de naissance\
                        </label>\
                    ')

                }




            }
        });
    }

    function getLoggedInUserDataEtude() {
        $.ajax({
            method: "GET",
            url: "/getLoggedInUserData",

            dataType: "json",
            success: function(response) {
                console.log(response.userdata)
                console.log(response.userdata)

                $('.promotionDUT').append('\
                     <label>Promotion DUT <strong>' + response.userdata.annee + '</strong></label>\
                        <span class="text-danger promotionDUT_error"></span>\
                ')
                $.each(response.promo, function(key, value) {
                    $('.promotionDUTSel').append('\
                        <option value="' + value['idPDUT'] + '">' + value['annee'] + '</option>\
                    ')
                });


                $('.diplomeDUT').append('\
                    <label>Filiere DUT <strong>' + response.userdata.nomDUT + '</label>\
                        <span class="text-danger dut_error"></span>\
                ')
                $.each(response.dut, function(key, value) {
                    $('.diplomeDUTSel').append('\
                        <option value="' + value['idDUT'] + '">' + value['nomDUT'] + '</option>\
                    ')
                })


                $('.promotionLicence').append('\
                    <label>Promotion Licence <strong>' + response.userdata.anneePL + '</strong></label>\
                        <span class="text-danger promotionLicence_error"></span>\
                ')
                $.each(response.promoLI, function(key, value) {
                    $('.promotionLicenceSel').append('\
                        <option value="' + value['idPLI'] + '">' + value['anneePL'] + '</option>\
                    ')
                })


                $('.diplomeLicence').append('\
                    <label>Filiere Licence <strong>' + response.userdata.nomLI + '</strong></label>\
                        <span class="text-danger licence_error"></span>\
                ')
                $.each(response.licence, function(key, value) {
                    $('.diplomeLicenceSel').append('\
                        <option value="' + value['idLI'] + '">' + value['nomLI'] + '</option>\
                    ')
                })

            }
        });
    }

    function getLoggedInUserDataProfessionnel() {
        $.ajax({
            method: "GET",
            url: "/getLoggedInUserData",

            dataType: "json",
            success: function(response) {
                console.log(response.userdata)
                $('.situation').append('\
                    <label>Situation actuelle <strong>' + response.userdata.nomS + '</strong></label>\
                        <span class="text-danger situation_error"></span>\
                ')

                $('.entreprise').append('\
                    <label>Entreprise actuelle <strong>' + response.userdata.nomE + '</strong></label>\
                        <span class="text-danger entreprise_error"></span>\
                ')



            }
        });
    }
</script>
<?= $this->endSection() ?>