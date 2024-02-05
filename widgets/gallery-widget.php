<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Gallery Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Gallery_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve gallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'custom-gallery';
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
		return esc_html__( 'Custom Gallery', 'elementor-gallery-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve gallery widget icon.
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
		return [ 'gallery', 'custom' ];
	}

	public function get_script_depends() {
		return [ 'elementor-script-custom-gallery' ];
	}

	public function get_style_depends() {
		return [ 'elementor-style-custom-gallery' ];
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
				'label' => esc_html__( 'Gallery Content', 'elementor-gallery-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__('Image', 'elementor-gallery-widget'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => ['image', 'video']
			]
		);

		$repeater->add_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'elementor-gallery-widget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '12',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
					'11' => '11',
					'12' => '12',
				]
			]
		);

		$this->add_control(
			'images',
			[
					'label' => esc_html__( 'Images', 'elementor-gallery-widget' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),           /* Use our repeater */
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
        <section class="gallery-block custom-block">
			<div class="inner-section bg-dark-grey">
				<div class="grid grid-cols-12 gap-5">
					<?php foreach($settings['images'] as $content) : ?>
						<div class="xl:col-span-<?= $content['size'] ?> col-span-12">
							<div class="inner wrapper xl:h-[600px] h-[400px] w-full relative" data-aos="fade-in">
								<?php if(preg_match("/(jpg|gif|png|jpeg|webp|heic|svg|heif)$/", $content['image']['url'])) : ?>
									<img src="<?= $content['image']['url'] ?>" alt="" class="absolute inset-0 w-full !h-full object-cover">
								<?php elseif(preg_match("/(mp4|m4v|mpg|mov|vtt|avi|ogv|wmv|3gp|3g2)$/", $content['image']['url'])) : ?>
									<video src="<?= $content['image']['url'] ?>" muted autoplay loop class="absolute inset-0 w-full !h-full object-cover"></video>
								<?php endif; ?>
							</div>
						</div>
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
