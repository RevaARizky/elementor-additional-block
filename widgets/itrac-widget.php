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
class Elementor_Itrac_Widget extends \Elementor\Widget_Base {

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
		return 'custom-itrac';
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
		return esc_html__( 'Custom Itrac', 'elementor-itrac-widget' );
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
		return [ 'itrac', 'custom'];
	}

	public function get_script_depends() {
		return [ 'elementor-script-custom-itrac' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-itrac' ];
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

		do_action( 'jet-engine-query-gateway/control', $this, 'items_list' );

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Itrac', 'elementor-itrac-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-itrac-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'elementor-itrac-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'elementor-itrac-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

		$repeater->add_control(
			'svg',
			[
				'label' => esc_html__( 'SVG', 'elementor-itrac-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'placeholder' => esc_html__( 'SVG', 'elementor-itrac-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'content_image',
			[
				'label' => esc_html__( 'Content Image', 'elementor-itrac-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'content_description',
			[
				'label' => esc_html__('Content Description', 'elementor-itrac-widget'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__('Content Description', 'elementor-itrac-widget'),
				'dynamic' => [
					'active' => true
				]
			]
		);

		/* End repeater */
		$this->add_control(
			'main_image',
			[
				'label' => esc_html__('Main Image', 'elementor-itrac-widget'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__('SVG', 'elementor-itrac-widget'),
				'dynamic' => [
					'active' => true
				]
			]
		);

		$this->add_control(
			'template_id',
			array(
				'label'       => esc_html__( 'Choose Template', 'jet-elements' ),
				'type'        => 'jet-query',
				'query_type'  => 'elementor_templates',
				'edit_button' => array(
					'active' => true,
					'label'  => __( 'Edit Template', 'jet-elements' ),
				),
				'condition'   => array(
					'item_content_type' => 'template',
				),
			)
		);
		// $this->add_control(
		// 	'main_image',
		// 	[
		// 		'label' => esc_html__('Main Image', 'elementor-itrac-widget'),
		// 		'type' => \Elementor\Controls_Manager::MEDIA
		// 	]
		// );
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Background Image', 'elementor-itrac-widget'),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);
		$this->add_control(
			'itrac',
			[
				'label' => esc_html__( 'Slider Items', 'elementor-itrac-widget' ),
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
        $settings = $this->get_settings_for_display(); ?>
		<section class="itrac-block custom-block" style="background-image: url(<?= $settings['bg_image']['url'] ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
			<div class="inner flex flex-col w-full justify-center items-center h-[600px]">

				<div class="main-image-wrapper relative xl:mb-8 mb-10">
					<?= $settings['main_image'] ?>
				</div>

				<div class="icon-wrapper flex justify-center flex-col lg:flex-row items-center gap-x-8 gap-y-6">
					<?php foreach($settings['itrac'] as $i => $icon) : ?>
						<?php $data = array(
							'title' => $icon['title'],
							'contentImage' => $icon['content_image'],
							'contentDescription' => $icon['content_description']
						); ?>
						<div class="icon cursor-pointer icon-popup-trigger" data-content='<?= json_encode($data) ?>' data-index="<?= $i ?>">
							<?php if($icon['svg']) : ?>
								<?= $icon['svg'] ?>
							<?php else : ?>
								<img src="<?= $icon['image']['url'] ?>" alt="">
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>

			</div>

			<div class="popup-target fixed inset-0 z-20 flex justify-center items-center hidden text-white">
				<div class="overlay fixed inset-0 bg-black/70 -z-10"></div>

				<div class="inner bg-white w-full max-w-5xl bg-white content-wrapper m-3 relative" style="background-color: #414a50;">
					<div class="content-wrapper">
						<div class="swiper">
							<div class="swiper-wrapper">
								<?php foreach($settings['itrac'] as $i => $content) : ?>
								<div class="swiper-slide">
									<div class="grid grid-cols-12 items-center p-3" style="">
										<div class="lg:col-span-7 col-span-12">
											<div class="image-wrapper relative md:pt-[50%] pt-[75%] lg:pt-[75%] w-full">
												<img src="<?= $content['content_image']['url'] ?>" alt="" class="image-target absolute inset-0 w-full !h-full object-cover" data-swiper-parallax-x="-100" data-swiper-parallax-duration="1000">
											</div>
										</div>
										<div class="lg:col-span-5 col-span-12 h-full">
											<div class="content-wrapper lg:px-9 py-12 h-full flex flex-col justify-center">
												<div class="title-wrapper mb-4"  data-swiper-parallax-x="-200" data-swiper-parallax-duration="200">
													<?= $content['svg'] ?>
												</div>
												<!-- <p class="text-title title-target mb-4"></p> -->
												<p class="text-phara content-target font-light"  data-swiper-parallax-x="-250" data-swiper-parallax-duration="200"><?= $content['content_description'] ?></p>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="outer-wrapper">
							<div class="button-wrapper flex gap-x-8">
								<div class="prev-button hidden absolute top-5 right-32 translate-y-1/4 cursor-pointer z-20">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="17" viewBox="0 0 7 12" fill="none" style="display: block;">
										<path d="M6.15084 10.9497L1.20109 6L6.15084 1.05025" stroke="white"/>
									</svg>
								</div>
								<div class="next-button absolute top-5 right-24 translate-y-1/4 cursor-pointer z-20">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="17" viewBox="0 0 7 12" fill="none" style="display: block;">
										<path d="M1.05033 1.05025L6.00008 6L1.05033 10.9497" stroke="white"/>
									</svg>
								</div>
								<div class="close-button absolute top-4 right-4 w-[32px] h-[32px] cursor-pointer flex justify-center items-center z-20" style="background-color: #D75C00; border-radius: 50%;">
									<svg xmlns="http://www.w3.org/2000/svg" class="rotate-45" width="14" height="15" viewBox="0 0 14 15" fill="none">
										<path d="M0.999023 6.58713C0.446739 6.58713 -0.000976562 7.03485 -0.000976562 7.58713C-0.000976562 8.13942 0.446739 8.58713 0.999023 8.58713V6.58713ZM6.99872 8.58713C7.551 8.58713 7.99872 8.13942 7.99872 7.58713C7.99872 7.03485 7.551 6.58713 6.99872 6.58713V8.58713ZM6.99805 6.58713C6.44576 6.58713 5.99805 7.03485 5.99805 7.58713C5.99805 8.13942 6.44576 8.58713 6.99805 8.58713V6.58713ZM12.9977 8.58713C13.55 8.58713 13.9977 8.13942 13.9977 7.58713C13.9977 7.03485 13.55 6.58713 12.9977 6.58713V8.58713ZM7.99924 7.58594C7.99924 7.03365 7.55153 6.58594 6.99924 6.58594C6.44696 6.58594 5.99924 7.03365 5.99924 7.58594H7.99924ZM5.99924 13.5856C5.99924 14.1379 6.44696 14.5856 6.99924 14.5856C7.55153 14.5856 7.99924 14.1379 7.99924 13.5856H5.99924ZM5.99924 7.58661C5.99924 8.13889 6.44696 8.58661 6.99924 8.58661C7.55153 8.58661 7.99924 8.13889 7.99924 7.58661H5.99924ZM7.99924 1.58691C7.99924 1.03463 7.55153 0.586914 6.99924 0.586914C6.44696 0.586914 5.99924 1.03463 5.99924 1.58691H7.99924ZM0.999023 8.58713H6.99872V6.58713H0.999023V8.58713ZM6.99805 8.58713H12.9977V6.58713H6.99805V8.58713ZM5.99924 7.58594V13.5856H7.99924V7.58594H5.99924ZM7.99924 7.58661V1.58691H5.99924V7.58661H7.99924Z" fill="white"/>
									</svg>
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
