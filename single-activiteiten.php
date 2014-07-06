<?php
/*
  Single Post Template: Activiteiten
  Layout specifiek voor het nieuws.
*/

get_header();
get_sidebar();
?>

<div class="content red">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <h1 class="pagetitle single-activity-title"><?php the_title(); ?></h1>

      <div class="single-image single-activity-image">
        <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('artikel_middle_view');
          }?>
      </div>
      <div class="activity-info activity-date">
        <div class="activity-label">Datum:</div>
        <div class="activity-start-date the-date"> <span>van:</span> <?php the_field('begintijd') ?> </div>
        <div class="activity-end-date the-date"> <span>tot:</span> <?php the_field('eindtijd') ?> </div>
      </div>
      <div class="activity-info activity-persons">
        <div class="activity-label">Wie:</div>
        <div class="activity-person"><?php the_field('activiteiten_persoon') ?> </div>
      </div>
      <?php the_content();

      if ( ! post_password_required()) :
      edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
      endif;

  endwhile;
?>


  <?php comments_template(); ?>
</div> <!-- end of contentclass -->


</div> <!-- end of contentclass -->
<?php
endif;
get_footer();
?>

