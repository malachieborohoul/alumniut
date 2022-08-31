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
<section class="ftco-section ftco-consult  " style="background-image: url('<?=base_url()?>/public/importer/apropos/1629812693_aa1be7b72b47d5dd8fa6.png');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread " style="color:white;">Membres</h1>
        <p class="breadcrumbs" style="color:white;"><span class="mr-2" ><a style="color:white;" href="/">Accueil <i class="ion-ios-arrow-forward"></i></a></span> <span>Membres <i class="ion-ios-arrow-forward"></i></span> </p>
      </div>
    </div>
  </div>

</section>

<div class="container">


</div>

<section class="ftco-section bg-light">
  <div class="container-fluid px-4">
  <form action="/filtrerMembre" method="post" id="filtrer">
 <div class="row ">
  <div class="form-group col-2">
    <label for=""><strong>CYCLE</strong></label>
      <select name="parcours" id="parcours" class="form-control">
        
        <option  value="0">--|--</option>
        <option  value="1">DUT</option>
        <option  value="2">LICENCE</option>
        <span class="text-danger parcours_error"></span>
      </select>
    </div>
    <div class="form-group col-2 ">
    <label for=""><strong>FILIERE</strong></label>

      <select name="filiere" id="" class="form-control filiere">
      </select>
      <span class="text-danger filiere_error"></span>


    </div>
    <div class="form-group col-4">
    <label for=""><strong>ANNEE D'OBTENTION</strong></label>

      <select name="" id="obtention" class="form-control obtention">
      </select>
      <span class="text-danger obtention_error"></span>

    </div>
     <div class="form-group col-2">
    <button class="btn btn-danger">Filtrer</button>
    </div>

    
 </div>
</form>
  <div class="container-fluid px-4">
      <div class="row   usersdata">


      </div>
  </div>

    <div class=" ">
      <ul class="paginationF pagination"></ul>
    </div>

   

    

    
    <ul class=""></ul>
    

 

  <div class="container">
    <div class="row float-right">
      <div class="total_data "></div>
    </div>
    
  </div>
    






</section>




<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(document).ready(function() {
    getAllUsersLimit();
    
    //Lorsqu'on ecrit sur la barre de recherche
    $(document).on('keyup', '.rechercher', function() {
      var rechercher = $(this).val();
      if (rechercher != "") {
        rechercherUsers(rechercher);

        $('.usersdata').html('');
      } else {
        $('.usersdata').html('');
        getAllUsersLimit();
        $('.pagination').html('');
        $('.paginationF').html('');
        $('.total_data').html('');

      }
    });
    /**
     * Fonction de recherche 
     */

    function rechercherUsers(query) {
      $.ajax({
        method: "POST",
        url: "<?= base_url() ?>/rechercherUsers",
        data: {
          'query': query,
        },

        success: function(response) {
          console.log(response.users);
          $.each(response.users, function(index, value) {
          if(value['photo']==0)
          {
            if(value['genre']=='FEMME')
            {
              value['photo']="<?= base_url() ?>/importer/profiles/avatarfemme.png";

            }else
            {
              value['photo']="<?= base_url() ?>/importer/profiles/avatarman.png";

            }
            
          }
          if(value['apporter']!=null)
            {
              value['apporter']=value['apporter'];

            }else
            {
              value['apporter']="Je suis un bourreau de travail ambitieux, mais à part ça, une personne assez simple.";

            }
          $('.usersdata').append('\
          <div class="col-md-6 col-lg-3 ">\
                <div class="staff ">\
                  <div class="img-wrap d-flex align-items-stretch ">\
                    <div class="img align-self-stretch" style="background-image: url('  + value['photo'] + ');">\
                    </div>\
                  </div>\
                  <div class="text pt-3 text-center ">\
                    <h3>' + value['nom']+" "+ value['prenom'] + '</h3>\
                    <span class="position mb-2 ">' + value['nomS'] + '</span>\
                    <div class="faded">\
                      <p>' + value['apporter'] + '</p>\
                      <ul class="ftco-social text-center ">\
                        <li class=""><a href="#"><span class="icon-twitter"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-facebook"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-linkedln"></span></a></li>\
                        <li ><a href="<?= base_url() ?>/voirProfileMembre/' + value['idUsers'] + '"><span class="icon-eye"></span></a></li>\
                      </ul>\
                    </div>\
                  </div>\
                </div>\
            </div>\
          </div>\
               ')
        });

        }
      });
    }
    //Lorsqu'on clique sur le le bouton de pagination
    $(document).on('click', '.pagination a', function() {
      var id = $(this).attr('id');
      getAllUsersLimit(id);
      $('.usersdata').html('');
      $('.pagination').html('');
      $('.total_data').html('');
    });

    //Lorsqu'on clique sur le le bouton de pagination FIltre DUT
    $(document).on('click', '.paginationF li', function() {
      var id = $(this).attr('id');
      /**
       * Nous utilisons les sessions pour sauvegarder à chaque fois
       * qu'on appuie sur le boutton filtre la filiere et lannee d"obtention
       */
      var filiereF= '<?=session()->get('filiereF')?>';
      var obtentionF= '<?=session()->get('obtentionF')?>';
      filtrerMembreDUT(id,filiereF, obtentionF);
      $('.usersdata').html('');
      $('.paginationF').html('');
      $('.total_data').html('');
    });

    /**
     * Filtrer en selectionnant le parcours puis la filiere 
     * et l'année d'optention du 
     */
    $('#parcours').on('change', function () {
      value= $(this).val()
      // alert(value)
      if(value==1)
      {
        $.ajax({
          method: "GET",
          url: "<?=base_url()?>/getAllFiliereObtentionDUT",
          dataType: "json",
          success: function (response) {
            $('.filiere').html('');
            $('.obtention').html('');



            console.log(response.dut)
            $.each(response.dut, function (index, value) { 
               $('.filiere').append('\
                  <option value="'+value['idDUT']+'">'+value['nomDUT']+'</option>\
              ')
            });

            $.each(response.obtention, function (index, value) { 

               $('.obtention').append('\
                  <option value="'+value['idODUT']+'">'+value['anneeODUT']+'</option>\
              ')
            });
          }
        });
      }else if (value==2)
      {
        $.ajax({
          method: "GET",
          url: "<?=base_url()?>/getAllFiliereObtentionLicence",
          dataType: "json",
          success: function (response) {
            $('.filiere').html('');
            $('.obtention').html('');

            console.log(response.licence)
            $.each(response.licence, function (index, value) { 
               $('.filiere').append('\
                  <option value="'+value['idLI']+'">'+value['nomLI']+'</option>\
              ')
              
            });

            $.each(response.obtention, function (index, value) { 

               $('.obtention').append('\
                  <option value="'+value['idOL']+'">'+value['anneeOL']+'</option>\
              ')
            });
          }
        });

      }
    });

    /**
     * Appuyer le bouton pour filtrer
     * Si le parcours = 1 ie DUT on filtre 
     * en fonction du DUT et sinon cest en fonction de la licence
     */

    $('#filtrer').submit(function (e) { 
      e.preventDefault();
      var form = this
      var parcoursF= $('#parcours').val();
      var filiereF= $('.filiere').val();
      var obtentionF= $('.obtention').val();
      if(parcoursF==1)
      {
        var page='';
        filtrerMembreDUT(page,filiereF, obtentionF);
      }else
      {
        filtrerMembreLicence(page,filiereF, obtentionF);
      }
    });
  });

  /**
   * Filter les membres par rapport au parcours DUT
   */
  function filtrerMembreDUT(page,filiereF, obtentionF) {
    $.ajax({
      method: "POST",
      url: "<?= base_url() ?>/filtrerMembreDUT",
      data: {
        'page': page,
        'filiereF':filiereF,
        'obtentionF':obtentionF
      },
      dataType: "json",
      success: function(response) {
        console.log(response.filtreDUT);
          $('.usersdata').html('');
      $('.pagination').html('');
      $('.total_data').html('');
      $.each(response.filtreDUT, function(index, value) {
          if(value['photo']==0)
          {
            if(value['genre']=='FEMME')
            {
              value['photo']="<?= base_url() ?>/importer/profiles/avatarfemme.png";

            }else
            {
              value['photo']="<?= base_url() ?>/importer/profiles/avatarman.png";

            }
            
          }
          if(value['apporter']!=null)
            {
              value['apporter']=value['apporter'];

            }else
            {
              value['apporter']="Je suis un bourreau de travail ambitieux, mais à part ça, une personne assez simple.";

            }
          $('.usersdata').append('\
          <div class="col-md-6 col-lg-3 ">\
                <div class="staff ">\
                  <div class="img-wrap d-flex align-items-stretch ">\
                    <div class="img align-self-stretch" style="background-image: url('  + value['photo'] + ');">\
                    </div>\
                  </div>\
                  <div class="text pt-3 text-center ">\
                    <h3>' + value['nom']+" "+ value['prenom'] + '</h3>\
                    <span class="position mb-2 ">' + value['nomS'] + '</span>\
                    <div class="faded">\
                      <p>' + value['apporter'] + '</p>\
                      <ul class="ftco-social text-center ">\
                        <li class=""><a href="#"><span class="icon-twitter"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-facebook"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-linkedln"></span></a></li>\
                        <li ><a href="/voirProfileMembre/' + value['idUsers'] + '"><span class="icon-eye"></span></a></li>\
                      </ul>\
                    </div>\
                  </div>\
                </div>\
            </div>\
          </div>\
               ')
        });

        //Nombre total de données
        $('.total_data').append('' + response.total_data + ' donné(es) trouvé(es)')
        //pagination
        for (var i = 1; i <= response.pages; i++) {
          $('.paginationF').append('<li class="page-item " id="' + i + '"><a class="page-link active" href="#">' + i + '</a></li>')
        }



      }
    });
  }

  /**
   * Filtrer les membres par rapport au parcours Licence
   */
  function filtrerMembreLicence(page,filiereF, obtentionF) {
    $.ajax({
      method: "POST",
      url: "<?= base_url() ?>/filtrerMembreLicence",
      data: {
        'page': page,
        'filiereF':filiereF,
        'obtentionF':obtentionF
      },
      dataType: "json",
      success: function(response) {
        console.log(response.filtreLicence);
          $('.usersdata').html('');
      $('.pagination').html('');
      $('.total_data').html('');
      $.each(response.filtreLicence, function(index, value) {
          if(value['photo']==0)
          {
            if(value['genre']=='FEMME')
            {
              value['photo']="<?= base_url() ?>/importer/profiles/avatarfemme.png";

            }else
            {
              value['photo']="<?= base_url() ?>/importer/profiles/avatarman.png";

            }
            
          }
          if(value['apporter']!=null)
            {
              value['apporter']=value['apporter'];

            }else
            {
              value['apporter']="Je suis un bourreau de travail ambitieux, mais à part ça, une personne assez simple.";

            }
          $('.usersdata').append('\
          <div class="col-md-6 col-lg-3 ">\
                <div class="staff ">\
                  <div class="img-wrap d-flex align-items-stretch ">\
                    <div class="img align-self-stretch" style="background-image: url('  + value['photo'] + ');">\
                    </div>\
                  </div>\
                  <div class="text pt-3 text-center ">\
                    <h3>' + value['nom']+" "+ value['prenom'] + '</h3>\
                    <span class="position mb-2 ">' + value['nomS'] + '</span>\
                    <div class="faded">\
                      <p>' + value['apporter'] + '</p>\
                      <ul class="ftco-social text-center ">\
                        <li class=""><a href="#"><span class="icon-twitter"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-facebook"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-linkedln"></span></a></li>\
                        <li ><a href="/voirProfileMembre/' + value['idUsers'] + '"><span class="icon-eye"></span></a></li>\
                      </ul>\
                    </div>\
                  </div>\
                </div>\
            </div>\
          </div>\
               ')
        });

        //Nombre total de données
        $('.total_data').append('' + response.total_data + ' donné(es) trouvé(es)')
        //pagination
        for (var i = 1; i <= response.pages; i++) {
          $('.paginationF').append('<li class="page-item " id="' + i + '"><a class="page-link active" href="#">' + i + '</a></li>')
        }



      }
    });
  }



  function getAllUsersLimit(page) {
    $.ajax({
      method: "POST",
      url: "<?= base_url() ?>/getAllUsersLimit",
      data: {
        'page': page
      },
      dataType: "json",
      success: function(response) {
        console.log(response.users)
        $.each(response.users, function(index, value) {
          if(value['photo']==0)
          {
            if(value['genre']=='FEMME')
            {
              value['photo']="<?= base_url() ?>/importer/profiles/avatarfemme.png";

            }else
            {
              value['photo']="<?= base_url() ?>/importer/profiles/avatarman.png";

            }

            
            
            
          }
          if(value['apporter']!=null)
            {
              value['apporter']=value['apporter'];

            }else
            {
              value['apporter']="Je suis un bourreau de travail ambitieux, mais à part ça, une personne assez simple.";

            }
          $('.usersdata').append('\
          <div class="col-md-6 col-lg-3 ">\
                <div class="staff ">\
                  <div class="img-wrap d-flex align-items-stretch ">\
                    <div class="img align-self-stretch" style="background-image: url('  + value['photo'] + ');">\
                    </div>\
                  </div>\
                  <div class="text pt-3 text-center ">\
                    <h3>' + value['nom']+" "+ value['prenom'] + '</h3>\
                    <span class="position mb-2 ">' + value['nomS'] + '</span>\
                    <div class="faded">\
                      <p>' + value['apporter'] + '</p>\
                      <ul class="ftco-social text-center ">\
                        <li class=""><a href="#"><span class="icon-twitter"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-facebook"></span></a></li>\
                        <li class=""><a href="#"><span class="icon-linkedln"></span></a></li>\
                        <li ><a href="/voirProfileMembre/' + value['idUsers'] + '"><span class="icon-eye"></span></a></li>\
                      </ul>\
                    </div>\
                  </div>\
                </div>\
            </div>\
          </div>\
               ')
        });

        //Nombre total de données
        $('.total_data').append('' + response.total_data + ' donné(es) trouvé(es)')
        //pagination
        for (var i = 1; i <= response.pages; i++) {
          $('.pagination').append('<a id="' + i + '" class="page-link active" href="#">' + i + '</a>')
        }



      }
    });
  }
</script>
<?= $this->endSection() ?>