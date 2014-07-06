<?php
/*
* Template Name: Zomeschool Page
*/
get_header();

get_sidebar( );
?>

<div class="content standard">
  <h1 class="pagetitle orange"><?php the_title(); ?></h1>

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
      'nopaging'        => false
      );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <tr>
          <td><?php the_field('dagdeel'); ?></td>
          <td><?php the_title(); ?></td>
          <td><?php the_field('waardebrenger'); ?></td>
          <td><?php the_field('benodigdheden'); ?></td>
          <td><?php the_field('kosten'); ?></td>
      </tr>
<?php
    endwhile; // End of the loop
    wp_reset_query();
    wp_reset_postdata();
?>

    </tbody>
  </table>
  <?php
      if ( ! post_password_required()) :
    edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
    endif;
?>
</div> <!-- end of contentclass -->

<?php

 get_footer();
?>
