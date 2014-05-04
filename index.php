<?php
/*
*	Template Name: Index Page
*/
get_header();

?>
<div class="content">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
	the_excerpt();
	endwhile;
?>


</div> <!-- end of contentclass -->

<?php
endif;

get_footer();

?>
