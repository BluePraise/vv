<?php
/*
* Template Name: Nieuws Page
*/
get_header();


?>

<div class="content-sidebar blue widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-single-post' ); ?>
</div><!-- #content-sidebar -->
<div class="content articles">

<?php
query_posts('cat=135&&posts=1');

if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();

  $class_names = array(
    'blue'
  );
?>
  <article <?php post_class('class_names'); ?> id="post-<?php the_ID(); ?> ">
    <div class="article-nieuws-image image-wrapper">
      <a href="<?php the_permalink(); ?>" class="thumbnail-wrapper">
        <?php the_post_thumbnail( 'artikel_middle_view' );  ?>
      </a>
    </div>
    <h2 class="title-on-image"><a href="<?php the_permalink(); ?>" class="title-on-image-link"><?php the_title(); ?></a></h2>
    <?php if ( ! post_password_required()) :
      edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
    endif; ?>
  </article>
<?php endwhile; // end of the loop. ?>

</div> <!-- end of contentclass -->

<?php
endif;
wp_reset_query();
get_footer();

?>
