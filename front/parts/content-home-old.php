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
?>
<section id="wip-slider">
  <?php echo do_shortcode('[WIP_SLIDER]'); ?>
</section>
<section id="wip-testimonial" class="align-center wip-40 grid-100">
  <h2>PREPÁRATE PARA MARCAR LOS NUEVOS RUMBOS EN TU ORGANIZACIÓN</h2>
  <div class="wip-header-line"></div>
  <p>En Educación Ejecutiva de UTEC contamos con programas</p>
  <p>que se amoldan a los requerimientos laborales de nuestros profesionales.</p>
  <div class="slider-home owl-carousel owl-theme">
                <div id="item-1" class="item">
                  <div class="text-caption">
                    <blockquote>
                      "Me brindó una visión diferente para la ejecución de proyectos y herramientas para mi crecimiento profesional. Pude identificar las mejores experiencias en mi vida."<br>
                      <b>Taller en Proyectos Ágiles con Scrum</b>
                    </blockquote>
                    <p>
                      <b>JHON DOE</b><br>
                      Subgerente de Proyectos Estratégicos en BanBif
                    </p>
                  </div>
                </div>
                <div id="item-2" class="item">
                  <div class="text-caption">
                    <blockquote>
                      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn"<br>
                      <b>SAP Business One</b>
                    </blockquote>
                    <p>
                      <b>ELMER CHIPANA</b><br>
                      Itsystems CEO
                    </p>
                  </div>
                </div>
                <div id="item-4" class="item">
                  <div class="text-caption">
                    <blockquote>
                      "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."<br>
                      <b>SAP ERP</b>
                    </blockquote>
                    <p>
                      <b>Gustavo Pajuelo</b><br>
                      PHP Developer
                    </p>
                  </div>
                </div>
  </div>
</section>
<section id="wip-formation" class="align-center grid-100 grid-parent">
  <div class="grid-50 mobile-grid-100 grid-parent">
    <h2 class="wip-40-top">¿Por  qué <span>Educación Ejecutiva?</span></h2>
    <div class="wip-header-line"></div>
      <p>Educación Ejecutiva de UTEC<br>Propuesta de Especialización Profesional</p>
    <div class="wip-table wip-table--2cols">
      <div class="wip-cell-right">
        <i class="fa fa-users fa-2x icon-service wip-circle" aria-hidden="true"></i>
      </div>
      <div class="wip-cell-left">
        <h3 class="wip-icon-text">TECNOLOGIA</h3>
      </div>
      <div class="wip-cell-right">
        <i class="fa fa-users fa-2x icon-service wip-circle" aria-hidden="true"></i>
      </div>
      <div class="wip-cell-left">
        <h3 class="wip-icon-text">INGENIERÏA</h3>
      </div>
      <div class="wip-cell-right">
        <i class="fa fa-users fa-2x icon-service wip-circle" aria-hidden="true"></i>
      </div>
      <div class="wip-cell-left">
        <h3 class="wip-icon-text">INNOVACIÓN</h3>
      </div>
    </div>
    <div class="wip-50">
      <a class="wip-btn" href="acerca-de-educacion-ejecutiva">Conócenos más</a>
    </div>
  </div>
  <div class="grid-50 mobile-grid-100 grid-parent">
    <img src="<?php echo $upload_path . '/2018/05/prueba_foto_video_mix_0.jpg'; ?>" alt="" width="1226" height="1280" class="alignnone size-full wp-image-221" />
  </div>
</section>
<section id="wip-popular-courses" class="grid-100 wip-40" style="background: url('<?php echo $upload_path . '/2018/06/bg-parallax.png';?>)">
  <div class="grid-75 mobile-grid-100">
    <h2>CURSOS POPULARES</h2>
    <div class="wip-normal-line"></div>
  </div>
  <div class="grid-25 mobile-grid-100 align-right">
    <a class="wip-btn" href="https://educationwp.thimpress.com/demo-edtech/courses/">Ver todos los cursos <i class="fa fa-arrow-right"></i></a>
  </div>
  <div class="grid-100">
              <div class="learn-press-courses">
                    <div class="lp_course grid-25 mobile-grid-100">
                        <div class="course-thumbnail"> 
                          <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/"> <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="Become a PHP Master and Make Money" title="course-2" width="400" height="300"> </a>
                        </div>
                        <div class="thim-course-content">
                          <div class="course-author" itemscope="" itemtype="http://schema.org/Person"> <div class="author-contain"><div class="value" itemprop="name"> <a href="https://educationwp.thimpress.com/demo-edtech/profile/keny/">Keny White</a></div></div>
                          </div>
                          <h2 class="course-title">
                            <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/" rel="bookmark">Become a PHP Master and Make Money</a>
                          </h2>
                          <div class="course-meta">
                            <div class="course-students"><div class="value"><i class="fa fa-users"></i> 29</div></div>
                            <div class="course-price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer"><div class="value  has-origin" itemprop="price"> $69.00  <span class="course-origin-price">$80.00</span></div><meta itemprop="priceCurrency" content="USD"></div>
                          </div>
                        </div>
                    </div>  
                                        <div class="lp_course grid-25 mobile-grid-100">
                        <div class="course-thumbnail"> 
                          <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/"> <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="Become a PHP Master and Make Money" title="course-2" width="400" height="300"> </a>
                        </div>
                        <div class="thim-course-content">
                          <div class="course-author" itemscope="" itemtype="http://schema.org/Person"> <div class="author-contain"><div class="value" itemprop="name"> <a href="https://educationwp.thimpress.com/demo-edtech/profile/keny/">Keny White</a></div></div>
                          </div>
                          <h2 class="course-title">
                            <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/" rel="bookmark">Become a PHP Master and Make Money</a>
                          </h2>
                          <div class="course-meta">
                            <div class="course-students"><div class="value"><i class="fa fa-users"></i> 29</div>  </div>
                            <div class="course-price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer"><div class="value  has-origin" itemprop="price"> $69.00 <span class="course-origin-price">$80.00</span></div><meta itemprop="priceCurrency" content="USD"></div>
                          </div>
                        </div>
                    </div>  
                                        <div class="lp_course grid-25 mobile-grid-100">
                        <div class="course-thumbnail"> 
                          <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/"> <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="Become a PHP Master and Make Money" title="course-2" width="400" height="300"> </a>
                        </div>
                        <div class="thim-course-content">
                          <div class="course-author" itemscope="" itemtype="http://schema.org/Person"> <div class="author-contain"><div class="value" itemprop="name"> <a href="https://educationwp.thimpress.com/demo-edtech/profile/keny/">Keny White</a></div></div>
                          </div>
                          <h2 class="course-title">
                            <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/" rel="bookmark">Become a PHP Master and Make Money</a>
                          </h2>
                          <div class="course-meta">
                            <div class="course-students"><div class="value"><i class="fa fa-users"></i> 29</div></div>
                            <div class="course-price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer"><div class="value  has-origin" itemprop="price"> $69.00  <span class="course-origin-price">$80.00</span></div><meta itemprop="priceCurrency" content="USD"></div>
                          </div>
                        </div>
                    </div>  
                                        <div class="lp_course grid-25 mobile-grid-100">
                        <div class="course-thumbnail"> 
                          <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/"> <img src="https://educationwp.thimpress.com/demo-edtech/wp-content/uploads/sites/46/2015/06/course-2-400x300.jpg" alt="Become a PHP Master and Make Money" title="course-2" width="400" height="300"> </a>
                        </div>
                        <div class="thim-course-content">
                          <div class="course-author" itemscope="" itemtype="http://schema.org/Person"> <div class="author-contain"><div class="value" itemprop="name"> <a href="https://educationwp.thimpress.com/demo-edtech/profile/keny/">Keny White</a></div></div>
                          </div>
                          <h2 class="course-title">
                            <a href="https://educationwp.thimpress.com/demo-edtech/courses/become-a-php-master-and-make-money-fast/" rel="bookmark">Become a PHP Master and Make Money</a>
                          </h2>
                          <div class="course-meta">
                            <div class="course-students"><div class="value"><i class="fa fa-users"></i> 29</div></div>
                            <div class="course-price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer"><div class="value  has-origin" itemprop="price"> $69.00 <span class="course-origin-price">$80.00</span></div><meta itemprop="priceCurrency" content="USD"></div>
                          </div>
                        </div>
                    </div>                                      
              </div>
  </div>
</section>
<section id="wip-register-course" class="grid-100 wip-40" style="background: url('<?php echo $upload_path . '/2018/06/bg-register.jpg'; ?>)">
  <div class="grid-70 mobile-grid-100">
    <h3 class="frase">Get 100 Online Courses for Free</h3>
    <h1 class="frase">Register to get it</h1>
  </div>
  <div class="grid-30 mobile-grid-100">
    <?php echo do_shortcode( '[contact-form-7 id="356" title="Registrar curso"]' ); ?>
  </div>
</section>
<section id="wip-about-us" class="grid-100 wip-40">
  <div class="grid-50 mobile-grid-100">
    <img src="<?php echo $upload_path . '/2018/06/about-us.jpg'; ?>" alt=""/>
    <img src="<?php echo $upload_path . '/2018/06/about-us-2.jpg'; ?>" alt="" class="about-img"/>
  </div>
  <div class="grid-50 mobile-grid-100 align-center">
    <h2>ACERCA DE NOSOTROS</h2>
    <div class="wip-header-line"></div>
    <b>Each course is like an interactive textbook, featuring pre-recorded videos, quizzes, and projects.</b>
    <p class="wip-40-bottom">Accelerate your team’s performance by assigning tasks, communicating and tracking progress in one place. Did you know we’re one of the first com panies to offer an EU hosting option for our European customers.</p>
    <div class="grid-50 mobile-grid-100 wip-40-bottom">
      <h3 class="timer count-title count-number" data-to="1700" data-speed="1500">1700+</h3>
      <p class="counter-box-content">STUDENTS LEARNING</p>
    </div>
    <div class="grid-50 mobile-grid-100 wip-40-bottom">
      <h3 class="timer count-title count-number" data-to="1700" data-speed="1500">600+</h3>
      <p class="counter-box-content">FREE COURSES</p>
    </div>
    <div class="grid-50 mobile-grid-100 wip-40-bottom">
      <h3 class="timer count-title count-number" data-to="1700" data-speed="1500">50+</h3>
      <p class="counter-box-content">STUDENTS</p>
    </div>
    <div class="grid-50 mobile-grid-100 wip-40-bottom">
      <h3 class="timer count-title count-number" data-to="1700" data-speed="1500">666+</h3>
      <p class="counter-box-content">TOTAL COURSES</p>
    </div>
    <div class="grid-100 wip-40">
      <a class="wip-btn" href="#">VER MÁS</a>
    </div>
  </div>
</section>
<section id="wip-what-we-do" class="grid-100 wip-40">
  <div class="grid-50 mobile-grid-100">
    <h2>WHAT WE DO</h2>
    <div class="wip-normal-line"></div>
    <b>Each course is like an interactive textbook, featuring pre-recorded videos, quizzes, and projects.</b>
    <p>Accelerate your team’s performance by assigning tasks, communicating and tracking progress in one place. Did you know we’re one o80pxf the first com panies to offer an EU hosting option for our European customers.</p>
    <a href="#" class="wip-btn">Ver más</a>
  </div>
  <div class="grid-50 mobile-grid-100 align-center">
    <div class="grid-50 mobile-grid-100 wip-20-bottom">
      <div class="thim-widget-icon-box"><div class="wrapper-box-icon has_custom_image text-center image_box "><div class="smicon-box iconbox-top"><div class="boxes-icon" style="width: 100px;"><span class="inner-icon"><span class="icon icon-images"><img src="<?php echo $upload_path . '/2017/12/icon2.png'; ?>" alt="icon2" title="icon2" width="79" height="80"></span></span></div><div class="content-inner"><div class="sc-heading article_heading"><h3 class="heading__primary">Expert instruction</h3></div><div class="desc-icon-box"><div class="desc-content" style="font-size: 16px;line-height: 23px;">Find the right instructor for you mance by assigning tasks, com municati instruction.</div></div></div></div><!--end smicon-box--></div></div>
    </div>
    <div class="grid-50 mobile-grid-100 wip-20-bottom">
      <div class="thim-widget-icon-box"><div class="wrapper-box-icon has_custom_image text-center image_box "><div class="smicon-box iconbox-top"><div class="boxes-icon" style="width: 100px;"><span class="inner-icon"><span class="icon icon-images"><img src="<?php echo $upload_path . '/2017/12/icon4.png'; ?>" alt="icon4" title="icon4" width="59" height="80"></span></span></div><div class="content-inner"><div class="sc-heading article_heading"><h3 class="heading__primary">Expert instruction</h3></div><div class="desc-icon-box"><div class="desc-content" style="font-size: 16px;line-height: 23px;">Find the right instructor for you mance by assigning tasks, com municati instruction.</div></div></div></div><!--end smicon-box--></div></div>
    </div>
    <div class="grid-50 mobile-grid-100 wip-20-bottom">
      <div class="thim-widget-icon-box"><div class="wrapper-box-icon has_custom_image text-center image_box "><div class="smicon-box iconbox-top"><div class="boxes-icon" style="width: 100px;"><span class="inner-icon"><span class="icon icon-images"><img src="<?php echo $upload_path . '/2017/12/icon3.png'; ?>" alt="icon3" title="icon3" width="80" height="79"></span></span></div><div class="content-inner"><div class="sc-heading article_heading"><h3 class="heading__primary">Expert instruction</h3></div><div class="desc-icon-box"><div class="desc-content" style="font-size: 16px;line-height: 23px;">Find the right instructor for you mance by assigning tasks, com municati instruction.</div></div></div></div><!--end smicon-box--></div></div>
    </div>
    <div class="grid-50 mobile-grid-100 wip-20-bottom">
      <div class="thim-widget-icon-box"><div class="wrapper-box-icon has_custom_image text-center image_box "><div class="smicon-box iconbox-top"><div class="boxes-icon" style="width: 100px;"><span class="inner-icon"><span class="icon icon-images"><img src="<?php echo $upload_path . '/2017/12/icon1.png'; ?>" alt="icon1" title="icon1" width="75" height="80"></span></span></div><div class="content-inner"><div class="sc-heading article_heading"><h3 class="heading__primary">Expert instruction</h3></div><div class="desc-icon-box"><div class="desc-content" style="font-size: 16px;line-height: 23px;">Find the right instructor for you mance by assigning tasks, com municati instruction.</div></div></div></div><!--end smicon-box--></div></div>
    </div>
  </div>
</section>
<section id="wip-sponsors" class="grid-100 wip-40 align-center">
  <div class="grid-100 mobile-grid-100">
    <h2>NUESTROS CLIENTES</h2>
    <div class="wip-header-line"></div>
  </div>
  <div class="grid-20 mobile-grid-50">
    <img src="<?php echo $upload_path . '/2017/12/client2.jpg'; ?>" alt="" class="client-item"/>
  </div>
  <div class="grid-20 mobile-grid-50">
    <img src="<?php echo $upload_path . '/2017/12/client3.jpg'; ?>" alt="" class="client-item"/>
  </div>
  <div class="grid-20 mobile-grid-50">
    <img src="<?php echo $upload_path . '/2017/12/client4.jpg'; ?>" alt="" class="client-item"/>
  </div>
  <div class="grid-20 mobile-grid-50">
    <img src="<?php echo $upload_path . '/2017/12/client1.jpg'; ?>" alt="" class="client-item"/>
  </div>
  <div class="grid-20 mobile-grid-50">
    <img src="<?php echo $upload_path . '/2017/12/client2-1.jpg'; ?>" alt="" class="client-item"/>
  </div>
</section>
<section id="wip-contact" class="grid-100 wip-40 align-center" style="background: url('<?php echo WIP_PLUGIN_URL . 'images/bg-contact.jpg'; ?>')">
  <div class="grid-100 mobile-grid-100">
    <h1 class="frase">Get Newsletter</h1>
    <p class="frase">Your download should start automatically, if not Click here. Should I give up, huh?</p>
    <?php echo do_shortcode( '[contact-form-7 id="358" title="Contacto home"]' ); ?>
  </div>
</section>
<!--wea-->
