<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/admin/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/admin/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/admin/assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/alertify.min.css">
    <link rel="icon" type="image/png" href="//admin/assets/img/crud_logo.png" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                    <h5 class="nav-link">Bienvenue <em class="text-danger"><?= $this->renderSection('email') ?></em></h5>
                </li>

            </ul>





            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/">
                        <i class="fa fa-home"></i>
                    </a>

                </li>
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="/admin/assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="/admin/assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="/admin/assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-danger navbar-badge totalOffre"></span>
                        <span class="totalOffreZero"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- <i class="fas fa-envelope mr-2"></i>  -->
                            <div class="table notif"></div>
                        </a>

                        <div class="dropdown-divider"></div>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/admin/assets/img/" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Panel d'admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <?= $this->include('admin/cmps/nav') ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('admin') ?>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->


        </div>
        <!-- Modal voir offre -->
        <div class="modal fade" id="offreModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title "><strong>OFFRE</strong> </h4>
                    </div>



                    <!-- Modal body -->
                    <div class="modal-body">
                        <h4>Titre: <span class="titre_view"></span></h4>
                        <h6 class="text-danger">Veuillez svp activer l'offre</h6>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal voir user -->
        <div class="modal fade" id="userModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title "><strong>UTILISATEUR</strong> </h4>
                    </div>



                    <!-- Modal body -->
                    <div class="modal-body">
                        <h6 class="text-danger">Veuillez svp activer l'utilisateur <span class="nom_view"></span></h6>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal évènement user -->
        <div class="modal fade" id="eventModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title "><strong>EVENEMENT</strong> </h4>
                    </div>



                    <!-- Modal body -->
                    <div class="modal-body">
                        <h6 class="text-danger">Veuillez svp activer l'évènement <span class="titreEvent_view"></span></h6>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>

                </div>
            </div>
        </div>

        <?= $this->section('scripts') ?>

        <script>
            $(document).ready(function() {

                loadOffre();
                loadUser();
                loadEvent();
                totalOffreUserEvent();

                $(document).on('click', '.viewOffre_btn', function() {
                    var offreId = $(this).closest('tr').find('.offreId').text();

                    $.ajax({
                        method: "POST",
                        url: "/admin-editVu",
                        data: {
                            'offreId': offreId,
                        },
                        success: function(response) {
                            $('.notif').html("");
                            $('.totalOffre').html("");
                            $.each(response, function(key, value) {
                                $('.titre_view').text(value['titre']);
                                $('.libelle_view').text(value['lebelle']);
                                $('#offreModal').modal('show');

                            });


                            loadOffre();
                            loadUser();
                            loadEvent();
                            totalOffreUserEvent();




                        }
                    });
                });

                $(document).on('click', '.viewUserNotif_btn', function() {
                    var userVuId = $(this).closest('tr').find('.userVuId').text();

                    $.ajax({
                        method: "POST",
                        url: "/admin-editVuUser",
                        data: {
                            'userVuId': userVuId,
                        },
                        success: function(response) {
                            $('.notif').html("");
                            $('.totalOffre').html("");
                            $.each(response, function(key, value) {
                                $('.nom_view').text(value['nom']);
                                $('#userModal').modal('show');

                            });


                            loadOffre();
                            loadUser();
                            loadEvent();
                            totalOffreUserEvent();



                        }
                    });
                });

                $(document).on('click', '.viewEvent_btn', function() {
                    var eventVuId = $(this).closest('tr').find('.eventVuId').text();

                    $.ajax({
                        method: "POST",
                        url: "/admin-editVuEvent",
                        data: {
                            'eventVuId': eventVuId,
                        },
                        success: function(response) {
                            $('.notif').html("");
                            $('.totalOffre').html("");
                            $.each(response, function(key, value) {
                                $('.titreEvent_view').text(value['titre']);
                                $('#eventModal').modal('show');

                            });


                            loadOffre();
                            loadUser();
                            loadEvent();
                            totalOffreUserEvent();



                        }
                    });
                });

            });

            function loadOffre() {
                $.ajax({
                    method: "GET",
                    url: "/admin-loadOffre",

                    success: function(response) {
                        // console.log(response.offre);

                        $.each(response.offre, function(key, value) {
                            $('.notif').append('<tr>\
                            <td style="display:none" class="offreId">' + value['idOffre'] + '</td>\
                            <td>\
                                Activation offre\
                            </td>\
                            <td>\
                                <a href="#" class=" viewOffre_btn " ><i class="fa fa-eye"></i></a>\
                            </td>\
                        </tr>');

                        });
                    }
                });
            }


            function loadUser() {
                $.ajax({
                    method: "GET",
                    url: "/admin-loadUser",

                    success: function(response) {
                        console.log(response.user);

                        $.each(response.user, function(key, value) {
                            $('.notif').append('<tr>\
                            <td style="display:none" class="userVuId">' + value['idUsers'] + '</td>\
                            <td>\
                                <stong>Activation compte</stong>\
                            </td>\
                            <td>\
                                <a href="#" class=" viewUserNotif_btn " ><i class="fa fa-eye"></i></a>\
                            </td>\
                        </tr>');

                        });
                    }
                });
            }

            function loadEvent() {
                $.ajax({
                    method: "GET",
                    url: "/admin-loadEvent",

                    success: function(response) {
                        //  console.log(response.event);

                        $.each(response.event, function(key, value) {
                            $('.notif').append('<tr>\
                            <td style="display:none" class="eventVuId">' + value['id'] + '</td>\
                            <td>\
                                <stong>Activation évènement</stong>\
                            </td>\
                            <td>\
                                <a href="#" class=" viewEvent_btn " ><i class="fa fa-eye"></i></a>\
                            </td>\
                        </tr>');

                        });
                    }
                });
            }

            function totalOffreUserEvent() {
                $.ajax({
                    method: "GET",
                    url: "/admin-totalOffreUserEvent",
                    success: function(response) {
                        if (response.offreuserevent == 0) {
                            $('.totalOffreZero').append('<tr>\
                        </tr>');
                        } else {
                            $('.totalOffre').append('<tr>\
                            <td class="offreId">' + response.offreuserevent + '</td>\
                        </tr>');
                        }

                    }

                });
            }
        </script>
        <?= $this->endSection() ?>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            All rights reserved.

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/admin/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/admin/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/admin/assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/admin/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/admin/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/admin/assets/plugins/moment/moment.min.js"></script>
    <script src="/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/assets/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/admin/assets/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/admin/assets/js/demo.js"></script>

    <!-- SweetAlert2 -->
    <script src="/admin/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?= $this->renderSection('scripts') ?>

</body>

</html>