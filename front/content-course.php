<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$user = LP_Global::user();

$date_start = get_post_meta( get_the_ID(), '_lp_date_start', true );
$f_image_id = get_post_meta( get_the_ID(), WIP_PREFIX . '_thumb_image', true );
$f_image = wp_get_attachment_image_src( $f_image_id, 'full' );
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
    // @deprecated
    do_action( 'learn_press_before_courses_loop_item' );

    // @since 3.0.0
    do_action( 'learn-press/before-courses-loop-item' );
    
    $course = LP_Global::course(); 
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
                <?php if( ! empty( $date_start ) ): ?>
                  <div class="course-meta">
                    <time>Próximo inicio: <?php foreach( $date_start as $date): ?><span class="date-display-single" property="dc:date" datatype="xsd:dateTime" content="<?php echo $date; ?>"><?php echo convert_spanish_date( $date ); ?></span><br><?php endforeach; ?></time>  
                  </div>
                <?php endif; ?>
              </div>
            </div>
	
</li>