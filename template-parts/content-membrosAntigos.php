<div class="container mt-5">
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

      $membroAtual = get_field('membro_atual');
      $areaAtuacao = get_field('area_de_atuacao');
      $professor = get_field('professor');
      $year = get_field('year');

      
      if($membroAtual == 'false') {}}

    
  ?>
  <div class="accordion-item oldMemberBlock">
    <?php 
      $plus = '
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
        </svg>';

    $dash = '
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
      </svg>';
    ?>
    <h2 class="accordion-header d-flex justify-content-between align-items-center" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        2022
      </button>
      <?php echo $plus; ?>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul class="d-grid g-template-columns-2">
          <?php
            while($Equipe->have_posts()) {
              $Equipe->the_post();

              $membroAtual = get_field('membro_atual');
              $areaAtuacao = get_field('area_de_atuacao');
              $professor = get_field('professor');
              
              if($membroAtual == 'false') {
          ?>
          <li>
            <p>
              <?php the_title(); ?> -
              <?php 
                if($areaAtuacao != '') {
                  echo $areaAtuacao;
                } else if ($professor == 'false') { 
                  echo 'Bolsista'; 
                } else {
                  echo 'Professor';
                }
              ?>
            </p>
          </li>       
          <?php
              }
            echo $CI;
          
            $count++; } 
          ?>
        </ul>
      </div>
    </div>
  </div>


</div>