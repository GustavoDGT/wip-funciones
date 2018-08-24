<?php
/**
 * Template for displaying overview tab of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/tabs/overview.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit(); 
global $course_data; 

$review_name = $course_data['review_name'];
$review = $course_data['review'];
if( !empty($review_name) && !empty($review) ): 
	$cnt1 = count($review_name);
	$cnt2 = count($review);
	if($cnt1>$cnt2) $review_name = array_slice($review_name, 0, $cnt2);
	elseif($cnt2>$cnt1) $review = array_slice($review, 0, $cnt1);
	$reviews = array_combine( $review_name, $review );
?>
	<section class="grid-100 grid-parent wip-40 align-center skinny-section" id="tab-reviews">
		<h2>NUESTROS ALUMNOS ¿QUÉ OPINAN?</h2>
		<div class="wip-header-line"></div>
		<div id="course-reviews" class="slider-home owl-carousel owl-theme">
			<?php foreach ($reviews as $name => $text): ?>
				<div class="review-item item thim-widget-icon-box ">
					<div class="wrapper-box-icon has_custom_image text-center image_box">
						<div class="content-inner">
							<div class="desc-icon-box">
								<p>
									<?php echo $text; ?>
								</p>
							</div>
							<div class="sc-heading article_heading">
								<p><b><?php echo $name; ?></b></p>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>