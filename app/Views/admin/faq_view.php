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
                <input type="hidden" id="deletefaqId">
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

<!-- Modifier faq Modal -->
<div class="modal" id="editFaqModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title justify-content">Modifier une question</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <input type="hidden" class="form-control idFaq" id="question">


                        <div class="form-group col-md-9">

                            <input type="text" class="form-control question" id="question">
                            <span id='error_question' class="text text-danger"></span>

                        </div>

                        <div class="form-group col-md-9">

                            <input type="text" class="form-control reponse" id="reponse">
                            <span id='error_reponse' class="text text-danger"></span>

                        </div>


                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary updateFaq_btn">Modifier</button>
            </div>

        </div>
    </div>
</div>


<section class="content">
    <div class="contain-fluild">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#addFaqModal"><i class="fa fa-plus"></i>Question</button>

                <!-- The Modal -->
                <div class="modal" id="addFaqModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title justify-content">Ajouter une question</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row justify-content-center">

                                        <div class="form-group col-md-9">

                                            <input type="text" class="form-control question" placeholder="Entrez la question">
                                            <span id='error_question' class="text text-danger"></span>

                                        </div>

                                        <div class="form-group col-md-9">

                                            <input type="text" class="form-control reponse" placeholder="Entrez la reponse">
                                            <span id='error_reponse' class="text text-danger"></span>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary addFaq_btn">Ajouter</button>
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
                                <label>Rechercher:<input type="search" class="form-control form-control-sm pull-right search" placeholder="Par question" aria-controls="example1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="/admin-supprimerTout" method="post" id="suptout">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <th><button class="btn btn-danger">Supprimer tout</button></th>
                                        <th>Question</th>
                                        <th>Reponse</th>


                                        <th>Action</th>
                                    </thead>
                                    <tbody class="faqsdata">

                                    </tbody>
                                </table>

                            </form>

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
        getAllFaqs(); //Fonction qui récupère tous les utilisateurs
        $('.pagination').html('');
        $('.total_data').html('');


        //Fonction qui recherche les utilisateurs dans la base de données
        function fetchFaqData(query) {
            $.ajax({
                method: "POST",
                url: "/admin-fetchFaqData",
                data: {
                    'query': query,
                },

                success: function(response) {
                    console.log(response.faqs);
                    $.each(response.faqs, function(key, value) {
                        // console.log(value['question']) ;
                        // Si le statut est actif icon vert sinon icon rouge 

                        $('.faqsdata').append('<tr>\
                    <td class="faqId" style="display:none">' + value['idFaq'] + '</td>\
                    <td>' + value['question'] + '</td>\
                    <td>' + value['reponse'] + '</td>\
                    <td>\
                        <a href="#" class="text-info editFaq_btn" ><i class="fa fa-pen"></i></a>\
                        <a href="#" class="text-danger deleteFaq_btn"><i class="fa fa-trash"></i></a>\
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
                $('.faqsdata').html(""); //Empeche qu'il y ait des duplications d'informations en effacant la précédente

                fetchFaqData(search);
            } else {
                $('.faqsdata').html("");

                getAllFaqs();
                $('.pagination').html('');
                $('.total_data').html('');
            }
        });
        //Lorsqu'on clique sur l'icon edit
        $(document).on('click', '.editFaq_btn', function() {
            var faqId = $(this).closest('tr').find('.faqId').text();
            // alert(faqId);

            $.ajax({
                method: "POST",
                url: "/admin-getFaq",
                data: {
                    'faqId': faqId,
                },
                success: function(response) {
                    console.log(response)
                    $.each(response, function(key, userview) {
                        $('.idFaq').val(userview['idFaq']);
                        $('.question').val(userview['question']);
                        $('.reponse').val(userview['reponse']);

                        $('#editFaqModal').modal('show');

                    });
                }
            });
        });





        //Lorsqu'on clique sur ajouter un faq

        $(document).on('click', '.addFaq_btn', function() {
            if ($.trim($('.question').val()).length == 0) {
                error_question = 'Veuillez remplir le champs';
                $('#error_question').text(error_question);
            } else {
                error_question = '';
                $('#error_question').text(error_question);
            }

            if ($.trim($('.reponse').val()).length == 0) {
                error_reponse = 'Veuillez remplir le champs';
                $('#error_reponse').text(error_reponse);
            } else {
                error_reponse = '';
                $('#error_reponse').text(error_reponse);
            }






            if (error_question != '' || error_reponse != '') {
                return false;
            } else {
                var data = {
                    'question': $('.question').val(),
                    'reponse': $('.reponse').val(),

                };
                console.log(data)
                $.ajax({
                    method: "POST",
                    url: "/admin-insertFaq",
                    data: data,
                    success: function(response) {
                        $('#addFaqModal').modal('hide');
                        $('.faqsdata').html("");

                        getAllFaqs();
                        $('.pagination').html('');
                        $('.total_data').html('');

                        swal("" + response.status + "", "Cliquer", "success");





                    }
                });
            }



        });

        //Lorsqu'on clique sur modifier un faq

        $(document).on('click', '.updateFaq_btn', function() {
            if ($.trim($('.question').val()).length == 0) {
                error_question = 'Veuillez remplir le champs';
                $('#error_question').text(error_question);
            } else {
                error_question = '';
                $('#error_question').text(error_question);
            }

            if ($.trim($('.reponse').val()).length == 0) {
                error_reponse = 'Veuillez remplir le champs';
                $('#error_reponse').text(error_reponse);
            } else {
                error_reponse = '';
                $('#error_reponse').text(error_reponse);
            }






            if (error_question != '' || error_reponse != '') {
                return false;
            } else {
                var data = {
                    'idFaq': $('.idFaq').val(),
                    'question': $('.question').val(),
                    'reponse': $('.reponse').val(),

                };
                console.log(data)
                $.ajax({
                    method: "POST",
                    url: "/admin-updateFaq",
                    data: data,
                    success: function(response) {
                        $('#editFaqModal').modal('hide');
                        $('.faqsdata').html("");

                        getAllFaqs();
                        $('.pagination').html('');
                        $('.total_data').html('');

                        swal("Faq modifié", "Cliquer", "success");

                    }
                });
            }



        });






    });

    //Lorsqu'on clique sur l'icon supprimer

    $(document).on('click', '.deleteFaq_btn', function() {
        var faqId = $(this).closest('tr').find('.faqId').text();
        $('#deletefaqId').val(faqId)
        $('#deleteModal').modal('show');

    });

    //Lorsqu'on confirme la suppression
    $(document).on('click', '.cDelete_btn', function() {
        var faqId = $('#deletefaqId').val();
        $.ajax({
            method: "POST",
            url: "/admin-deleteFaq",
            data: {
                'faqId': faqId
            },
            success: function(response) {
                $('.faqsdata').html('');
                getAllFaqs();
                $('.pagination').html('');
                $('.total_data').html('');
                swal("Utilisateur a été supprimé", "Cliquer", "success");





            }
        });
    });

    //Lorsqu'on clique sur le le bouton de pagination
    $(document).on('click', '.pagination li', function() {
        var id = $(this).attr('id');
        getAllFaqs(id);
        $('.faqsdata').html('');
        $('.pagination').html('');
        $('.total_data').html('');
    });

    /**
     * Boutton supprimer tout
     */
    $("#suptout").submit(function(e) {
        e.preventDefault();

        var form = this

        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: new FormData(form),
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {
                if (response.code == 0) {
                    swal("" + response.error + "", "Cliquer", "error");
                } else {


                    swal("" + response.msg + "", "Cliquer", "success");
                    $('.faqsdata').html('');
                    $('.pagination').html('');
                    $('.total_data').html('');

                    getAllFaqs(); //Fonction qui récupère tous les utilisateurs

                }
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



    //La définition de la fonction qui récupère tous les utilisateurs de la base de données
    function getAllFaqs(page) {
        $.ajax({
            method: "POST",
            url: "/admin-getAllFaqs",
            data: {
                'page': page
            },
            dataType: "json",

            success: function(response) {
                // console.log(response.faqs);
                $.each(response.faqs, function(key, value) {
                    // console.log(value['question']) ;
                    // Si le statut est actif icon vert sinon icon rouge 

                    $('.faqsdata').append('<tr>\
                    <td class="faqId" style="display:none">' + value['idFaq'] + '</td>\
                    <td><input type="checkbox" name="checked_value[]" value="' + value['idFaq'] + '"></td>\
                    <td>' + value['question'] + '</td>\
                    <td>' + value['reponse'] + '</td>\
                    <td>\
                        <a href="#" class="text-info editFaq_btn" ><i class="fa fa-pen"></i></a>\
                        <a href="#" class="text-danger deleteFaq_btn"><i class="fa fa-trash"></i></a>\
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