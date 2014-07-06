<?php
/*
* Template Name: Activiteiten Page
*/
get_header();
get_sidebar();
?>

  <div class="content red">
    <h1 class="pagetitle"><?php echo $pagename; ?></h1>
    <?php
    $args = array(
      'post_status' => array(
        'pending',
        'draft',
        'auto-draft',
        'future',
        'private',
        'trash'
        ),
      );
      if ( have_posts() ) :  while ( have_posts() ) : the_post();

      the_content();

      endwhile;
      endif;

      wp_reset_query();
    ?>
  </div> <!-- end of contentclass -->

<?php get_footer(); ?>
