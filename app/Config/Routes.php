<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Accueil');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Accueil::index');
$routes->get('/renvoiLogin', 'Accueil::renvoiLogin');
$routes->get('/voirEvenement', 'User::voirEvenement');
$routes->get('/voirMembre', 'User::voirMembre');
$routes->add('/voirProfileMembre/(:any)', 'User::voirProfileMembre/$1');
$routes->add('/editProfile', 'User::editProfile');
$routes->add('/blog', 'Blog::index');
$routes->add('/verifierCompte/(:any)', 'Register::verifierCompte/$1');
$routes->add('/trouverOffre', 'User::trouverOffre');
$routes->add('/offre', 'User::offre');
$routes->add('/trouverEvenement', 'User::evenement');
$routes->add('/voirBlogDetail/(:any)', 'Blog::voirBlogDetail/$1');
$routes->add('/logout', 'Accueil::logout');
$routes->add('/admin-dashboard', 'Adm::index');
$routes->add('/admin-users', 'Adm::users');
$routes->add('/admin-offres', 'Adm::offre');
$routes->add('/admin-faq', 'Adm::faq');
$routes->add('/admin-blog', 'Adm::blog');
$routes->add('/admin-galerie', 'Adm::galerie');
$routes->add('/admin-evenement', 'Adm::evenement');
$routes->add('/admin-rubrique', 'Adm::rubrique');
$routes->add('/admin-editApropos', 'Adm::editApropos');
$routes->add('/admin-editInfos', 'Adm::editInfos');
$routes->add('/admin-editSlider', 'Adm::editSlider');
$routes->add('/admin-banniere', 'Adm::banniere');
$routes->add('/faq', 'User::faq');


$routes->get('/getNotifSuivre', 'User::getNotifSuivre');
$routes->get('/getAllFiliereObtentionLicence', 'User::getAllFiliereObtentionLicence');
$routes->get('/rechercherUsers', 'User::rechercherUsers');
$routes->get('/getAllFiliereObtentionDUT', 'User::getAllFiliereObtentionDUT');
$routes->get('/getLoggedInUserPhoto', 'User::getLoggedInUserPhoto');
$routes->get('/getLoggedInUserCV', 'User::getLoggedInUserCV');
$routes->get('/getLoggedInUserData', 'User::getLoggedInUserData');
$routes->get('/getArticlePopulaire', 'Blog::getArticlePopulaire');
$routes->get('/admin-loadOffre', 'Adm::loadOffre');
$routes->get('/admin-loadUser', 'Adm::loadUser');
$routes->get('/admin-loadEvent', 'Adm::loadEvent');
$routes->get('/admin-totalOffreUserEvent', 'Adm::totalOffreUserEvent');
$routes->get('/admin-getAllRubrique', 'Adm::getAllRubrique');


$routes->post('/filtrerMembreDUT', 'User::filtrerMembreDUT');
$routes->post('/filtrerMembreLicence', 'User::filtrerMembreLicence');
$routes->post('/getAllUsersLimit', 'User::getAllUsersLimit');
$routes->post('/login', 'Login::index');
$routes->post('/register', 'Register::addUser');
$routes->post('/suivre', 'User::suivre');
$routes->post('/desabonne', 'User::desabonne');
$routes->post('/isSuivre', 'User::isSuivre');
$routes->post('/nombreAbonneSuivre', 'User::nombreAbonneSuivre');
$routes->post('/editPhotoProfile', 'User::editPhotoProfile');
$routes->post('/addCV', 'User::addCV');
$routes->post('/editPersonnel', 'User::editPersonnel');
$routes->post('/editCompte', 'User::editCompte');
$routes->post('/editEtude', 'User::editEtude');
$routes->post('/editProfessionnel', 'User::editProfessionnel');
$routes->post('/editPassword', 'User::editPassword');
$routes->post('/vuTelephone', 'User::vuTelephone');
$routes->post('/vuDateNaiss', 'User::vuDateNaiss');
$routes->post('/vuNotifSuivre', 'User::vuNotifSuivre');
$routes->post('/insertEntreprise', 'Adm::insertEntreprise');
$routes->post('/activerCompte', 'Register::activerCompte');
$routes->post('/ajouterOffre', 'User::ajouterOffre');
$routes->post('/rechercherUsers', 'User::rechercherUsers');
$routes->post('/getAllOffresLimit', 'User::getAllOffresLimit');
$routes->post('/getAllEventsLimit', 'User::getAllEventsLimit');
$routes->post('/ajouterEvent', 'User::ajouterEvent');
$routes->post('/getAllBlogsLimit', 'User::getAllBlogsLimit');
$routes->post('/commenter', 'Blog::commenter');
$routes->post('/afficherReponse', 'Blog::afficherReponse');
$routes->post('/masquerReponse', 'Blog::masquerReponse');
$routes->post('/publierReponse', 'Blog::publierReponse');
$routes->post('/getBlogParId', 'Blog::getBlogParId');
$routes->post('/getAllComments', 'Blog::getAllComments');
$routes->post('/admin-insertUser', 'Adm::insertUser');
$routes->post('/admin-getAllUsers', 'Adm::getAllUsers');
$routes->post('/admin-fetchData', 'Adm::fetchData');
$routes->post('/admin-getUser', 'Adm::getUser');
$routes->post('/admin-updateStatut', 'Adm::updateStatut');
$routes->post('/admin-updateRole', 'Adm::updateRole');
$routes->post('/admin-deleteUser', 'Adm::deleteUser');
$routes->post('/admin-insertOffre', 'Adm::insertOffre');
$routes->post('/admin-fetchOffreData', 'Adm::fetchOffreData');
$routes->post('/admin-updateStatutOffre', 'Adm::updateStatutOffre');
$routes->post('/admin-deleteOffre', 'Adm::deleteOffre');
$routes->post('/admin-getAllOffre', 'Adm::getAllOffre');
$routes->post('/admin-supprimerTout', 'Adm::supprimerTout');
$routes->post('/admin-fetchFaqData', 'Adm::fetchFaqData');
$routes->post('/admin-getFaq', 'Adm::getFaq');
$routes->post('/admin-insertFaq', 'Adm::insertFaq');
$routes->post('/admin-updateFaq', 'Adm::updateFaq');
$routes->post('/admin-deleteFaq', 'Adm::deleteFaq');
$routes->post('/admin-getAllFaqs', 'Adm::getAllFaqs');
$routes->post('/admin-addBlog', 'Adm::addBlog');
$routes->post('/admin-addBlog', 'Adm::addBlog');
$routes->post('/admin-fetchDataBlog', 'Adm::fetchDataBlog');
$routes->post('/admin-updateEventStatut', 'Adm::updateEventStatut');
$routes->post('/admin-deleteBlog', 'Adm::deleteBlog');
$routes->post('/admin-getAllBlog', 'Adm::getAllBlog');
$routes->post('/admin-addGaleriePhoto', 'Adm::addGaleriePhoto');
$routes->post('/admin-fetchDataEvents', 'Adm::fetchDataEvents');
$routes->post('/admin-updateGalerieStatut', 'Adm::updateGalerieStatut');
$routes->post('/admin-deleteGalerie', 'Adm::deleteGalerie');
$routes->post('/admin-getAllGalerie', 'Adm::getAllGalerie');
$routes->post('/admin-addEvenement', 'Adm::addEvenement');
$routes->post('/admin-fetchDataEvents', 'Adm::fetchDataEvents');
$routes->post('/admin-updateEventStatut', 'Adm::updateEventStatut');
$routes->post('/admin-deleteEvent', 'Adm::deleteEvent');
$routes->post('/admin-getAllEvents', 'Adm::getAllEvents');
$routes->post('/admin-editVu', 'Adm::editVu');
$routes->post('/admin-editVuUser', 'Adm::editVuUser');
$routes->post('/admin-editVuEvent', 'Adm::editVuEvent');
$routes->post('/admin-editRubrique', 'Adm::editRubrique');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
