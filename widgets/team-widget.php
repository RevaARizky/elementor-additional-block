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
class Elementor_Custom_Team_Widget extends \Elementor\Widget_Base {

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
		return 'custom-team';
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
		return esc_html__( 'Custom Team', 'elementor-custom-team-widget' );
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
		return [ 'team', 'custom' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-team' ];
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
				'label' => esc_html__( 'Custom Team Content', 'elementor-custom-team-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name',
			[
				'label' => esc_html__( 'Name', 'elementor-custom-team-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Name', 'elementor-custom-team-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'position',
			[
				'label' => esc_html__( 'Position', 'elementor-custom-team-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Position', 'elementor-custom-team-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'elementor-custom-team-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'placeholder' => esc_html__( 'Description', 'elementor-custom-team-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'elementor-custom-team-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

		/* End repeater */

		$this->add_control(
			'team',
			[
				'label' => esc_html__( 'Team', 'elementor-custom-team-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),           /* Use our repeater */
				'title_field' => '{{{ name }}}',
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
        <section class="team-block custom-block">
			<div class="outer-wrapper bg-dark-grey">
				<div class="inner container mx-auto text-white">
					<div class="grid grid-cols-12 items-center gap-8">
						<?php foreach($settings['team'] as $team) : ?>
						<div class="xl:col-span-4 col-span-12">
							<div class="image-wrapper relative pt-[125%]">
								<img src="<?= $team['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover grayscale" alt="">
							</div>
						</div>
						<div class="xl:col-span-8 col-span-12">
							<div class="text-wrapper">
								<div class="position-wrapper mb-2">
									<p class="text-title"><?= $team['position'] ?></p>
								</div>
								<div class="name-wrapper mb-2">
									<p class="text-title"><?= $team['name'] ?></p>
								</div>
								<div class="description-wrapper">
									<p class="text-phara"><?= $team['description'] ?></p>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
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
