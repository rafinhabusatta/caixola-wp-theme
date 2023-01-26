<?php get_header(); ?>
<div class="wrap wrap-generic-banner pt-5 mt-5">
  <div class="d-flex align-items-center justify-content-end">
    <span class="dot-top"></span>
    <span class="title-border-banner"></span>
  </div>
  <h1 class="title title-banner text-center my-4 py-2 px-3 px-lg-0">
    <?php the_title(); ?>
  </h1>
  <div class="d-flex align-items-center justify-content-start">
    <span class="title-border-banner"></span>
    <span class="dot-bottom"></span>
  </div>
</div>
<div class="container-fluid px-0 mt-5">
  <div class="container mx-auto py-5">
    <div class="row">
      <div class="col-12 col-lg-6">
        <h2 class="text-center fs-24">Caixola - Clube de Criação</h2>
        <p class="text-justify">
          O Caixola nasce como um Clube de Criação por desejo de alunos e apoio de professores da FABICO. Desde o começo, o espaço serve para os estudantes de Publicidade e Propaganda discutirem, treinarem e aperfeiçoarem as técnicas de criação, integrando teoria e prática.
        </p>
      </div>
      <div class="col-12 col-lg-6 mt-5">
        <h2 class="text-center fs-24">Missão</h2>
        <p class="text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6">
        <h2 class="text-center fs-24">Título</h2>
        <p class="text-justify">
          Transformado em projeto de extensão, o Caixola mantém o espírito do Clube de Criação: permite a discussão e a integração dos alunos com técnicas e profissionais da área da Comunicação e promove palestras e cursos de capacitação e aperfeiçoamento. O Caixola segue o modelo e as rotinas de uma agência experimental, proporcionando a alunos bolsistas a oportunidade de vivenciarem a profissão, estimulando-os a resolverem problemas de comunicação mercadológica de forma estratégica e criativa.
        </p>
      </div>
      <div class="col-12 col-lg-6 mt-5">
        <h2 class="text-center fs-24">Projetos Futuros</h2>
        <p class="text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
        </p>
      </div>
    </div>
  </div>
  <div class="bg-orange">
    <div class="container">
      <div class="row py-5">
        <div class="col-12">
          <h2>Equipe Atual</h2>
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active text-center">
                <?php
                  $count = 0;
                  $CI = null;
                  $Equipe = new WP_Query(array(
                    'post_type' => 'equipe',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC'
                  ));
                
                  while($Equipe->have_posts()) {
                    $Equipe->the_post();
                    if($count > 6) {
                      $CI = '</div><div class="carousel-item text-center">';
                      $count = 0;
                    } else {
                      $CI = null;
                    }
                ?>
                    <div class="d-inline-block text-center ms-4">
                      <!-- <div class=""> -->
                        <img src="<?php echo get_field('foto_de_perfil'); ?>" class="d-inline-block rounded-circle bg-gray" alt="..." width="150" height="150">
                      <!-- </div> -->
                      <h3 class="fs-18"><?php the_title(); ?></h3>
                      <h4 class="fs-6"><?php echo get_field('area_de_atuacao'); ?></h4>
                    </div>
                <?php

                  echo $CI;
                
                 $count++; } ?>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Próximo</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>