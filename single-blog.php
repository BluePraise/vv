<?php

/*
  Single Post Template: Blog Artikel
  Layout specifiek voor het nieuws.
*/

get_header();
//135
get_sidebar();
in_category(135);
?>


<?php
$class_names = array(
    'darkgreen',
    'article-nieuws'
  );
?>
<div class="content articles darkgreen">
  <article <?php post_class(); ?> >

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
<?php
  endif;

get_footer();
?>

