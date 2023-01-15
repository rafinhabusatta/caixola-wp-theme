<?php 
//replace: YOURTHEMENAME with your theme name
//replace: YOURTHEMEPATH with your theme path url
//add: in the main query, the post types with your post types
function YOURTHEMENAMERegisterSearch() {
  register_rest_route('YOURTHEMEPATH/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE, // GET request (crud)
    'callback' => 'YOURTHEMENAMESearchResults'
  )); // namespace, route, array of options
}
add_action('rest_api_init', 'YOURTHEMENAMERegisterSearch');

function YOURTHEMENAMESearchResults($dataSearch) {
  $mainQuery = new WP_QUERY(array(
    'post_type' => array('post', 'page'),
    's' => sanitize_text_field($dataSearch['term'])
  ));

  $results = array(
    'generalInfo' => array()
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
  }
  return $results;
}