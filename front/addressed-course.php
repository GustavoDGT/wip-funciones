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
if( ! empty( $course_data['addressed'] ) ):
?>
	<section class="grid-100 grid-parent bg-gray wip-40 skinny-section" id="tab-addressed">
		<h2>DIRIGIDO A</h2>
		<div class="wip-normal-line"></div>
		<ul class="wip-list">
			<?php foreach ($course_data['addressed'] as $value): ?>
				<li><?php echo $value; ?></li>
			<?php endforeach; ?>
		</ul>
	</section>
<?php endif; ?>