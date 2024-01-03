<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<h1>
    <?php bloginfo('title'); ?>
</h1>
<p>
    <?php bloginfo('description'); ?>
</p>

<div class="container">
    <header class="entry-header">
        <h2 class="entry-title">
            <?php the_title(); ?>
        </h2>
    </header>

    <h1>
        HelloWorlds
    </h1>



    <?php
    $args = array(
        'post_type' => 'product',
        // Gönderi türünü belirtin (varsayılan olarak 'post')
        'posts_per_page' => 6, // 6 ürün gösterimi
        // Tüm gönderileri almak için -1 kullanın
        'paged' => $paged 
        // Use the current page number.
    );

    $the_query = new WP_Query($args);

	while ( $loop->have_posts() ) : $loop->the_post();
	?>
		<div class="col-md-2"> <!-- 2 birim genişliğinde, tek dikey sıralama için -->
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		</div>
	<?php endwhile; ?>
    <?php
    /**
     * Hook: woocommerce_sidebar.
     */
    do_action( 'woocommerce_sidebar' );

    ?>
    <?= get_footer(); ?>