<?php

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Range_Custom_control
	 */
	class Range_Custom_control extends WP_Customize_Control {
		public $type = 'range';

		public function enqueue() {
			wp_enqueue_script( 'agility-range', AGILITYWP_THEME_DIR . 'js/range-control.min.js', AGILITYWP_VERSION, true );
         wp_enqueue_style( 'agility-range', AGILITYWP_THEME_DIR . 'css/customizer/range-control.css', AGILITYWP_VERSION );
		}

		// Render the control's content.
		public function render_content() {
			ob_clean();
			?>
		   <li class="customize-control agility_range-control">
			      <?php if ( ! empty( $this->label ) ) : ?>
				      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			      <?php endif; ?>
               <?php if ( ! empty( $this->description ) ) : ?>
				      <span class="description customize-control-description"><?php echo $this->description; ?></span>
			      <?php endif; ?>
			      <div class="agility_control-field">
                  <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> onchange="updateRangeValue(this.value);"/>
			         <span id="current-range-value" class="current-range-value"><?php echo esc_attr( $this->value() ); ?></span>
               </div>
		   </li>
			<?php
		}
	}
}
