<?php
/*
*	Template Name: Index Page
*/
get_header();

?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
	the_excerpt();
	endwhile;
?>



<?php
endif;

get_footer();

?>
