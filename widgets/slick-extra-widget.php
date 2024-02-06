<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Slider Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Slick_Extra_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve slider widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'custom-slick-extra';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve slider widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Slick Extra', 'elementor-slick-extra-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-bullet-list';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'custom', 'slick', 'extra' ];
	}

	public function get_script_depends() {
		return [ 'elementor-script-custom-slick-extra' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-slick-extra' ];
	}

	/**
	 * Register Slider widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Map Control', 'elementor-slick-extra-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		// $repeater = new \Elementor\Repeater();

		// $repeater->add_control(
		// 	'title',
		// 	[
		// 		'label' => esc_html__( 'Title', 'elementor-slick-extra-widget' ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'placeholder' => esc_html__( 'Title', 'elementor-slick-extra-widget' ),
		// 		'label_block' => true,
		// 		'dynamic' => [
		// 			'active' => true,
		// 		],
		// 	]
		// );

        // $repeater->add_control(
        //     'image',
        //     [
        //         'label' => esc_html__('Image', 'elementor-slick-extra-widget'),
        //         'type' => \Elementor\Controls_Manager::MEDIA,
        //     ]
        // );

		// $repeater->add_control(
		// 	'description',
		// 	[
		// 		'label' => esc_html__( 'Description', 'elementor-slick-extra-widget' ),
		// 		'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'label_block' => true,
		// 		'placeholder' => esc_html__( 'Description', 'elementor-slick-extra-widget' ),
		// 		'dynamic' => [
		// 			'active' => true,
		// 		],
		// 	]
		// );
		// $repeater->add_control(
		// 	'overlay',
		// 	[
		// 		'label' => esc_html__( 'Overlay Text', 'elementor-slick-extra-widget' ),
		// 		'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'label_block' => true,
		// 		'placeholder' => esc_html__( 'Overlay Text', 'elementor-slick-extra-widget' ),
		// 		'dynamic' => [
		// 			'active' => true,
		// 		],
		// 	]
		// );

		/* End repeater */

		$this->add_control(
			'target',
			[
				'label' => esc_html__( 'Target', 'elementor-slick-extra-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render slider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings_for_display(); ?>
		<div class="custom-widget slick-extra">
			
		</div>

        <?php
    }

    

	/**
	 * Render list widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
        ?>
        <div></div>
        <?php
    }

}
