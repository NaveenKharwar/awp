<?php
/**
 * Support for Page Builder
 *
 * This class adds support for using a custom page template with page builder
 * plugins, such as Elementor.
 *
 * @package AgilityWP\Compatibility
 */

 namespace AgilityWP\Compatibility;

 /**
  * Class PageBuilderManager
  *
  * Detects if a post is edited with a page builder and updates the post template.
  */
 class PageBuilderManager {
	 /**
	  * The post ID.
	  *
	  * @var int
	  */
	 protected $post_id;

	 /**
	  * The page builder name, if detected.
	  *
	  * @var string|bool
	  */
	 protected $page_builder;

	 /**
	  * PageBuilderManager constructor.
	  */
	 public function __construct() {
		 $this->post_id = get_the_ID();
		 $this->page_builder = $this->detectPageBuilder();
	 }

	 /**
	  * Run the page builder manager.
	  */
	 public function run() {
		 if ( $this->page_builder ) {
			 update_post_meta( $this->post_id, '_wp_page_template', 'page-templates/template-pagebuilder.php' );
		 }
	 }

	 /**
	  * Detect the page builder used to edit the post.
	  *
	  * @return string|bool The page builder name, or false if no page builder is detected.
	  */
	 protected function detectPageBuilder() {
		 // Check if the post is edited with Elementor
		 if ( get_post_meta( $this->post_id, '_elementor_edit_mode', true ) === 'builder' ) {
			 return 'elementor';
		 }

		 // Check if the post is edited with Beaver Builder
		 if ( class_exists( '\FLBuilderModel', false ) ) {
			 $pid = $this->post_id;
			 if ( \FLBuilderModel::is_builder_enabled( $pid ) ) {
				 return 'beaver-builder';
			 }
		 }

		 // Add more checks for other page builders here

		 // Return false if no page builder is detected
		 return false;
	 }
 }

 /**
  * Run the PageBuilderManager.
  */
 function run_page_builder_manager() {
	 $manager = new PageBuilderManager();
	 $manager->run();
 }

 add_action( 'wp', __NAMESPACE__ . '\run_page_builder_manager', 10, 0 );
