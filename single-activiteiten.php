<?php
/*
  Single Post Template: Activiteiten
  Layout specifiek voor het nieuws.
*/

get_header();
get_sidebar();
?>

<div class="content red">
  <article <?php post_class(); ?> >
  <header class="article-header">
    <h1 class="article-title pagetitle"><?php the_title(); ?></h1>
  </header>
<?php
    if ( ! post_password_required()) :
      edit_post_link( __( 'Bewerk deze activiteit', '' ), '<span class="edit-link">', '</span>' );
      endif;
      if (have_posts()) : while (have_posts()) : the_post();?>
      <div class="activity-info activity-date">
        <div class="activity-label">Wanneer: </div>
        <div class="activity-start-date the-date"><span> <?php the_field('activiteit_begindatum'); ?> <?php the_field('activiteit_begintijd') ?> - <?php the_field('activiteit_eindtijd') ?> </span></div>
      </div>
      <div class="activity-info activity-persons">
        <div class="activity-label">Wie:</div>
        <div class="activity-person"><?php the_field('activiteit_contactpersoon') ?> </div>
      </div>
      <div class="activity-info activity-locations">
        <div class="activity-label">Waar:</div>
        <div class="activity-location"><?php the_field('activiteit_lokatie') ?> </div>
      </div>
       <div class="single-image single-activity-image">
        <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('artikel_middle_view');
          }
          ?>
      </div>
      <div class="activity-content">
      <?php
        the_content();
        comments_template();
        endwhile;
        endif;
        ?>
    </div><!-- end of activitycontent -->
  </article>
</div> <!-- end of contentclass -->

<?php get_footer(); ?>


