<?php get_header(); ?>
<div class="wrap wrap-generic-banner pt-5 mt-5">
  <div class="d-flex align-items-center justify-content-end">
    <span class="dot-top"></span>
    <span class="title-border-banner"></span>
  </div>
  <h1 class="title title-banner text-center text-uppercase my-4 py-2 px-3 px-lg-0">
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
        <?php get_template_part('template-parts/content', 'perguntas');?>
      </div>
      <div class="col-12 col-lg-6 mt-5 fw-normal">
        <h2 class="text-center fs-24 text-orange fw-bold">Podemos te ajudar? Envie-nos a sua dúvida.</h2>
        <?php Ninja_Forms()->display(1) ?>
      </div>
    </div>
    </div>
  </div>
  <div class="bg-orange-dark text-white">
    <div class="container">
      <div class="row py-5 text-center">
        <div class="col-12">
          <h2 class="fs-24 mb-4 text-start"><span class="title-border-sm border-white"></span>Venha fazer parte da equipe</h2>
          <p class="text-center mx-auto w-50">
            <?php echo get_field('trabalhe_conosco'); ?>
          </p>
          <button class="mx-auto btn btn-light">Enviar Currículo</button>
        </div>
      </div>
    </div>
  </div>



</div>
<?php get_footer(); ?>