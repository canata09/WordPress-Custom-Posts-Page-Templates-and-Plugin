<?php
$args = array(
    'post_type' => 'galeri', // Göstermek istediğiniz özel yazı tipi
    'posts_per_page' => 5, // Kaç tane göstermek istediğinizi belirleyin
);

$galeri_query = new WP_Query($args);

if ($galeri_query->have_posts()) :
    while ($galeri_query->have_posts()) :
        $galeri_query->the_post();

        // Burada her bir galeri öğesini göstermek için kullanılacak HTML ve içerikler
        ?>
        <div class="galeri-item">
            <h2><?php the_title(); ?></h2>
            <div class="galeri-content">
                <?php the_content(); ?>
            </div>
            <?php
            // Öne çıkan görüntüyü (thumbnail) göstermek için
            if (has_post_thumbnail()) {
                the_post_thumbnail('thumbnail');
            }
            ?>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    echo 'Galeri bulunamadı.';
endif;
?>
