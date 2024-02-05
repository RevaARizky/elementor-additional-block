<?php
/**
 * Register Slider Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_additional_blocks( $widgets_manager ) {

	require_once( __DIR__ . '/../widgets/carousel-widget.php' );

	$widgets_manager->register( new \Elementor_Carousel_Widget() );


	require_once( __DIR__ . '/../widgets/team-widget.php' );

	$widgets_manager->register( new \Elementor_Custom_Team_Widget() );


	require_once( __DIR__ . '/../widgets/gallery-widget.php' );

	$widgets_manager->register( new \Elementor_Gallery_Widget() );


	require_once( __DIR__ . '/../widgets/image-overlay-widget.php' );

	$widgets_manager->register( new \Elementor_Image_Overlay_Widget() );


	require_once( __DIR__ . '/../widgets/itrac-widget.php' );

	$widgets_manager->register( new \Elementor_Itrac_Widget() );


	require_once( __DIR__ . '/../widgets/map-control-widget.php' );

	$widgets_manager->register( new \Elementor_Map_Control_Widget() );


	require_once( __DIR__ . '/../widgets/slider-widget.php' );

	$widgets_manager->register( new \Elementor_Slider_Widget() );


	require_once( __DIR__ . '/../widgets/text-hover-widget.php' );

	$widgets_manager->register( new \Elementor_Text_Hover_Widget() );

}
add_action( 'elementor/widgets/register', 'register_additional_blocks' );