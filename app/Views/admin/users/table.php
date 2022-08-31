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
                    <li class="breadcrumb-item"><a href="/admin-dashboard">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="/admin-users"><?= $titre ?></a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?= $this->include('admin/cmps/titre') ?>

<!--  Modal de suppression -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body justify-content-center">
                <input type="hidden" id="deleteUserId">
                Voulez vous supprimer ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger cDelete_btn" data-dismiss="modal">Oui</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal voir information -->
<div class="modal fade" id="infosUser">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">



            <!-- Modal body -->
            <div class="modal-body">

                <div class="card-header text-muted border-bottom-0">
                    <p class="situation_view"></p>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead nom_view"><b></b></h2>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li "><i class="fas fa-lg fa-envelope "></i></span>
                                    <p class="email_view"></p>
                                </li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    <p class="ville_view"></p>
                                </li>
                                <li class="small"><span class="fa-li "><i class="fas fa-lg fa-phone "></i></span>
                                    <p class="telephone_view"></p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="" alt="user-avatar" class="img-circle img-fluid avatar_view">
                        </div>
                    </div>
                </div>



            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>

<section class="content">
    <div class="contain-fluild">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <button class="btn btn-danger "><i class="fa fa-filter"></i>Filtre</button>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#importExcel"><i class="fa fa-download"></i>Excel</button>
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus"></i>Utilisateur</button>

                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success"><?= session()->get('success') ?></div>
                <?php endif; ?>

                <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger"><?= session()->get('error') ?></div>
                <?php endif; ?>

                <!-- The Modal -->
                <div class="modal" id="addUserModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title justify-content">Ajouter un utilisateur</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row ">
                                        <div class="col-md-12">



                                            <form action="/admin-insertUser" method="post" id="insertUsers">
                                                <div class="form-group ">

                                                    <input type="text" name="email" class="form-control " placeholder="Entrez l'email">
                                                    <span class="text-danger email_error"></span>

                                                </div>

                                                <div class="form-group ">

                                                    <input type="text" name="password" class="form-control " value="123456">
                                                    <span class="text text-danger password_error"></span>

                                                </div>

                                                <div class="form-group ">
                                                    <select class="form-control " name="role" id="">
                                                        <option value="">---------------</option>
                                                        <option value="1">User</option>
                                                        <option value="2">Admin</option>
                                                    </select>
                                                    <span class="text text-danger role_error"></span>

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

                <!-- The Modal IMPORTER EXCEL -->
                <div class="modal" id="importExcel">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title justify-content">Ajouter un fichier Excel</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row ">
                                        <div class="col-md-12">



                                            <!-- <form action="<?= base_url() ?>/public/adm/importerExcel" method="post" enctype="multipart/form-data" id="importerExcel"> -->
                                            <?= form_open_multipart(base_url() . '/public/adm/importerExcel') ?>
                                            <div class="form-group ">

                                                <input type="file" name="file" class="form-control" required accept=".xls, .xlsx">
                                                <span class="text-danger file_error"></span>

                                            </div>

                                            <button class="btn btn-primary float-right">Ajouter</button>

                                            <?= form_close() ?>

                                            <!-- </form> -->

                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <div id="example1_filter" class="dataTables_filter">
                                <label>Rechercher:<input type="search" class="form-control form-control-sm pull-right search" placeholder="Par nom, email ou statut" aria-controls="example1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <th>EMAIL</th>
                                    <th>STATUT</th>
                                    <th>RÔLE</th>


                                    <th>Action</th>
                                </thead>
                                <tbody class="usersdata">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="total_data"></div>
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {
        getAllUsers(); //Fonction qui récupère tous les utilisateurs


        //Fonction qui recherche les utilisateurs dans la base de données
        function fetchData(query) {
            $.ajax({
                method: "POST",
                url: "/admin-fetchData",
                data: {
                    'query': query,
                },

                success: function(response) {
                    console.log(response.users);
                    $.each(response.users, function(key, value) {
                        // console.log(value['email']) ;
                        // Si le statut est actif icon vert sinon icon rouge 
                        if (value['statut'] == 'actif') {
                            var str = 'text-success statut_btn';
                            var ico = 'fa fa-check-circle';
                        } else {
                            var str = 'text-danger statut_btn';
                            var ico = 'fa fa-window-close';

                        }

                        if (value['idRole'] == 1) {
                            var st = 'USER';
                        } else {
                            var st = 'ADMIN';

                        }
                        $('.usersdata').append('<tr>\
                            <td  class="userId" style="display:none">' + value['idUsers'] + '</td>\
                            <td>' + value['email'] + '</td>\
                            <td><a href="#" class="' + str + '"><i class="' + ico + '"></i></a></td>\
                            <td><a href="#"  class=" btn btn-primary role_btn">' + st + '</a></td>\
                            <td>\
                                <a href="#" class="text-info viewUser_btn" ><i class="fa fa-eye"></i></a>\
                                <a href="#" class="text-danger delete_btn"><i class="	fa fa-trash"></i></a>\
                            </td>\
                        </tr>');

                    });
                }
            });
        }

        //Si une touche  de clavier est appuyée, ca recupere et fait une recherche par nom
        $(document).on('keyup', '.search', function() {
            var search = $(this).val();
            if (search != '') {
                $('.usersdata').html(""); //Empeche qu'il y ait des duplications d'informations en effacant la précédente

                fetchData(search);
            } else {
                $('.usersdata').html("");

                getAllUsers();
                $('.pagination').html('');
                $('.total_data').html('');
            }
        });
        //Lorsqu'on clique sur l'icon vu
        $(document).on('click', '.viewUser_btn', function() {
            var userId = $(this).closest('tr').find('.userId').text();
            // alert(userId);

            $.ajax({
                method: "POST",
                url: "/admin-getUser",
                data: {
                    'userId': userId,
                },
                success: function(response) {
                    console.log(response)
                    $.each(response, function(key, userview) {
                        $('.matri_view').text(userview['matricule']);
                        $('.nom_view').text(userview['nom']);
                        $('.email_view').text(userview['email']);
                        $('.telephone_view').text(userview['telephone']);
                        $('.avatar_view').text(userview['photo']);
                        $('.ville_view').text(userview['ville']);
                        $('.situation_view').text(userview['situation']);
                        $('#infosUser').modal('show');

                    });
                }
            });
        });

        //Lorsqu'on clique sur l'icon statut

        $(document).on('click', '.statut_btn', function() {
            var userId = $(this).closest('tr').find('.userId').text();
            // alert(userId);
            $.ajax({
                method: "POST",
                url: "/admin-updateStatut",
                data: {
                    'userId': userId
                },

                success: function(response) {
                    $('.usersdata').html("");
                    getAllUsers();
                    $('.pagination').html('');
                    $('.total_data').html('');
                }
            });
        });

        //Lorsqu'on clique sur l'icon role

        $(document).on('click', '.role_btn', function() {
            var userId = $(this).closest('tr').find('.userId').text();
            // alert(userId);
            $.ajax({
                method: "POST",
                url: "/admin-updateRole",
                data: {
                    'userId': userId
                },

                success: function(response) {
                    $('.usersdata').html("");
                    getAllUsers();
                    $('.pagination').html('');
                    $('.total_data').html('');
                }
            });
        });


        //Lorsqu'on clique sur ajouter un user

        $('#insertUsers').submit(function(e) {
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
                            $('.usersdata').html("");
                            $('#addUserModal').modal('hide');
                            suc(response.msg)
                            getAllUsers();
                            $('.pagination').html('');
                            $('.total_data').html('');

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

        /**
         * Fonction pour Importer un fichier Excel
         */

        //  $("#importerExcel").submit(function (e) { 
        //      e.preventDefault();
        //      var form = this
        //      $.ajax({
        //         method: $(form).attr('method'),
        //          url: $(form).attr('action'),
        //          data: new FormData(form),
        //          dataType: "json",
        //          processData:false,
        //          contentType:false,
        //          success: function (response) {
        //              console.log(response.code)
        //              if(response.code==1)
        //              {
        //                 suc(response.msg)
        //              }else
        //              {
        //                 err(response.msg)
        //              }
        //          }
        //      });
        //  });



    });

    //Lorsqu'on clique sur l'icon supprimer

    $(document).on('click', '.deleteUser_btn', function() {
        var userId = $(this).closest('tr').find('.userId').text();
        $('#deleteUserId').val(userId)
        $('#deleteModal').modal('show');

    });

    //Lorsqu'on confirme la suppression
    $(document).on('click', '.cDelete_btn', function() {
        var userId = $('#deleteUserId').val();
        $.ajax({
            method: "POST",
            url: "/admin-deleteUser",
            data: {
                'userId': userId
            },
            success: function(response) {
                $('.usersdata').html('');
                getAllUsers();
                $('.pagination').html('');
                $('.total_data').html('');
                suc('Utilisateur a été supprimé')



            }
        });
    });

    //Lorsqu'on clique sur le le bouton de pagination
    $(document).on('click', '.pagination li', function() {
        var id = $(this).attr('id');
        getAllUsers(id);
        $('.usersdata').html('');
        $('.pagination').html('');
        $('.total_data').html('');
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


    /** 
    La définition de la fonction qui récupère tous les utilisateurs de la base de données
     */
    function getAllUsers(page) {
        $.ajax({
            method: "POST",
            url: "admin-getAllUsers",
            data: {
                'page': page
            },
            dataType: "json",

            success: function(response) {
                console.log(response.users);
                $.each(response.users, function(key, value) {
                    // console.log(value['email']) ;
                    // Si le statut est actif icon vert sinon icon rouge 
                    if (value['statut'] == 'actif') {
                        var str = 'text-success statut_btn';
                        var ico = 'fa fa-check-circle';
                    } else {
                        var str = 'text-danger statut_btn';
                        var ico = 'fa fa-window-close';

                    }

                    if (value['idRole'] == 1) {
                        var st = 'USER';
                    } else {
                        var st = 'ADMIN';

                    }
                    $('.usersdata').append('<tr>\
                    <td class="userId" style="display:none">' + value['idUsers'] + '</td>\
                    <td>' + value['email'] + '</td>\
                    <td><a href="#" class="' + str + '"><i class="' + ico + '"></i></a></td>\
                    <td><a href="#"  class=" btn btn-primary role_btn">' + st + '</a></td>\
                    <td>\
                        <a href="#" class="text-info viewUser_btn" ><i class="fa fa-eye"></i></a>\
                        <a href="#" class="text-danger deleteUser_btn"><i class="fa fa-trash"></i></a>\
                    </td>\
                </tr>');

                });
                //Nombre total de données
                $('.total_data').append('' + response.total_data + ' donné(es) trouvé(es)')
                //pagination
                for (var i = 1; i <= response.pages; i++) {
                    $('.pagination').append('<li class="page-item " id="' + i + '"><a class="page-link active" href="#">' + i + '</a></li>')
                }

            }
        });
    }
</script>
<?= $this->endSection() ?>