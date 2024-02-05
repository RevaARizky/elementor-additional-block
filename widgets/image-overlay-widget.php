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
class Elementor_Image_Overlay_Widget extends \Elementor\Widget_Base {

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
		return 'custom-image-overlay';
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
		return esc_html__( 'Custom Image Overlay', 'elementor-image-overlay-widget' );
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
		return [ 'image', 'overlay', 'custom'];
	}

	public function get_script_depends() {
		return [ 'elementor-script-custom-image-overlay' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-image-overlay' ];
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
				'label' => esc_html__( 'Image Overlay', 'elementor-image-overlay-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__('Image', 'elementor-image-overlay-widget'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__('Description', 'elementor-image-overlay-widget'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__('Description', 'elementor-image-overlay-widget'),
				'dynamic' => [
					'active' => true
				]
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
		<section class="custom-block image-overlay-block">

			<div class="image-wrapper relative lg:pt-[420px] pt-[420px]">
				<div class="overlay-button-trigger absolute bottom-4 right-4 cursor-pointer z-20">
					<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M4.62681e-08 17.7504C0.000611021 9.28239 5.98284 1.99405 14.2882 0.342583C22.5936 -1.30888 30.909 3.13647 34.1491 10.9601C37.3892 18.7837 34.6515 27.8065 27.6104 32.5107C20.5692 37.2149 11.1856 36.2902 5.19818 30.3021C1.86951 26.9731 -0.000339619 22.4581 4.62681e-08 17.7504Z" fill="#D75C00"/>
						<path d="M11.0938 16.7505C10.5415 16.7505 10.0938 17.1982 10.0938 17.7505C10.0938 18.3027 10.5415 18.7505 11.0938 18.7505V16.7505ZM17.75 18.7505C18.3022 18.7505 18.75 18.3027 18.75 17.7505C18.75 17.1982 18.3022 16.7505 17.75 16.7505V18.7505ZM17.75 16.7505C17.1977 16.7505 16.75 17.1982 16.75 17.7505C16.75 18.3027 17.1977 18.7505 17.75 18.7505V16.7505ZM24.4062 18.7505C24.9585 18.7505 25.4062 18.3027 25.4062 17.7505C25.4062 17.1982 24.9585 16.7505 24.4062 16.7505V18.7505ZM18.7503 17.7505C18.7503 17.1982 18.3026 16.7505 17.7503 16.7505C17.1981 16.7505 16.7503 17.1982 16.7503 17.7505H18.7503ZM16.7503 24.4067C16.7503 24.959 17.1981 25.4067 17.7503 25.4067C18.3026 25.4067 18.7503 24.959 18.7503 24.4067H16.7503ZM16.7503 17.7504C16.7503 18.3027 17.1981 18.7504 17.7503 18.7504C18.3026 18.7504 18.7503 18.3027 18.7503 17.7504H16.7503ZM18.7503 11.0942C18.7503 10.542 18.3026 10.0942 17.7503 10.0942C17.1981 10.0942 16.7503 10.542 16.7503 11.0942H18.7503ZM11.0938 18.7505H17.75V16.7505H11.0938V18.7505ZM17.75 18.7505H24.4062V16.7505H17.75V18.7505ZM16.7503 17.7505V24.4067H18.7503V17.7505H16.7503ZM18.7503 17.7504V11.0942H16.7503V17.7504H18.7503Z" fill="white"/>
					</svg>
				</div>
				<div class="overlay-content-wrapper absolute -inset-[1px] overflow-y-scroll px-6 lg:py-8 py-4 lg:px-12 z-10">
					<p class="text-white text-phara"><?= $settings['description'] ?></p>
				</div>
				<img src="<?= $settings['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
			</div>

		</section>

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


?>

