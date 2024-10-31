<?php

class PBC_woocommerce_menu_child extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'pbc_woocommerce_menu_child';

	// Module item has to use `child` as its type property
	public $type                     = 'child';

	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'identifier';

	// Full Visual Builder support
	public $vb_support = 'on';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 *
	 * @todo Remove $this->advanced_options['background'] once https://github.com/elegantthemes/Divi/issues/6913 has been addressed
	 */
	function init() {

		$this->advanced_setting_title_text = esc_html__( 'Item', 'pbcwm' );
		$this->settings_text               = esc_html__( 'Item Settings', 'pbcwm' );
		$this->main_css_element = '%%order_class%%';
		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Menu Settings', 'pbcwm' ),
					'query' => esc_html__( 'Basic Products Settings', 'pbcwm' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'product' => array(
						'title'    => esc_html__( 'Products Text', 'pbcwm' ),
						'priority' => 49,
						'tabbed_subtoggles' => true,
						'sub_toggles' => array(
							'title' => array(
								'name' => 'Title',
							),
							'price' => array(
								'name' => 'Price',
							),
							'badge' => array(
								'name' => 'Badge',
							),
						),
					),
					'product_styles' => array(
						'title'    => esc_html__( 'Products Styles', 'pbcwm' ),
						'priority' => 51,

					),
					'window_title' => array(
						'title'    => esc_html__( 'Window Title', 'pbcwm' ),
						'priority' => 52,

					),

				),
			),
		);

		$this->custom_css_fields = array(
			'main_product' => array(
				'label'    => esc_html__( 'Main Product', 'pbcwm' ),
				'selector' => '.pbc-divi-woocommerce-menu-wrapper-item li.product',
			),

			'product_badge' => array(
				'label'    => esc_html__( 'Badge', 'pbcwm' ),
				'selector' => '.pbc-divi-woocommerce-menu-wrapper-item li.product .onsale',
			),
			'product_title' => array(
				'label'    => esc_html__( 'Product Title', 'pbcwm' ),
				'selector' => '.pbc-divi-woocommerce-menu-wrapper-item li.product .woocommerce-loop-product__title',
			),
			'product_price' => array(
				'label'    => esc_html__( 'Product Price', 'pbcwm' ),
				'selector' => '.pbc-divi-woocommerce-menu-wrapper-item li.product span.price',
			),
			'product_image' => array(
				'label'    => esc_html__( 'Product Image', 'pbcwm' ),
				'selector' => '.pbc-divi-woocommerce-menu-wrapper-item li.product .et_shop_image img',
			),
		);


	}
	public function get_advanced_fields_config() {
		$advanced_fields = $this->advanced_tab_options;

		$advanced_fields['background'] = array(
			'options' => array(
				'background_color' => array(
					'default' => '#ffffff',
				),
			),
			'css'             => array(
				'main'         => "{$this->main_css_element} .pbc-divi-woocommerce-menu-wrapper-item-content",
			),
		);

		$advanced_fields['fonts']  =  array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'pbcwm' ),
				'css'             => array(
					'main'         => "{$this->main_css_element} li.product .woocommerce-loop-product__title",
					'limited_main' => "{$this->main_css_element} li.product .woocommerce-loop-product__title",
					'hover'        => "{$this->main_css_element} li.product .woocommerce-loop-product__title",
					'important' => 'all',
				),

				'text_color' => array(
					'default' => '#666666',
				),
				'line_height'     => array(
					'default' => '1em',
				),
				'text_align'     => array(
					'default' => 'center',
				),
				'font_size'       => array(
					'default'        => '14px',
					'range_settings' => array(
						'min'  => '12',
						'max'  => '50',
						'step' => '1',
					),
				),
				'letter_spacing'  => array(
					'default'        => '0px',
					'range_settings' => array(
						'min'  => '0',
						'max'  => '8',
						'step' => '1',
					),
				),
				'hide_text_align' => false,
				'toggle_slug' => 'product',
				'sub_toggle'  => 'title',
			),
			'price' => array(
				'label'           => esc_html__( 'Price', 'pbcwm' ),
				'css'             => array(
					'main'         => "{$this->main_css_element} ul.products li.product span.price",
					'limited_main' => "{$this->main_css_element} ul.products li.product span.price",
					'hover'        => "{$this->main_css_element} ul.products li.product span.price",
					'important' => 'all',
				),

				'text_color' => array(
					'default' => '#666666',
				),
				'line_height'     => array(
					'default' => '1em',
				),
				'text_align'     => array(
					'default' => 'center',
				),
				'font_size'       => array(
					'default'        => '14px',
					'range_settings' => array(
						'min'  => '12',
						'max'  => '50',
						'step' => '1',
					),
				),
				'letter_spacing'  => array(
					'default'        => '0px',
					'range_settings' => array(
						'min'  => '0',
						'max'  => '8',
						'step' => '1',
					),
				),
				'hide_text_align' => false,
				'toggle_slug' => 'product',
				'sub_toggle'  => 'price',
			),
			'badge' => array(
				'label'           => esc_html__( 'Badge', 'pbcwm' ),
				'css'             => array(
					'main'         => "{$this->main_css_element} li.product span.onsale",
					'limited_main' => "{$this->main_css_element} li.product span.onsale",
					'hover'        => "{$this->main_css_element} li.product span.onsale",
					'important' => 'all',
				),

				'text_color' => array(
					'default' => '#666666',
				),
				'line_height'     => array(
					'default' => '1em',
				),
				'text_align'     => array(
					'default' => 'center',
				),
				'font_size'       => array(
					'default'        => '14px',
					'range_settings' => array(
						'min'  => '12',
						'max'  => '50',
						'step' => '1',
					),
				),
				'letter_spacing'  => array(
					'default'        => '0px',
					'range_settings' => array(
						'min'  => '0',
						'max'  => '8',
						'step' => '1',
					),
				),
				'hide_text_align' => false,
				'toggle_slug' => 'product',
				'sub_toggle'  => 'badge',
			),
			'window_title' => array(
				'label'           => esc_html__( 'Window Title', 'pbcwm' ),
				'css'             => array(
					'main'         => "{$this->main_css_element} .pbc-divi-woocommerce-menu-title",
					'limited_main' => "{$this->main_css_element} .pbc-divi-woocommerce-menu-title",
					'hover'        => "{$this->main_css_element} .pbc-divi-woocommerce-menu-title:hover",
					'important' => 'all',
				),

				'text_color' => array(
					'default' => '#666666',
				),
				'line_height'     => array(
					'default' => '1em',
				),
				'text_align'     => array(
					'default' => 'center',
				),
				'font_size'       => array(
					'default'        => '18px',
					'range_settings' => array(
						'min'  => '12',
						'max'  => '50',
						'step' => '1',
					),
				),
				'letter_spacing'  => array(
					'default'        => '0px',
					'range_settings' => array(
						'min'  => '0',
						'max'  => '8',
						'step' => '1',
					),
				),
				'hide_text_align' => false,
				'toggle_slug' => 'window_title',
			),
		);
		$advanced_fields['text']  = false;


		$advanced_fields['box_shadow'] = array(
			'default' => array(
				'css' => array(
					'main'    => '%%order_class%% .pbc-divi-woocommerce-menu-wrapper-item-content',
					'overlay' => 'inset',
				),
			),
		);

		$advanced_fields['max_width'] =  array(
				'css' => array(
					'main' => "%%order_class%% .pbc-divi-woocommerce-menu-wrapper-item-content",
				),
		);

		$advanced_fields['borders']    = array(
			'default'   => array(
				'css'          => array(
					'main' => array(
						'border_radii'  => "%%order_class%% .pbc-divi-woocommerce-menu-wrapper-item-content",
						'border_styles' => "%%order_class%% .pbc-divi-woocommerce-menu-wrapper-item-content",
					),
				),
			),
		);


		$advanced_fields['filters']    = array(
			'default'   => array(
				'css'          => array(
					'main' => array(
						'border_radii'  => "%%order_class%% .pbc-divi-woocommerce-menu-wrapper-item-content",
						'border_styles' => "%%order_class%% .pbc-divi-woocommerce-menu-wrapper-item-content",
					),
				),
			),
		);

		$advanced_fields['margin_padding'] = array(
			'css'               => array(
				'main'      => '%%order_class%% .pbc-divi-woocommerce-menu-wrapper-item-content',
				'important' => array( 'custom_margin' ),
			),
		);


		$advanced_fields['button']  = array(
			'button' => array(
				'label' => esc_html__( 'Button', 'pbcwm' ),
				'css' => array(
					'main' => "%%order_class%% .pbc-divi-woocommerce-menu-item-button",
					'limited_main' => "%%order_class%% .pbc-divi-woocommerce-menu-item-button",
					'alignment'   => "%%order_class%% .et_pb_button_wrapper",
				),
				'use_alignment' => true,
				'box_shadow'    => array(
					'css' => array(
						'main' => '%%order_class%% .pbc-divi-woocommerce-menu-item-button',
					),
				),
				'margin_padding' => array(
					'css' => array(
						'main'      => "%%order_class%% .pbc-divi-woocommerce-menu-item-button, %%order_class%% .pbc-divi-woocommerce-menu-item-button-wrapper",
						'important' => 'all',
					),
				),
			),
		);




		return $advanced_fields;
	}

	public function get_fields() {

		$fields = array(
			'style' => array(
				'label'           => esc_html__( 'Style', 'pbcwm' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'default'					=> 'basic',
				'options'         => array(
					'basic'			=> 'Basic',
				),
				'description'     => esc_html__('', 'pbcwm'),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'render_menu',
				),
			),
			'source_main' => array(
				'label'           => esc_html__( 'Main Content', 'pbcwm' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'default'					=> 'products',
				'options'         => array(
					'products'			=> 'Products',
				),
				'description'     => esc_html__('', 	'pbcwm'),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'render_menu',
				),
			),
			'identifier' => array(
				'label'           => esc_html__( 'Menu Identifier', 'pbcwm' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'This lets you identify each slide on modal', 'pbcwm' ),
				'toggle_slug'     => 'main_content',
			),
			'title' => array(
				'label'           => esc_html__( 'Menu Title', 'pbcwm' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'This will appear on top of the main content', 'pbcwm' ),
				'toggle_slug'     => 'main_content',
				'default'					=> 'Main Products',
			),
			'title_margin' => array(
				'label'           => esc_html__( 'Window Title Margin', 'pbcwm' ),
				'type'            => 'custom_margin',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'window_title',
				'mobile_options'  => true,
			),
			'display_button' => array(
				'label'             => esc_html__( 'Display Button', 'pbcwm' ),
				'type'              => 'yes_no_button',
				'options'           => array(
					'on'  => esc_html__( 'On', 'pbcwm' ),
					'off' => esc_html__( 'Off', 'pbcwm' ),
				),
				'tab_slug'        => 'general',
				'default'					=> 'off',
				'toggle_slug'     => 'main_content',
			),
			'button_text' => array(
				'label'           => esc_html__( 'Button Text', 'pbcwm' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'pbcwm' ),
				'toggle_slug'     => 'main_content',
				'default'					=> 'Go To Page',
				'depends_show_if'  => 'on',
				'depends_on'       => array(
					'display_button',
				),
			),
			'button_url' => array(
				'label'           => esc_html__( 'Button Url', 'pbcwm' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'pbcwm' ),
				'toggle_slug'     => 'main_content',
				'default'					=> '',
				'depends_show_if'  => 'on',
				'depends_on'       => array(
					'display_button',
				),
			),
			'button_target'      => array(
				'label'            => esc_html__( 'Link Target', 'pbcwm' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => array(
					'_self'          => esc_html__( 'Same Window', 'pbcwm' ),
					'_blank'         => esc_html__( 'New Tab', 'pbcwm' ),
				),
				'description'      => esc_html__( 'Choose which type of product view you would like to display', 'pbcwm' ),
				'toggle_slug'      => 'main_content',
				'depends_show_if'  => 'on',
				'depends_on'       => array(
					'display_button',
				),
			),
			'content' => array(
				'label'           => esc_html__( 'Custom Content', 'pbcwm' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear below products', 'pbcwm' ),
				'toggle_slug'     => 'main_content',
			),
			'render_menu' => array(
				'type'              => 'computed',
				'computed_callback' => array( 'PBC_woocommerce_menu_child', 'get_html' ),
				'computed_depends_on' => array(
					'type',
					'limit',
					'include_categories',
					'columns',
					'orderby',
					'style',
					'source_main',
					'display_title',
					'display_price',
					'display_image',
					'display_badge',
				),
			),
			'type'                => array(
				'label'            => esc_html__( 'Product Source', 'pbcwm' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => array(
					'recent'           => esc_html__( 'Recent Products', 'pbcwm' ),
					'featured'         => esc_html__( 'Featured Products', 'pbcwm' ),
					'sale'             => esc_html__( 'Sale Products', 'pbcwm' ),
					'best_selling'     => esc_html__( 'Best Selling Products', 'pbcwm' ),
					'top_rated'        => esc_html__( 'Top Rated Products', 'pbcwm' ),
					'product_category' => esc_html__( 'Product Category', 'pbcwm' ),
				),
				'default_on_front' => 'recent',
				'affects'          => array(
					'include_categories',
				),
				'description'      => esc_html__( 'Choose which type of product view you would like to display.', 'pbcwm' ),
				'toggle_slug'      => 'query',
				'computed_affects' => array(
					'render_menu',
				),
			),
			'include_categories'  => array(
				'label'            => esc_html__( 'Included Categories', 'pbcwm' ),
				'type'             => 'categories',
				'meta_categories'  => array(
					'all'     => esc_html__( 'All Categories', 'pbcwm' ),
					'current' => esc_html__( 'Current Category', 'pbcwm' ),
				),
				'renderer_options' => array(
					'use_terms' => true,
					'term_name' => 'product_cat',
				),
				'depends_show_if'  => 'product_category',
				'description'      => esc_html__( 'Choose which categories you would like to include.', 'pbcwm' ),
				'taxonomy_name'    => 'product_cat',
				'toggle_slug'      => 'query',
				'computed_affects' => array(
					'render_menu',
				),
			),
			'columns' => array(
				'label'           => esc_html__( 'Columns', 'pbcwm' ),
				'type'            => 'range',
				'mobile_options'  => true,
				'default'         => '4',
				'default_tablet'  => '1',
				'default_phone'  => '1',
				'default_unit'    => '',
				'validate_unit'    => false,
				'toggle_slug'     => 'query',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '6',
					'step' => '1',
				),
				'computed_affects' => array(
					'render_menu',
				),
			),
			'limit' => array(
				'default'           => '12',
				'label'             => esc_html__( 'Product Count', 'pbcwm' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the number of products that should be displayed per menu.', 'pbcwm' ),
				'computed_affects'  => array(
					'render_menu',
				),
				'toggle_slug'       => 'query',
			),
			'orderby'             => array(
				'label'            => esc_html__( 'Order', 'pbcwm' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'default'    => esc_html__( 'Default Sorting', 'pbcwm' ),
					'menu_order' => esc_html__( 'Sort by Menu Order', 'pbcwm' ),
					'popularity' => esc_html__( 'Sort By Popularity', 'pbcwm' ),
					'rating'     => esc_html__( 'Sort By Rating', 'pbcwm' ),
					'date'       => esc_html__( 'Sort By Date: Oldest To Newest', 'pbcwm' ),
					'date-desc'  => esc_html__( 'Sort By Date: Newest To Oldest', 'pbcwm' ),
					'price'      => esc_html__( 'Sort By Price: Low To High', 'pbcwm' ),
					'price-desc' => esc_html__( 'Sort By Price: High To Low', 'pbcwm' ),
				),
				'default_on_front' => 'default',
				'description'      => esc_html__( 'Choose how your products should be ordered.', 'pbcwm' ),
				'computed_affects' => array(
					'render_menu',
				),
				'toggle_slug'      => 'query',
			),

			'product_background' => array(
				'label'           => esc_html__( 'Column Content Background Color', 'pbcwm' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'product_styles',

			),
			'product_padding' => array(
				'label'           => esc_html__( 'Column Padding', 'pbcwm' ),
				'type'            => 'custom_margin',
				'mobile_options'  => true,
				'default'					=> '0px|0px|0px|0px|false|false',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'product_styles',
			),
			'badge_background' => array(
				'label'           => esc_html__( 'Badge Background Color', 'pbcwm' ),
				'type'            => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge',
			),
			'badge_padding' => array(
				'label'           => esc_html__( 'Badge Padding', 'pbcwm' ),
				'type'            => 'custom_margin',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge',
				'mobile_options'  => true,
			),

			/*
			'display_image' => array(
				'label'            => esc_html__( 'Display Image', 'pbcwm' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'pbcwm' ),
					'off' => esc_html__( 'No', 'pbcwm' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'pbcwm' ),
				'computed_affects' => array(
					'render_menu',
				),
				'toggle_slug'      => 'elements',
			),
			'display_badge' => array(
				'label'            => esc_html__( 'Display Badge', 'pbcwm' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'pbcwm' ),
					'off' => esc_html__( 'No', 'pbcwm' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'pbcwm' ),
				'computed_affects' => array(
					'render_menu',
				),
				'toggle_slug'      => 'elements',
			),
			'display_title' => array(
				'label'            => esc_html__( 'Display Title', 'pbcwm' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'pbcwm' ),
					'off' => esc_html__( 'No', 'pbcwm' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'pbcwm' ),
				'computed_affects' => array(
					'render_menu',
				),
				'toggle_slug'      => 'elements',
			),
			'display_price' => array(
				'label'            => esc_html__( 'Display Price', 'pbcwm' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'pbcwm' ),
					'off' => esc_html__( 'No', 'pbcwm' ),
				),
				'default'          => 'on',
				'description'      => esc_html__( '', 'pbcwm' ),
				'computed_affects' => array(
					'render_menu',
				),
				'toggle_slug'      => 'elements',
			),
			*/

		);




		return $fields;

	}


	public function get_html($args = array(), $conditional_tags = array(), $current_page = array() ){
		$self = new self();
		$self->props = $args;
		$output = $self->render('', '', '', 'front');

		return $output;
	}


	function render( $attrs, $content = null, $render_slug, $isfront = null ) {


		if ( !class_exists( 'WooCommerce' ) ) {
      return '<div class="pbcwm-woocommerce-notice">You can not use this module if WooCommerce is not active</div>';
    }

		if ( '' !== $this->props['product_background']  ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% li.product',
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html( $this->props['product_background'] )
				),
			) );
		}

		$productpadding = '';
		if(isset($this->props['product_padding'])){
      $productpadding =  $this->props['product_padding'];


      if ( !empty($productpadding) ) {
          ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '%%order_class%% li.product',
            'declaration' => sprintf(
              'padding-top: %1$s !important; padding-right: %2$s !important; padding-bottom: %3$s !important; padding-left: %4$s !important;',
              esc_attr( et_pb_get_spacing( $productpadding, 'top', '0px' ) ),
              esc_attr( et_pb_get_spacing( $productpadding, 'right', '0px' ) ),
              esc_attr( et_pb_get_spacing( $productpadding, 'bottom', '0px' ) ),
              esc_attr( et_pb_get_spacing( $productpadding, 'left', '0px' ) )
            ),
          ) );
      }


    }


		if ( '' !== $this->props['badge_background']  ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% span.onsale',
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html( $this->props['badge_background'] )
				),
			) );
		}


		$badgepadding = '';
		if(isset($this->props['badge_padding'])){
      $badgepadding =  $this->props['badge_padding'];


      if ( !empty($badgepadding) ) {
          ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '%%order_class%% .woocommerce span.onsale',
            'declaration' => sprintf(
              'padding-top: %1$s !important; padding-right: %2$s !important; padding-bottom: %3$s !important; padding-left: %4$s !important;',
              esc_attr( et_pb_get_spacing( $badgepadding, 'top', '5px' ) ),
              esc_attr( et_pb_get_spacing( $badgepadding, 'right', '10px' ) ),
              esc_attr( et_pb_get_spacing( $badgepadding, 'bottom', '5px' ) ),
              esc_attr( et_pb_get_spacing( $badgepadding, 'left', '10px' ) )
            ),
          ) );
      }


    }



		$windowtitlemargin = '';
		if(isset($this->props['title_margin'])){
      $windowtitlemargin =  $this->props['title_margin'];


      if ( !empty($windowtitlemargin) ) {
          ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '%%order_class%% .pbc-divi-woocommerce-menu-title',
            'declaration' => sprintf(
              'margin-top: %1$s !important; margin-right: %2$s !important; margin-bottom: %3$s !important; margin-left: %4$s !important;',
              esc_attr( et_pb_get_spacing( $windowtitlemargin, 'top', '15px' ) ),
              esc_attr( et_pb_get_spacing( $windowtitlemargin, 'right', '0px' ) ),
              esc_attr( et_pb_get_spacing( $windowtitlemargin, 'bottom', '15px' ) ),
              esc_attr( et_pb_get_spacing( $windowtitlemargin, 'left', '0px' ) )
            ),
          ) );
      }


    }




		$output = '';
		$shortcode = '';
		$link = '#';
		if($this->props['link_option_url'] !== ''){
			$link = $this->props['link_option_url'];
		}

		$orderby = $this->props['orderby'];
		$order = 'ASC';

		if($orderby === 'date-desc'){
			$orderby = 'date';
			$order = 'DESC';
		}

		if($orderby === 'price-desc'){
			$orderby = 'price';
			$order = 'DESC';
		}


		// BEST SELLING, ON SALE, FEATURED, TOP RATED
		$specialattr = '';
		if($this->props['type'] === 'sale'){
			$specialattr = 'on_sale="true"';
		}
		if($this->props['type'] === 'best_selling'){
			$specialattr = 'best_selling="true"';
		}
		if($this->props['type'] === 'top_rated'){
			$specialattr = 'top_rated="true"';
		}

		if($this->props['type'] === 'featured'){
			$specialattr = 'visibility="featured"';
		}



		// Categories
		$catattr = '';
		/*
		$categoriesid = array();
		$categories = array();
		if($this->props['include_categories'] !== ''){
			$categoriesid = explode(',', $this->props['include_categories']);
			foreach($categoriesid as $category){
				$terms = get_term_by( 'id', absint( $category ), 'product_cat' );
				$categories[] = $terms->slug;
			}
		}
		$catstring = implode(', ', $categories);
		*/
		if($this->props['type'] === 'product_category') {
			$catattr = 'category="'.$this->props['include_categories'].'"';
		}



		$shortcode = sprintf(
		'[products limit="%1$s" columns="%2$s" orderby="%3$s" order="%4$s" %5$s %6$s ]',
		esc_attr($this->props['limit']),
		esc_attr($this->props['columns']),
		$orderby,
		$order,
		$specialattr,
		$catattr
		);
		$shortcodeOutput = do_shortcode($shortcode);

		$sourcecontent = '';

		if($this->props['source_main'] === 'products'){
			$sourcecontent = $shortcodeOutput;
		}


		if('front' === $isfront){
			return $sourcecontent;
		}


		//button icon
		$lefticon = $righticon = '';
		if($this->props['button_use_icon'] === 'on'){


		}

		//button
		$button = '';
		if($this->props['display_button'] == 'on' && $this->props['button_url'] !== ''){
			$button .= '<div class="pbc-divi-woocommerce-menu-item-button-wrapper">';
				$button .= '<a class="pbc-divi-woocommerce-menu-item-button" href="'.$this->props['button_url'].'" target="'.$this->props['button_target'].'">'.$this->props['button_text'].'</a>';
			$button .= '</div>';
		}

		$button_custom                   = $this->props['custom_button'];
		$button_url                      = $this->props['button_url'];
		$button_rel                      = $this->props['button_rel'];
		$button_text                     = $this->_esc_attr( 'button_text', 'limited' );
		$custom_icon_values              = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon                     = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet              = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone               = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';
		$url_new_window                  = $this->props['button_target'];
		$multi_view                      = et_pb_multi_view_options( $this );

		// Render button
		$button = $this->render_button( array(
			'button_classname'    => array( 'pbc-divi-woocommerce-menu-item-button' ),
			'button_custom'       => $button_custom,
			'button_rel'          => $button_rel,
			'button_text'         => $button_text,
			'button_text_escaped' => true,
			'button_url'          => $button_url,
			'custom_icon'         => $custom_icon,
			'custom_icon_tablet'  => $custom_icon_tablet,
			'custom_icon_phone'   => $custom_icon_phone,
			'url_new_window'      => $url_new_window,
			'display_button'      => ( '' !== $button_url && $multi_view->has_value( 'button_text' ) ),
			'multi_view_data'     => $multi_view->render_attrs( array(
				'content'    => '{{button_text}}',
				'visibility' => array(
					'button_text' => '__not_empty',
					'button_url'  => '__not_empty',
				),
			) ),
		) );



		if($this->props['style'] === 'basic'){

				$output .= sprintf(
				'
				<div class="pbc-divi-woocommerce-menu-wrapper-item">
					<span class="pbc-divi-woocommerce-menu-wrapper-parent-link">%2$s</span>
					<div class="pbc-divi-woocommerce-menu-wrapper-item-content  pbc-divi-woo-menu-closed">
						<div class="pbc-divi-woocommerce-menu-wrapper-item-content-header">
							<h3 class="pbc-divi-woocommerce-menu-title">
								%4$s
							</h3>
							%6$s
						</div>
						<div class="pbc-divi-woocommerce-menu-source-content">
							%3$s
							<div class="pbc-divi-woocommerce-menu-source-custom-content">%5$s</div>
						</div>
					</div>
				</div>
				',
				$link,
				esc_attr($this->props['identifier']),
				$sourcecontent,
				esc_attr($this->props['title']),
				$this->props['content'],
				$button
				);
		}




    return $output;

	}
}

new PBC_woocommerce_menu_child;
