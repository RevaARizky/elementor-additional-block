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
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

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
		return 'custom-slider';
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
		return esc_html__( 'Custom Slider', 'elementor-slider-widget' );
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
		return [ 'slider', 'custom', 'sliders' ];
	}

	public function get_script_depends() {
		return [ 'elementor-script-custom-slider' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-slider' ];
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
				'label' => esc_html__( 'Slider Content', 'elementor-slider-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-slider-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'elementor-slider-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'elementor-slider-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

		$repeater->add_control(
			'image_position',
			[
				'label' => esc_html__('Image Position', 'elementor-slider-widget'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'center' => esc_html__('Center', 'elementor-slider-widget'),
					'right' => esc_html__('Right', 'elementor-slider-widget'),
					'left' => esc_html__('Left', 'elementor-slider-widget')
				]
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'elementor-slider-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'placeholder' => esc_html__( 'Description', 'elementor-slider-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'overlay',
			[
				'label' => esc_html__( 'Overlay Text', 'elementor-slider-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'placeholder' => esc_html__( 'Overlay Text', 'elementor-slider-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		/* End repeater */

		$this->add_control(
			'slider_items',
			[
				'label' => esc_html__( 'Slider Items', 'elementor-slider-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),           /* Use our repeater */
				'title_field' => '{{{ title }}}',
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
        $settings = $this->get_settings_for_display();
        ?>
        <section class="slider-block custom-block calculate-container" data-calculate-container="120">
			<div class="overflow-x-hidden">
				<div class="outer-wrapper bg-dark-grey">
					<div class="container relative">
						<div class="navigation-slider gap-x-10 px-12 py-4 justify-center mt-4 hidden lg:flex" style="border-top: 1px solid #fff; border-bottom: 1px solid #fff; margin-bottom: 2.2rem;">
							<?php foreach($settings['slider_items'] as $index => $value) : ?>
								<a href="javascript:void(0)">
									<div class="navigation flex items-center gap-x-2<?= $index == 0 ? ' active' : '' ?>" data-index="<?= $index+1 ?>">
										<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 14 14" fill="none">
											<circle cx="7" cy="7" r="7" fill="white"/>
										</svg>
										<p class="text-white uppercase" style="font-size: 18px; margin-bottom: 0;">
											<?= $value['title'] ?>
										</p>
									</div>
								</a>
							<?php endforeach; ?>
						</div>
	
						<div class="slider-wrapper flex-nowrap">
	
							<?php foreach($settings['slider_items'] as $index=>$value) : ?>
								<div class="slide-item mb-8 lg:mb-0 shrink-1 grow-0 lg:w-[50vw]<?= $index+1 == count($settings['slider_items']) ? ' lg:pr-12' : ' lg:pr-12' ?>" data-overlay="<?= $index ?>">
									<div class="image-wrapper relative mb-7">
										<div class="overlay-button-wrapper absolute bottom-4 right-4 cursor-pointer z-20" data-target="<?= $index ?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M4.62681e-08 17.7504C0.000611021 9.28239 5.98284 1.99405 14.2882 0.342583C22.5936 -1.30888 30.909 3.13647 34.1491 10.9601C37.3892 18.7837 34.6515 27.8065 27.6104 32.5107C20.5692 37.2149 11.1856 36.2902 5.19818 30.3021C1.86951 26.9731 -0.000339619 22.4581 4.62681e-08 17.7504Z" fill="#D75C00"/>
												<path d="M11.0938 16.7505C10.5415 16.7505 10.0938 17.1982 10.0938 17.7505C10.0938 18.3027 10.5415 18.7505 11.0938 18.7505V16.7505ZM17.75 18.7505C18.3022 18.7505 18.75 18.3027 18.75 17.7505C18.75 17.1982 18.3022 16.7505 17.75 16.7505V18.7505ZM17.75 16.7505C17.1977 16.7505 16.75 17.1982 16.75 17.7505C16.75 18.3027 17.1977 18.7505 17.75 18.7505V16.7505ZM24.4062 18.7505C24.9585 18.7505 25.4062 18.3027 25.4062 17.7505C25.4062 17.1982 24.9585 16.7505 24.4062 16.7505V18.7505ZM18.7503 17.7505C18.7503 17.1982 18.3026 16.7505 17.7503 16.7505C17.1981 16.7505 16.7503 17.1982 16.7503 17.7505H18.7503ZM16.7503 24.4067C16.7503 24.959 17.1981 25.4067 17.7503 25.4067C18.3026 25.4067 18.7503 24.959 18.7503 24.4067H16.7503ZM16.7503 17.7504C16.7503 18.3027 17.1981 18.7504 17.7503 18.7504C18.3026 18.7504 18.7503 18.3027 18.7503 17.7504H16.7503ZM18.7503 11.0942C18.7503 10.542 18.3026 10.0942 17.7503 10.0942C17.1981 10.0942 16.7503 10.542 16.7503 11.0942H18.7503ZM11.0938 18.7505H17.75V16.7505H11.0938V18.7505ZM17.75 18.7505H24.4062V16.7505H17.75V18.7505ZM16.7503 17.7505V24.4067H18.7503V17.7505H16.7503ZM18.7503 17.7504V11.0942H16.7503V17.7504H18.7503Z" fill="white"/>
											</svg>
										</div>
										<div class="bg-darker-grey overlay-content-wrapper absolute -inset-[1px] flex justify-center flex-start flex-column px-8 lg:px-16 z-10" data-overlay="<?= $index ?>">
											<p class="text-white text-overlay"><?= $value['overlay'] ?></p>
										</div>
										<img src="<?= $value['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover object-<?= $value['image_position'] ?>" alt="">
									</div>
									<div class="text-wrapper">
										<div class="title-wrapper mb-4">
											<p class="text-white uppercase text-title"><?= $value['title'] ?></p>
										</div>
										<div class="description-wrapper hidden">
											<p class="text-white" style="padding-bottom:15px; font-size:18px;"><?= $value['description'] ?></p>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
	
						</div>
	
					</div>
				</div>
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
