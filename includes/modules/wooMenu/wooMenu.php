<?php

class PBC_woocommerce_menu extends ET_Builder_Module {

	public $slug       = 'pbc_woocommerce_menu';
	public $vb_support = 'on';
	public $child_slug = 'pbc_woocommerce_menu_child';



	protected $module_credits = array(
		'module_uri' => 'https://pagebuildercode.com/divi-woocommerce-menu',
		'author'     => 'Page Builder Code',
		'author_uri' => 'https://pagebuildercode.com',
	);

	public function init() {
		$this->name = esc_html__( 'PBC Woo Menu', 'divienhancer' );
		$this->main_css_element = '%%order_class%%';
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Menu Settings', 'divienhancer' ),
					'mobile_menu' => esc_html__( 'Mobile Menu', 'divienhancer' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'main_menu' => esc_html__( 'Main Menu', 'divienhancer' ),
				),
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
				'main'         => "{$this->main_css_element} .pbc-divi-woocommerce-menu-main-wrapper-inner",
			),
		);

		$advanced_fields['text']  = false;

		$advanced_fields['fonts']  =  array(
			'main_text' => array(
				'label'           => esc_html__( 'Main Menu', 'pbc_mastermind' ),
				'css'             => array(
					'main'         => "{$this->main_css_element} .pbc-divi-woocommerce-menu-wrapper-parent-link",
					'limited_main' => "{$this->main_css_element} .pbc-divi-woocommerce-menu-wrapper-parent-link",
					'hover'        => "{$this->main_css_element} .pbc-divi-woocommerce-menu-wrapper-parent-link:hover",
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
				'toggle_slug' => 'main_menu',
			),
		);


		return $advanced_fields;

	}

	public function get_fields() {
		$fields = array(
			'link_background' => array(
				'label'          => esc_html__( 'Link Background Color', 'pbc_mastermind' ),
				'description'    => esc_html__( '', 'pbc_mastermind' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'tab_slug'       => 'general',
				'toggle_slug'    => 'main_content',
				'hover'          => 'tabs',
				'mobile_options' => true,
				'default'				 => '#d801ff',
			),
			'menu_alignment' => array(
				'label'           => esc_html__( 'Main Menu Alignment', 'pbcwm' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'default'					=> 'left',
				'options'         => array(
					'left'			=> 'Left',
					'center'			=> 'Center',
					'right'			=> 'Right',
				),
				'description'     => esc_html__('', 'pbcwm'),
				'tab_slug'       => 'general',
				'toggle_slug'      => 'main_content',
			),
			'window_width' => array(
				'label'           => esc_html__( 'Menu Window Width', 'pbcwm' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'default'					=> 'module',
				'options'         => array(
					'menu'			=> 'Same width as the menu',
					'module'			=> 'Same width as the module',
				),
				'description'     => esc_html__('', 'pbcwm'),
				'tab_slug'       => 'general',
				'toggle_slug'      => 'main_content',
			),
			'mobile_open' => array(
				'label'               => esc_html__( 'Mobile Open Icon', 'divienhancer' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'tab_slug'       => 'general',
				'toggle_slug'     => 'mobile_menu',
				'default'					=> 'a',
			),
			'mobile_close' => array(
				'label'               => esc_html__( 'Mobile Close Icon', 'divienhancer' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'tab_slug'       => 'general',
				'toggle_slug'     => 'mobile_menu',
				'default'					=> 'M',
			),
			'mobile_color' => array(
				'label'           => esc_html__( 'Icon Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'       => 'general',
				'toggle_slug'     => 'mobile_menu',
				'hover'          => 'tabs',
				'default'				=> '#666666',
			),
			'mobile_backgroundcolor' => array(
				'label'           => esc_html__( 'Icon Background Color', 'divienhancer' ),
				'type'            => 'color-alpha',
				'tab_slug'       => 'general',
				'toggle_slug'     => 'mobile_menu',
				'hover'          => 'tabs',
			),
			'mobile_size' => array(
				'label'           => esc_html__( 'Icon Size', 'et_builder' ),
				'description'     => esc_html__( 'Adjust the size of the icon', 'et_builder' ),
				'type'            => 'range',
				'tab_slug'       => 'general',
				'toggle_slug'     => 'mobile_menu',
				'validate_unit'   => true,
				'default'         => '32px',
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '200',
					'step' => '1',
				),
			),

		);
		//$fields = divienhancer_new_options($fields);
		return $fields;
	}


	public function render( $attrs, $content = null, $render_slug ) {

		$link_background   = et_pb_responsive_options()->get_property_values( $this->props, 'link_background' );
		et_pb_responsive_options()->generate_responsive_css( $link_background, '%%order_class%% .pbc-divi-woocommerce-menu-wrapper-parent-link', 'background-color', $render_slug, '!important;', 'color' );


		$link_background_hover  = $this->get_hover_value( 'link_background' );


		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => et_pb_hover_options()->add_hover_to_selectors( '%%order_class%% .pbc-divi-woocommerce-menu-wrapper-parent-link:hover' ),
			'declaration' => sprintf(
				'background-color: %1$s !important;',
				esc_html( $link_background_hover )
			),
		) );


		$mobile_background   = et_pb_responsive_options()->get_property_values( $this->props, 'mobile_backgroundcolor' );
		et_pb_responsive_options()->generate_responsive_css( $mobile_background, '%%order_class%% .pbc-divi-woocommerce-menu-mobile-icon', 'background-color', $render_slug, '!important;', 'color' );


		$mobile_background_hover  = $this->get_hover_value( 'mobile_backgroundcolor' );


		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => et_pb_hover_options()->add_hover_to_selectors( '%%order_class%% .pbc-divi-woocommerce-menu-mobile-icon:hover, %%order_class%% .pbc-divi-woo-icon-opened' ),
			'declaration' => sprintf(
				'background-color: %1$s !important;',
				esc_html( $mobile_background_hover )
			),
		) );


		$mobile_color   = et_pb_responsive_options()->get_property_values( $this->props, 'mobile_color' );
		et_pb_responsive_options()->generate_responsive_css( $mobile_color, '%%order_class%% .pbc-divi-woocommerce-menu-mobile-icon', 'color', $render_slug, '!important;', 'color' );


		$mobile_color_hover  = $this->get_hover_value( 'mobile_color' );


		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => et_pb_hover_options()->add_hover_to_selectors( '%%order_class%% .pbc-divi-woocommerce-menu-mobile-icon:hover, %%order_class%% .pbc-divi-woo-icon-opened' ),
			'declaration' => sprintf(
				'color: %1$s !important;',
				esc_html( $mobile_color_hover )
			),
		) );



		if ( '' !== $this->props['mobile_size']  ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .pbc-divi-woocommerce-menu-mobile-icon',
				'declaration' => sprintf(
					'font-size: %1$s !important;',
					esc_html( $this->props['mobile_size'] )
				),
			) );
		}

		if ( '' !== $this->props['menu_alignment']  ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .pbc-divi-woocommerce-menu-main-wrapper',
				'declaration' => sprintf(
					'text-align: %1$s !important;',
					esc_html( $this->props['menu_alignment'] )
				),
			) );
		}


			$mobileopen = esc_attr( et_pb_process_font_icon( $this->props["mobile_open"]));
			$mobileclose = esc_attr( et_pb_process_font_icon( $this->props["mobile_close"]));

			$output = '';

			$datawidth = $this->props['window_width'];

			$output .= '<div class="pbc-divi-woocommerce-menu-main-wrapper clearfix" data-width="'.$datawidth.'" data-open="'.$mobileopen.'" data-close="'.$mobileclose.'">';
				$output .= '<span class="pbc-divi-woocommerce-menu-mobile-icon pbc-divi-woo-icon-closed" style="font-Family: ETmodules;"></span>';
				$output .= '<div class="pbc-divi-woocommerce-menu-main-wrapper-inner">';
					$output .= $this->props['content'];
				$output .= '</div>';
			$output .= '</div>';




			return $output;


	}

}

new PBC_woocommerce_menu;
