<?php
/*
* Template Name: Activiteiten Page
*/
get_header();


?>

<div class="content-sidebar red widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-activity-page' ); ?>
</div><!-- #content-sidebar -->
<div class="content articles red">
  <article>

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    the_content();
  endwhile;
endif;
wp_reset_query();

query_posts('cat=134');
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
  ?>
  <?php
    the_content();
    // the_post_thumbnail( 'artikel_middle_view' );
    if ( ! post_password_required()) :
      edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
    endif;
  endwhile;
?>

</article>
</div> <!-- end of contentclass -->
<?php
wp_reset_query();
endif;


get_footer();

?>
