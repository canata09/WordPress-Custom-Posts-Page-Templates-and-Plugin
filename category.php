<?php get_header(); ?>

<div id="primary">
    <main id="main" class="site-main" role="main">

        <?php
        $current_cat = get_queried_object();
        if ($current_cat && !empty(get_term_children($current_cat->term_id, 'category'))):
            // This category has subcategories
            ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php single_cat_title(); ?>
                </h1>


                <?php
                if (is_category()) {
                    $this_category = get_category($cat);
                }
                ?>
                <?php
                if ($this_category->category_parent)
                    $this_category = wp_list_categories('orderby=id&show_count=0
    &title_li=&use_desc_for_title=1&child_of=' . $this_category->category_parent .
                        "&echo=0");
                else
                    $this_category = wp_list_categories('orderby=id&depth=1&show_count=0
    &title_li=&use_desc_for_title=1&child_of=' . $this_category->cat_ID .
                        "&echo=0");
                if ($this_category) { ?>

                    <ul>
                        <?php echo $this_category; ?>

                    </ul>

                <?php } ?>

            </header>

        <?php else: ?>
            <!-- This category doesn't have subcategories -->
            <p>No subcategories found for
                <?php single_cat_title(); ?>
            </p>
            <!-- You can add specific content or design for categories without subcategories here -->
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <!-- Your subcategory post layout here -->
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>
                    <?php _e('No posts found.'); ?>
                </p>
            <?php endif; ?>
        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>