<?php
define('WIP_TESTIMONIAL_POST_TYPE', WIP_PREFIX . '-testimonial');
define('WIP_TESTIMONIAL_SINGULAR', 'Testimonial');
define('WIP_TESTIMONIAL_PLURAL', 'Testimonials');
//define('WIP_SLIDER_TAXONOMY', 'slide-category');

// Register Custom Post Type
function wip_testimonial_post_type() {

	$labels = array(
		'name'                  => _x( WIP_TESTIMONIAL_PLURAL, 'Post Type General Name', 'WIP_domain' ),
		'singular_name'         => _x( WIP_TESTIMONIAL_SINGULAR, 'Post Type Singular Name', 'WIP_domain' ),
		'menu_name'             => __( WIP_TESTIMONIAL_PLURAL, 'WIP_domain' ),
		'all_items'             => __( 'All ' . WIP_TESTIMONIAL_PLURAL, 'WIP_domain' ),
		'add_new_item'          => __( 'Add New ' . WIP_TESTIMONIAL_SINGULAR, 'WIP_domain' ),
		'add_new'               => __( 'Add New', 'WIP_domain' ),
		'new_item'              => __( 'New ' . WIP_TESTIMONIAL_SINGULAR, 'WIP_domain' ),
		'edit_item'             => __( 'Edit ' . WIP_TESTIMONIAL_SINGULAR, 'WIP_domain' ),
		'update_item'           => __( 'Update ' . WIP_TESTIMONIAL_SINGULAR, 'WIP_domain' ),
		'view_item'             => __( 'View ' . WIP_TESTIMONIAL_SINGULAR, 'WIP_domain' ),
		'view_items'            => __( 'View ' . WIP_TESTIMONIAL_PLURAL, 'WIP_domain' ),
		'search_items'          => __( 'Search ' . WIP_TESTIMONIAL_PLURAL, 'WIP_domain' ),
		'not_found' 						=> __( sprintf('No %s found', strtolower( WIP_TESTIMONIAL_PLURAL ) ), 'WIP_domain' ),
    'not_found_in_trash' 		=> __( sprintf('No %s found in Trash', strtolower( WIP_TESTIMONIAL_PLURAL ) ), 'WIP_domain' ),
		'featured_image'        => __( 'Featured Image', 'WIP_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'WIP_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'WIP_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'WIP_domain' ),
		'insert_into_item'      => __( 'Insert into ' . WIP_TESTIMONIAL_SINGULAR, 'WIP_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this ' . WIP_TESTIMONIAL_SINGULAR, 'WIP_domain' ),
		'items_list'            => __( WIP_TESTIMONIAL_PLURAL . ' list', 'WIP_domain' ),
		'items_list_navigation' => __( WIP_TESTIMONIAL_PLURAL . ' list navigation', 'WIP_domain' ),
		'filter_items_list'     => __( sprintf('Filter %s list', strtolower( WIP_TESTIMONIAL_PLURAL ) ), 'WIP_domain' ),
	);
	$args = array(
		'label'                 => __( WIP_TESTIMONIAL_SINGULAR, 'WIP_domain' ),
		//'description'           => __( 'Post Type Description', 'WIP_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		//'taxonomies'			=> array( 'category' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( WIP_TESTIMONIAL_POST_TYPE, $args );

	// Register custom new taxonomy
	/*register_taxonomy( WIP_SLIDER_TAXONOMY, WIP_TESTIMONIAL_POST_TYPE, array( 
		'label' => __( 'Categories', 'WIP_DOMAIN' ), 
		'hierarchical' => false, 
		'public' => true,
		//'rewrite' => array( 'slug' => 'slide-category' ), 
	) );	*/
}
add_action( 'init', 'wip_testimonial_post_type', 0 );

function wip_testimonial_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => 'Personal Information',
        'post_types' => WIP_TESTIMONIAL_POST_TYPE,
        'context'    => 'normal',
        'priority'   => 'high',

        'fields' => array(
            array(
                'name'  => 'Ocupación / Título / Cargo',
                'id'    => WIP_PREFIX . '_t_occupation',
                'type'  => 'text',
            ),
        )
    );

    // Add more meta boxes if you want
    // $meta_boxes[] = ...

    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'wip_testimonial_meta_boxes' );

function testimonial_sc( $atts ) {
	// Attributes
	// Execution
	global $post;
	$testimonials_args = array( 'post_type' => WIP_TESTIMONIAL_POST_TYPE, //LP_COURSE_CPT, 
		'orderby' => 'menu_order', 
		'order' => 'ASC', 
	);
	$testimonials_query = new WP_Query( $testimonials_args );
	// Output
	ob_start();
	if( $testimonials_query->have_posts() ): ?>
		<div id="testimonial" class="slider-home owl-carousel owl-theme">
		<?php
		while ($testimonials_query->have_posts()): $testimonials_query->the_post();
			$occupation = get_post_meta( get_the_ID(), WIP_PREFIX . '_t_occupation', true );
			$f_image_id = get_post_thumbnail_id( get_the_ID() );
            $f_image = wp_get_attachment_image_src( $f_image_id, 'full' )
	?>	
	        <div id="testimonial-<?php echo get_the_ID(); ?>" class="item">
	          <div class="text-caption">
	          	<?php if (!empty($f_image)): ?>
	            	<img style="width: inherit;" class="mx-auto mb-3" src="<?php echo $f_image[0]; ?>" alt="<?php echo get_post_meta( $f_image_id, '_wp_attachment_image_alt', true); ?>" title="<?php echo get_the_title( $f_image_id ); ?>"/>
	        	<?php endif; ?>
	            <blockquote>
	              "<?php echo get_the_content(); ?>"
	            </blockquote>
	            <p>
	              <span class="person-name"><?php echo get_the_title(); ?></span><br>
	              <?php echo $occupation; ?>
	            </p>
	          </div>
	        </div>
		<?php endwhile; wp_reset_postdata(); ?>
		</div>
	<?php endif;
	return ob_get_clean();
}

add_shortcode( 'WIP_TESTIMONIAL', 'testimonial_sc');