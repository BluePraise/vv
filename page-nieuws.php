<?php
/*
* Template Name: Nieuws Page
*/
get_header();
get_sidebar('nieuws');

?>

<div class="content blue">
  <h1 class="pagetitle"><?php the_title(); ?></h1>
  <?php
    $args = array(
      'category_name'   => 'Nieuws',
      'order'           => 'ASC',
      'orderby'         => 'date',
      'year'            => 2014,
      'posts_per_page'  => 12,
      'nopaging'        => false
      );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <article class="teaser teaser-news">
      <div class="teaser-thumbnail">
        <?php if ( has_post_thumbnail() ) :
           the_post_thumbnail();
            else:
              echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/logo.png" />';
            endif; ?>
      </div>
      <div class="teaser-text"><?php the_excerpt();?></div>

    </article>
    <?php endwhile; // End of the loop ?>
    <?php wp_reset_query();
    wp_reset_postdata();

if ( ! post_password_required()) :
  edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
endif;

?>
</div> <!-- end of contentclass -->

<?php get_footer(); ?>
