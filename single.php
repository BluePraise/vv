<?php
get_header();
get_sidebar();
?>

<div class="content blue">
  <article <?php post_class(); ?> >
  <header class="article-header">
    <h2 class="article-title"><?php the_title(); ?></h2>
  </header>

  <?php if ( ! post_password_required()) :
    edit_post_link( __( 'Bewerk dit item', '' ), '<span class="edit-link">', '</span>' );
    endif;

    if (have_posts()) : while (have_posts()) : the_post();?>
      <div class="article-image">
        <?php the_post_thumbnail('artikel_large_view'); ?>
      </div>
      <div class="article-content"><?php the_content();?></div>

  <?php comments_template(); ?>
</article>

</div> <!-- end of contentclass -->
<?php
  endwhile;
  endif;
get_footer();
?>
