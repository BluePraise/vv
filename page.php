<?php
/*
* Template Name: Standard Page
*/
get_header();


?>

<div class="content orange standard">
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