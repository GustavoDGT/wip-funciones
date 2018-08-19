<?php
/**
 * Template for displaying content of landing course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/content-landing.php.
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

$course = learn_press_get_course();

$tabs = learn_press_get_course_tabs(); 
if ( empty( $tabs ) ) {
	return;
} 
$course_data = $course->_data;

// Add Extra fields - Overview
$course_data['schedules'] = get_post_meta( $course->_id, '_lp_schedules', true );
$course_data['place'] = get_post_meta( $course->_id, '_lp_place', true );
$course_data['date_start'] = get_post_meta( $course->_id, '_lp_date_start', true );
$course_data['file']  = get_post_meta( $course->_id, '_lp_file', true );
// Addresed
$course_data['addressed']  = get_post_meta( $course->_id, '_lp_addressed', true );
if( empty( $course_data['addressed'] ) ) unset( $tabs['addressed'] );
// General
$course_data['materials'] = get_post_meta( $course->_id, '_lp_materials', true );
$course_data['certification'] = get_post_meta( $course->_id, '_lp_certification', true );
$course_data['benefits'] = get_post_meta( $course->_id, '_lp_benefits', true );
if( empty( $course_data['materials'] ) && empty( $course_data['certification'] ) && empty( $course_data['benefits'] ) ) unset( $tabs['general'] );
// Reviews
$course_data['review_name'] = get_post_meta( $course->_id, '_lp_review_name', true );
$course_data['review'] = get_post_meta( $course->_id, '_lp_review', true );
if( empty($course_data['review_name']) || empty($course_data['review']) ) unset( $tabs['reviews'] );
/**
 * @deprecated
 */
do_action( 'learn_press_before_content_landing' );			
?>
<div class="course-landing-summary">
	<div id="learn-press-course-tabs" class="course-tabs">
		<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="course-navigation" class="secondary-navigation stuckElement">
			<div class="inside-navigation grid-container grid-parent">
				<button class="menu-toggle" aria-controls="course-menu" aria-expanded="false">
					<span class="mobile-menu"><?php echo get_the_title(); // WPCS: XSS ok. ?></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => '__no_such_location',
						'container' => 'div',
						'container_class' => 'main-nav',
						'container_id' => 'course-menu',
						'menu_class' => '',
						'fallback_cb' => function() use( &$tabs ) { ?>
							<div id="course-menu" class="main-nav">
								<ul <?php generate_menu_class(array( 'secondary-menu', 'learn-press-nav-tabs', 'course-nav-tab' )); ?>>
									<?php foreach ( $tabs as $key => $tab ) { ?>
										<?php $classes = array( 'course-nav course-nav-tab-' . esc_attr( $key ) );
										if ( ! empty( $tab['active'] ) && $tab['active'] ) {
											$classes[] = 'active default';
										} ?>
										<li class="<?php echo join( ' ', $classes ); ?>">
											<a <?php if( $key == 'enroll' ) echo 'class="wip-btn"'; ?> href="?tab=<?php echo esc_attr( $tab['id'] ); ?>"
											data-tab="#<?php echo esc_attr( $tab['id'] ); ?>"><?php echo $tab['title']; ?></a>
										</li>
									<?php } ?>
								</ul>
							</div>
						<?php },
					)
				);
				?>
			</div>
		</nav>
		<div class="wip-breadcrumb skinny-section wip-20-top">
			<?php echo learn_press_breadcrumb(); ?>
		</div>
			<?php foreach ( $tabs as $key => $tab ) { ?>
					<?php
					if ( apply_filters( 'learn_press_allow_display_tab_section', true, $key, $tab ) ) {
						if ( is_callable( $tab['callback'] ) ) {
							call_user_func( $tab['callback'], $key, $tab );
						} else {
							/**
							 * @since 3.0.0
							 */
							do_action( 'learn-press/course-tab-content', $key, $tab );
						}
					}
					?>
			<?php } ?>
	</div>

</div>
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
	window.location.href = '<?php echo wp_get_attachment_url( $course_data['file'] ); ?>';
}, false );
</script>
<?php
/**
 * @deprecated
 */
do_action( 'learn_press_after_content_landing' );
?>
