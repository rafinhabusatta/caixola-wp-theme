<?php 
//replace: Caixola with your theme name
//replace: caixola with your theme path url
//add: in the main query, the post types with your post types
function CaixolaRegisterSearch() {
  register_rest_route('caixola/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE, // GET request (crud)
    'callback' => 'CaixolaSearchResults'
  )); // namespace, route, array of options

  register_rest_route('caixola/v1', 'portfolio', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'CaixolaPortfolioSearchResults'
  ));
}
add_action('rest_api_init', 'CaixolaRegisterSearch');

function CaixolaSearchResults($dataSearch) {
  $mainQuery = new WP_QUERY(array(
    'post_type' => array('post', 'page', 'portfolio'),
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

function CaixolaPortfolioSearchResults(WP_REST_Request $dataSearch) {
  $mainQuery = new WP_QUERY(array(
    'post_type' => array('portfolio'),
    'meta_query' => array(
      // array(
      //   'key' => 'equipeparticipante',
      //   'compare' => 'LIKE',
      //   'value' => get_query_var('equipe')
      // ),
      // array(
      //   'key' => 'data',
      //   'compare' => 'LIKE',
      //   'value' => get_query_var('data')
      // ),
      array(
        'key' => 'categoria',
        'compare' => 'LIKE',
        'value' => $dataSearch->get_param('categoria')
      ),
      'relation' => 'OR'
    )
  ));

  $results = array();

  while($mainQuery->have_posts()) {
    $mainQuery->the_post();
      $Date = new DateTime(get_field('data'));
      //if ($request->get_param('categoria') == get_field('categoria')) {
        array_push($results, array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(),
          'authorName' => get_field('equipeparticipante'),
          'projectDate' => $Date->format('d/m/y'),
          'projectType' => get_field('categoria'),
        ));
      //}
  }

  // if($results) {
  //   $portfolioMetaQuery = array('relation' => 'OR');

  //   foreach($results as $item) {
  //     array_push($portfolioMetaQuery, array(
  //       'key' => 'related_portfolio',
  //       'compare' => 'LIKE',
  //       'value' => '"' . $item['id'] . '"' // get_the_ID() is the id of the current program
  //     ));
  //   }

  //   $programRelationship = new WP_QUERY(array(
  //     'post_type' => array('professor', 'event'),
  //     'meta_query' => $portfolioMetaQuery
  //   ));

  //   while($programRelationship->have_posts()) {
  //     $programRelationship->the_post();

  //     if (get_post_type() == 'professor') {
  //       array_push($results['professors'], array(
  //         'title' => get_the_title(),
  //         'permalink' => get_the_permalink() ,
  //         'image' => get_the_post_thumbnail_url(0, 'professorLandscape') 
  //       ));
  //     }

  //     if (get_post_type() == 'event') {
  //       $eventDate = new DateTime(get_field('event_date'));
  //       $description = null;
  //       if(has_excerpt()) {
  //         $description = get_the_excerpt();
  //       }else {
  //         $description = wp_trim_words(get_the_content(), 18);
  //       } 
  //       array_push($results['events'], array(
  //         'title' => get_the_title(),
  //         'permalink' => get_the_permalink(),
  //         'date' => $eventDate->format('d/m/y'),
  //         'description' => $description
  //       ));
  //     }
  //   }

  //   $results['professors'] = array_values(array_unique($results['professors'], SORT_REGULAR));  
  //   $results['events'] = array_values(array_unique($results['events'], SORT_REGULAR)); 
  // }
  return $results;
}