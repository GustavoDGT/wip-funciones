<?php
/* ----------------------------------------------------------------------
	Plugin Name:	WIP - Funciones
	Plugin URI:		http://www.webideaperu.net
	Description:	Funciones necesarias para el funcionamiento de los temas
	Version:		1.2.WIP-20160219
	Author:			Gustavo Pajuelo Vargas
	Author URI:		http://www.webideaperu.net
 * ---------------------------------------------------------------------- */

defined( 'ABSPATH' ) || exit();

if ( ! defined( 'WIP_PLUGIN_URL' ) ) define('WIP_PLUGIN_URL', plugin_dir_url( __FILE__ ));
if ( ! defined( 'WIP_PLUGIN_PATH' ) ) define('WIP_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
if ( ! defined( 'WIP_PREFIX' ) ) define('WIP_PREFIX', 'wip');
if ( ! defined( 'WIP_VERSION' ) ) define('WIP_VERSION', '1.0');

if ( ! class_exists( 'WipFunciones' ) ) {

	/**
	* CLass WipFunciones
	*
	* Version 1.0.0
	*/
	class WipFunciones
	{	
		/**
		 * Current version for this plugin
		 * 
		 * @var string
		 */
		public $version = WIP_VERSION;

		/**
		 * The single instance of the class
		 * 
		 * @var WipFunciones Object
		 */
		private static $_instance = null;
		
		/**
		 * Detect dispositive
		 * @var Mobile_Detect Object
		 */
		public $detect;

		function __construct()
		{
			// Prevent duplicate unwanted hooks
				if ( self::$_instance ) {
					return;
				}
				self::$_instance = $this;
			// Includes files
			$this->wip_includes();
			// Load assets
			add_action( 'wp_enqueue_scripts', array( $this, 'wip_scripts' ) );
			add_action( 'admin_enqueue_scripts', array ( $this, 'wip_admin_scripts' ) );
			// Tools
			add_action('wp_footer', array( $this, 'wip_funciones_measurement_in_footer' ), 100);
			add_action('pre_current_active_plugins', array( $this, 'wip_hide_plugin' ) );
			add_filter( 'views_plugins', array( $this, 'wip_views_plugins' ) );
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
			remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			// Custom edit funcionality
			add_filter( 'generate_logo', array( $this, 'wip_generate_logo' ) );
			add_filter( 'generate_sidebar_layout', array( $this, 'wip_course_sidebar_layout' ) );
			add_filter( 'generate_typography_default_fonts', array( $this, 'wip_add_system_fonts' ) );
			add_action( 'generate_after_main_content', array( $this, 'wip_after_content' ) );
			add_action( 'wp', array( $this, 'wip_disable_cpt_elements' ) );
			add_filter( 'comments_open', array( $this, 'wip_comments' ) );
			// Learnpress customization
			remove_action( 'learn-press/before-main-content', 'learn_press_breadcrumb', 10 ); // Remove breadcrumb
			remove_action( 'learn-press/single-course-summary', 'learn_press_single_course_summary', 5 ); //Remove learning template
			add_action( 'learn-press/single-course-summary', array( $this, 'wip_single_course_summary' ) );
			add_filter( 'learn-press/frontend-default-styles', array( $this, 'wip_learnpress_custom_enqueue' ) );
			add_filter( 'learn_press_get_template', array( $this, 'wip_single_course' ), 10, 2 );
			add_filter( 'learn_press_get_template_part', array( $this, 'wip_content_course' ) );
			add_filter( 'learn-press/course-tabs', array( $this, 'wip_new_tabs_courses' ) );
			/* Admin customization */
			remove_filter( 'views_edit-page', array( 'LP_Admin', 'views_pages' ), 10 ); // Remove Learnpress pages tab
			add_action( 'admin_menu', array( $this, 'wip_admin_menu' ) );
			add_filter( 'register_post_type_args', array( $this, 'wip_edit_post_type_args' ), 12, 2 );
			add_action( 'init', array( $this, 'wip_edit_taxonomy_args' ), 11 );
			add_filter( 'learn_press_admin_tabs_info', array( $this, 'wip_admin_tabs_info' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'wip_register_meta_boxes' ) );
			add_filter( 'learn-press/admin-default-styles', array( $this, 'wip_learnpress_admin_custom_enqueue' ) );
			add_filter( 'learn_press_course_settings_meta_box_args', array( $this, 'wip_course_settings_meta_boxes' ) );
			add_filter( 'learn_press_course_payment_meta_box_args', array( $this, 'wip_course_payment_meta_boxes' ) );
			add_filter( 'learn-press/admin-course-tabs', array( $this, 'wip_add_course_meta_boxes' ) );
			/* Profile customization */
			add_action('show_user_profile', array( $this, 'my_user_profile_edit_action') );
			add_action('edit_user_profile', array( $this, 'my_user_profile_edit_action') );
			add_action('personal_options_update', array( $this, 'my_user_profile_update_action' ) );
			add_action('edit_user_profile_update', array( $this, 'my_user_profile_update_action' ) );
			// Shortcodes
			add_shortcode( 'WIP_BREADCRUMB', array( $this, 'course_breadcrumb_st' ) );		
			// CF7 Custom
			add_filter( 'wpcf7_form_tag', array( $this, 'dynamic_field_values' ), 10, 2);
				
		}

		public function wip_includes() {
			include WIP_PLUGIN_PATH . 'inc/Mobile_Detect.php';
			$this->detect = new Mobile_Detect;
		}

		public function print_filters_for( $hook = '' ) {
			global $wp_filter;
			if( empty( $hook ) || !isset( $wp_filter[$hook] ) )
				return;

		    print '<pre style="margin-left: 300px; ">';
			print_r( $wp_filter[$hook] );
			print '</pre>';
		}

		/**
		 * Load assets in front
		 */
		public function wip_scripts() {
			// Only home and course single
			if ( is_front_page() || is_singular(LP_COURSE_CPT) || is_page_template( array( 'page-contact.php', 'page-inhouse.php', 'page-soluciones.php', 'page-alquiler.php', 'page-nosotros.php' ) )) {
				wp_enqueue_style( 'owl-css', WIP_PLUGIN_URL . "css/owl.carousel.min.css", false, WIP_VERSION, 'all' );
				wp_enqueue_style( 'owl-theme-css', WIP_PLUGIN_URL . "css/owl.theme.default.min.css", false, WIP_VERSION, 'all' );
				wp_enqueue_script( 'owl-js', WIP_PLUGIN_URL . 'js/owl.carousel.min.js', array('jquery'), WIP_VERSION, true);
				wp_enqueue_script( 'custom-js', WIP_PLUGIN_URL . 'js/wip-funciones.js', array('jquery'), WIP_VERSION, true);
			}

			// Don't animate in home
			if( ! is_front_page() ) {
  				wp_enqueue_style( 'animate-css', WIP_PLUGIN_URL . "css/animate.css", false, GENERATE_VERSION, 'all' );	
			}

			if( is_singular( LP_COURSE_CPT ) ) {
				wp_dequeue_script( 'generate-sticky' );
			} 
		}

		/**
		 * Load assets in admin
		 * @param  Global
		 */
		public function wip_admin_scripts($hook) {
			global $typenow;;
			if( is_admin() && ( $hook == 'post.php' || $hook == 'post-new.php' ) && $typenow == LP_COURSE_CPT ) {
				wp_enqueue_style( 'custom-admin', WIP_PLUGIN_URL . "css/wip-admin-funciones.css", false, WIP_VERSION, 'all' );
			}
		}

		public function wip_funciones_measurement_in_footer() {
			// if user administrator
			if (current_user_can('administrator')) {

				$rebistaversion = 'General 1.2.WIP';

				echo '<style>.wip_ {	clear: both;	background: #ccc;	padding: 10px 150px;	height: 60px;	line-height: 25px;	}</style>
				<div class="wip_"><strong>Modelo ' . $rebistaversion . '</strong><br />' . round(memory_get_usage() / 1048576,2) . ' MB. '. get_num_queries() .' consultas. '. timer_stop() .' segundos.</div>';
			}
		}

		public function wip_hide_plugin() {
			global $wp_list_table;
			$hidearr = array(
				'gp-premium/gp-premium.php'.
				'learnpress/learnpress.php'
				);
			$myplugins = $wp_list_table->items;
			foreach ( $myplugins as $key => $val ) {
				if ( in_array( $key,$hidearr ) ) {
					unset( $wp_list_table->items[$key] );
				}
			}
		}

		/**
		 * Hidden tabs plugins page
		 * @return Array
		 */
		public function wip_views_plugins( $views ) {
			$views = array();
			return $views;
		}

		/**
		 * Change Logo URL for custom meta of POST ID
		 * @return String
		 */
		public function wip_generate_logo( $logo_url ) {
			global $post, $WipFunciones;
			$detect = $WipFunciones->detect;
			$image = get_post_meta($post->ID, 'custom_header_logo', true);
			if ( ! empty( $image ) && ! $detect->isMobile() ) $logo_url = $image;
			return $logo_url;
		}

		/**
		 * Get sidebar layout for course single page
		 * @param  String
		 * @return String
		 */
		public function wip_course_sidebar_layout( $layout ) {
			if ( is_singular( LP_COURSE_CPT ) ) $layout = 'no-sidebar';
			return $layout;
		}

		/**
		 * Disable title in course single page
		 */
		public function wip_disable_cpt_elements() {
		  if ( LP_COURSE_CPT == get_post_type() ) {
		    add_filter( 'generate_show_title', '__return_false' );
		  }
		}

		/**
		 * Add new system font in Generatepress
		 * @param  Array
		 * @return Array
		 */
		public function wip_add_system_fonts( $fonts ) {
		    $fonts[] = 'SF Pro Text';
		    $fonts[] = 'SF Pro Display';
		    return $fonts;
		}

		public function wip_after_content() {
			get_template_part('blocks/newsletter');
		}

		/**
		 * Disable comments
		 */
		public function wip_comments(){
			return false;
		}

		/**
		 * Chance single course template 
		 */
		public function wip_single_course_summary() {
			include_once WIP_PLUGIN_PATH . 'front/content-landing.php';
		}

		public function wip_learnpress_custom_enqueue( $styles ) {
			$styles['font-awesome'] = WIP_PLUGIN_URL . 'css/font-awesome.min.css';
			return $styles;
		}

		public function wip_learnpress_admin_custom_enqueue( $styles ) {
			$styles['font-awesome'] = WIP_PLUGIN_URL . 'css/font-awesome.min.css';
			return $styles;
		}

		/**
		 * Change single courses sections
		 * @param  String Url template 
		 * @param  String Template name
		 * @return String
		 */
		public function wip_single_course( $located, $template_name) {
			if( $template_name == "single-course/content-landing.php")
				$located = WIP_PLUGIN_PATH . 'front/content-landing.php'; 
			else if( $template_name == "single-course/tabs/overview.php")
				$located = WIP_PLUGIN_PATH . 'front/overview.php'; 
			else if( $template_name == "single-course/tabs/instructor.php")
				$located = WIP_PLUGIN_PATH . 'front/instructor.php'; 
			
			return $located;
		}

		/**
		 * Change archive courses
		 * @param  String Url template
		 * @return String
		 */
		public function wip_content_course( $template ) { 
			if( $template == LP_PLUGIN_PATH . "/templates/content-course.php")
				$template = WIP_PLUGIN_PATH . 'front/content-course.php';
			
			return $template;
		}

		/**
		 * Create and change tabs in single course
		 * @param  Array
		 * @return Array
		 */
		public function wip_new_tabs_courses( $defaults) {
			// Descripción
			$defaults['overview']['title'] = 'Descripción';
			// Dirigido a
			$defaults['addressed'] = array(
					'title'    => __( 'Dirigido a', 'learnpress' ),
					'priority' => 12,
					'callback' => array( $this, 'learn_press_course_addressed_tab' )
				);
			// Datos generales
			$defaults['general'] = array(
					'title'    => __( 'Datos generales', 'learnpress' ),
					'priority' => 13,
					'callback' => array( $this, 'learn_press_course_general_tab' )
				);
			// Instructor
			$defaults['instructor']['title'] = 'Instructores';
			$defaults['instructor']['priority'] = 14;
			//  Casos de éxito
			$defaults['reviews'] = array(
					'title'    => __( 'Casos de éxito', 'learnpress' ),
					'priority' => 15,
					'callback' => array( $this, 'learn_press_course_reviews_tab' )
				);
			// Inscripción
			$defaults['enroll'] = array(
					'title'    => __( 'Inscríbete', 'learnpress' ),
					'priority' => 16,
					'callback' => array( $this, 'learn_press_course_enroll_tab' )
				);
			// Delete currifculum
			unset($defaults['curriculum']);
			return $defaults;
		}

		public function learn_press_course_addressed_tab() {
			include( WIP_PLUGIN_PATH . 'front/addressed-course.php' );
		}

		public function learn_press_course_general_tab() {
			include( WIP_PLUGIN_PATH . 'front/general-course.php' );
		}

		public function learn_press_course_reviews_tab() {
			include( WIP_PLUGIN_PATH . 'front/reviews-course.php' );
		}

		public function learn_press_course_enroll_tab() {
			include( WIP_PLUGIN_PATH . 'front/register-course.php' );
		}

		/**
		 * Remove and menus admin
		 */
		public function wip_admin_menu() {
			//remove_menu_page( 'learn_press' );
		}

		/**
		 * Change args in post types.
		 * @param  Array $args      All args of post types
		 * @param  String $post_type This post type slug
		 * @return Array
		 */
		public function wip_edit_post_type_args( $args, $post_type ) {
		 
		    if ( $post_type == LP_COURSE_CPT ){
		        $args['show_in_menu'] = 'learn_press'; // true
		        $args['supports'][] = 'custom-fields'; //page-attributes
		    }
		 
		    return $args;
		}

		public function wip_edit_taxonomy_args() {
		    // get the arguments of the already-registered taxonomy
		    $taxonomy_args = get_taxonomy( 'course_tag' ); // returns an object

		    $taxonomy_args->labels = array(
						'name'          => __( 'Programas', 'WIP_domain' ),
						'menu_name'     => __( 'Programa', 'WIP_domain' ),
						'singular_name' => __( 'Programa', 'WIP_domain' ),
						'add_new_item'  => __( 'Añadir nuevo programa', 'WIP_domain' ),
						'all_items'     => __( 'Todos los programas', 'WIP_domain' )
			);

		    // re-register the taxonomy
		    register_taxonomy( 'course_tag', array( LP_COURSE_CPT ), (array) $taxonomy_args );
		}

		public function wip_admin_tabs_info( $tabs ) {
			//Tags
			$tabs[30]['name'] = 'Programas';
			return $tabs;
		}

		/**
		 * Register meta box in side layout in course admin
		 * @return Array
		 */
		public function wip_register_meta_boxes( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'         => 'course_extra_image',
				'title'      => 'Thumbnail image',
				'post_types' => LP_COURSE_CPT,
				'context'    => 'side',
				'priority'   => 'low',
				'fields' => array(
					array(
						'id'    => WIP_PREFIX . '_thumb_image',
						'type'  => 'image_advanced',
						'max_file_uploads' => 1,
						),
					)
				);

			return $meta_boxes;
		}

		public function wip_course_settings_meta_boxes( $meta_box ) {
			//Edit fields 
			foreach ($meta_box['fields'] as $key => $field):
				if( $field['id'] == '_lp_duration'):
					$meta_box['fields'][$key]['type'] = 'number';
				$meta_box['fields'][$key]['std'] = 10;
				endif;
				if( in_array( $field['id'], array( '_lp_max_students', '_lp_students', '_lp_retake_count', '_lp_block_lesson_content' ) ) ):
					unset( $meta_box['fields'][$key] );
				endif;
			endforeach;

			$meta_box['fields'][] = array(
				'name' => 'horarios',
				'id'   => '_lp_schedules',
				'type' => 'textarea',
				'desc' => __( 'Horarios de los cursos.', 'learnpress' ),
				);
			$meta_box['fields'][] = array(
				'name' => 'lugar',
				'id'   => '_lp_place',
				'type' => 'textarea',
				'desc' => __( 'Lugar en que se impartira el curso.', 'learnpress' ),
				);
			$meta_box['fields'][] = array(
				'id'    => '_lp_file',
				'type'  => 'file_advanced',
				'max_file_uploads' => 1,
				);
			return $meta_box;
		}

			public function wip_course_payment_meta_boxes( $meta_box ) {
				//Edit fields 
				foreach ($meta_box['fields'] as $key => $field):
					if( in_array( $field['id'], array( '_lp_sale_start', '_lp_sale_end', '_lp_sale_price', '_lp_required_enroll' ) ) ):
						unset( $meta_box['fields'][$key] );
					endif;
				endforeach;

					$meta_box['fields'][] = array(
						'name'       => __( 'Fechas de Inicio', 'learnpress' ),
						'id'         => '_lp_date_start',
						'type'       => 'datetime',
						'desc' 		 => 'Fechas de Inicio del curso',
						'clone'      => true,
						'max_clone'  => 2,
						);

				return $meta_box;
			}

			public function wip_add_course_meta_boxes( $course_tabs ) {
				// Delete reviews original functionality
				unset($course_tabs['review_logs']);

				// Add additional info tab
				$course_tabs['additional_info'] = new RW_Meta_Box(
						array(
							'id'       => 'course_additional',
							'title'    => __( 'Información Adicional', 'learnpress' ),
							'pages'    => array( LP_COURSE_CPT ),
							'priority' => 'high',
							'icon'     => 'dashicons-admin-tools',
							'fields'   => array(
								array(
									'name' => 'Dirigido a',
									'id'   => '_lp_addressed',
									'type' => 'textarea',
									'desc' => __( 'Para quiénes va dirigido el curso.', 'learnpress' ),
									'clone'=> true
									),
								array(
									'name' => 'materiales',
									'id'   => '_lp_materials',
									'type' => 'textarea',
									'desc' => __( 'Los materiales donde se impartirá el curso. <html>', 'learnpress' ),

									),
								array(
									'name' => 'certificación',
									'id'   => '_lp_certification',
									'type' => 'textarea',
									'desc' => __( 'Información sobre la certificación del curso. <html>', 'learnpress' ),

									),
								array(
									'name' => 'beneficios',
									'id'   => '_lp_benefits',
									'type' => 'wysiwyg',
									'options' => array(
										'textarea_rows' => 4,
										'media_buttons' => false,		
									),
									'desc' => __( 'Beneficios que brinda el curso. <html>', 'learnpress' ),

									),
								)
							)
						);

				// Add new review tab
				$course_tabs['review_logs'] = new RW_Meta_Box(
					array(
						'id'       => 'review_logs',
						'title'    => __( 'Añadir reviews', 'learnpress' ),
						'pages'    => array( LP_COURSE_CPT ),
						'priority' => 'high',
						'icon'     => 'dashicons-admin-tools',
						'fields'   => array(
							array(
								'name' => 'Nombres',
								'id'   => '_lp_review_name',
								'type' => 'text',
								'clone' => true,
								'sort_clone' => true,
								'desc' => __( 'Nombre del alumno que da su opinión.', 'learnpress' ),
								),

							array(
								'name' => 'Opinión',
								'id'   => '_lp_review',
								'type' => 'textarea',
								'clone' => true,
								'sort_clone' => true,
								),
							)
						)
					);
				return $course_tabs;
			}

			public function my_user_profile_edit_action($user) {
				$professional_title = get_user_meta( $user->ID, 'professional_title', true );
				?>
				<h3>Infomación Extra</h3>
				<table class="form-table">
					<tr>
						<th><label for="professional_title">Cargo o Título Profesional</label></th>
						<td>
							<textarea rows="10" cols="450" name="professional_title" id="professional_title"  class="regular-text" /><?php echo esc_textarea( $professional_title ); ?></textarea>
						</td>
					</tr>
				</table>
				<?php 
			}

			public function my_user_profile_update_action($user_id) {	
				if ( ! current_user_can( 'edit_user', $user_id ) ) {
					return false;
				}
				if ( empty( $_POST['professional_title'] ) ) {
					return false;
				}

				update_user_meta($user_id, 'professional_title', sanitize_textarea_field($_POST['professional_title']));
			}

		/**
		 * Add Shortcode Course breadcrumb
		 */
		public function course_breadcrumb_st( $atts ) {
			// Attributes
			// Execution
				global $post;
				$terms = wp_get_post_terms( $post->ID, 'course_tag');
				if( ! empty( $terms ) ) {
					$tag_course_link = get_term_link($terms[0]->term_id);
					$tag_course_name = $terms[0]->name;
				}
				$initial_date = get_post_meta( $post->ID, '_lp_date_start', true );
				$delimiter = ':';
				$title = explode($delimiter, $post->post_title);
			// Output
				ob_start();					
				?>	
				<div class="wip-header-content">
					<?php if( ! empty( $terms ) ): ?><h4><a href="<?php echo $tag_course_link; ?>"><?php echo $tag_course_name; ?> </a></h4><?php endif; ?>
					<h1 class="frase" itemprop="headline"><?php echo $title[0] . $delimiter . '<br>' . $title[1]; ?></h1>
					<?php if( ! empty( $initial_date ) && is_array( $initial_date ) ): ?>
						<h3 class="wip-initial-date"><span>INICIO: </span><?php foreach ($initial_date as $date): ?><?php echo convert_spanish_date( $date ); ?><br><?php endforeach; ?></h3>
					<?php endif; ?>
					<div class="wip-20-top"><a class="wip-sign-up wip-btn" href="#">INSCRÍBETE</a></div>
				</div>
				<?php
				return ob_get_clean();
		}

		public function dynamic_field_values ( $tag, $unused ) {
		    if ( $tag['name'] != 'your_course' )
		        return $tag;

		    $args = array (
		        'numberposts'   => -1,
		        'post_type'     => LP_COURSE_CPT,
		        'orderby'       => 'title',
		        'order'         => 'ASC',
		    );

		    $custom_posts = get_posts($args);

		    if ( ! $custom_posts )
		        return $tag;

		    foreach ( $custom_posts as $custom_post ) {

		        $tag['raw_values'][] = $custom_post->post_title;
		        $tag['values'][] = $custom_post->post_title;
		        $tag['labels'][] = $custom_post->post_title;

		    }

		    return $tag;

		}
	}

	$WipFunciones = new WipFunciones();
}

/**
 *	Link Back to Your WordPress Site from Copy & Pasted Text
 *-------------------------------------------------*
 * @link http://wpmu.org/wordpress-copied-text-link-back/
 */
function wip_funciones_add_copyright_text() {
	if (is_single()) { ?>

<script type='text/javascript'>
function wip_funciones_add_link() {
    if (
window.getSelection().containsNode(
document.getElementsByClassName('entry-content')[0], true)) {
    var body_element = document.getElementsByTagName('body')[0];
    var selection;
    selection = window.getSelection();
    var oldselection = selection
    var pagelink = "<br /><br /> Fuente: <a href='<?php echo get_permalink(get_the_ID()); ?>'><?php echo get_permalink(get_the_ID()); ?></a>";
    var copy_text = selection + pagelink;
    var new_div = document.createElement('div');
    new_div.style.left='-99999px';
    new_div.style.position='absolute';

    body_element.appendChild(new_div );
    new_div.innerHTML = copy_text ;
    selection.selectAllChildren(new_div );
    window.setTimeout(function() {
        body_element.removeChild(new_div );
    },0);
}
}
document.oncopy = wip_funciones_add_link;
</script>
<?php
	}
}
add_action( 'wp_head', 'wip_funciones_add_copyright_text');



/*-----------------------------------------------------------------------------------*/
/*		Optimization
/*-----------------------------------------------------------------------------------*/
/**
 * Loading jQuery from the Google CDN 	
 *-------------------------------------------------*
 */
// register from google and for footer
function wip_funciones_jquery() {
	if (!is_admin()) {
		// remove the default jQuery script
		wp_deregister_script('jquery');
		wp_deregister_script('jquery-migrate');  
		// register the Google hosted Version
		wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"), false, '', true);
		wp_register_script('jquery-migrate', ("https://code.jquery.com/jquery-migrate-1.4.1.min.js"), array('jquery'), '', true);
		  
		// add it back into the queue
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-migrate');
		}
	}
// even more smart jquery inclusion :)
add_action('init', 'wip_funciones_jquery', 11);

/**
 *	Better jpg quality
 *-------------------------------------------------*
 */
function wip_funciones_jpeg_quality($arg) {
	return (int)100;
}
// add_filter('jpeg_quality', 'wip_funciones_jpeg_quality');

/**
 *	Set the post revisions limit
 *-------------------------------------------------*
 */
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 5);

/*-----------------------------------------------------------------------------------*/
/*			Security
/*-----------------------------------------------------------------------------------*/
/**
 *	Change login errors EN EVALUACION
 *-------------------------------------------------*
 */
function wip_funciones_wrong_login() {
	return 'Wrong username or password.';
}
add_filter('login_errors', 'wip_funciones_wrong_login');


/**
 *	Disable File Editor
 *-------------------------------------------------*
 */
define('DISALLOW_FILE_EDIT', true);


/**
 * Disable updates for plugins
 *-------------------------------------------------*
 */
// Disable all the Nags & Notifications
function remove_core_updates(){
	global $wp_version;
	return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
//add_filter('pre_site_transient_update_core','remove_core_updates');
//add_filter('pre_site_transient_update_plugins','remove_core_updates');
//add_filter('pre_site_transient_update_themes','remove_core_updates');


/**
 *	Remove unnecessary meta elements from head
 *-------------------------------------------------*
 */
remove_action('wp_head', 'rsd_link');					//<link rel="EditURI" type="application/rsd+xml" title="RSD" href="/wp/xmlrpc.php?rsd" />
//remove_action('wp_head', 'wp_generator');				//<meta name="generator" content="Bluefish 2.2.5" />
remove_action('wp_head', 'feed_links', 2);			//rel="alternate" type="application/rss+xml" //feed y comments feed
remove_action('wp_head', 'wp_shortlink_wp_head');	//rel='shortlink'
remove_action('wp_head', 'wlwmanifest_link');		//rel="wlwmanifest" type="application/wlwmanifest+xml"
remove_action('wp_head', 'feed_links_extra', 3);	//rel="alternate" type="application/rss+xml" title="sitios de pruebas &raquo; otro post Comments Feed" href="http://127.0.0.1/wordpress3.4/otro-post/feed/" /

/* Removes prev and next article links */
add_filter( 'index_rel_link', '__return_false' );
add_filter( 'parent_post_rel_link', '__return_false' );
add_filter( 'start_post_rel_link', '__return_false' );
add_filter( 'previous_post_rel_link', '__return_false' );
add_filter( 'next_post_rel_link', '__return_false' );

/* Remove the WordPress Version Number - The Right Way */
function remove_wp_version() { return ''; }
add_filter('the_generator', 'remove_wp_version');

/* Stop Adding Functions Below this Line */

// Add Shortcode
function wip_news_shortcode( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'num_post' => '2',
			'visible' => '4',
		),
		$atts
	);

	$args = array(
			'post_type' => 'post',
			'posts_per_page' => $atts['num_post'],
			'order' => 'DESC',
			'orderby' => 'date',
		);
	$queries[] = new WP_Query( $args );


	include WIP_SLIDER_PATH . 'front/front-slider.php';
}
add_shortcode( 'WIP_NEWS', 'wip_news_shortcode' );

function convert_spanish_date( $date, $format = '') {
	if($format == 'tiny') {
		return 	date( 'd\/m\/Y', strtotime( $date ) );
	} else {
		$day = date( 'd', strtotime($date));
		$m = date( 'n', strtotime($date));
		if ($m==1)  { $month = "Enero"; }
		if ($m==2)  { $month = "Febrero"; }
		if ($m==3)  { $month = "Marzo"; }
		if ($m==4)  { $month = "Abril"; }
		if ($m==5)  { $month = "Mayo"; }
		if ($m==6)  { $month = "Junio"; }
		if ($m==7)  { $month = "Julio"; }
		if ($m==8)  { $month = "Agosto"; }
		if ($m==9)  { $month = "Setiembre"; }
		if ($m==10) { $month = "Octubre"; }
		if ($m==11) { $month = "Noviembre"; }
		if ($m==12) { $month = "Diciembre"; };
		$year = date( 'Y', strtotime($date) );

		return ( $day . ' de ' . $month . ' del ' . $year );	
	}
}
?>
