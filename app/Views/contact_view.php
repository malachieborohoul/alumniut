<?=$this->extend('layouts/main')?>
<?=$this->section('photo')?>
            <?php if(empty($userdata['photo'])):?>  
                <img src="<?=base_url()?>/public/assets/img/avatar.jpg" width="30" class="d-block mx-auto" >
            <?php else:?>
                <img src="<?=$userdata['photo']?>" width="50" alt="">

            <?php endif;?>
                
        <?=$this->endSection()?>
<?=$this->section('content')?>
   <!-- Start Banner Hero -->
   <section class="bg-light">
        <div class="container py-4">
            <div class="row align-items-center justify-content-between">
                <div class="contact-header col-lg-4">
                    <h1 class="h2 pb-3 text-primary">Contact</h1>
                    <h3 class="h4 regular-400">Elit, sed do eiusmod tempor</h3>
                    <p class="light-300">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, perferendis neque ex officiis quisquam voluptatum quos corrupti tempore ut ratione maxime vel similique eveniet delectus consequatur harum, dolorem quae corporis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ipsa cupiditate eius facere, ipsam doloribus quisquam quas praesentium excepturi sapiente dolorum nam culpa. Suscipit error velit rem aut? Aliquid, laborum!
                    </p>
                </div>
                <div class="contact-img col-lg-5 align-items-end col-md-4">
                    <img src="<?=base_url()?>/public/assets/img/banner-img-01.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->


    <!-- Start Contact -->
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
            
            <h1 class="col-12 col-xl-8 h2 text-left text-primary pt-3">Envoyez nous un message!</h1>
                <h2 class="col-12 col-xl-8 h4 text-left regular-400">Elit, sed do eiusmod tempor </h2>
                <p class="col-12 col-xl-8 text-left text-muted pb-5 light-300">
                    Incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                    gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate.
                </p>

                
                <!-- Start Contact Form -->
                    <form class="contact-form row" method="post" action="#" role="form">

                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-lg light-300" id="nom" name="nom" placeholder="Nom">
                                <label for="floatingsubject light-300">Nom</label>
                            </div>
                        </div><!-- End Input Nom -->
                        
                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control form-control-lg light-300" id="email" name="email" placeholder="Email">
                                <label for="floatingsubject light-300">Email</label>
                            </div>
                        </div><!-- End Input Email -->

                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-lg light-300" id="telephone" name="telephone" placeholder="Telephone">
                                <label for="floatingsubject light-300">Telephone</label>
                            </div>
                        </div><!-- End Input Telephone -->


                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-lg light-300" id="objet" name="objet" placeholder="Objet">
                                <label for="floatingsubject light-300">Objet</label>
                            </div>
                        </div><!-- End Input Objet -->

                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control light-300" rows="8" placeholder="Message" name="message" id="message"></textarea>
                                <label for="floatingtextarea light-300">Message</label>
                            </div>
                        </div><!-- End Textarea Message -->

                        <div class="col-md-12 col-12 m-auto text-end">
                            <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Envoyer Message</button>
                        </div>
                        <br><br><br><br>

                    </form>
                <!-- End Contact Form -->
        </div>

    </div>
    <!-- End Contact -->

<?=$this->endSection()?>