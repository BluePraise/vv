<?php
/*
* Template Name: Zet Ons In Page
*/
get_header();
get_sidebar();

?>

<div class="content lilac">
  <h1 class="pagetitle"><?php the_title(); ?></h1>
<?php
  if ( get_post_status ( ) == 'private' ) {
    echo '<h1>Nothing to display</h1>';
  } else {
    the_content();
  }

  ?>

</div> <!-- end of contentclass -->

<?php
get_footer();

?>
