<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];
?>
  <div id="its-sponsors" class="its-clients slider-home owl-carousel owl-theme">
    <div class="sponsor item">
      <img src="<?php echo $upload_path . '/2018/08/9_sap_partner_open.png'; ?>" src="<?php echo $style_dir . '/images/whole.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="sponsor item">
      <img src="<?php echo $upload_path . '/2018/07/10_peru_contable.png'; ?>" src="<?php echo $style_dir . '/images/whole.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="sponsor item">
      <img src="<?php echo $upload_path . '/2018/08/11_camara_comercio.png'; ?>" src="<?php echo $style_dir . '/images/whole.png'; ?>" alt="" class="client-item"/>
    </div>
  </div>
