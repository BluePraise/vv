<?php
/*
* Template Name: Zet Ons In Page
*/
get_header();


?>

<div class="content-sidebar lilac widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-zetonsin-page' ); ?>
</div><!-- #content-sidebar -->
<div class="content articles lilac">
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
