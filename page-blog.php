<?php
/*
* Template Name: Blog Page
*/
get_header();


?>

<div class="content-sidebar darkgreen widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-single-post' ); ?>
</div><!-- #content-sidebar -->
<div class="content articles darkgreen">
  <article>

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
  ?>
  <?php
    the_content();
  endwhile;
?>

</article>
</div> <!-- end of contentclass -->

<?php
endif;


get_footer();

?>
