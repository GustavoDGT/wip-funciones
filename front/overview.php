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

global $course, $course_data, $WipFunciones;
$detect = $WipFunciones->detect;

?>

<section class="course-description grid-100 grid-parent wip-40-bottom skinny-section" id="tab-overview">
	<div class="course-content grid-70 mobile-grid-100 wip-40-top">
		<?php
		/**
		 * @deprecated
		 */
		do_action( 'learn_press_begin_single_course_description' );

		/**
		 * @since 3.0.0
		 */
		do_action( 'learn-press/before-single-course-description' );

		echo $course->get_content();

		/**
		 * @since 3.0.0
		 */
		do_action( 'learn-press/after-single-course-description' );

		/**
		 * @deprecated
		 */
		do_action( 'learn_press_end_single_course_description' );
		?>
	</div>
	<div class="course-info grid-30 mobile-grid-100">
		<div class="course-info-box">
			<h3>INFORMACIÓN IMPORTANTE</h3>
			<h4><b>LAS CLASES COMIENZAN</b></h4>
			<?php if( ! empty( $course_data['date_start'] ) && is_array( $course_data['date_start'] ) ): ?>
				<p>
					<?php foreach ( $course_data['date_start'] as $date): ?>
						<span class="date-display-single" <?php echo 'property="dc:date" datatype="xsd:dateTime" content="' . $date .'"'; ?>><?php echo convert_spanish_date( $date ); ?></span><br>
					<?php endforeach; ?>
				</p>
			<?php else: ?>
				<p class="date-display-single">--</p>
			<?php endif; ?>
			<?php if( ! empty( intval( $course_data['duration'] ) ) ): ?>
				<h4><b>SESIONES</b></h4>
				<p><?php echo intval( $course_data['duration'] ); ?></p>
			<?php endif; ?>
			<?php if( ! empty( $course_data['schedules'] ) ): ?>
				<h4><b>HORARIOS</b></h4>
				<p><?php echo $course_data['schedules']; ?></p>
			<?php endif; ?>
			<?php if( ! empty( $course_data['place'] ) ): ?>
				<h4><b>LUGAR</b></h4>
				<p><?php echo $course_data['place']; ?></p>
			<?php endif; ?>
			<?php if( !in_array( strtolower( $course->get_price_html() ), array( 'free', 'gratis' ) ) ): ?>
				<h4><b>INVERSIÓN</b></h4>
				<p><?php echo $course->get_price_html(); ?></p>
			<?php endif; ?>
		</div>
		<a href="#" class="wip-sign-up wip-download-btn"><i class="fa fa-download"></i> DESCARGAR <b>TEMARIO</b></a>
		<div class="wip-social">
			<a id="wip-facebook" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_the_permalink()); ?>','sharer','toolbar=0,status=0,width=600,height=600');" href="javascript: void(0)" class="share">                           
				<i class="fa fa-2x fa-facebook"></i>
			</a>
			<a id="wip-twitter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&amp;url=<?php echo urlencode( get_the_permalink() ); ?>&amp;via=<?php echo get_bloginfo( 'name' ); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<i class="fa fa-2x fa-twitter"></i> 
			</a>
			<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode( get_the_permalink() ); ?>&amp;summary=&amp;source=<?php echo get_bloginfo( 'name' ); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<i class="fa fa-2x fa-linkedin"></i> 
			</a>
			<?php if( $detect->isMobile() ): ?>
				<a href="whatsapp://send?text=<?php echo get_the_permalink(); ?>" data-action="share/whatsapp/share">
					<i class="fa fa-2x fa-whatsapp"></i> 
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
