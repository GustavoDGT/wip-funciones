<?php
/**
 * Template for displaying instructor of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/instructor.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

global $course;
$professional_title = get_user_meta( $course->get_instructor()->_id, 'professional_title', true )

?>
<section class="course-author wip-40 grid-100 grid-parent skinny-section bg-gray" id="tab-instructor">
	<?php //_e( 'About the Instructor', 'learnpress' ); ?>
    <h2>¿QUIENES COLABORARÁN A LOGRAR TU OBJETIVO?</h2>
	<div class="wip-normal-line"></div>
    <div id="course-instructors" class="slider-home owl-carousel owl-theme">
      <div class="intructor-item item thim-widget-icon-box align-center">
        <div class="wrapper-box-icon has_custom_image text-center image_box">
          <div class="smicon-box iconbox-top">
            <div class="boxes-icon">
              <?php echo $course->get_instructor()->get_profile_picture(); ?>
            </div>
            <div class="content-inner">
              <div class="sc-heading article_heading">
                <h4><?php echo $course->get_instructor_name(); ?></h4>
                <?php if( ! empty( $professional_title ) ): ?><h4><?php echo $professional_title; ?></h4><?php endif; ?>
              </div>
              <div class="desc-icon-box">
                <div class="desc-content">
                  <?php if( ! empty( $course->get_instructor()->get_description() ) ): ?><p><?php echo $course->get_instructor()->get_description(); ?></p><?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>