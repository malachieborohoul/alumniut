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
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/public/Adm/galerie"><?= $titre ?></a></li>
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
                <input type="hidden" id="deletegalerieId">
                Voulez vous supprimer ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger cdeleteGalerie_btn" data-dismiss="modal">Oui</button>
            </div>

        </div>
    </div>
</div>


<section class="content">
    <div class="contain-fluild">
        <div class="card">
        
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="pagination"></div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline " role="grid" aria-describedby="example1_info">
                               <thead>
                                   <th>#</th>
                                   <th>Nom</th>
                               </thead>
                               <tbody class="ensdata">

                               </tbody>
                            </table>
                        </div>
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
    $(document).ready(function () {
        getEns();

        $(document).on('click','.pagination li', function () {
            var id=$(this).attr('id');
            getEns(id)
            $('.ensdata').html("")


        });
    });
 




    function getEns(page)
    {
        $.ajax({
            method: "POST",
            url: "<?=base_url()?>/public/adm/getEns",
            data: {
                'page':page
            },
            dataType:"json",
            success: function (response) {
                console.log(response.ens)
                //pagination
                for(var i=1; i<=response.pages; i++ )
                {
                    $('.pagination').append('<li class="page-link " id="'+i+'"><a class="page-link active" href="#">'+i+'</a></li>')
                }
                //getEnseignant
               $.each(response.ens, function (key, value) { 
                    $('.ensdata').append('<tr>\
                        <td>'+value['id']+'</td>\
                        <td>'+value['nom']+'</td>\
                    </tr>') 
               });
            }
        });
    }
</script>
<?= $this->endSection() ?>


