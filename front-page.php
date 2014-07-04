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
?>

<aside class="front-sidebar">
  <div class="pagelink-block">
    <div class="pagelink darkgreen blog"><a href="/zomerschool-2014">Zomerschool 2014</a></div>
    <div class="pagelink aquagreen"><a href="#">Activiteiten 2014</a></div>
    <div class="pagelink lilac"><a href="/zet-ons-in/">Zet ons in!</a></div>
  </div>

  <!-- Start Activiteiten Block -->
  <div class="activiteiten front">
    <div class="section-header red">Meest recente activiteiten</div>
    <ul class="activity-list red">
    <?php

      $args = array(
        'category_name'   => 'activiteiten',
        'order'           => 'DESC',
        'orderby'         => 'date',
        'posts_per_page'  => 10,
        'nopaging'        => false
        );

      $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <li class="activity-item">

            <div class="activity-date">
              <div class="activity-start-date the-date">
                  <?php the_field('begintijd') ?>
              </div>
              <span>-</span>
              <div class="activity-end-date the-date">
                <?php the_field('eindtijd') ?>
              </div>
            </div>

            <a class="activity-item-title" href="<?php the_permalink() ?>" rel="bookmark">
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
</aside>

<!-- Start Special Events Block -->
<section class="events front">
  <div class="section-header orange"><a href="/zomerschool-2014">Zomerschool 2014</a></div>
  <ul class="events-list activity-list left">
  <h3>Dinsdag</h3>
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

          <a class="activity-item-title" href="'<?php the_permalink() ?>" rel="bookmark">
              <?php the_title(); ?>
          </a>
        </li>
    <?php
      endwhile;
      wp_reset_query();
      wp_reset_postdata();
    ?>
  </ul>
  <ul class="events-list activity-list right">
  <h3>Donderdag</h3>
  <?php

    $args = array(
      'category'        => 'Event',
      'tag'             => 'donderdag',
      'order'           => 'DESC',
      'orderby'         => 'date',
      'posts_per_page'  => 6,
      'nopaging'        => false
      );

    $loop = new WP_Query( $args );

      while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li class="activity-item">

          <a class="activity-item-title" href="'<?php the_permalink() ?>" rel="bookmark">
              <?php the_title(); ?>
          </a>

        </li>
    <?php
      endwhile;
      wp_reset_query();
      wp_reset_postdata();
    ?>
  </ul>
</section>

<?php
get_footer();


?>
