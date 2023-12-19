<?php
/*
Template Name: Sekmeli Liste Şablonu
*/
get_header();
?>
<?php
$args = array(
    'tax_query' => array(
        array(
            'taxonomy' => 'project-cat', // Kategori taksonomisinin adı
            'field'    => 'slug',
            'terms'    => 'cilt-bakimi', // Kategori slug'ı
        ),
    ),
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        // İçerikler burada gösterilecek
        the_title();
        // vs.
    }
    wp_reset_postdata();
} else {
    echo 'Bu kategoride içerik bulunamadı.';
}

?>

<?= get_footer(); ?>
