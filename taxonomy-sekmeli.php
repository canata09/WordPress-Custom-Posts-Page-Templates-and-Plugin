<?php
/*
Template Name: Sekmeli Liste Şablonu
*/
get_header();
?>





    <button id="show-more-button">Daha Fazla Göster</button>
    <div id="post-container">
        <!-- Burada mevcut gönderiler listeleniyor -->
        <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'paged' => 1 // İlk sayfa numarası
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                the_title('<h2>', '</h2>');
            }
            wp_reset_postdata(); // Sorgu sonrası verileri sıfırlayın
        } else {
            echo 'Hiç gönderi bulunamadı.';
        }
        ?>
    </div>







    <script>
        jQuery(document).ready(function($) {
            var currentPage = 1;
            var postsPerPage = 6;
            var totalPosts = <?php echo $total_posts; ?>;

            $('#show-more-button').click(function(e) {
                e.preventDefault();

                if (currentPage * postsPerPage < totalPosts) {
                    var data = {
                        'action': 'load_more_posts',
                        'current_page': currentPage,
                        'posts_per_page': postsPerPage
                    };

                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: data,
                        success: function(response) {
                            $('#post-container').append(response);
                            currentPage++;
                        }
                    });
                } else {
                    alert('No more posts to show');
                }
            });
        });
    </script>



<?= get_footer(); ?>
