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
class Elementor_Form_Success_Widget extends \Elementor\Widget_Base {

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
		return 'custom-form-success';
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
		return esc_html__( 'Custom Form Success', 'elementor-form-success-widget' );
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
		return [ 'custom', 'form', 'success' ];
	}

	public function get_script_depends() {
		return [ 'elementor-script-custom-form-success' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-form-success' ];
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
				'label' => esc_html__( 'Map Control', 'elementor-form-success-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		// $repeater = new \Elementor\Repeater();

		// $repeater->add_control(
		// 	'title',
		// 	[
		// 		'label' => esc_html__( 'Title', 'elementor-form-success-widget' ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'placeholder' => esc_html__( 'Title', 'elementor-form-success-widget' ),
		// 		'label_block' => true,
		// 		'dynamic' => [
		// 			'active' => true,
		// 		],
		// 	]
		// );

        // $repeater->add_control(
        //     'image',
        //     [
        //         'label' => esc_html__('Image', 'elementor-form-success-widget'),
        //         'type' => \Elementor\Controls_Manager::MEDIA,
        //     ]
        // );

		// $repeater->add_control(
		// 	'description',
		// 	[
		// 		'label' => esc_html__( 'Description', 'elementor-form-success-widget' ),
		// 		'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'label_block' => true,
		// 		'placeholder' => esc_html__( 'Description', 'elementor-form-success-widget' ),
		// 		'dynamic' => [
		// 			'active' => true,
		// 		],
		// 	]
		// );
		// $repeater->add_control(
		// 	'overlay',
		// 	[
		// 		'label' => esc_html__( 'Overlay Text', 'elementor-form-success-widget' ),
		// 		'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'label_block' => true,
		// 		'placeholder' => esc_html__( 'Overlay Text', 'elementor-form-success-widget' ),
		// 		'dynamic' => [
		// 			'active' => true,
		// 		],
		// 	]
		// );

		/* End repeater */


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
		<div class="custom-widget form-success">
            <div class="popup-form-success hidden fixed inset-0 z-30 flex items-center justify-center">
                <div class="overlay fixed inset-0 bg-black/70 -z-10"></div>
                <div class="inner content-wrapper w-full max-w-5xl py-24 relative text-center" style="background-color: #414A50;">
					<div class="close-button absolute top-8 right-8">
						<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M28 2.82L25.18 0L14 11.18L2.82 0L0 2.82L11.18 14L0 25.18L2.82 28L14 16.82L25.18 28L28 25.18L16.82 14L28 2.82Z" fill="white"/>
						</svg>
					</div>
                    <div class="icon-wrapper mb-12">
                        <!-- <img src="<?= additional_blocks_assets_url('/dist/images/success-form.svg') ?>" class="w-full object-cover" alt=""> -->

						<svg width="284" height="185" viewBox="0 0 284 185" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_2954_2426)">
								<path d="M182.301 71.6L194.401 108.7C195.301 111.3 198.501 112.3 200.601 110.5L236.801 80.6C236.801 80.6 198.301 65.6 198.301 66.4C198.301 67.2 182.301 71.6 182.301 71.6Z" fill="#B5D1DB"/>
								<path d="M277.9 0.299971C254.2 9.69997 177.9 40.9 149 52.8C145.2 54.4 145.4 59.8 149.3 61.1L182.3 71.6L194.4 108.6C194.9 110.1 196.1 111 197.5 111.3C198.6 111.5 200.3 81.4 200.3 81.4C200.3 81.4 235 107.1 251.4 119.3C255.5 122.3 261.2 120 262.2 115.1C267.1 89.8 279.4 26.7 283.5 5.09997C284.1 1.69997 280.9 -0.900029 277.9 0.299971Z" fill="white"/>
								<path d="M197.5 111.3C198.6 111.5 200.3 81.4 200.3 81.4L257.3 27.9C257.7 27.5 257.2 26.9 256.8 27.2L182.4 71.7L194.5 108.7C194.9 110.1 196.1 111 197.5 111.3Z" fill="#D6E2EA"/>
								<path d="M0 183.9C39.1 183.8 91.2 161.7 101.6 119.3C105.8 102.2 102.1 83.9 88.5 71.4C71.4 55.6 52.6 70 57.2 92.1C64.8 128.3 109 155.1 142.6 155.4C162 155.6 180.2 146.3 187.2 127.3" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-dasharray="5 5"/>
							</g>
							<defs>
								<clipPath id="clip0_2954_2426">
									<rect width="283.6" height="184.9" fill="white"/>
								</clipPath>
							</defs>
						</svg>

                    </div>
                    <div class="title-wrapper mb-4">
                        <p class="text-title text-white">SUCCESS!</p>
                    </div>
                    <div class="description-wrapper mb-10">
                        <p class="text-phara target-message text-white"></p>
                    </div>
                    <div class="button-wrapper">
                        <a href="/" class="text-button px-6 py-5 text-white inline-block" style="background-color: #D75C00;">BACK TO HOMEPAGE</a>
                    </div>
                </div>
            </div>
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
