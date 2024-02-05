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
class Elementor_Carousel_Widget extends \Elementor\Widget_Base {

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
		return 'custom-carousel';
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
		return esc_html__( 'Custom Carousel', 'elementor-carousel-widget' );
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
		return [ 'carousel', 'custom' ];
	}

	public function get_script_depends() {
		return [ 'elementor-script-custom-carousel' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-carousel' ];
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
				'label' => esc_html__( 'Carousel Content', 'elementor-carousel-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'elementor-carousel-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'elementor-carousel-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

		$repeater->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle Text', 'elementor-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'placeholder' => esc_html__( 'Subtitle Text', 'elementor-carousel-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'elementor-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'placeholder' => esc_html__( 'Description', 'elementor-carousel-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		/* End repeater */

		$this->add_control(
			'carousel_items',
			[
				'label' => esc_html__( 'Carousel Items', 'elementor-carousel-widget' ),
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
		// var_dump($settings);
        ?>
        <section class="carousel-block custom-block" style="min-height: unset!important">
			<div class="outer-wrapper bg-dark-grey text-white overflow-x-hidden">
				<div class="container px-0 bg-darker-grey">
					<div class="grid grid-cols-12">
						<div class="md:col-span-7 col-span-12">
							<div class="image-slider-wrapper h-full swiper">
								<div class="swiper-wrapper">
									<?php foreach($settings['carousel_items'] as $index=>$value) : ?>
										<div class="swiper-slide">
											<div class="image-wrapper relative md:h-full h-auto md:pt-0 pt-[75%] w-full">
												<img src="<?= $value['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="md:col-span-5 col-span-12 bg-darker-grey px-9 py-12 flex flex-col justify-center">
							<div class="navigation-wrapper flex mb-10 items-center relative" style="justify-content: unset!important;">
								<div class="counter-wrapper mr-3">
									<p class="" style="margin-bottom: 0;font-size:18px"><span class="current-counter">01</span>/<span class="total-counter"><?= count($settings['carousel_items']) < 10 ? '0'.count($settings['carousel_items']) : count($settings['carousel_items']) ?></span></p>
								</div>
								<div class="line-wrapper mr-3">
									<hr class="bg-airbali-theme border-airbali-theme w-[100px]" style="height: 1px;">
								</div>
								<div class="title-wrapper w-full">
									<div class="title-slider-wrapper swiper">
										<div class="swiper-wrapper">
											<?php foreach($settings['carousel_items'] as $index=>$value) : ?>
											<div class="swiper-slide">
												<div class="text-wrapper">
													<p class="" style="margin-bottom: 0;font-size:18px;letter-spacing: 3px;"><?= $value['title'] ?></p>
												</div>
											</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
								<div class="button-wrapper flex gap-x-8">
									<div class="prev absolute top-0 right-[16px] translate-y-1/4 cursor-pointer z-20">
										<svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none" style="display: block;">
											<path d="M6.15084 10.9497L1.20109 6L6.15084 1.05025" stroke="white"/>
										</svg>
									</div>
									<div class="next absolute top-0 right-0 translate-y-1/4 cursor-pointer z-20">
										<svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none" style="display: block;">
											<path d="M1.05033 1.05025L6.00008 6L1.05033 10.9497" stroke="white"/>
										</svg>
									</div>
								</div>
							</div>
							<div class="content-wrapper">
								<div class="content-slider-wrapper swiper">
									<div class="swiper-wrapper">
										<?php foreach($settings['carousel_items'] as $index=>$value) : ?>
											<div class="swiper-slide">
												<p class="mb-6 text-title"><?= $value['subtitle'] ?></p>
												<p class="font-light text-phara" style="margin-bottom: 0;"><?= $value['description'] ?></p>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
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
