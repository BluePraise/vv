<?php
/*
* Template Name: Front Page
*/
get_header();

// SLIDER.
  if ( have_posts() ) : while ( have_posts() ) : the_post();
  echo do_shortcode("[metaslider id=1843]");
  endwhile;
  wp_reset_query();
  endif;

  get_sidebar();

?>


<!-- Start Special Events Block -->
<section class="events front">
  <div class="section-header orange"><a href="<?php echo esc_url( home_url( '/' ) );?>/zomerschool-2014">Zomerschool 2014</a></div>
  <div class="event left">
    <h3 class="list-title">Dinsdag</h3>
    <ul class="events-list activity-list left">
    <?php

      $args = array(
        'category'        => 'zomerschool 2014',
        'tag'             => 'dinsdag',
        'order'           => 'DESC',
        'orderby'         => 'date',
        'posts_per_page'  => 6,
        'nopaging'        => false
        );

      $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <li class="activity-item">
            <div class="activity-date">
              <div class="activity-start-date the-date">
                  <?php the_field('dagdeel') ?>
              </div>
            </div>

            <a class="activity-item-title" href="<?php echo esc_url( home_url( '/' ) );?>/zomerschool-2014"  rel="bookmark">
                <?php the_title(); ?>
            </a>
          </li>
      <?php
        endwhile;
        wp_reset_query();
        wp_reset_postdata();
      ?>
    </ul>
  </div>
  <div class="event right">

    <h3 class="list-title last">Donderdag</h3>
    <ul class="events-list activity-list right">
    <?php

      $args = array(
        'category'        => 'Event',
        'tag'             => 'donderdag',
        'order'           => 'ASC',
        'orderby'         => 'date',
        'posts_per_page'  => 6,
        'nopaging'        => false
        );

      $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <li class="activity-item">
            <div class="activity-date">
              <div class="activity-start-date the-date">
                  <?php the_field('dagdeel') ?>
              </div>
            </div>

            <a class="activity-item-title" href="<?php echo esc_url( home_url( '/' ) );?>/zomerschool-2014" rel="bookmark">
                <?php the_title(); ?>
            </a>

          </li>
      <?php
        endwhile;
        wp_reset_query();
        wp_reset_postdata();
      ?>
    </ul>
  </div>
    <span class="read-more orange"><a href="<?php echo esc_url( home_url( '/' ) );?>/zomerschool-2014">Klik hier voor het volledige schema</a></span>
</section>

<?php
get_footer();


?>
