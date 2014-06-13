<?php
/*
* Template Name: Front Page
*/
get_header();

?>
<aside class="pagelink-block">
  <div class="pagelink darkgreen blog">Vitale Verbindingen Blogt</div>
  <div class="pagelink aquagreen">Vitale Verbindingen Blogt</div>
  <div class="pagelink lilac">Zet ons in!</div>
</aside>

<?php
query_posts('cat=134 && showposts=2');
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article class="activity activity-excerpt">
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
      <?php the_content();
          if ( ! post_password_required()) :
           edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
          endif; ?>

  </article>
<?php
endwhile;
wp_reset_query();
endif;
?>


<?php
// endif;

get_footer();

?>
