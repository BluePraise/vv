
<aside class="front-sidebar">
  <div class="pagelink-block">
    <div class="pagelink blue"><a href="/nieuws">Het laatste nieuws</a></div>
    <div class="pagelink red"><a href="/activiteiten">Activiteiten <?php echo date('Y'); ?></a></div>
    <div class="pagelink lilac"><a href="/zet-ons-in/">Zet ons in!</a></div>
  </div>

  <!-- Start Activiteiten Block -->
  <div class="activiteiten front">
    <div class="section-header red">Recente activiteiten</div>
    <ul class="activity-list red">
      <span>
        Binnenkort staat hier een vullende agenda! <br />
        Nu zijn we druk met de <a href="/zomerschool-2014">Zomerschool!</a>
      </span>
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
