<?php
/*
* Template Name: Front Page
*/
get_header();

echo do_shortcode("[metaslider id=2316]");

?>
<div id="main" class="site-main" role="main">

<?php get_sidebar(); ?>


<div class="content news blue">
  <ul>
  <?php
      $sticky = get_option( 'sticky_posts' );
      $args = array(
        'category_name'   => 'Nieuws',
        'order'           => 'DESC',
        'orderby'         => 'date',
        'post__in'        => get_option( 'sticky_posts' ),
        'posts_per_page'  => 2,
        'nopaging'        => false
        );

      $loop = new WP_Query( $args );

      while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li class="teaser teaser-news">
        <h3 class="teaser-title h4"><a href="<?php the_permalink() ?>"</a><?php the_title();?></a></h3>
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
        wp_reset_postdata();
        // wp_reset_query();
      ?>
    </ul>
</div> <!-- End of News -->



<?php get_footer(); ?>
