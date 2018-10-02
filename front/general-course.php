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

if( ! empty( $course_data['materials'] ) || ! empty( $course_data['certification'] ) || ! empty( $course_data['benefits'] ) ):
	$array = array( $course_data['materials'], $course_data['certification'], $course_data['benefits'] );
	$count = count(array_filter($array));
	$grid = 'grid-33';
	if($count == 2) $grid = 'grid-50';
	else if($count == 1) $grid = 'grid-100';
?>
	<section class="grid-100 grid-parent bg-blue wip-40 skinny-section" id="tab-general">
		<?php if( ! empty( $course_data['materials'] ) ): ?>
			<div class="<?php echo $grid; ?> mobile-grid-100 border-section">
				<h4>MATERIALES</h4>
				<div class="wip-normal-white-line"></div>
				<p><?php echo $course_data['materials']; ?></p>
			</div>
		<?php endif; ?>
		<?php if( ! empty( $course_data['certification'] ) ): ?>
			<div class="<?php echo $grid; ?> mobile-grid-100 border-section">
				<h4>CERTIFICACIÓN</h4>
				<div class="wip-normal-white-line"></div>
				<p><?php echo $course_data['certification']; ?></p>
			</div>
		<?php endif; ?>
		<?php if( ! empty( $course_data['benefits'] ) ): ?>
			<div class="<?php echo $grid; ?> mobile-grid-100 border-section">
				<h4>BENEFICIOS</h4>
				<div class="wip-normal-white-line"></div>
				<?php echo $course_data['benefits']; ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>