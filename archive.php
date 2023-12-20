<?php get_header(); ?>
Kategori Sayfası
<div class="container">

    <h1>
        <?php single_cat_title(); ?>
    </h1>

</div>


<?php
if (is_category()) {
    $this_category = get_category($cat);
    $subcategories = get_categories(array(
        'child_of' => $this_category->cat_ID,
        'hide_empty' => 0
    ));
    if ($subcategories) { ?>
        <ul>
            <?php foreach ($subcategories as $subcategory) { ?>
                <li>
                    <?php echo $subcategory->name; ?>
                </li>
            <?php } ?>
        </ul>
    <?php }
}

?>


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




<?php get_footer(); ?>