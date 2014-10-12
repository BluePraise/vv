<?php
/*
* Template Name: Nieuws Page
*/
get_header();
get_sidebar('');

?>

<div class="content page-overview news blue">
  <h2 class="pagetitle"><?php the_title(); ?></h2>
  <ul>
  <?php
    if ( ! post_password_required()) :
    edit_post_link( __( 'Pas deze pagina aan', '' ), '<span class="page-overview-edit-link edit-link">', '</span>' );
    endif;

    $args = array(
      'category_name'   => 'Nieuws',
      'order'           => 'DESC',
      'orderby'         => 'date',
      'year'            => 2014,
      'posts_per_page'  => 14,
      'nopaging'        => false
      );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
  ?>
    <li class="teaser teaser-news">
      <div class="teaser-thumbnail">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail(); ?>
        <?php else: ?>
          <a href="<?php the_permalink() ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" /></a>
        <?php endif; ?>
      </div>
      <div class="teaser-container">
        <h3 class="teaser-title"><a href="<?php the_permalink() ?>"</a><?php the_title();?></a></h3>
        <div class="teaser-date">Geplaatst op: <?php the_date('j F Y'); ?></div>
        <div class="teaser-comment-count"><?php printf( _n( '1 reactie', '%1$s reacties', get_comments_number(), 'vv' ),
          number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
        </div>
        <div class="teaser-text"><?php the_excerpt();?></div>
      </div>

    </li>
  <?php
    endwhile; // End of the loop
    wp_reset_query();
    wp_reset_postdata();
  ?>
</ul>

</div> <!-- end of contentclass -->

<?php get_footer(); ?>
