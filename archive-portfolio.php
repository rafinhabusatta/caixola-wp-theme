<?php get_header(); ?>
<div class="wrap wrap-generic-banner pt-5 mt-5">
  <div class="d-flex align-items-center justify-content-end">
    <span class="dot-top"></span>
    <span class="title-border-banner"></span>
  </div>
  <h1 class="title title-banner text-center my-4 py-2 px-3 px-lg-0">
    Portfolio
  </h1>
  <div class="d-flex align-items-center justify-content-start">
    <span class="title-border-banner"></span>
    <span class="dot-bottom"></span>
  </div>
</div>
<div class="container-fluid px-0 bg-gray-light mt-5">
  <div class="container mx-auto py-5">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center fs-24">Pesquisar trabalho Específico</h2>
        <div class="row">
          <div class="col-3 mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="data" class="form-control caixola-form-control" id="data" placeholder="Ex: mês/ano">
          </div>
          <div class="col-3 mb-3">
            <label for="equipe" class="form-label">Equipe/participante</label>
            <input type="text" class="form-control caixola-form-control" id="equipe" placeholder="Ex: Tamires Melo">
          </div>
          <div class="col-5 mb-3">
            <label for="projeto" class="form-label">Projeto</label>
            <input type="text" class="form-control caixola-form-control" id="projeto" placeholder="Ex: Vestibular">
          </div>
          <div class="col-1 d-flex align-items-center">
            <button type="submit" class="btn btn-dark border-0">Pesquisar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 align-items-center mt-5">
      <?php while(have_posts()) {
        the_post();
        $cardImage = get_field('imagem_de_fundo');
      ?>
        <div class="col">
          <a href="<?php the_permalink(); ?>">
            <div class="card portfolio-card">
              <div class="card-body bg-portfolio-card" style="background-image: url(<?php echo $cardImage; ?>);">
                <img src="<?php ?>" alt="">
                <h5 class="card-title"><?php the_title(); ?></h5>
              </div>
              <div class="card-footer">
                <?php echo get_field('categoria'); ?>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>