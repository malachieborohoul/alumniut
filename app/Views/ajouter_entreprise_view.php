<?=$this->extend('layouts/main')?>

        <?=$this->section('photo')?>
            <?php if(empty($userdata['photo'])):?>  
                <img src="<?=base_url()?>/public/assets/img/avatar.jpg" width="30" class="d-block mx-auto" >
            <?php else:?>
                <?=$userdata['photo']?>

            <?php endif;?>
                
        <?=$this->endSection()?>

<?=$this->section('content')?>
<script>
    setTimeout(function(){
        $('#hidemsg').hide();
    },3000);

</script>
    <?php form_open()?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <h1 class="   text-primary pt-3">Ajouter une entreprise</h1>
                    <?php if(session()->getTempdata('success')):?>
                      <div id='hidemsg' class="alert alert-success"><?=session()->getTempdata('success')?></div>    
                    <?php endif;?>

                    <?php if(session()->getTempdata('error')):?>
                        <div id='hidemsg' class="alert alert-danger"><?=session()->getTempdata('error')?></div>    
                    <?php endif;?>

                    <!-- Start Register Form -->
                    <form class="contact-form row" method="post" action="#" role="form">

                    <div class="col-10">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg light-300" id="nom" name="nom" placeholder="Nom" value="<?=set_value('nom')?>">
                            <label for="floatingsubject light-300">Nom de l'entreprise</label>
                            <span class="text text-danger"><?=display_error($validation, 'nom')?></span>

                        </div>
                    </div>

                    <div class="col-10">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg light-300" id="pays" name="pays" placeholder="pays" value="<?=set_value('pays')?>">
                            <label for="floatingsubject light-300">Pays</label>
                            <span class="text text-danger"><?=display_error($validation, 'nom')?></span>

                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg light-300" id="ville" name="ville" placeholder="ville" value="<?=set_value('ville')?>">
                            <label for="floatingsubject light-300">Ville</label>
                            <span class="text text-danger"><?=display_error($validation, 'ville')?></span>

                        </div>
                    </div>

                    
                    <div class="col-md-12 col-12 m-auto text-end">
                        <a class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" href="<?=base_url()?>/user/edit">Retour</a>

                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Ajouter</button>
                    </div>
                    <br><br><br><br>

                    </form>
                    <!-- End Register Form -->
                </div>
            </div>

        </div>
            
    <?php form_close()?>
<?=$this->endSection()?>