<aside class="main-sidebar">
  <nav class="side-navigation" role="navigation">
  <?php
    if (is_home()) :
      vv_main_menu();
    else:
      vv_side_menu();
    endif;
  ?>
</nav>
  <?php //get_search_form( $form ); ?>
   <?php dynamic_sidebar( 'sidebar-sitewide' ); ?>
</aside>
