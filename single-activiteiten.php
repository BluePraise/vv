<?php
/*
  Single Post Template: Activiteit
  Layout specifiek voor activivteit.
*/
get_header();
?>

<div class="content-sidebar red widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-activity-page' ); ?>
</div><!-- #content-sidebar -->

<div class="content articles red">
  <article>


<?php
    if (have_posts()) : while (have_posts()) : the_post();
?>
  <h2><?php the_title(); ?></h2>
  <?php the_post_thumbnail('artikel_large_view'); ?>
<?php
  the_content();

  if ( ! post_password_required()) :
  edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
  endif;

  endwhile;
?>

</article>
  <?php comments_template(); ?>
</div> <!-- end of contentclass -->


</div> <!-- end of contentclass -->
<?php
endif;
get_footer();
?>

