<?php
/*
Template Name: Sekmeli Liste Şablonu
*/
get_header();
?>
<?php
$args = array(
    'post_type' => 'post',
    // Gönderi türünü belirtin (varsayılan olarak 'post')
    'post_status' => 'publish',
    // Sadece yayınlanmış gönderileri alın
    'posts_per_page' => 6,
    // Tüm gönderileri almak için -1 kullanın
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();
        // Gönderi içeriğini veya başlığını burada alabilirsiniz
        the_title('<h2>', '</h2>');
    }
    wp_reset_postdata(); // Sorgu sonrası verileri sıfırlayın
} else {
    echo 'Hiç gönderi bulunamadı.';
}
?>

<?= get_footer(); ?>
