<?php
/*
* Template Name: Standard Page
*/
get_header();

get_sidebar( );
?>

<div class="content standard">
  <h1 class="pagetitle orange"><?php the_title(); ?></h1>

  <?php
    if ( get_post_status ( ) == 'private' && ! post_password_required() ) {
      echo '<h1>Nothing to display</h1>';
    }
    else {
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();

        if ( ! post_password_required()) :
        edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
        endif;
      endwhile;
      endif; // End of the loop
      }
  ?>
</div> <!-- end of contentclass -->

<?php

 get_footer();
?>
