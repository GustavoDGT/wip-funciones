	<div id="learn-press-course-tabs" class="course-tabs">
		<ul class="learn-press-nav-tabs course-nav-tabs">

			<?php foreach ( $tabs as $key => $tab ) { ?>

				<?php $classes = array( 'course-nav course-nav-tab-' . esc_attr( $key ) );
				if ( ! empty( $tab['active'] ) && $tab['active'] ) {
					$classes[] = 'active default';
				} ?>

				<li class="<?php echo join( ' ', $classes ); ?>">
					<a href="?tab=<?php echo esc_attr( $tab['id'] ); ?>"
						data-tab="#<?php echo esc_attr( $tab['id'] ); ?>"><?php echo $tab['title']; ?></a>
					</li>

				<?php } ?>

			</ul>
			<?php echo learn_press_breadcrumb(); ?>
			<?php foreach ( $tabs as $key => $tab ) { ?>
				<div class="course-tab-panel-<?php echo esc_attr( $key ); ?> course-tab-panel<?php echo ! empty( $tab['active'] ) && $tab['active'] ? ' active' : ''; ?>"
					id="<?php echo esc_attr( $tab['id'] ); ?>">
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
				</div>
			<?php } ?>
		</div>

	<div class="course-meta">
		<span class="course-students" title="<?php echo esc_html( $course->get_students_html() ); ?>">
			<?php $count = $course->count_students();

			echo $count > 1 ? sprintf( _n( '%d student', '%d students', $count, 'learnpress' ), $count ) : sprintf( __( '%d student', 'learnpress' ), $count ); ?>
		</span> 
	</div>
	<div class="course-price">

	<?php if ( $course->has_sale_price() ) { ?>

        <span class="origin-price"> <?php echo $course->get_origin_price_html(); ?></span>

	<?php } ?>

    <span class="price"><?php echo $price; ?></span>

	</div>
	<div class="lp-course-buttons">

	<?php do_action( 'learn-press/before-course-buttons' ); ?>
	<?php
	/**
	 * @see learn_press_course_purchase_button - 10
	 * @see learn_press_course_enroll_button - 10
	 * @see learn_press_course_retake_button - 10
	 */
	do_action( 'learn-press/course-buttons' );
	?>
	<?php do_action( 'learn-press/after-course-buttons' ); ?>

	</div>
	<div class="course-author">

    <h3><?php _e( 'About the Instructor', 'learnpress' ); ?></h3>

    <p class="author-name">
		<?php echo $course->get_instructor()->get_profile_picture(); ?>
		<?php echo $course->get_instructor_html(); ?>
    </p>
    <div class="author-bio">
		<?php echo $course->get_author()->get_description(); ?>
    </div>

	</div>