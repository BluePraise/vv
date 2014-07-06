<?php
/*
* Template Name: Blog Page
*/
get_header();


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
<div class="content articles darkgreen">
  <article>

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
  ?>
  <?php
    the_content();
  endwhile;
?>

</article>
</div> <!-- end of contentclass -->

<?php
endif;


get_footer();

?>
