<?php
/*
* Template Name: Zomeschool Page
*/
get_header();

get_sidebar( );
?>

<div class="content standard">
  <?php if ( have_posts() ) : ?>
  <h1 class="pagetitle orange"><?php the_title(); ?></h1>
   <?php while ( have_posts() ) : the_post();
        the_content();
        endwhile;
        else: ?>
        <!-- no posts found -->
        <span>Binnenkort wordt deze pagina gevuldt, we zijn er erg druk mee.</span>
    <?php endif;
          if ( ! post_password_required()) :
          edit_post_link( __( 'Aanpassen', '' ), '<span class="edit-link">', '</span>' );
          endif; ?>

    <table>
      <thead>
        <th>Datum</th>
        <th>Workshop</th>
        <th>Uitvoerder</th>
        <th>Benodigdheden</th>
        <th>Kosten</th>
      </thead>
      <tbody>

  <?php
    $args = array(
      'category_name'   => 'Event',
      'order'           => 'ASC',
      'orderby'         => 'date',
      'year'            => 2014,
      'posts_per_page'  => 100,
      'nopaging'        => false
      );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <tr>
      <td class="event-date"><?php the_field('dagdeel'); ?></td>
      <td class="event-title"><?php the_title(); ?></td>
      <td class="event-person"><?php the_field('waardebrenger'); ?></td>
      <td class="event-materials"><?php the_field('benodigdheden'); ?></td>
      <td class="event-costs"><?php the_field('kosten'); ?></td>
    </tr>
<?php
    endwhile; // End of the loop
    wp_reset_query();
    wp_reset_postdata();
?>

    </tbody>
  </table>

</div> <!-- end of contentclass -->

<?php

 get_footer();
?>
