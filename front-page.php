<?php
/*
* Template Name: Front Page
*/
get_header();

echo do_shortcode("[metaslider id=1843]");

get_sidebar();

?>


<!-- Start Special Events Block -->
<section class="events front">
  <div class="section-header orange"><a href="<?php echo esc_url( home_url( '/' ) );?>/zomerschool-2014">Zomerschool 2014</a></div>
  <div class="event left">
    <h3 class="list-title">Dinsdag</h3>
    <ul class="events-list activity-list left">
    <?php
      $today = date('Ymd');
      $args = array(
        'category'        => 'Event',
        'tag'             => 'dinsdag',
        'orderby'         => 'date',
        'order'           => 'ASC',
        'meta_query' => array(
              array(
          'key'   => 'dagdeel',
          'compare' => '<',
          'value'   => $today,
        )),
        'posts_per_page'  => 9,
        'nopaging'        => false
        );

      $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <li class="activity-item">
            <div class="activity-date">
              <div class="activity-start-date the-date">
                  <?php
                    $dateformatstring = "d F";
                    $unixtimestamp = strtotime(get_field('dagdeel'));
                    echo date_i18n($dateformatstring, $unixtimestamp);
                    echo ' 09:30 - 12:30'
                  ?>
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
      $current_month = date('m');

      $args = array(
        'category'        => 'Event',
        'tag'             => 'donderdag',
        'orderby'         => 'date',
        'order'           => 'ASC',
        'meta_query' => array(
              array(
          'key'   => 'dagdeel',
          'compare' => '<',
          'value'   => $today,
        )),
        'posts_per_page'  => 9,
        'nopaging'        => false
        );

      $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <li class="activity-item">
            <div class="activity-date">
              <div class="activity-start-date the-date">
                 <?php
                    $dateformatstring = "d F";
                    $unixtimestamp = strtotime(get_field('dagdeel'));
                    echo date_i18n($dateformatstring, $unixtimestamp);
                    echo ' 13:00 - 15:30'
                  ?>
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
