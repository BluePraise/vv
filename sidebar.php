
<aside class="front-sidebar">
  <div class="pagelink-block">
    <div class="pagelink blue"><a href="/nieuws">Het laatste nieuws</a></div>
    <div class="pagelink red"><a href="/activiteiten">Activiteiten <?php echo date('Y'); ?></a></div>
    <div class="pagelink lilac"><a href="/zet-ons-in/">Zet ons in!</a></div>
  </div>

  <!-- Start Activiteiten Block -->
  <div class="activiteiten front">
    <?php
      if ( !is_active_sidebar( 'sidebar-activity' ) ) :
        echo '<span class="temp-message">Op het moment zijn er geen activiteiten.</span>';
      else:
        dynamic_sidebar( 'sidebar-activity' );
      endif;
    ?>
  </div>
</aside>
