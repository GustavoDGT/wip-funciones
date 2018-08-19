<?php
/**
 * The template used for displaying page content in page-home.php
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$uploads = wp_upload_dir();
$upload_path = $uploads['baseurl'];

$courses_args = array( 'post_type' => LP_COURSE_CPT, 
  'orderby' => 'date', 
  'order' => 'DESC', 
);
?>
<section id="wip-slider">
  <?php echo do_shortcode('[WIP_SLIDER]'); ?>
</section>
<section id="wip-courses" class="align-center grid-100 wip-40 bg-skyblue skinny-section">
  <div class="grid-100 mobile-grid-100">
    <h2>NUESTROS CURSOS</h2>
    <div class="wip-header-line"></div>
    <p>En ITSystems contamos con un plan integral de capacitación, a fin de cubrir todos tus
requerimientos.</p>
    <div id="wip-tabs-courses">
      <input id="tab-sap-bo" type="radio" name="wip-tabs" checked>
      <label for="tab-sap-bo"><i class="fa fa-sapbo fa-2x" style="font-size: 31px;"></i></label>
      <?php 
      $courses_args['tax_query'] = array(
        array(
          'taxonomy' => 'course_category',
          'field' => 'slug',
          'terms' => 'sap-erp'
        )
      );
      $courses_query = new WP_Query($courses_args);
      if ($courses_query->have_posts()):
      ?>
        <input id="tab-sap-erp" type="radio" name="wip-tabs">
        <label for="tab-sap-erp"><i class="fa fa-saperp fa-2x"></i></label>
      <?php endif; ?>
      <div id="sap-bo" class="tab-section learn-press-courses slider-home owl-carousel owl-theme fadeIn animated">
        <div class="lp_course item">
          <div class="course-thumbnail"> 
            <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/"> <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="Become a PHP Master and Make Money" title="course-2" width="400" height="300"> </a>
          </div>
          <div class="thim-course-content">
            <div class="course-content">
            <h4 class="course-title">
              <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/" rel="bookmark">Become a PHP Master and Make Money</a>
            </h4>
            <p class="course-description">Generando valor agregado y experiencias impecables para productos y servicios</p>
            </div>
            <div class="course-meta">
              <time><b>Próximo inicio:</b> <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" content="2018-08-01T00:00:00-05:00">01 de Agosto</span></time>
            </div>
          </div>
        </div>
        <div class="lp_course item">
          <div class="course-thumbnail"> 
            <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/"> <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="Become a PHP Master and Make Money" title="course-2" width="400" height="300"> </a>
          </div>
          <div class="thim-course-content">
            <div class="course-content">
            <h4 class="course-title">
              <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/" rel="bookmark">Become a PHP Master and Make Money</a>
            </h4>
            <p class="course-description">Generando valor agregado y experiencias impecables para productos y servicios</p>
          </div>
            <div class="course-meta">
              <time><b>Próximo inicio: <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" content="2018-08-01T00:00:00-05:00">01 de Agosto</span></b></time>
            </div>
          </div>
        </div>
        <div class="lp_course item">
          <div class="course-thumbnail"> 
            <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/"> <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="Become a PHP Master and Make Money" title="course-2" width="400" height="300"> </a>
          </div>
          <div class="thim-course-content">
            <div class="course-content">
            <h4 class="course-title">
              <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/" rel="bookmark">Become a PHP Master and Make Money</a>
            </h4>
            <p class="course-description">Generando valor agregado y experiencias impecables para productos y servicios</p>
          </div>
            <div class="course-meta">
              <time>Próximo inicio: <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" content="2018-08-01T00:00:00-05:00">01 de Agosto</span></time>
            </div>
          </div>
        </div>
        <div class="lp_course item">
          <div class="course-thumbnail"> 
            <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/"> <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="Become a PHP Master and Make Money" title="course-2" width="400" height="300"> </a>
          </div>
          <div class="thim-course-content">
            <div class="course-content">
            <h4 class="course-title">
              <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/" rel="bookmark">Become a PHP Master and Make Money</a>
            </h4>
            <p class="course-description">Generando valor agregado y experiencias impecables para productos y servicios</p>
          </div>
            <div class="course-meta">
              <time>Próximo inicio: <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" content="2018-08-01T00:00:00-05:00">01 de Agosto</span></time>
            </div>
          </div>
        </div>       
      </div>
      <?php if ($courses_query->have_posts()): ?>
        <div id="sap-erp" class="tab-section learn-press-courses slider-home owl-carousel owl-theme animated fadeIn">
          <?php while ($courses_query->have_posts()): $courses_query->the_post(); 
            $f_image_id = get_post_meta( get_the_ID(), WIP_PREFIX . '_thumb_image', true );
            $f_image = wp_get_attachment_image_src( $f_image_id, 'full' );
            ?>
            <div class="lp_course item">
              <div class="course-thumbnail"> 
                <?php if (!empty($f_image)): ?>
                  <a href="<?php the_permalink(); ?>"> 
                    <img src="<?php echo $f_image[0]; ?>" alt="<?php echo get_post_meta( $f_image_id, '_wp_attachment_image_alt', true); ?>" title="<?php echo get_the_title( $f_image_id ); ?>" /> 
                  </a>
                <?php endif; ?>
              </div>
              <div class="thim-course-content">
                <div class="course-content">
                  <h4 class="course-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_title(); ?></a>
                  </h4>
                  <p class="course-description"><?php echo get_the_excerpt(); ?></p>
                </div>
                <div class="course-meta">
                  <time>Próximo inicio: <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" content="2018-08-01T00:00:00-05:00">01 de Agosto</span></time>  
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>     
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<section id="wip-events" class="align-center grid-100 wip-40 skinny-section">
  <div class="grid-100 mobile-grid-100">
    <h2>EVENTOS</h2>
    <div class="wip-header-line"></div>
    <p>Conozca nuestro calendario<br>¡Manténgase actualizado!</p>
  </div>
  <div class="grid-100">
    <div class="grid-25 mobile-grid-100">
      <div class="thim-widget-icon-box">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="icon2" title="icon2">
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><a href="#">Programa Internacional Avanzado en Asociaciones Público Privadas</a></h4>
              </div><div class="desc-icon-box"><div class="desc-content">Experiencia e innovación del sector privado contribuyendo al desarrollo del país
              </div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-25 mobile-grid-100">
      <div class="thim-widget-icon-box">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="icon2" title="icon2">
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><a href="#">Programa Internacional Avanzado en Asociaciones Público Privadas</a></h4>
              </div><div class="desc-icon-box"><div class="desc-content">Experiencia e innovación del sector privado contribuyendo al desarrollo del país
              </div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-25 mobile-grid-100">
      <div class="thim-widget-icon-box">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="icon2" title="icon2">
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><a href="#">Programa Internacional Avanzado en Asociaciones Público Privadas</a></h4>
              </div><div class="desc-icon-box"><div class="desc-content">Experiencia e innovación del sector privado contribuyendo al desarrollo del país
              </div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-25 mobile-grid-100">
      <div class="thim-widget-icon-box">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="icon2" title="icon2">
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><a href="#">Programa Internacional Avanzado en Asociaciones Público Privadas</a></h4>
              </div><div class="desc-icon-box"><div class="desc-content">Experiencia e innovación del sector privado contribuyendo al desarrollo del país
              </div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--<div class="grid-100 wip-40">
      <a class="wip-btn" href="acerca-de-educacion-ejecutiva">VER MÁS PRÓXIMOS INICIOS</a>
  </div>-->
</section>
<section id="wip-formation" class="align-center grid-100 grid-parent bg-skyblue">
  <div class="grid-50 mobile-grid-100 grid-parent">
    <h2 class="wip-40-top">¿POR QUÉ <b>APRENDER SAP</b> CON NOSOTROS?</h2>
    <div class="wip-header-line"></div>
      <p>Razones para acompañarte<br> en tu camino profesional</p>
    <div class="wip-table wip-table--2cols">
      <div class="wip-cell-right">
        <i class="fa fa-lightbulb-o fa-2x icon-service wip-circle" aria-hidden="true"></i>
      </div>
      <div class="wip-cell-left">
        <h4 class="wip-icon-text">INNOVACIÓN CONTINUA</h4>
      </div>
      <div class="wip-cell-right">
        <i class="fa fa-line-chart fa-2x icon-service wip-circle" aria-hidden="true"></i>
      </div>
      <div class="wip-cell-left">
        <h4 class="wip-icon-text">CALIDAD INFORMATIVA</h4>
      </div>
      <div class="wip-cell-right">
        <i class="fa fa-handshake-o fa-2x icon-service wip-circle" aria-hidden="true"></i>
      </div>
      <div class="wip-cell-left">
        <h4 class="wip-icon-text">EXPERCIENCIA DOCENTE</h4>
      </div>
    </div>
    <div class="wip-50">
      <a class="wip-btn" href="acerca-de-educacion-ejecutiva">CONÓCENOS MÁS</a>
    </div>
  </div>
  <div class="grid-50 mobile-grid-100 grid-parent">
    <img src="<?php echo $upload_path . '/2018/07/aprende-nosotros.jpg'; ?>" />
  </div>
</section>
<section id="wip-testimonial" class="align-center wip-40 grid-100 bg-blue">
  <h2>EXPERIENCIAS DE ÉXITO</h2>
  <div class="wip-header-white-line"></div>
  <p>La satisfacción de nuestros estudiantes es nuestra mejor carta de presentación.</p>
  <div id="testimonial" class="slider-home owl-carousel owl-theme">
                <div id="item-1" class="item">
                  <div class="text-caption">
                    <img class="person-img" src="<?php echo $upload_path . '/2018/07/testimonio-01.png'; ?>" />
                    <blockquote>
                      "Me brindó una visión diferente para la ejecución de proyectos y herramientas para mi crecimiento profesional. Pude identificar las mejores experiencias en mi vida."<br>
                      <b>Taller en Proyectos Ágiles con Scrum</b>
                    </blockquote>
                    <p>
                      <b><span class="person-name">Mónica Flores</span></b><br>
                      Subgerente de Proyectos Estratégicos en BanBif
                    </p>
                  </div>
                </div>
                <div id="item-2" class="item">
                  <div class="text-caption">
                    <img class="person-img" src="<?php echo $upload_path . '/2018/07/testimonio-02.png'; ?>" />
                    <blockquote>
                      "Me brindó una visión diferente para la ejecución de proyectos y herramientas para mi crecimiento profesional. Pude identificar las mejores experiencias en mi vida."<br>
                      <b>SAP HCM</b>
                    </blockquote>
                    <p>
                      <b><span class="person-name">Franco Lamas</span></b><br>
                      Analista en Financiera Efectiva
                    </p>
                  </div>
                </div>
                <!--<div id="item-4" class="item">
                  <div class="text-caption">
                    <img class="person-img" src="<?php echo $upload_path . '/2018/07/testimonio-03.png'; ?>" />
                    <blockquote>
                      "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."<br>
                      <b>SAP ERP</b>
                    </blockquote>
                    <p>
                      <b>Gustavo Pajuelo</b><br>
                      PHP Developer
                    </p>
                  </div>
                </div>-->
  </div>
</section>
<!--<section id="wip-news" class="grid-100 wip-40 tiny-section">
  <div class="grid-75 mobile-grid-100">
    <h2>ARTÍCULOS ESPECIALIZADOS</h2>
    <div class="wip-normal-line"></div>
    <p>Infórmate más sobre Educación Ejecutiva de UTEC</p>
  </div>
  <div class="grid-25 mobile-grid-100 align-right">
    <a class="wip-btn" href="https://educationwp.thimpress.com/demo-edtech/courses/"><i class="fa fa-arrow-right"></i> Ver todos</a>
  </div>
  <div class="grid-100 align-center">
    <div class="grid-25 mobile-grid-100">
      <div class="thim-widget-icon-box">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="icon2" title="icon2">
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><a href="#">Expert instruction</a></h4>
              </div><div class="desc-icon-box"><div class="desc-content">Find the right instructor for you mance by assigning tasks, com municati instruction.<br>
              <a class="more-new" href="#">Leer más...</a></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-25 mobile-grid-100">
      <div class="thim-widget-icon-box">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="icon2" title="icon2">
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><a href="#">Expert instruction</a></h4>
              </div><div class="desc-icon-box"><div class="desc-content">Find the right instructor for you mance by assigning tasks, com municati instruction.<br>
              <a class="more-new" href="#">Leer más...</a></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-25 mobile-grid-100">
      <div class="thim-widget-icon-box">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="icon2" title="icon2">
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><a href="#">Expert instruction</a></h4>
              </div><div class="desc-icon-box"><div class="desc-content">Find the right instructor for you mance by assigning tasks, com municati instruction.<br>
              <a class="more-new" href="#">Leer más...</a></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-25 mobile-grid-100">
      <div class="thim-widget-icon-box">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="icon2" title="icon2">
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><a href="#">Expert instruction</a></h4>
              </div><div class="desc-icon-box"><div class="desc-content">Find the right instructor for you mance by assigning tasks, com municati instruction.<br>
              <a class="more-new" href="#">Leer más...</a></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>-->
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
<section id="wip-sponsors" class="grid-100 wip-40 align-center tiny-section">
  <div class="grid-100 mobile-grid-100 wip-20-bottom">
    <h3 class="title-sponsors">ITSYSTEMS CUENTA CON EL RESPALDO DE</h3>
  </div>
  <div id="its-sponsors" class="its-clients slider-home owl-carousel owl-theme">
    <div class="sponsor item">
      <img src="<?php echo $upload_path . '/2018/07/9_unmsm.png'; ?>" alt="" class="client-item"/>
    </div>
    <div class="sponsor item">
      <img src="<?php echo $upload_path . '/2018/07/10_peru_contable.png'; ?>" alt="" class="client-item"/>
    </div>
  </div>
</section>
<section id="wip-contact" class="grid-100 wip-40 align-center bg-section" style="background: url('<?php echo WIP_PLUGIN_URL . 'images/bg-contact.jpg'; ?>')">
  <div class="grid-100 mobile-grid-100">
    <div class="grid-100 grid-parent">
      <h2>SUSCRIBETE AHORA</h2>
      <div class="wip-header-white-line"></div>
      <p>Regístrate para recibir nuestra programación, tutoriales y recursos en video en tu correo.</p>
    </div>
    <div class="wip-form grid-100 grid-parent">
      <div class="content">
        <?php echo do_shortcode( '[contact-form-7 id="358" title="Contacto home"]' ); ?>
      </div>
    </div>
  </div>
</section>
<!--wea-->
