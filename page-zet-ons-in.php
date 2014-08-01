<?php
/*
* Template Name: Zet Ons In Page
*/
get_header();
get_sidebar();

?>

<div class="content lilac">
  <h1 class="pagetitle"><?php the_title(); ?></h1>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    endif;

  ?>

</div> <!-- end of contentclass -->

<?php get_footer(); ?>
