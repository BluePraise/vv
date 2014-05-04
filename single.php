<?php
/*
* Template Name: Single Page
*/
get_header();
?>

<div class="content-sidebar widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-single-post' ); ?>
</div><!-- #content-sidebar -->

<div class="content">

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
?>
  <h2><?php the_title(); ?></h2>
<?php
  the_content();
  if ( ! post_password_required()) :
    edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
  endif;
  endwhile;
?>


</div> <!-- end of contentclass -->
<?php
endif;
get_footer();
?>
