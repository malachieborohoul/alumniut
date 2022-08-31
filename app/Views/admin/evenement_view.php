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
                    <li class="breadcrumb-item"><a href="/admin-evenement"><?= $titre ?></a></li>
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
                <button type="button" class="btn btn-danger cdeleteEvent_btn" data-dismiss="modal">Oui</button>
            </div>

        </div>
    </div>
</div>


<section class="content">
    <div class="contain-fluild">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#addEvenementModal"><i class="fa fa-plus"></i>Evènement</button>

                <!-- The Modal -->
                <div class="modal" id="addEvenementModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-center">Ajouter un évènement</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="container ">
                                    <div class="row  ">
                                        <div class="col-md-12">

                                            <form action="/admin-addEvenement" method="post" enctype="multipart/form-data" id="addEvenementId">

                                                <div class="form-group">
                                                    <label><span class="text text-danger">* </span>Titre évènement</label>
                                                    <input type="text" name="titre" class="form-control" value="<?= set_value('titre') ?>">
                                                    <span class="text-danger titre_error"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label><span class="text text-danger">* </span>Lieu évènement</label>
                                                    <input type="text" name="lieu" class="form-control" value="<?= set_value('lieu') ?>">
                                                    <span class="text-danger lieu_error"></span>

                                                </div>

                                                <div class="form-group">
                                                    <label><span class="text text-danger">* </span>Date début évènement </label>
                                                    <input type="date" name="dateDebut" class="form-control" value="<?= set_value('dateDebut') ?>">
                                                    <span class="text-danger dateDebut_error"></span>

                                                </div>

                                                <div class="form-group">
                                                    <label><span class="text text-danger">* </span>Date fin évènement </label>
                                                    <input type="date" name="dateFin" class="form-control" value="<?= set_value('dateFin') ?>">
                                                    <span class="text-danger dateFin_error"></span>

                                                </div>

                                                <div class="form-group">
                                                    <label><span class="text text-danger">* </span>Heure début évènement </label>
                                                    <input type="time" name="heureDebut" class="form-control" value="<?= set_value('heureDebut') ?>">
                                                    <span class="text-danger heureDebut_error"></span>

                                                </div>

                                                <div class="form-group">
                                                    <label><span class="text text-danger">* </span>Heure fin évènement </label>
                                                    <input type="time" name="heureFin" class="form-control" value="<?= set_value('heureFin') ?>">
                                                    <span class="text-danger heureFin_error"></span>

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
                                                    <span class="text-danger banniere_error"></span>

                                                </div>

                                                <div class="form-group">
                                                    <label>Description<span class="text-danger">*</span></label>
                                                    <textarea class="form-control " name="description" rows="8"><?= set_value('descrition') ?></textarea>
                                                    <span class="text-danger description_error"></span>


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
                                <label>Rechercher:<input type="search" class="form-control form-control-sm pull-right search" placeholder="Par nom de l'utilisateur ou titre de l'évènement" aria-controls="example1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <th>Titre</th>
                                    <th>Bannière</th>
                                    <th>Lieu</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Heure début</th>
                                    <th>Heure fin</th>
                                    <th>Description</th>
                                    <th>User</th>
                                    <th>Statut</th>


                                    <th>Action</th>
                                </thead>
                                <tbody class="eventsdata">

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
        getAllEvents(); //Fonction qui récupère tous les utilisateurs


        //Fonction qui recherche les utilisateurs dans la base de données
        function fetchDataEvents(query) {
            $.ajax({
                method: "POST",
                url: "/admin-fetchDataEvents",
                data: {
                    'query': query,
                },

                success: function(response) {
                    // console.log(response.users);
                    $.each(response.events, function(key, value) {
                        // console.log(value['email']) ;
                        // Si le statut est actif icon vert sinon icon rouge 
                        if (value['statut'] == 'actif') {
                            var str = 'text-success statutEvent_btn';
                            var ico = 'fa fa-check-circle';
                        } else {
                            var str = 'text-danger statutEvent_btn';
                            var ico = 'fa fa-window-close';

                        }


                        $('.eventsdata').append('<tr>\
                                    <td class="eventId" style="display:none">' + value['id'] + '</td>\
                                    <td class="userId" style="display:none">' + value['idUsers'] + '</td>\
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
                                        <a href="#" class="text-danger deleteEvent_btn"><i class="fa fa-trash"></i></a>\
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
                $('.eventsdata').html(""); //Empeche qu'il y ait des duplications d'informations en effacant la précédente

                fetchDataEvents(search);
            } else {
                $('.eventsdata').html("");

                getAllEvents();
                $('.pagination').html('');
                $('.total_data').html('');
            }
        });


        //Lorsqu'on clique sur l'icon statut

        $(document).on('click', '.statutEvent_btn', function() {
            var eventId = $(this).closest('tr').find('.eventId').text();
            var userId = $(this).closest('tr').find('.userId').text();
            // alert(userId);
            $.ajax({
                method: "POST",
                url: "/admin-updateEventStatut",
                data: {
                    'eventId': eventId,
                    'userId': userId
                },

                success: function(response) {
                    
                        // swal(""+response.msg+"", "Cliquer", "success");

                        // suc('Ses abonnés recevront des notifications');
                        $('.eventsdata').html("");
                        getAllEvents();
                        $('.pagination').html('');
                        $('.total_data').html('');

                  
                    
                }
            });
        });

    });




    //Lorsqu'on clique sur l'icon supprimer

    $(document).on('click', '.deleteEvent_btn', function() {
        var eventId = $(this).closest('tr').find('.eventId').text();
        $('#deleteeventId').val(eventId)
        $('#deleteModal').modal('show');

    });

    //Lorsqu'on confirme la suppression
    $(document).on('click', '.cdeleteEvent_btn', function() {
        var ceventId = $('#deleteeventId').val();
        $.ajax({
            method: "POST",
            url: "/admin-deleteEvent",
            data: {
                'ceventId': ceventId
            },
            success: function(response) {
                $('.eventsdata').html('');
                getAllEvents();
                $('.pagination').html('');
                $('.total_data').html('');
                suc('Evènement a été supprimé')



            }
        });
    });

    //Lorsqu'on clique sur le le bouton de pagination
    $(document).on('click', '.pagination li', function() {
        var id = $(this).attr('id');
        getAllEvents(id);
        $('.eventsdata').html('');
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



    //La définition de la fonction qui récupère tous les utilisateurs de la base de données
    function getAllEvents(page) {
        $.ajax({
            method: "POST",
            url: "/admin-getAllEvents",
            data: {
                'page': page
            },
            dataType: "json",

            success: function(response) {
                console.log(response.events);
                $.each(response.events, function(key, value) {
                    // console.log(value['email']) ;
                    // Si le statut est actif icon vert sinon icon rouge 
                    if (value['statut'] == 'actif') {
                        var str = 'text-success statutEvent_btn';
                        var ico = 'fa fa-check-circle';
                    } else {
                        var str = 'text-danger statutEvent_btn';
                        var ico = 'fa fa-window-close';

                    }


                    $('.eventsdata').append('<tr>\
                                    <td class="eventId" style="display:none">' + value['id'] + '</td>\
                                    <td class="userId" style="display:none">' + value['idUsers'] + '</td>\
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
                                        <a href="#" class="text-danger deleteEvent_btn"><i class="fa fa-trash"></i></a>\
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
    //Ajouter évènements
    $('#addEvenementId').submit(function(e) {
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
                        $('#addEvenementModal').modal('hide');
                        $('.eventsdata').html('');
                        getAllEvents();
                        $('.pagination').html('');
                        $('.total_data').html('');
                        suc(response.msg)

                    } else {
                        $('#addEvenementModal').modal('hide');

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


    // //Envoyer les notifications aux personnes qui suivent le membre qui a public l'évènement
    // getDernierEventActive()
    // {
    //     $.ajax({
    //         method: "GET",
    //         url: "<?=base_url()?>/public/adm/getDernierEventActive",
    //         data: "data",
    //         dataType: "dataType",
    //         success: function (response) {
                
    //         }
    //     });
    // }
</script>
<?= $this->endSection() ?>
<img src="" alt="">