<?php 
//replace: Caixola with your theme name
//replace: caixola with your theme path url
//add: in the main query, the post types with your post types
function CaixolaRegisterSearch() {
  register_rest_route('caixola/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE, // GET request (crud)
    'callback' => 'CaixolaSearchResults'
  )); // namespace, route, array of options
}
add_action('rest_api_init', 'CaixolaRegisterSearch');

function CaixolaSearchResults($dataSearch) {
  $mainQuery = new WP_QUERY(array(
    'post_type' => array('post', 'page', 'portfolio'),
    's' => sanitize_text_field($dataSearch['term'])
  ));

  $PortfolioQuery = new WP_QUERY(array(
    'post_type' => array('portfolio'),
    's' => sanitize_text_field($dataSearch['term'])
  ));

  $results = array(
    'generalInfo' => array(),
    'portfolio' => array()
    // add here arrays for your post types
  );

  while($mainQuery->have_posts()) {
    $mainQuery->the_post();

    if (get_post_type() == 'post' OR get_post_type() == 'page') {
      array_push($results['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink() ,
        'postType' => get_post_type(),
        'authorName' => get_the_author()
      ));
    } 

    if(get_post_type() == 'portfolio') {
      $Date = new DateTime(get_field('data'));
      array_push($results['portfolio'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'authorName' => get_field('equipeparticipante'),
        'projectDate' => $Date->format('d/m/y'),
        'projectType' => get_field('categoria'),
      ));
    }
  }
  return $results;
}