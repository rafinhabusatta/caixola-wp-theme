<?php 
get_header();
  while(have_posts()) {
    the_post();
     $cardImage = get_field('imagem_de_fundo');
?>
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
<div class="container-fluid px-0 bg-gray-light mt-5">
  <div class="container mx-auto py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4 align-items-center mt-5">
      <div class="col-12">
        <h2>Categoria: <?php echo get_field('categoria'); ?></h2>
      </div>
    </div>
    <?php
      $PortfolioContent = new WP_Query(array(
        'post_type' => 'portfolio-content',
        'posts_per_page' => -1,
        'meta_query' => array(
          array(
            'key' => 'projeto_relacionado',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"'
          )
        )
      ));
    ?>
    <div class="row">
      <div class="col-12 mt-3">
        <div id="carouselPortfolio" class="carousel slide carousel-fade">
          <div class="carousel-inner">
            <?php while($PortfolioContent->have_posts()) {
                $PortfolioContent->the_post(); ?>
                <?php
                  $file;
                  if(get_field('tipo_do_arquivo')[0] == 'imagem') {
                    $file = '<img src="'.get_field('arquivo').'" class="img-fluid" alt="">';
                  } else {
                    $file = '<video width="320" height="240" poster="/images/w3schools_green.jpg" controls>
                            <source src="'.get_field('arquivo').'" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>';
                  }
                  if ($PortfolioContent->current_post == 0) {
                    $fileClass = "carousel-item active";
                  } else {
                    $fileClass = "carousel-item";
                  }
                ?>           
                <div class="<?php echo $fileClass; ?>">
                  <?php echo $file; ?>
                </div> 
                
            <?php } wp_reset_postdata(); ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselPortfolio" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselPortfolio" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } get_footer(); ?>