<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body class="<?php body_class(); ?>">
  <?php
    if (is_page('home')) {
      $bg = 'sticky-top main-menu none';
    } else {
      $bg = 'sticky-top main-menu bg-gray-light';
    }
  ?>
  <header class="<?php echo $bg; ?>">
    <nav class="navbar navbar-expand-lg">
      <?php
        // wp_nav_menu(array(
        //   'theme_location' => 'headerMenuLocation',
        //   'container' => 'div',
        //   'container_class' => 'container-fluid',
        //   'container_id' => 'navbarSupportedContent',
        //   'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
        //   'add_li_class' => 'nav-item'
        // ));
      ?>
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="<?php echo get_theme_file_uri('/assets/logo.svg'); ?>" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse my-lg-auto main-menu-ul" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo get_post_type_archive_link('portfolio'); ?>">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('/quem-somos'); ?>">Quem Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('/contato'); ?>">Fale Conosco</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
          <span href="<?php echo esc_url(site_url('/search')); ?>" class="btn btn-light js-search-trigger">
          Buscar
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </span>
            <!-- <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
             -->
          </form>
        </div>
      </div>
    </nav>
  </header>