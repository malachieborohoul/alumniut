<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('admin') ?>

<?= $this->section('email') ?>
<?= $userdata->email ?>
<?= $this->endSection() ?>
<?php
?>
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
          <li class="breadcrumb-item"><a href="/admin-offres"><?= $titre ?></a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!--  Modal de suppression -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body justify-content-center">
        <input type="hidden" id="deleteOffreId">
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


<section class="content">
  <div class="contain-fluild">
    <div class="card">
      <!-- /.card-header -->
      <div class="card-header">
        <button class="btn btn-success float-right" data-toggle="modal" data-target="#addOffreModal"><i class="fa fa-plus"></i>Offre</button>

        <!-- The Modal -->
        <div class="modal" id="addOffreModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title justify-content">Ajouter une offre</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div class="container">
                  <div class="row ">
                    <div class="col-md-12">



                      <form action="/admin-insertOffre" method="post" id="insertOffres">
                        <div class="form-group ">
                          <label>Titre<span class="text-danger">*</span></label>
                          <input type="text" name="titre" class="form-control titre">
                          <span id='error_titre' class="text text-danger"></span>

                        </div>

                        <div class="form-group ">

                          <label>Nom de l'entreprise<span class="text-danger">*</span></label>
                          <input type="text" name="nomEntreprise" class="form-control ">
                          <span id='error_nomEntreprise' class="text text-danger"></span>

                        </div>

                        <div class="form-group ">

                          <label>Date de début<span class="text-danger">*</span></label>
                          <input type="date" name="dateDebut" class="form-control ">
                          <span id='error_dateDebut' class="text text-danger"></span>

                        </div>

                        <div class="form-group ">

                          <label>Date de fin<span class="text-danger">*</span></label>
                          <input type="date" name="dateFin" class="form-control ">
                          <span id='error_dateFin' class="text text-danger"></span>

                        </div>


                        <div class="form-group ">
                          <label>Adresse de l'entreprise</label>
                          <input type="text" name="adresseEntreprise" class="form-control ">
                          <!-- <span id='error_adresseEntreprise' class="text text-danger"></span> -->
                        </div>

                        <div class="form-group ">
                          <label>Téléphone de l'entreprise</label>
                          <input type="text" name="telephoneEntreprise" class="form-control ">
                          <!-- <span id='error_telephoneEntreprise' class="text text-danger"></span> -->
                        </div>

                        <div class="form-group ">
                          <label>Email de l'entreprise</label>
                          <input type="email" name="emailEntreprise" class="form-control ">
                          <!-- <span id='error_telephoneEntreprise' class="text text-danger"></span> -->
                        </div>


                        <div class="form-group ">
                          <label>Salaire</label>
                          <input type="number" name="salaire" class="form-control ">
                          <!-- <span id='error_salaire' class="text text-danger"></span> -->
                        </div>



                        <div class="form-group ">
                          <label>Exigence</label>
                          <input type="text" name="exigence" class="form-control ">
                          <!-- <span id='error_exigence' class="text text-danger"></span> -->
                        </div>
                        <br><br>

                        <div class="form-group">
                          <label>Description<span class="text-danger">*</span></label>
                          <textarea class="form-control " name="description" rows="8"></textarea>
                          <span id='error_description' class="text text-danger"></span>
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
                <label>Rechercher:<input type="search" class="form-control form-control-sm pull-right search" placeholder="Par titre, user ou statut" aria-controls="example1"></label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                  <th>Titre</th>
                  <th>Nom de l'entreprise</th>
                  <th>Salaire</th>
                  <th>Date de début</th>
                  <th>Date de fi </th>
                  <th>Description</th>
                  <th>Lien</th>
                  <th>Attache</th>
                  <th>User</th>
                  <th>Statut</th>


                  <th>Action</th>
                </thead>
                <tbody class="offredata">

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
<?= $this->include('admin/cmps/titre') ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
  $(document).ready(function() {
    getAllOffre(); //Fonction qui récupère toutes les offre


    //Fonction qui recherche les utilisateurs dans la base de données
    function fetchOffreData(query) {
      $.ajax({
        method: "POST",
        url: "/admin-fetchOffreData",
        data: {
          'query': query,
        },

        success: function(response) {
          // console.log(response.offre);
          $.each(response.offre, function(key, value) {
            // console.log(value['email']) ;
            // Si le statut est actif icon vert sinon icon rouge 
            if (value['statut'] == 'actif') {
              var str = 'text-success statut_btn';
              var ico = 'fa fa-check-circle';
            } else {
              var str = 'text-danger statut_btn';
              var ico = 'fa fa-window-close';

            }


            $('.offredata').append('<tr>\
                      <td class="offreId" style="display:none">' + value['idOffre'] + '</td>\
                      <td class="userId" style="display:none">' + value['idUsers'] + '</td>\
                      <td>' + value['titre'] + '</td>\
                      <td>' + value['nomEntreprise'] + '</td>\
                      <td>' + value['salaire'] + '</td>\
                      <td>' + value['dateDebut'] + '</td>\
                      <td>' + value['dateFin'] + '</td>\
                      <td>' + value['description'] + '</td>\
                      <td>' + value['nom'] + '</td>\
                      <td><a href="#" class="' + str + '"><i class="' + ico + '"></i></a></td>\
                      <td>\
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
        $('.offredata').html(""); //Empeche qu'il y ait des duplications d'informations en effacant la précédente

        fetchOffreData(search);
      } else {
        $('.offredata').html("");
        $('.pagination').html('');
        $('.total_data').html('');

        getAllOffre();
      }
    });


    //Lorsqu'on clique sur l'icon statut

    $(document).on('click', '.statut_btn', function() {
      var offreId = $(this).closest('tr').find('.offreId').text();
      var userId = $(this).closest('tr').find('.userId').text();

      // alert(userId);
      $.ajax({
        method: "POST",
        url: "/admin-updateStatutOffre",
        data: {
          'offreId': offreId,
          'userId': userId

        },

        success: function(response) {
          $('.offredata').html("");
          getAllOffre();
          $('.pagination').html('');
        $('.total_data').html('');
        }
      });
    });

    //Lorsqu'on clique sur l'icon supprimer

    $(document).on('click', '.delete_btn', function() {
      var offreId = $(this).closest('tr').find('.offreId').text();
      $('#deleteOffreId').val(offreId)
      $('#deleteModal').modal('show');

    });

    //Lorsqu'on confirme la suppression
    $(document).on('click', '.cDelete_btn', function() {
      var offreId = $('#deleteOffreId').val();
      $.ajax({
        method: "POST",
        url: "/admin-deleteOffre",
        data: {
          'offreId': offreId
        },
        success: function(response) {
          $('.offredata').html('');
          getAllOffre();
          $('.pagination').html('');
        $('.total_data').html('');
          suc('Offre a été supprimée')



        }
      });
    });

     //Lorsqu'on clique sur le le bouton de pagination
     $(document).on('click', '.pagination li', function() {
        var id = $(this).attr('id');
        getAllOffre(id);
        $('.offredata').html('');
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

    //Lorsqu'on clique sur ajouter pour ajouter une offre
    $('#insertOffres').submit(function(e) {
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
              $('.offredata').html("");
              $('#addOffreModal').modal('hide');
              suc(response.msg)
              getAllOffre();
              $('.pagination').html('');
              $('.total_data').html('');

            } else {
              suc(response.msg)

            }
          } else {
            $.each(response.error, function(prefix, val) {
              $(form).find('span#error_' + prefix + '').text(val);
            });
          }
        }
      });

    });


  });



  //La définition de la fonction qui récupère tous les utilisateurs de la base de données
  function getAllOffre(page) {
    $.ajax({
      method: "POST",
      url: "/admin-getAllOffre",
      data: {
        'page': page
      },
      dataType: "json",

      success: function(response) {
        console.log(response.offre);
        $.each(response.offre, function(key, value) {
          // console.log(value['email']) ;
          // Si le statut est actif icon vert sinon icon rouge 
          if (value['statut'] == 'actif') {
            var str = 'text-success statut_btn';
            var ico = 'fa fa-check-circle';
          } else {
            var str = 'text-danger statut_btn';
            var ico = 'fa fa-window-close';

          }

          if (value['attache']=="" ) {
            var telecharger='';
          } else {
            var telecharger='Télécharger';

          }



          $('.offredata').append('<tr>\
                      <td class="offreId" style="display:none">' + value['idOffre'] + '</td>\
                      <td class="userId" style="display:none">' + value['idUsers'] + '</td>\
                      <td>' + value['titre'] + '</td>\
                      <td>' + value['nomEntreprise'] + '</td>\
                      <td>' + value['salaire'] + '</td>\
                      <td>' + value['dateDebut'] + '</td>\
                      <td>' + value['dateFin'] + '</td>\
                      <td>' + value['description'] + '</td>\
                      <td>' + value['lien'] + '</td>\
                      <td ><a href="'+ value['attache'] +'" download><i class="icon icon-download"></i>'+telecharger+'</a></td>\
                      <td>' + value['nom'] + '</td>\
                      <td><a href="#" class="' + str + '"><i class="' + ico + '"></i></a></td>\
                      <td>\
                          <a href="#" class="text-danger delete_btn"><i class="	fa fa-trash"></i></a>\
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