<div class="mt-5 py-5 bg-gray-light">
  <div class="row container mx-auto">
    <div class="col-12 col-lg-6">
      <h2 class="title"><span class="title-border-lg"></span>Parceiros</h2>
      <p>Transformado em projeto de extensão, o Caixola mantém o espírito do Clube de Criação: permite a discussão e a integração dos alunos com técnicas e profissionais da área da Comunicação e promove palestras e cursos de capacitação e aperfeiçoamento. O Caixola...</p>
    </div>
    <div class="col-12 col-lg-6 d-grid gap-4 g-template-columns-lg-3 justify-content-center">
      <?php
        $Parceiros = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'parceiros'
        ));
        while($Parceiros->have_posts()) {
          $Parceiros->the_post();
        ?>
        <img src="<?php echo the_post_thumbnail_url(); ?>" alt="parceiro">
        <?php }   
      ?>
    </div>
  </div>
</div>