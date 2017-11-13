<?php

/**
 * @class PromoFeatureModule
 */
class PromoFeatureModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Promo Feature', 'fl-builder'),
            'description'   => __('A Promotional Feature Module.', 'fl-builder'),
            'category'		=> __('Promo Feature', 'fl-builder'),
            'dir'           => PROMO_FEATURE_FL_MODULE_DIR . 'modules/promo-feature/',
            'url'           => FL_MODULE_EXAMPLES_URL . 'modules/promo-feature/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        /** 
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         */
        // Already registered
        $this->add_css('font-awesome');
        $this->add_js('jquery-bxslider');
        
        // Register and enqueue your own
        $this->add_css('promo-feature-lib', $this->url . 'css/promo-feature-lib.css');
        $this->add_js('promo-feature-lib', $this->url . 'js/promo-feature-lib.js', array(), '', true);
    }

    /** 
     * Use this method to work with settings data before 
     * it is saved. You must return the settings object. 
     *
     * @method update
     * @param $settings {object}
     */      
    public function update($settings)
    {
        $settings->textarea_field;
        
        return $settings;
    }

    /** 
     * This method will be called by the builder
     * right before the module is deleted. 
     *
     * @method delete
     */      
    public function delete()
    {
    
    }

    /** 
     * Add additional methods to this class for use in the 
     * other module files such as preview.php, frontend.php
     * and frontend.css.php.
     * 
     *
     * @method promo_feature_method
     */   
    public function promo_feature_method()
    {
    
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('PromoFeatureModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Video Or Text Promo', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'promo_type_select'	=> array(
						'type' 		=> 'select',
						'label'		=> __('Video or Text in Promo Box','fl-builder'),
						'default'       => 'video_promo',
                        'options'       => array(
                            'video_promo'      	=> __('Video Promo', 'fl-builder'),
                            'text_promo'      	=> __('Text Promo', 'fl-builder')
                        ),
						'toggle'        => array(
							'video_promo'		=> array( 
								'fields'        => array(),
								'sections'      => array('video_promo_section'),
                            ),
                            'text_promo'      => array(
								'fields'		=> array(),
								'sections'		=> array('text_promo_section'),
							)
						)
					),
                ),  
            ),
			'video_promo_section'	=> array(
				'title'         => __('Video Promo', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'video_field'    => array(
                        'type'          => 'video',
                        'label'         => __('Video', 'fl-builder')
                    ),
				),
			),
			'text_promo_section'	=> array(
				'title'         => __('Text Box Promo', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'top_title'     => array(
                        'type'          => 'text',
                        'label'         => __('Top Title', 'fl-builder'),
                        'description'   => '',
                    ),
					'lower_title'     => array(
                        'type'          => 'text',
                        'label'         => __('Lower Title', 'fl-builder'),
                        'description'   => '',
                    ),
					'promo_header'     => array(
                        'type'          => 'editor',
                        'label'         => '',
                        'media_buttons' => true,
						'default'	=> 'Promo Header Text Here',
                        'rows'          => 10
                    ),
					'promo_box_text'     => array(
                        'type'          => 'editor',
                        'label'         => '',
                        'media_buttons' => true,
						'default'	=> 'Text in lower half of the Promo Box',
                        'rows'          => 10
                    ),

                    'button_field'   => array(
                        'type'          => 'select',
                        'label'         => __('Button or Text Link', 'fl-builder'),
                        'default'       => 'button-link',
                        'options'       => array(
                            'button-link'      => __('Button', 'fl-builder'),
                            'text-link'      => __('Text', 'fl-builder'),
                            'no-link'      => __('None', 'fl-builder')
                        ),
						'toggle'        => array(
                            'button-link'      => array(
                                'fields'        => array('button_color_field', 'button_link_text','link_field'),
                                
                            ),
                            'text-link'      => array(
								'fields'		=> array('button_link_text','link_field'),
							)
						)
                    ),
                    'button_color_field'    => array(
                        'type'          => 'color',
                        'label'         => __('Button/Text Link Color', 'fl-builder'),
                        'default'       => '333333',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.fl-promo-feature-link',
                            'property'        => 'color'
                        )
                    ),
					'button_link_text'     => array(
                        'type'          => 'text',
                        'label'         => __('Button/Text Link Text', 'fl-builder'),
                        'description'   => '',
                    ),
					'icon_field'     => array(
                        'type'          => 'icon',
                        'label'         => __('Icon Before Text', 'fl-builder'),
                        'show_remove'   => true
                    ),
					'link_field'     => array(
                        'type'          => 'link',
                        'label'         => __('Link Read More', 'fl-builder')
                    ),
					'background_select'		=> array(
						'type'          => 'select',
                        'label'         => __('Photo or Color Background', 'fl-builder'),
                        'default'       => 'photo-bg',
                        'options'       => array(
                            'photo-bg'      => __('Photo Background', 'fl-builder'),
                            'color-bg'      => __('Color Background', 'fl-builder'),
                            'no-bg'      => __('No Background', 'fl-builder')
                        ),
						'toggle'        => array(
                            'photo-bg'      => array(
                                'fields'        => array('photo_field'),
                                // 'sections'      => array('toggle_section')
                            ),
                            'color-bg'      => array(
								'fields'		=> array('background_color_field'),
							)
						)
                    ),
                    'photo_field'    => array(
                        'type'          => 'photo',
                        'label'         => __('Background Photo', 'fl-builder')
                    ),
					'background_color_field'    => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'fl-builder'),
                        'default'       => 'FFFFFF',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.fl-promo-feature-bg',
                            'property'        => 'color'
                        )
                    ),
                )
			),
        )
    ),
    'toggle'       => array( // Tab
        'title'         => __('Subscribe', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'toggle_me'     => array(
                        'type'          => 'select',
                        'label'         => __('Add Subscribe to Promo?', 'fl-builder'),
                        'default'       => 'script_yes',
                        'options'       => array(
                            'script_yes'      => __('Yes', 'fl-builder'),
                            'script_no'      => __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'script_yes'      => array(
                                'fields'        => array('embed_code', 'left_text_sub', 'sub_photo', 'top_sub_text'),
                                // 'sections'      => array('toggle_section')
                            ),
                            'script_no'      => array()
                        )
                    ),
					'sub_photo'   => array(
                        'type'          => 'photo',
                        'label'         => __('Left Side Image', 'fl-builder')
                    ),
					'left_text_sub' => array(
                        'type'          => 'textarea',
                        'label'         => __('Left Side Text', 'fl-builder'),
                        'default'       => '',
                        'placeholder'   => __('Placeholder Text', 'fl-builder'),
                        'rows'          => '6',
                        'preview'         => array(
                            'type'             => 'text',
                            'selector'         => '.fl-promo-feature-text'  
                        )
                    ),
					'top_sub_text' 	=> array(
						'type'			=> 'text',
						'label'         => __('Top of email form text', 'fl-builder')
					),
                    'embed_code'   => array(
                        'type'          => 'text',
                        'label'         => __('Contact Form Embed Code', 'fl-builder'),
                        'default'       => '',
                        'description'   => 'script from embedded third-party subscription service ( please keep opening and closing script tags )'
                    ),	
                )
            ),
            // 'toggle_section' => array( // Section
                // 'title'         => __('Hide This Section!', 'fl-builder'), // Section Title
                // 'fields'        => array( // Section Fields
                    // 'some_text'     => array(
                        // 'type'          => 'text',
                        // 'label'         => __('Text', 'fl-builder'),
                        // 'default'       => ''
                    // )
                // )
            // )
        )
    )
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('promo_feature_settings_form', array(
    'title' => __('Example Form Settings', 'fl-builder'),
    'tabs'  => array(
        'general'      => array( // Tab
            'title'         => __('General', 'fl-builder'), // Tab title
            'sections'      => array( // Tab Sections
                'general'       => array( // Section
                    'title'         => '', // Section Title
                    'fields'        => array( // Section Fields
                        'promo-feature'       => array(
                            'type'          => 'text',
                            'label'         => __('Example', 'fl-builder'),
                            'default'       => 'Some promo-feature text'
                        )
                    )
                )
            )
        ),
        'another'       => array( // Tab
            'title'         => __('Another Tab', 'fl-builder'), // Tab title
            'sections'      => array( // Tab Sections
                'general'       => array( // Section
                    'title'         => '', // Section Title
                    'fields'        => array( // Section Fields
                        'another_example' => array(
                            'type'          => 'text',
                            'label'         => __('Another Example', 'fl-builder')
                        )
                    )
                )
            )
        )
    )
));