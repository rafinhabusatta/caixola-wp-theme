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
        <h2 class="text-center fs-24"><span class="title-border-sm border-orange-dark"></span><?php echo get_field('area_1_title'); ?></h2>
        <p class="text-justify">
          <?php echo get_field('area_1_texto'); ?>
        </p>
      </div>
      <div class="col-12 col-lg-6 mt-5">
        <h2 class="text-center fs-24"><span class="title-border-sm border-orange-dark"></span><?php echo get_field('area_3_title'); ?></h2>
        <p class="text-justify">
          <?php echo get_field('area_3_texto'); ?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6">
        <h2 class="text-center fs-24"><span class="title-border-sm border-orange-dark"></span><?php echo get_field('area_2_title'); ?></h2>
        <p class="text-justify">
          <?php echo get_field('area_2_texto'); ?>
        </p>
      </div>
      <div class="col-12 col-lg-6 mt-5">
        <h2 class="text-center fs-24"><span class="title-border-sm border-orange-dark"></span><?php echo get_field('area_4_title'); ?></h2>
        <p class="text-justify">
          <?php echo get_field('area_4_texto'); ?>
        </p>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/content', 'equipeAtual'); ?>
  <?php get_template_part('template-parts/content', 'membrosAntigos'); ?>
  <?php get_template_part('template-parts/content', 'parceiros'); ?>


</div>
<?php get_footer(); ?>