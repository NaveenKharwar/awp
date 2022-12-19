<?php

if (class_exists('WP_Customize_Control')) {
	class Toggle_Control extends WP_Customize_Control {

		public $type = 'toggle';

		public function enqueue() {
			wp_enqueue_style( 'agility-toggle', AGILITYWP_THEME_DIR . 'css/customizer/toggle-control.css', array(), AGILITYWP_VERSION );
		}

		public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {
            $value = $this->value() == 'on' ? true : false;
            $label = $this->label;
            $description = $this->description;
            ?>
            <label class="customize-control agility_range-toggle">
                <?php if ( ! empty( $label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $description ) ) : ?>
                    <span class="customize-control-description"><?php echo $description; ?></span>
                <?php endif; ?>
				<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php echo $this->link(); checked( $value ); ?> />
                <span class="toggle-slider"></span>
            </label>
            <?php
        }
	  }
}

