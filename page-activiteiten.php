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
  <!-- main content for article page -->
  <section>

        <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();

            the_content();

          endwhile;
        endif;

        wp_reset_query(); ?>

  </section>

    <?php
        // New query for activities category
        query_posts('cat=134');
        // The loop.
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();?>
            <article class="activity-overview activity">
              <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <?php the_content();

              if ( ! post_password_required()) :
                edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
              endif; ?>

            </article>
          <?php endwhile; ?>

</div> <!-- end of contentclass -->


<?php
wp_reset_query();
endif;
get_footer();

?>
