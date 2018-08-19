<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];
?>
<section id="wip-sponsors" class="grid-100 wip-20 align-center tiny-section">
  <div class="grid-100 mobile-grid-100 wip-20-bottom">
    <h3 class="title-sponsors">ITSYSTEMS CUENTA CON EL RESPALDO DE</h3>
  </div>
  <div id="its-sponsors" class="its-clients slider-home owl-carousel owl-theme">
    <div class="sponsor item">
      <img src="<?php echo $upload_path . '/2018/08/9_sap_partner_open.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="sponsor item">
      <img src="<?php echo $upload_path . '/2018/07/10_peru_contable.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="sponsor item">
      <img src="<?php echo $upload_path . '/2018/08/11_camara_comercio.png'; ?>" alt="" class="client-item"/>
    </div>
  </div>
</section>