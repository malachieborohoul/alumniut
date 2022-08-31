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

<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3 blogtitre"></h2>
            <p class="blogbanniere">
            </p>
            <p class="blogdescription">
              
            </p>

           
    
            <!-- <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">Life</a>
                <a href="#" class="tag-cloud-link">Sport</a>
                <a href="#" class="tag-cloud-link">Tech</a>
                <a href="#" class="tag-cloud-link">Travel</a>
              </div>
            </div>
            
            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="images/teacher-1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3>George Washington</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div> -->


            <div class="pt-5 mt-5">

          
              <h3 class="mb-5 h4 font-weight-bold nombreComment"></h3>

             
              <div id="comment" class="anyClass" >

              </div>
               
               
               

              <!-- END comment-list -->
            <div class="container">
            <form action="/commenter" method="post" id="commenter">
                    <div class="form-group col-md-12">
                      <textarea name="message" id="message" cols="30" rows="1" placeholder="Laisser un commentaire" class="form-control message"></textarea>
                      <span class="text-danger error_message"></span>
                    </div>
                    <input type="hidden" name="idBlog" class="idBlog">
                    <div class="form-group float-right">
                      <input type="submit" value="Commenter" class="btn btn-primary">
                    </div>

                </form>
            </div>
             
              
       
            </div>
        
          </div> <!-- .col-md-8 -->
          

                 

          <div class="col-lg-4 sidebar ftco-animate">
            <!-- <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3>Category</h3>
              <ul class="categories">
                <li><a href="#">Art <span>(6)</span></a></li>
                <li><a href="#">Sports <span>(8)</span></a></li>
                <li><a href="#">Language <span>(2)</span></a></li>
                <li><a href="#">Food <span>(2)</span></a></li>
                <li><a href="#">Music <span>(2)</span></a></li>
              </ul>
            </div> -->

            <div class="sidebar-box ftco-animate" >
              <h3>Articles populaires</h3>
              <div id="populaire"></div>
             
              </div>

            <!-- <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <ul class="tagcloud m-0 p-0">
                <a href="#" class="tag-cloud-link">School</a>
                <a href="#" class="tag-cloud-link">Kids</a>
                <a href="#" class="tag-cloud-link">Nursery</a>
                <a href="#" class="tag-cloud-link">Daycare</a>
                <a href="#" class="tag-cloud-link">Care</a>
                <a href="#" class="tag-cloud-link">Kindergarten</a>
                <a href="#" class="tag-cloud-link">Teacher</a>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
            	<h3>Archives</h3>
              <ul class="categories">
              	<li><a href="#">December 2018 <span>(30)</span></a></li>
              	<li><a href="#">Novemmber 2018 <span>(20)</span></a></li>
                <li><a href="#">September 2018 <span>(6)</span></a></li>
                <li><a href="#">August 2018 <span>(8)</span></a></li>
              </ul>
            </div>


            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div> -->
          </div><!-- END COL -->
        </div>
			</div>
		</section>

          
          
     

     
             
      


<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script>
  
 $(document).ready(function () {
  //  setInterval(function(){
  //         getAllComments();
  //  }, 5000);
   getBlogParId();
   
          getAllComments();

          getArticlePopulaire();

          
/**
 * Récupère les acticles les plus populaires en terme du nombre commentaires
 *
 * @return void
 */
 function getArticlePopulaire()
 {
   

   $.ajax({
    method: "GET",
     url: "/getArticlePopulaire",
     dataType: "json",
     success: function (response) {
       console.log('OK');
       var pop="";
       $.each(response.populaire, function (index, value) { 
         pop+=
        ' <div class="block-21 mb-4 d-flex">\
                <a class="blog-img mr-4" style="background-image: url('+value.banniere+');"></a>\
                <div class="text">\
                  <h3 class="heading"><a href="/voirBlogDetail/'+value.uniidblog+'">'+value.titre+'</a></h3>\
                  <div class="meta">\
                    <div><a href="#"><span class="icon-calendar"></span> '+value.blogcreated_at+'</a></div>\
                    <div><a href="#"><span class="icon-person"></span>'+value.nom+'</a></div>\
                    <div><a href="#"><span class="icon-chat"></span>'+value.nbrComment+'</a></div>\
                  </div>\
                </div>\
              </div>';
          
       });

       $('#populaire').html(pop);
     }
   });

   
 }


/**
 * Lorsqu'on clique sur le boutton afficher. ca nous affiche toutes les reponses
 */
 $(document).on('click','.afficherReponseCommentaire', function () {
   var commentId =$(this).closest('ul.comment').find('.commentId').text() ;
   $.ajax({
    method: "post",
     url: "/afficherReponse",
     data: {"commentId":commentId},
     dataType: "json",
     success: function (response) {
      console.log(response.msg);
       getAllComments(commentId);
       
     }
   });
 });

 /**
  * Ca masque toutes les reponses
  */
 $(document).on('click','.masquerReponseCommentaire', function () {
   var commentId =$(this).closest('ul.comment').find('.commentId').text() ;
   $.ajax({
    method: "post",
     url: "/masquerReponse",
     data: {"commentId":commentId},
     dataType: "json",
     success: function (response) {
       console.log(response.msg);
       getAllComments();
     }
   });
 });
 


 $(document).on('click','.publierReponse', function (e) {
   e.preventDefault();
   var commentId =$(this).closest('ul.comment').find('.commentId').text() ;
   if($.trim($('.reponse').val()).length==0)
   {
     $('.error_reponse').text('Veuillez remplir le champ');
   }
   else
   {
    $('.error_reponse').text('');
    var reponse= $('.reponse').val();

    // alert(reponse)
    $.ajax({
      method: "post",
      url: "/publierReponse",
      data: {
        "reponse":reponse,
        "commentId":commentId
      },
      success: function (response) {
        console.log(response.msg);
        $('.reponse').val('');
      }
    });


   }
  //  $.ajax({
  //   method: "post",
  //    url: "<?=base_url()?>/public/blog/publierReponse",
  //    data: {"commentId":commentId},
  //    dataType: "json",
  //    success: function (response) {
  //     getAllComments();
       
  //    }
  //  });
 });

          
        
   
   /**
    * Lorsqu'on clique sur le boutton commenter
    */
   $('#commenter').submit(function (e) { 
     e.preventDefault();
     var form=this
     $.ajax({
      method: $(form).attr('method'),
       url: $(form).attr('action'),
       data: new FormData(form),
       dataType: "json",
       processData: false,
       contentType: false,
       success: function (response) {
          console.log(response.error)
          if ($.isEmptyObject(response.error)) {
            if (response.code == 1) {
              $('.message').val("");
              $('#comment').html('');
              getAllComments();
              getArticlePopulaire();
             
              suc(response.msg);

            } else {
              err(response.msg);
            }
          } else {
            $.each(response.error, function(prefix, val) {
              $(form).find('span.error_' + prefix + '').text(val);
            });
          }
       }
     });
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

    function err(msg) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'error',
            title: msg

        });

    }

    /**
     * Récupérer un article à partir de l'uniid généré qui nous a été envoyé
     *
     * @return void
     */
 function getBlogParId()
 {
   var id=<?=$id?>;
   $.ajax({
    method: "post",
     url: "/getBlogParId",
     data: {"id":id},
     dataType: "json",
     success: function (response) {
       console.log(response.blog);
       $('.idBlog').val(<?=$id?>);

       $('.blogtitre').append(response.blog.titre);
        $('.blogdescription').append(response.blog.description);
        $('.blogbanniere').append('<img src="'+response.blog.banniere+'" alt="" class="img-fluid">');
        

     }
   });
 }

 

/**
 * Récuperer tous les commentaires par rapport à cet articles
 *
 * @return void
 */
function getAllComments(commentId)
 {
   
  var id=<?=$id?>;

   $.ajax({
    method: "post",
     url: "/getAllComments",
     data: {
       "id":id,
       "commentId":commentId
    },
     dataType: "json",
     success: function (response) {
       console.log(response.comment);
       console.log(response.reponse);
       var html='';
       var nbrComment=response.nombre;
       var reponseCommentaire="";
       
       $.each(response.reponse, function (index, value) { 
        if(value['photo']==0)
          {
            if(value['genre']=='FEMME')
            {
              value['photo']="/importer/profiles/avatarfemme.png";

            }else
            {
              value['photo']="/importer/profiles/avatarman.png";

            }
            
          }
        reponseCommentaire+=
                    '<ul class="comment-list">\
                      <li class="comment">\
                        <ul class="comment-list">\
                          <li class="comment">\
                            <div class="vcard bio">\
                              <img src="'+value['photo']+'" alt="Image ">\
                            </div>\
                            <div class="comment-body">\
                              <h3>'+value['nom']+'</h3>\
                              <div class="meta mb-2">June 27, 2019 at 2:21pm</div>\
                              <p>'+value['message']+'</p>\
                            </div>\
                          </li>\
                        </ul>\
                      </li>\
                    </ul>';
        
       });
                        
       reponseCommentaire+=
                            '<div class="row">\
                                <form action="/commenter" method="post" id="publierReponse">\
                                  <div class="row">\
                                    <div class="form-group col-md-7">\
                                      <textarea name="reponse" id="reponse" cols="30" rows="1" placeholder="Repondre" class="form-control reponse"></textarea>\
                                      <span class="text-danger error_reponse"></span>\
                                    </div>\
                                    <input type="hidden" name="idBlog" class="idBlog">\
                                    <div class="form-group col-md-5">\
                                      <input type="submit" value="Publier" class="btn btn-primary publierReponse">\
                                    </div>\
                                  </div>\
                                </form>\
                              </div>';
       /**
        * Si le champ vuReponse de la table commentaire est à 0 
        * alors il faudrait afficher les différentes reponse d'un commentaire
        * Nous faisons cela parcequ'apres chaque 5 secondes les commentaires
        * sont actualisés et par conséquent ca revient toujours à l'état initial 
        * donc il faudrait s'assurer que soit le user a cliquer pour afficher
        * les reponses ou soit pour les masquer
        */
       var bouttonAfficherReponse='\
       <button   class="afficherReponseCommentaire float-right">Afficher les reponses</button></div>';
      /**
       * Ici il masque les reponses de commenntaires
       */
       var bouttonMasquerReponse=' \
         <button   class="masquerReponseCommentaire reply">Masquer</button>\
               '+reponseCommentaire+'\
                  </div>';
       $.each(response.comment, function (index, value) { 
        
          html+=
         '<ul class="comment-list comment">\
              <li class="comment">\
                  <div class="vcard bio">\
                    <img src="'+value['photo']+'" alt="Image placeholder">\
                  </div>\
                  <div class="comment-body">\
                    <h3>'+value['nom']+'</h3>\
                    <div class="meta mb-2">'+value['commentcreated_at']+'</div>\
                    <p>'+value['message']+'</p>\
                    <div class="row">\
                      <div><p><button class="reply afficherReponseCommentaire col-md-12">Repondre</button></p></div>\
                      <div>'+ (value['vuReponse']==0 ? bouttonAfficherReponse:bouttonMasquerReponse)+'</div>\
                    </div>\
                    <p style="display:none" class="commentId">'+value['idComment']+'</p>\
              </li>\
            </ul>';
       });
       $(".nombreComment").html(nbrComment+' commentaires');
       $('#comment').html(html)
     
        

     }
   });

   
 }


 



 
</script>
<?= $this->endSection() ?>
<div></div>









