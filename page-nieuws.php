<?php
/*
* Template Name: Nieuws Page
*/
get_header();
get_sidebar();

?>

<div class="content blue">

  <h1 class="pagetitle"><?php the_title(); ?></h1>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
        endwhile; ?>
<?php else: ?>
<!-- no posts found -->
<span>Binnenkort wordt deze pagina gevuldt, we zijn er erg druk mee.</span>
<?php endif;

if ( ! post_password_required()) :
  edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
endif;

?>
</div> <!-- end of contentclass -->

<?php get_footer(); ?>
