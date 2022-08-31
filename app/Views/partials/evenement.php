<section class="ftco-section ">
    <div class="container-fluid px-4 ">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4"><span>Nos</span> Evènements</h2>
                <p>Les évènements listés ci-dessous sont ouverts à tous</p>
            </div>
        </div>


        <div class="row">
            <?php foreach ($this->renderSection('events') as $ev) : ?>
                <div class="col-md-3 course ftco-animate ">
                    <div class="img" style="background-image: url(images/course-1.jpg);"></div>
                    <div class="text pt-4">
                        <p class="meta d-flex">
                            <span><i class="icon-user mr-2"></i>Mr. Khan</span>
                            <span><i class="icon-table mr-2"></i>10 seats</span>
                            <span><i class="icon-calendar mr-2"></i>4 Years</span>
                        </p>
                        <h3><a href="#">Electric Engineering</a></h3>
                        <p>Separated they live in. A small river named Duden flows by their place and supplies it with
                            the necessary regelialia. It is a paradisematic country</p>
                        <p><a href="#" class="btn btn-primary">Apply now</a></p>
                    </div>


                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
