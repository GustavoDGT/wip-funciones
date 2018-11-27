<?php
define('WIP_COURSE_POST_TYPE', 'eb_course');
//define('WIP_SLIDER_TAXONOMY', 'slide-category');

function wip_course_meta_boxes( $meta_boxes ) {
	// Description box
    $meta_boxes[] = array(
    	'id'         => 'course_settings',
    	'title'	=> __( 'Información del curso', 'WIP_LANG' ),
    	'context'    => 'normal',
        'priority'   => 'low',
    	'post_types' => WIP_COURSE_POST_TYPE,
    	'tabs'      => array(
            'description'	=> array(
                'label' => 'Descripción',
                'icon'  => 'dashicons-email', // Dashicon
            ),
            'addressed' => array(
                'label' => 'Dirigido a',
                'icon'  => 'dashicons-email', // Dashicon
            ),
            'general'	=> array(
            	'label' => 'General',
                'icon'  => 'dashicons-email', // Dashicon
            ),
            'instructor'	=> array(
            	'label' => 'Instructor',
                'icon'  => 'dashicons-email', // Dashicon
            ),
            'reviews'	=> array(
            	'label' => 'Opiniones',
                'icon'  => 'dashicons-email', // Dashicon
            ),
        ),
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name'  => 'Fechas de Inicio',
                'id'    => WIP_PREFIX . '_start_date',
                'type'  => 'date',
                'timestamp' => true,
                'clone'      => true,
				'max_clone'  => 2,
                'js_options' => array(
                	'dateFormat'=> 'dd/mm/yy',
                	'minDate'	=> 0,
                ),
                'tab'	=> 'description',
                'desc' 		 => __( 'Fechas de Inicio del curso', 'WIP_LANG' ),
            ),
            array(
            	'name'	=> 'Horarios',
            	'id'	=> WIP_PREFIX . '_schedule',
            	'type'	=> 'textarea',
            	'cols'	=> 5,
            	'tab'	=> 'description',
            	'desc' => __( 'Horarios de los cursos.', 'WIP_LANG' ),
            ),
            array(
            	'name'	=> 'Lugar',
            	'id'	=> WIP_PREFIX . '_place',
            	'type'	=> 'textarea',
            	'cols'	=> 5,
            	'tab'	=> 'description',
            	'desc' => __( 'Lugar en que se impartira el curso.', 'WIP_LANG' ),
            ),
            array(
            	'name'	=> 'Temario',
				'id'    => WIP_PREFIX . '_temary',
				'type'  => 'file_advanced',
				'max_file_uploads' => 1,
				'tab'	=> 'description',
				'desc' => __( 'Temario del curso en PDF.', 'WIP_LANG' ),
			),
            array(
            	'name' => 'Dirigido a',
            	'id'   => WIP_PREFIX . '_addressed',
            	'type' => 'wysiwyg',
            	'options' => array(
            		'textarea_rows' => 5,
            		'media_buttons' => false,
            		'tinymce'		=> true		
            	),
            	'tab'	=> 'addressed',
            	'desc' => __( 'Para quiénes va dirigido el curso. <html>', 'WIP_LANG' ),

            ),
            array(
            	'name' => 'Materiales',
            	'id'   => WIP_PREFIX . '_materials',
            	'type' => 'wysiwyg',
            	'options' => array(
            		'textarea_rows' => 4,
            		'media_buttons' => false,
            		'tinymce'		=> true		
            	),
            	'tab'	=> 'general',
            	'desc' => __( 'Los materiales donde se impartirá el curso. <html>', 'WIP_LANG' ),

            ),
            array(
            	'name' => 'Certificación',
            	'id'   => WIP_PREFIX . '_certification',
            	'type' => 'wysiwyg',
            	'options' => array(
            		'textarea_rows' => 4,
            		'media_buttons' => false,
            		'tinymce'		=> true		
            	),
            	'tab'	=> 'general',
            	'desc' => __( 'Información sobre la certificación del curso. <html>', 'WIP_LANG' ),

            ),
            array(
            	'name' => 'Beneficios',
            	'id'   => WIP_PREFIX . '_benefits',
            	'type' => 'wysiwyg',
            	'options' => array(
            		'textarea_rows' => 4,
            		'media_buttons' => false,
            		'tinymce'		=> true		
            	),
            	'tab'	=> 'general',
            	'desc' => __( 'Beneficios que brinda el curso. <html>', 'WIP_LANG' ),

            ),
            array(
            	'name'        => 'Instructor del curso',
            	'id'          => WIP_PREFIX . '_addressed',
            	'type'        => 'user',
            	'field_type'  => 'select_advanced',
            	'placeholder' => __( 'Selecciona un instructor', 'WIP_LANG' ),
            	'query_args'  => array(),
            	'tab'	=> 'instructor',
            	'desc' => __( 'Instructor que imparte el curso', 'WIP_LANG' ),

            ),
            array(
            	'name'   => 'Opiniones', // Optional
            	'id'     => WIP_PREFIX . '_reviews',
            	'type'   => 'group',
            	'clone'	 => true,
            	'max_clone' => 4,
            	'tab'	=> 'reviews',
            	'fields' => array(
            		array(
            			'name' => 'Nombre y Apellidos',
            			'id'   => WIP_PREFIX . '_review_name',
            			'type' => 'text',
            		),
            		array(
            			'name' => 'Opinión',
            			'id'   => WIP_PREFIX . '_review',
            			'type' => 'textarea',
            			'cols'	=> 5,
            		),
            	)
            ),
        )
    );
	
	// Add extra thumb
	$meta_boxes[] = array(
				'id'         => 'course_extra_image',
				'title'      => 'Thumbnail image',
				'post_types' => WIP_COURSE_POST_TYPE,
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
    // Add more meta boxes if you want
    // $meta_boxes[] = ...

    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'wip_course_meta_boxes' );