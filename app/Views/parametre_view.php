<?php $page_session=\Config\Services::session()?>
<?=$this->section('phone')?>
    <?php if(isset($coordo->telephone)):?>
     <?=$coordo->telephone?>

    <php else:?>
        
    <?php endif?>
<?=$this->endSection()?> 

<?=$this->section('adresse')?>
    <?php if(isset($coordo->adresse)):?>
     <?=$coordo->adresse?>

    <php else:?>
        
    <?php endif?>
<?=$this->endSection()?>    
            
     
<?=$this->extend('layouts/main')?>
<?=$this->section('content')?>
<br><br>
<script>
setTimeout(function(){
    $('#hidemsg').hide();
},3000);
</script>

    <!-- Breadcrumbs Styles -->  
        <div class="container">
        <div class="row" style="margin-top: 15%;">
            <div class="col-lg-6 col-lg-offset-3 text-center">
            <h1 class="irs-bc-title2">Paramètre</h1>
            </div>
        </div>
        </div>

    <!-- Breadcrumbs html --> 
    <section class="irs-ip-brdcrumb">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right irs-bb-right">
            <ul class="list-inline irs-brdcrmb">
                <li><a href="#">Accueil</a></li>
                <li><a href="#"> > </a></li>
                <li><a class="active" href="#">Paramètre</a></li>
            </ul>
            </div>
        </div>
        </div>
    </section>

    <section class="irs-ip-details">
    <div class="container">
      <div class="row irs-all-course-bb clearfix">
        <?=$this->include('cmps/parametre')?>
        <?=$this->include('cmps/nouvelle')?>
          
          
        </div>
    
        <div class="container" >
            <div class="row" style="margin-top: 15%;" > 
                <div class="col-md-5 col-md-offset-3">
                <?= form_open(base_url(). '/public/accueil/test') ?>
                <?php if(session()->getTempdata('error')) :?>
                    <div id='hidemsg' class="alert alert-danger"><?=session()->getTempdata('error')?></div>
                <?php endif;?>
                
                <?php if(session()->getTempdata('success')) :?>
                    <div id='hidemsg' class="alert alert-success"><?=session()->getTempdata('success')?></div>
                <?php endif;?>
                <form class="irs-login-form" >
                <h3>Connexion <span class="flaticon-padlock"></span></h3>


                    <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control" >
                            <span   class="text text-danger"><?=isset($validation) ? display_error($validation, 'nom'): '' ?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input  type="text" name="telephone" class="form-control">
                            <span  class="text text-danger"><?=isset($validation) ? display_error($validation, 'telephone'): '' ?></span>


                        </div>
                        <div class="form-group">
                            <button class="btn btn-default irs-button-styledark btn-block" type="submit">Envoyer</button>
                        </div>
                        <div class="form-group">
                            <a href="#">Vous avez oublié le mot de passe?</a>
                        </div>

                </form>
                <?= form_close()?>


                </div>
            </div>
        </div>
</div>
      
      </div>
    </div>
  </section>



   
        
                    
                       

<?=$this->endSection()?>

<?=$this->section('scripts')?>
    <script>
       $(document).ready(function(){
            $(document).on('click','.save', function(){
                if($.trim($('.nomEntre').val()).length == 0 )
                {
                    error_name = 'Veuillez entrez le nom';
                    $('#error_name').text(error_name);
                }
                else
                {
                    error_name = '';
                    $('#error_name').text(error_name);
                }

                if(error_name != '')
                {
                    return false;
                }
                else
                {
                    var data ={
                        'nom': $('.nomEntre').val(),
                    };
                    $.ajax({
                        method: 'POST',
                        url: "<?=base_url()?>/public/Accueil/store",
                        data: data,
                        success: function(response){
                            window.location= '<?=base_url()?>/public/accueil/parametre';

                            $('#myModal').modal('hide');
                            $('#myModal').find('input').val('');
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(response.status);
                        }
                    });
                }
            });
        });
    </script>                                        
<?=$this->endSection()?>
