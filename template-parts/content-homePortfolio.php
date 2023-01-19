<?php
  $Portfolio = new WP_Query(array(
    'posts_per_page' => 3,
    'post_type' => 'portfolio'
  ));

  $count = 0;
  
?>
<div class="row row-cols-1 row-cols-md-3 g-4 align-items-center">
  <?php while($Portfolio->have_posts()) {
    $Portfolio->the_post();
    if($count == 1) {
      $class = 'card main-portfolio-card';
    } else {
      $class = 'card portfolio-card';
    }
    $count++;
    $cardImage = get_field('imagem_de_fundo');
  ?>
  <div class="col">
    <div class="<?php echo $class; ?>">
      <div class="card-body bg-portfolio-card" style="background-image: url(<?php echo $cardImage; ?>);">
        <img src="<?php ?>" alt="">
        <h5 class="card-title"><?php the_title(); ?></h5>
      </div>
    </div>
  </div>
  <?php } wp_reset_postdata(); ?>
</div>
<a href="#" class="btn btn-caixola mt-4">Veja mais</a>