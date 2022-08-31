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
                    <li class="breadcrumb-item"><a href="/admin-blog"><?= $titre ?></a></li>
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
                <input type="hidden" id="deleteeventId">
                Voulez vous supprimer ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger cdeleteBlog_btn" data-dismiss="modal">Oui</button>
            </div>

        </div>
    </div>
</div>


<section class="content">
    <div class="contain-fluild">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#addBlogModal"><i class="fa fa-plus"></i>Blog</button>

                <!-- The Modal -->
                <div class="modal" id="addBlogModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-center">Ajouter un blog</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="container ">
                                    <div class="row  ">
                                        <div class="col-md-12">

                                            <form action="/admin-addBlog" method="post" enctype="multipart/form-data" id="addBlogId">
                                                <div class="form-group">
                                                    <label>Titre</label>
                                                    <input type="text" name="titre" class="form-control">
                                                    <span class="text-danger error-text titre_error"></span>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="banniere" class="custom-file-input" id="banniere" value="<?= set_value('banniere') ?>">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Importer</span>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text banniere_error"></span>

                                                </div>

                                                <div class="form-group">
                                                    <label>Description<span class="text-danger">*</span></label>
                                                    <textarea class="form-control " name="description" rows="8"><?= set_value('descrition') ?></textarea>
                                                    <span class="text-danger error-text description_error"></span>


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
            </div>

            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <div id="example1_filter" class="dataTables_filter">
                                <label>Rechercher:<input type="search" class="form-control form-control-sm pull-right search" placeholder="Blog" aria-controls="example1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <th>Titre</th>
                                    <th>Bannière</th>
                                    <th>Description</th>
                                    <th>Statut</th>

                                    <th>Action</th>
                                </thead>
                                <tbody class="blogdata">

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
        getAllBlog(); //Fonction qui récupère tous les utilisateurs


        //Fonction qui recherche les utilisateurs dans la base de données
        function fetchDataBlog(query) {
            $.ajax({
                method: "POST",
                url: "/admin-fetchDataBlog",
                data: {
                    'query': query,
                },

                success: function(response) {
                    // console.log(response.users);
                    $.each(response.blog, function(key, value) {
                        // console.log(value['email']) ;
                        // Si le statut est actif icon vert sinon icon rouge 
                        if (value['statut'] == 'actif') {
                            var str = 'text-success statutEvent_btn';
                            var ico = 'fa fa-check-circle';
                        } else {
                            var str = 'text-danger statutEvent_btn';
                            var ico = 'fa fa-window-close';

                        }


                        $('.blogdata').append('<tr>\
                                    <td class="eventId" style="display:none">' + value['id'] + '</td>\
                                    <td>' + value['titre'] + '</td>\
                                    <td><img width="40%" height=auto src="' + value['banniere'] + '" alt=""></td>\
                                    <td>' + value['lieu'] + '</td>\
                                    <td>' + value['dateDebut'] + '</td>\
                                    <td>' + value['dateFin'] + '</td>\
                                    <td>' + value['heureDebut'] + '</td>\
                                    <td>' + value['heureFin'] + '</td>\
                                    <td>' + value['description'] + '</td>\
                                    <td>' + value['nom'] + '</td>\
                                    <td><a href="#" class="' + str + '"><i class="' + ico + '"></i></a></td>\
                                    <td>\
                                        <a href="#" class="text-danger deleteBlog_btn"><i class="fa fa-trash"></i></a>\
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
                $('.blogdata').html(""); //Empeche qu'il y ait des duplications d'informations en effacant la précédente

                fetchDataBlog(search);
            } else {
                $('.blogdata').html("");

                getAllBlog();
                $('.pagination').html('');
                $('.total_data').html('');
            }
        });


        //Lorsqu'on clique sur l'icon statut

        $(document).on('click', '.statutEvent_btn', function() {
            var eventId = $(this).closest('tr').find('.eventId').text();
            // alert(eventId);
            $.ajax({
                method: "POST",
                url: "/admin-updateEventStatut",
                data: {
                    'eventId': eventId
                },

                success: function(response) {
                    $('.blogdata').html("");
                    getAllBlog();
                    $('.pagination').html('');
                    $('.total_data').html('');
                }
            });
        });

    });


    //Lorsqu'on clique sur l'icon supprimer

    $(document).on('click', '.deleteBlog_btn', function() {
        var eventId = $(this).closest('tr').find('.eventId').text();
        $('#deleteeventId').val(eventId)
        $('#deleteModal').modal('show');

    });

    //Lorsqu'on confirme la suppression
    $(document).on('click', '.cdeleteBlog_btn', function() {
        var cblogId = $('#deleteeventId').val();
        $.ajax({
            method: "POST",
            url: "/admin-deleteBlog",
            data: {
                'cblogId': cblogId
            },
            success: function(response) {
                $('.blogdata').html('');
                getAllBlog();
                $('.pagination').html('');
                $('.total_data').html('');
                suc('Blog a été supprimé')



            }
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

    //Lorsqu'on clique sur le le bouton de pagination
    $(document).on('click', '.pagination li', function() {
        var id = $(this).attr('id');
        getAllBlog(id);
        $('.blogdata').html('');
        $('.pagination').html('');
        $('.total_data').html('');
    });



    //La définition de la fonction qui récupère tous les utilisateurs de la base de données
    function getAllBlog(page) {
        $.ajax({
            method: "POST",
            url: "/admin-getAllBlog",
            data: {
                'page': page
            },
            dataType: "json",

            success: function(response) {
                console.log(response.blog);
                $.each(response.blog, function(key, value) {
                    // console.log(value['email']) ;
                    // Si le statut est actif icon vert sinon icon rouge 
                    if (value['statut'] == 'actif') {
                        var str = 'text-success statutEvent_btn';
                        var ico = 'fa fa-check-circle';
                    } else {
                        var str = 'text-danger statutEvent_btn';
                        var ico = 'fa fa-window-close';

                    }


                    $('.blogdata').append('<tr>\
                                    <td class="eventId" style="display:none">' + value['id'] + '</td>\
                                    <td>' + value['titre'] + '</td>\
                                    <td><img width="30%" height=auto src="' + value['banniere'] + '" alt=""></td>\
                                    <td>' + value['description'] + '</td>\
                                    <td><a href="#" class="' + str + '"><i class="' + ico + '"></i></a></td>\
                                    <td>\
                                        <a href="#" class="text-danger deleteBlog_btn"><i class="fa fa-pencil"></i></a>\
                                        <a href="#" class="text-danger deleteBlog_btn"><i class="fa fa-trash"></i></a>\
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

    //Ajouter un blog

    $('#addBlogId').submit(function(e) {
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
            beforeSend: function() {
                $(form).find('span.error-text').text('')
            },
            success: function(response) {
                console.log(response.error)
                if ($.isEmptyObject(response.error)) {
                    if (response.code == 1) {
                        $('#addBlogModal').modal('hide');
                        $('.blogdata').html('');
                        getAllBlog();
                        $('.pagination').html('');
                        $('.total_data').html('');
                        suc(response.msg)

                    } else {
                        $('#addBlogModal').modal('hide');

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
</script>
<?= $this->endSection() ?>
<img src="" alt="">