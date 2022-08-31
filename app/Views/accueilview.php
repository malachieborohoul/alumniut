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
<?= $this->section('userphoto') ?>
<?php if (isset($userdata->photo)) : ?>
    <?= $userdata->photo ?>

<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('idUser') ?>
<?php if (isset($userdata->idUsers)) : ?>
    <?= $userdata->idUsers ?>

<?php endif ?>
<?= $this->endSection() ?>

<!--  -->
<?= $this->section('totalmembre') ?>
<?php if (isset($totalmembre)) : ?>
    <?= $totalmembre ?>

<?php endif ?>
<?= $this->endSection() ?>
<!--  -->
<?= $this->section('totaltravailleur') ?>
<?php if (isset($totaltravailleur)) : ?>
    <?= $totaltravailleur ?>

<?php endif ?>
<?= $this->endSection() ?>
<!--  -->
<?= $this->section('totalchomeur') ?>
<?php if (isset($totalchomeur)) : ?>
    <?= $totalchomeur ?>

<?php endif ?>
<?= $this->endSection() ?>

<!-- RUBRIQUE  -->

<?= $this->section('titre1') ?>
<?php if (isset($rubrique->titre1)) : ?>
    <?= $rubrique->titre1?>
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('titre2') ?>
<?php if (isset($rubrique->titre2)) : ?>
    <?= $rubrique->titre2?>
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('titre3') ?>
<?php if (isset($rubrique->titre3)) : ?>
    <?= $rubrique->titre3?>
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('titre4') ?>
<?php if (isset($rubrique->titre4)) : ?>
    <?= $rubrique->titre4?>
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('description1') ?>
<?php if (isset($rubrique->description1)) : ?>
    <?= $rubrique->description1?>
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('description2') ?>
<?php if (isset($rubrique->description2)) : ?>
    <?= $rubrique->description2?>
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('description3') ?>
<?php if (isset($rubrique->description3)) : ?>
    <?= $rubrique->description3?>
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('description4') ?>
<?php if (isset($rubrique->description4)) : ?>
    <?= $rubrique->description4?>
<?php endif ?>
<?= $this->endSection()?>





<?= $this->section('content') ?>
<?= $this->include('partials/slider') ?>
<?= $this->include('partials/rubrique') ?>
<?= $this->include('partials/apropos') ?>
<!-- Afficher 4 évènements  -->
<section class="ftco-section ">
    <div class="container-fluid px-4 ">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4"><span>Nos</span> Evènements</h2>
                <p>Les évènements listés ci-dessous sont ouverts à tous</p>
            </div>
        </div>


        <div class="row">
            <?php foreach ($events as $ev) : ?>
                <div class="col-md-3 course ftco-animate ">
                    <div class="img" style="background-image: url(<?= $ev['banniere'] ?>);"></div>
                    <div class="text pt-4">
                        <p class="meta d-flex">
                            <span><i class="icon-user mr-2"></i><?= $ev['nom'] ?></span>
                            <span><i class="icon-calendar mr-2"></i><?= $ev['dateDebut'] ?></span>
                            <span><i class="icon-calendar mr-2"></i><?= $ev['dateFin'] ?></span>
                            <span><i class="icon-building mr-2"></i><?= $ev['lieu'] ?></span>
                        </p>
                        <h3><a href="#"><?= $ev['titre'] ?></a></h3>
                        <!-- <p><?= $ev['description'] ?></p> -->

                    </div>


                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Afficher les membres aléatoirement -->

<section class="ftco-section bg-light">
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4">Membres</h2>
                <p></p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($users as $user) : ?>

                <div class="col-md-6 col-lg-3 ftco-animate ">
                    <div class="staff">
                        <?php if($user['photo']==0):?>
                            <?php if($user['genre']=='FEMME'):?>
                                <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(<?= base_url() ?>/importer/profiles/avatarfemme.png);">
                                </div>
                            </div>

                            <?php else:?>
                                <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(<?= base_url() ?>/importer/profiles/avatarman.png);">
                                </div>
                            </div>

                            <?php endif;?>

                        <?php else:?>
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch" style="background-image: url(<?= $user['photo'] ?>);">
                                </div>
                            </div>

                        <?php endif;?>

                        <div class="text pt-3 text-center">
                            <h3><?= $user['nom'] ?></h3>
                            <span class="position mb-2"><?= $user['nomS'] ?></span>
                            <div class="faded">
                                <?php if($user['apporter']) : ?>
                                    <p><?= $user['apporter'] ?></p>
                                <?php else :?>
                                    <p>Je suis un bourreau de travail ambitieux, mais à part ça, une personne assez simple.</p>
                                <?php endif;?>
                                
                                <ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <p class="mb-0 d-flex float-right"><a href="<?= base_url() ?>/voirMembre" class="btn btn-primary ">Voir plus <span class="ion-ios-arrow-round-forward "></span></a></p>


    </div>
</section>



<?php // $this->include('partials/poser_question') ?>

<!-- Afficher 3 blog-->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4"><span>Blogs</span> Récents</h2>
                <p></p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($blogs as $blog) : ?>

                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url(<?= $blog['banniere'] ?>);">
                            <!-- <div class="meta-date text-center p-2">
								<span class="day"><?= $blog['created_at'] ?></span>
								<span class="mos">June</span>
								<span class="yr">2019</span>
							</div> -->
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="#"><?= $blog['titre'] ?></a></h3>
                            <div class="d-flex align-items-center mt-4">
                                <p class="mb-0"><a href="/voirBlogDetail/<?= $blog['uniidblog'] ?>" class="btn btn-primary">Voir plus <span class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="/voirProfileMembre/<?= $blog['idUsers'] ?>" class="mr-2"><?= $blog['nom'] ?></a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>

<!-- Afficher 4 photos de la galerie-->

<section class="ftco-gallery">
    <div class="container-wrap">
        <div class="row no-gutters">
            <?php foreach ($photos as $photo) : ?>

                <div class="col-md-3 ftco-animate">
                    <a href="<?= $photo['photo'] ?>" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?= $photo['photo'] ?>);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>

                
            <?php endforeach; ?>


        </div>
    </div>
</section>




<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  
</script>
<?= $this->endSection() ?>