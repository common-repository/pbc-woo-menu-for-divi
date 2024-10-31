<?php

class PBCWM_PbcDiviWoocommerceMenu extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'pbcwm-pbc-divi-woocommerce-menu';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'pbc-divi-woocommerce-menu';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * PBCWM_PbcDiviWoocommerceMenu constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'pbc-divi-woocommerce-menu', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );
	}



}

new PBCWM_PbcDiviWoocommerceMenu;
