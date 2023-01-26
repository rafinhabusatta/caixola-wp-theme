<?php get_header(); ?>
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
<div class="container-fluid px-0 mt-5">
  <div class="container mx-auto py-5">
    <div class="row">
      <div class="col-12 col-lg-6">
        <h2 class="text-center fs-24">Caixola - Clube de Criação</h2>
        <p class="text-justify">
          O Caixola nasce como um Clube de Criação por desejo de alunos e apoio de professores da FABICO. Desde o começo, o espaço serve para os estudantes de Publicidade e Propaganda discutirem, treinarem e aperfeiçoarem as técnicas de criação, integrando teoria e prática.
        </p>
      </div>
      <div class="col-12 col-lg-6 mt-5">
        <h2 class="text-center fs-24">Missão</h2>
        <p class="text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6">
        <h2 class="text-center fs-24">Título</h2>
        <p class="text-justify">
          Transformado em projeto de extensão, o Caixola mantém o espírito do Clube de Criação: permite a discussão e a integração dos alunos com técnicas e profissionais da área da Comunicação e promove palestras e cursos de capacitação e aperfeiçoamento. O Caixola segue o modelo e as rotinas de uma agência experimental, proporcionando a alunos bolsistas a oportunidade de vivenciarem a profissão, estimulando-os a resolverem problemas de comunicação mercadológica de forma estratégica e criativa.
        </p>
      </div>
      <div class="col-12 col-lg-6 mt-5">
        <h2 class="text-center fs-24">Projetos Futuros</h2>
        <p class="text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
        </p>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/content', 'equipeAtual'); ?>
  <?php get_template_part('template-parts/content', 'membrosAntigos'); ?>
  <?php get_template_part('template-parts/content', 'parceiros'); ?>


</div>
<?php get_footer(); ?>