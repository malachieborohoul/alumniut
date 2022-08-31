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
                    <li class="breadcrumb-item"><a href="/admin-rubrique"><?= $titre ?></a></li>
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

                <form method="post" action="/admin-editRubrique" id="editRubrique">

                    <br>
                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Titre1 </label>
                        <input type="text" name="titre1" id="titre1" class="form-control">
                        <span class="text-danger titre1_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Description1<span class="text-danger">*</span></label>
                        <textarea class="form-control " id="description1" name="description1" rows="8"></textarea>
                        <span class="text-danger description1_error"></span>


                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Titre2 </label>
                        <input type="text" name="titre2" id="titre2" class="form-control">
                        <span class="text-danger titre2_error"></span>

                    </div>

                    <div class="form-group">
                        <label>Description2<span class="text-danger">*</span></label>
                        <textarea class="form-control " name="description2" id="description2" rows="8"></textarea>
                        <span class="text-danger description2_error"></span>


                    </div>

                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Titre3 </label>
                        <input type="text" name="titre3" id="titre3" class="form-control">
                        <span class="text-danger titre3_error"></span>

                    </div>

                    <div class="form-group">
                        <label>Description3<span class="text-danger">*</span></label>
                        <textarea class="form-control " name="description3" id="description3" rows="8"></textarea>
                        <span class="text-danger description3_error"></span>


                    </div>


                    <div class="form-group">
                        <label><span class="text text-danger">* </span>Titre4 </label>
                        <input type="text" name="titre4" id="titre4" class="form-control">
                        <span class="text-danger titre4_error"></span>

                    </div>

                    <div class="form-group">
                        <label>Description4<span class="text-danger">*</span></label>
                        <textarea class="form-control " name="description4" id="description4" rows="8"></textarea>
                        
                        <span class="text-danger error-text description4_error"></span>


                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Modifier</button>
                    </div>



                </form>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>

    <?= $this->section('scripts') ?>
    <script>
        $(document).ready(function() {
            getAllRubrique();
        });

        function getAllRubrique() {
            $.ajax({
                method: "GET",
                url: "/admin-getAllRubrique",

                success: function(response) {
                    $.each(response, function(key, value) {
                        $('#titre1').val(value['titre1']);
                        $('#description1').val(value['description1']);
                        $('#titre2').val(value['titre2']);
                        $('#description2').val(value['description2']);
                        $('#titre3').val(value['titre3']);
                        $('#description3').val(value['description3']);
                        $('#titre4').val(value['titre4']);
                        $('#description4').val(value['description4']);
                    });
                }
            });
        }

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
        $('#editRubrique').submit(function(e) {
            e.preventDefault();
            // alert('YES')
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
                            
                            getAllRubrique();
                            suc(response.msg)

                        } else {

                            err(response.msg)
                        }
                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val);
                        });
                    }
                }
            });
        });
    </script>
    <?= $this->endSection() ?>