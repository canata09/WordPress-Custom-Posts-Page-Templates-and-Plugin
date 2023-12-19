<?php
/*
Template Name: Sekmeli Liste Şablonu
*/
get_header();
?>




<button class="tablink" onclick="openCity('London', this)" id="defaultOpen">London</button>
<button class="tablink" onclick="openCity('Paris', this)">Paris</button>
<button class="tablink" onclick="openCity('Tokyo', this)">Tokyo</button>
<button class="tablink" onclick="openCity('Oslo', this)">Oslo</button>


<p>Click on the buttons inside the tabbed menu:</p>

<div id="London" class="tabcontent">
  <h1>London</h1>
  <p>London is the capital city of England.</p>
	<?php
	$args = array(
		'taxonomy' => 'category', // Taksonomi adı (örneğin 'category')
		'field'    => 'slug', // Terimlerin slug'ına göre arama yapılacak
	);

	$terms = get_terms( $args );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		foreach ( $terms as $term ) {
			$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category', // Taksonomi adı (örneğin 'category')
						'field'    => 'slug', // Terimlerin slug'ına göre arama yapılacak
						'terms'    => $term->slug, // Terimin slug'ı
					),
				),
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$thumbnail = get_the_post_thumbnail( get_the_ID(), 'medium' ); // Görsel boyutlandırma
					// İçerikler burada gösterilecek
					the_title();
					// vs.
					echo $thumbnail;
				}
				wp_reset_postdata();
			} else {
				echo 'Bu kategoride içerik bulunamadı.';
			}
		}
	} else {
		echo 'Terim bulunamadı.';
	}
	?>
</div>

<div id="Paris" class="tabcontent">
  <h1>Paris</h1>
  <p>Paris is the capital of France.</p> 
	<?php
	$args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'category', // Kategori taksonomisinin adı
				'field'    => 'slug',
				'terms'    => 'edge-case-2', // Kategori slug'ı
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
</div>

<div id="Tokyo" class="tabcontent">
  <h1>Tokyo</h1>
  <p>Tokyo is the capital of Japan.</p>
	<?php
	$args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'category', // Kategori taksonomisinin adı
				'field'    => 'slug',
				'terms'    => 'edge-case-2', // Kategori slug'ı
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
</div>

<div id="Oslo" class="tabcontent">
  <h1>Oslo</h1>
  <p>Oslo is the capital of Norway.</p>
	<?php
	$args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'category', // Kategori taksonomisinin adı
				'field'    => 'slug',
				'terms'    => 'edge-case-2', // Kategori slug'ı
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
</div>







<script>
function openCity(cityName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  document.getElementById(cityName).style.display = "block";
  
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>



<?= get_footer(); ?>
