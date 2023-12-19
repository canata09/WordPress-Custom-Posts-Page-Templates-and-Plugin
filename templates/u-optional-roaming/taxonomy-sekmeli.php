<?php
/*
Template Name: Sekmeli Liste Şablonu
*/
get_header();
?>
<div class="content">
    <div class="tabs">
        <?php
        $terms = get_terms(array(
            'taxonomy' => 'project-cat', // Taksonomi adını buraya girin
            'hide_empty' => false,
        ));
        if ($terms) {
            foreach ($terms as $term) {
				echo "<li><a href='".get_term_link($term)."'>{$term->name}</a></li>";
            }
        }
        ?>
    </div>
    <div class="tab-content">
        <?php
        if ($terms) {
            foreach ($terms as $term) {
                $args = array(
                    'post_type' => 'portfolio', // Gösterilecek yazı türünü belirtin
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'project-cat', // Taksonomi adını buraya girin
                            'field' => 'slug',
                            'terms' => $term->slug,
                        ),
                    ),
                );

                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        // Yazıları burada listeleyin
						echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
                        the_content();
                    }
                    wp_reset_postdata();
                }
            }
        }
        ?>
    </div>
</div>
<?php get_footer(); ?>
