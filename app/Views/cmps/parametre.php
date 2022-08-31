<?php
$request = service('request');
?>
<div class="col-sm-12 col-md-4 col-lg-3">
  <div class="irs-sb-courses">
    <h3 class="irs-sblc-title text-center">Paramètre</h3>
    <ul class="list-unstyled irs-sbc-list">
      <li class="nav-link <?= $request->uri->getSegment(2) == 'editProfile' ? 'active' : null; ?>"><a href="<?= base_url() ?>/public/user/editProfile"><span class="flaticon-arrows-3"></span> Modifier profile</a></li>
      <li class="nav-link <?= $request->uri->getSegment(2) == 'editPassword' ? 'active' : null; ?>"><a href="<?= base_url() ?>/public/user/editPassword"><span class="flaticon-arrows-3"></span> Modifier mot de passe</a></li>
      <li class="nav-link <?= $request->uri->getSegment(2) == 'editAvatar' ? 'active' : null; ?>"><a href="<?= base_url() ?>/public/user/editAvatar"><span class="flaticon-arrows-3"></span> Modifier photo de profile </a></li>

    </ul>
  </div>