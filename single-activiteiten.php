<?php
/*
  Single Post Template: Activiteiten
  Layout specifiek voor het nieuws.
*/

get_header();
?>

<div class="content-sidebar red widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-activity-page' ); ?>
</div><!-- #content-sidebar -->

<div class="content content-single articles red">
  <article>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <h2 class="h1 single-title single-activity-title"><?php the_title(); ?></h2>

      <div class="single-image single-activity-image">
        <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('artikel_middle_view');
          }?>
      </div>
      <?php the_content();

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
