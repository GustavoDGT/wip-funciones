<?php
global $post;
$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];
?>
<section id="wip-clients" class="grid-100 wip-40 align-center tiny-section">
  <div class="grid-100 mobile-grid-100 wip-20-bottom">
    <h3 class="title-sponsors">¿QUIÉNES CONFÍAN EN NOSOTROS?</h3>
  </div>
  <div id="its-clients" class="its-clients slider-home owl-carousel owl-theme">
    <div class="client item">
      <img src="<?php echo $upload_path . '/2018/07/1_aje.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="client item">
      <img src="<?php echo $upload_path . '/2018/07/2_lindley.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="client item">
      <img src="<?php echo $upload_path . '/2018/07/3_malaga.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="client item">
      <img src="<?php echo $upload_path . '/2018/07/4_ism.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="client item">
      <img src="<?php echo $upload_path . '/2018/07/5_gandules_inc.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="client item">
      <img src="<?php echo $upload_path . '/2018/07/6_ipesa.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="client item">
      <img src="<?php echo $upload_path . '/2018/07/7_dent_import.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="client item">
      <img src="<?php echo $upload_path . '/2018/07/8_globaltec.png'; ?>" alt="" class="client-item"/>
    </div>
  </div>
</section>
<section class="grid-100 grid-parent wip-40 bg-skyblue skinny-section" id="tab-enroll">
	<div class="grid-100 grid-parent align-center">
		<h2>SOLICITAR MÁS INFORMACIÓN</h2>
		<div class="wip-header-line"></div>
		<p>Regístrate y obtén más información del curso.</p>
	</div>
	<div class="wip-form grid-100 grid-parent skinny-section">
		<div class="content">
			<?php echo do_shortcode( '[contact-form-7 title="'. $post->post_title .'"]' ); ?>
		</div>
	</div>
</section>