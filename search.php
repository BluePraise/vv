<?php
/*
* Template Name: Search Page
*/
get_header();

get_sidebar( );
if ( have_posts() ) :
?>

<div class="content standard">
  <h1 class="pagetitle orange"><?php printf( __( 'Zoekresultaten voor: %s', 'vv-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
<?php
  global $wp_query;
  $total_results = $wp_query->found_posts;
?>
<div class="result-count">Er zijn <?php echo $total_results ?> resultaten gevonden.</div>

<ul class="search-results">
  <?php while ( have_posts() ) : the_post();?>
    <li>
      <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    </li>
  <?php
  endwhile;
  else:
  ?>
    <p><?php _e( 'Sorry, er is niks gevonden in de website. Probeer het eens met andere zoektermen.' , 'vv-theme' ); ?></p>
  <?php endif;?>
</ul>

</div> <!-- end of contentclass -->

<?php get_footer(); ?>
