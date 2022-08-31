<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php
    $request = service('request');
    ?>
    <li class="nav-item">
      <a href="/admin-dashboard" class="nav-link  <?= !$request->uri->getSegment(2) ? 'active' : null; ?>">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Tableau de bord</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin-users" class="nav-link <?= $request->uri->getSegment(2) == 'users' ? 'active' : null; ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>Users</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/admin-offres" class="nav-link <?= $request->uri->getSegment(2) == 'offre' ? 'active' : null; ?>">
        <i class="fas fa-briefcase"></i>
        <p>Offres</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/admin-faq" class="nav-link <?= $request->uri->getSegment(2) == 'faq' ? 'active' : null; ?>">
        <i class="far fa-question-circle"></i>
        <p>Questions</p>
      </a>
    </li>

    <li class="nav-item">

      <a href="/admin-blog" class="nav-link <?= $request->uri->getSegment(2) == 'blog' ? 'active' : null; ?>">

        <i class="fa fa-blog nav-icon"></i>
        <p>Blog</p>
      </a>
    </li>
    <li class="nav-item">

    <a href="/admin-galerie" class="nav-link <?= $request->uri->getSegment(2) == 'galerie' ? 'active' : null; ?>">

      <i class="far fa-file-image nav-icon"></i>
      <p>Galérie</p>
    </a>
    </li>

    <li class="nav-item">

    <a href="/admin-evenement" class="nav-link <?= $request->uri->getSegment(2) == 'evenement' ? 'active' : null; ?>">

      <i class="nav-icon fa fa-calendar"></i>
      <p>Evènements</p>
    </a>
    </li>

    <li class="nav-item">

    <a href="/admin-rubrique" class="nav-link <?= $request->uri->getSegment(2) == 'rubrique' ? 'active' : null; ?>">

      <i class="nav-icon fa fa-list"></i>
      <p>Rubrique</p>
    </a>
    </li>





    <li class="nav-item">
      <a href="/admin-editApropos" class="nav-link <?= $request->uri->getSegment(2) == 'editApropos' ? 'active' : null; ?>">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Paramètres
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">

          <a href="/admin-editApropos" class="nav-link <?= $request->uri->getSegment(2) == 'editApropos' ? 'active' : null; ?>">

            <i class="fas fa-plus-circle nav-icon"></i>
            <p>A propos</p>
          </a>
        </li>
        <li class="nav-item">

          <a href="/admin-editInfos" class="nav-link <?= $request->uri->getSegment(2) == 'editInfos' ? 'active' : null; ?>">

            <i class="fas fa-plus-circle nav-icon"></i>
            <p>Infos Plateforme</p>
          </a>
        </li>

        <li class="nav-item">

          <a href="/admin-editSlider" class="nav-link <?= $request->uri->getSegment(2) == 'editSlider' ? 'active' : null; ?>">

            <i class="fas fa-plus-circle nav-icon"></i>
            <p>Slider</p>
          </a>
        </li>

        <li class="nav-item">

        <a href="/admin-banniere" class="nav-link <?= $request->uri->getSegment(2) == 'banniere' ? 'active' : null; ?>">

          <i class="fas fa-plus-circle nav-icon"></i>
          <p>Bannière Poser une question</p>
        </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>