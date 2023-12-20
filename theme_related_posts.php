<?php
/**
 * Theme functions and definitions
 */






// Custom function to display related posts
function theme_related_posts() {
  $tags = wp_get_post_tags(get_the_ID());
  if ($tags) {
    $tag_ids = array();
    foreach ($tags as $individual_tag) {
      $tag_ids[] = $individual_tag->term_id;
    }

    $args = array(
      'tag__in' => $tag_ids,
      'post__not_in' => array(get_the_ID()),
      'posts_per_page' => 3,
      'ignore_sticky_posts' => true
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
      echo '<h2>Related Posts</h2>';
      echo '<ul>';
      while ($query->have_posts()) {
        $query->the_post();
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
      }
      echo '</ul>';
    }
    wp_reset_postdata();
  }
}
