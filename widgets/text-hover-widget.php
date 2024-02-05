<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Text Hover Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Text_Hover_Widget extends \Elementor\Widget_Base {

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
		return 'custom-text-hover';
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
		return esc_html__( 'Custom Text Hover', 'elementor-text-hover-widget' );
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
		return [ 'text', 'custom', 'hover' ];
	}
	public function get_script_depends() {
		return [ 'elementor-script-custom-text-hover' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-text-hover' ];
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
				'label' => esc_html__( 'Text Hover Content', 'elementor-text-hover-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-text-hover-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'elementor-text-hover-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'elementor-text-hover-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'elementor-text-hover-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'placeholder' => esc_html__( 'Description', 'elementor-text-hover-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor-text-hover-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Discover More', 'elementor-text-hover-widget' ),
				'label_block' => true,
				'default' => 'Discover More',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'btn_url',
			[
				'label' => esc_html__( 'Button Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url' ],
				'label_block' => true,
			]
		);

		/* End repeater */

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Slider Items', 'elementor-text-hover-widget' ),
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
        <section class="text-hover-block custom-block">
			<div class="inner-section relative bg-dark-grey">
				<div class="grid grid-cols-12 relative z-10">
					<?php foreach($settings['items'] as $index=>$content) : ?>
						<div class="xl:col-span-3 col-span-12 xl:h-screen h-[300px] content-wrapper relative" data-index="<?= $index ?>">
							<div class="inner-wrapper flex flex-col justify-center h-full xl:items-center">
								<div class="text-wrapper text-white px-8 relative z-10">
									<div class="title-wrapper mb-2.5">
										<h3 class="font-montserrat text-title"><?= $content['title'] ?></h3>
									</div>
									<div class="description-wrapper overflow-hidden ">
										<a href="<?= $content['btn_url']['url'] ?>">
											<p class="mb-8 text-phara text-white"><?= $content['description'] ?></p>
										</a>
									</div>
									<div class="button-wrapper">
										<div class="inner-button inline-block relative">
											<a href="<?= $content['btn_url']['url'] ?>" class="text-phara text-white"><?= $content['btn_text'] ?></a>
											<div class="bottom-line absolute -bottom-[4px] w-[26px;] h-[2px]" style="background-color: #D75C00;"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="image-bg xl:hidden block overlay-bg-before">
								<img src="<?= $content['image']['url'] ?>" class="absolute inset-0 object-cover w-full !h-full" style="z-index: 1" alt="">
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="image-wrapper overlay-bg-before hidden xl:block">
					<?php foreach($settings['items'] as $index=>$content) : ?>
						<img src="<?= $content['image']['url'] ?>" class="absolute inset-0 w-full !h-full object-cover" style="<?= $index == 0 ? "opacity: 1; visibility: visible; z-index: 1;" : "opacity: 0; visibility: hidden; z-index: 0;" ?>" data-index="<?= $index ?>" alt="">
					<?php endforeach; ?>
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
