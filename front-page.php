<?php get_header();  ?>
<div class="header-banner text-center text-lg-start bg-blue themis">
  <?php get_template_part('template-parts/content', 'homeBanner');?>
</div>
<main class="container">
  <div class="row mt-5">
    <div class="col-12">
      <h2 class="">Sobre Nós></h2>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12">
      <h2 class="">Últimas notícias</h2>
      <div class="row">
        <?php
          $homepagePosts = new WP_Query(array(
            'posts_per_page' => 3));
            // 'category_name' => 'noticias'
            //'post_type' => 'noticias' ou page
          while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(); ?>
            
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title"><?php the_title(); ?></h5>
                  <p>Criado por <?php the_author_posts_link(); ?> dia <?php the_time('d/m/Y'); ?> em <?php echo get_the_category_list(', '); ?></p>
                  <p class="card-text"><?php echo wp_trim_words(get_the_content(), 18); ?></p>
                  <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
                </div>
              </div>
            </div>

          <?php } wp_reset_postdata();
        ?>
      </div>
      <button class="btn btn-dark"><a href="<?php echo site_url('/noticias'); ?>">Ver todas as notícias</a></button>
    </div>
  </div> 
</main>
<?php  get_footer(); ?>