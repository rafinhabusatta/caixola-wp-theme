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
  <div class="row mt-5">
    <div class="col-12">
      <h2 class="title"><span class="title-border"></span>Parceiros</h2>
    </div>
  </div> 
</main>
<?php  get_footer(); ?>