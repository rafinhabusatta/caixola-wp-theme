<?php get_header();  ?>
<div class="home-banner">
  <?php get_template_part('template-parts/content', 'homeBanner');?>
</div>
<main class="container">
  <div class="row mt-5 pt-3 text-center">
    <div class="col-12">
      <h2 class="title"><span class="title-border"></span>Portfolio</h2>
      <?php get_template_part('template-parts/content', 'homePortfolio');?>
    </div>
  </div>
  <?php get_template_part('template-parts/content', 'parceiros');?>
</main>
<?php  get_footer(); ?>