<?php
/*
* Template Name: Front Page
*/
get_header();

// echo do_shortcode("[metaslider id=1908]");

get_sidebar();

?>

<div class="content">
  <div class="news blue">
    <ul>
    <?php

        $args = array(
          'category_name'   => 'Nieuws',
          'order'           => 'DESC',
          'orderby'         => 'date',
          'posts_per_page'  => 2,
          'nopaging'        => false
          );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li class="teaser teaser-news">
          <h3 class="teaser-title h4"><a href="<?php the_permalink() ?>"</a><?php the_title();?></a></h3>
          <div class="teaser-date">Geplaatst op: <?php the_date('j F Y'); ?></div>
          <div class="teaser-comment-count"><?php printf( _n( '1 reactie', '%1$s reacties', get_comments_number(), 'vv' ),
          number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></div>
          <div class="teaser-container">
            <div class="teaser-thumbnail">
              <?php if ( has_post_thumbnail() ) :
                the_post_thumbnail();
                else: ?>
                <a href="<?php the_permalink() ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" /></a>
              <?php endif; ?>
            </div>
            <div class="teaser-text"><?php the_content(); ?></div>
          </div>

        </li>
        <?php
          endwhile;
          // wp_reset_postdata();
          wp_reset_query();
        ?>
      </ul>
  </div> <!-- End of News -->


<?php get_footer(); ?>
