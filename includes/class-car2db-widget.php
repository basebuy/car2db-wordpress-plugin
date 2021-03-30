<?php

// The widget class
class Car2db_Widget extends WP_Widget {
    
    protected $plugin_name;
    protected $version;
    
	// Main constructor
	public function __construct() {
	    if ( defined( 'CAR2DB_VERSION' ) ) {
	        $this->version = CAR2DB_VERSION;
	    } else {
	        $this->version = '1.0.0';
	    }
	    $this->plugin_name = 'car2db';
	    
		parent::__construct(
			'car2db_widget',
			__( 'Car2db Widget', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
		    'formAction'       => '',
			'title'            => '',
			'description'      => '',
		    'vehicleTypeLabel' => 'Type',
		    'makeLabel'        => 'Make',
		    'modelLabel'       => 'Model',
		    'generationLabel'  => 'Generation',
		    'seriesLabel'      => 'Series',
		    'trimLabel'        => 'Trim',
		    'equipmentLabel'   => 'Equipment',
		    'submitButtonText' => 'Find',
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>
		
		<?php // Form action ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'formAction' ) ); ?>"><?php _e( 'From action', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'formAction' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'formAction' ) ); ?>" type="text" value="<?php echo esc_attr( $formAction ); ?>" />
		</p>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php // Description ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php _e( 'Desription:', 'text_domain' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo wp_kses_post( $description ); ?></textarea>
		</p>
		
		<?php // Vehicle type label ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vehicleTypeLabel' ) ); ?>"><?php _e( 'Vehicle type label', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vehicleTypeLabel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vehicleTypeLabel' ) ); ?>" type="text" value="<?php echo esc_attr( $vehicleTypeLabel ); ?>" />
		</p>
		
		<?php // Make label ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'makeLabel' ) ); ?>"><?php _e( 'Make label', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'makeLabel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'makeLabel' ) ); ?>" type="text" value="<?php echo esc_attr( $makeLabel ); ?>" />
		</p>
				
		<?php // Model label ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'modelLabel' ) ); ?>"><?php _e( 'Model label', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'modelLabel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'modelLabel' ) ); ?>" type="text" value="<?php echo esc_attr( $modelLabel ); ?>" />
		</p>
		
		<?php // Generation label ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'generationLabel' ) ); ?>"><?php _e( 'Generation label', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'generationLabel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'generationLabel' ) ); ?>" type="text" value="<?php echo esc_attr( $generationLabel ); ?>" />
		</p>

		<?php // Series label ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'seriesLabel' ) ); ?>"><?php _e( 'Series label', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'seriesLabel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'seriesLabel' ) ); ?>" type="text" value="<?php echo esc_attr( $generationLabel ); ?>" />
		</p>
		
		<?php // Trim label ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'trimLabel' ) ); ?>"><?php _e( 'Trim label', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'trimLabel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'trimLabel' ) ); ?>" type="text" value="<?php echo esc_attr( $trimLabel ); ?>" />
		</p>
		

		<?php // Equipment label ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'equipmentLabel' ) ); ?>"><?php _e( 'Equipment label', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'equipmentLabel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'equipmentLabel' ) ); ?>" type="text" value="<?php echo esc_attr( $equipmentLabel ); ?>" />
		</p>
		
		<?php // Submit button text ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'submitButtonText' ) ); ?>"><?php _e( 'Submit button text', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'submitButtonText' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'submitButtonText' ) ); ?>" type="text" value="<?php echo esc_attr( $submitButtonText ); ?>" />
		</p>

		<?php
		/*
		// Checkbox ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'checkbox' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php _e( 'Checkbox', 'text_domain' ); ?></label>
		</p>

		<?php // Dropdown ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e( 'Select', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select' ); ?>" id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat">
			<?php
			// Your options array
			$options = array(
				''        => __( 'Select', 'text_domain' ),
				'option_1' => __( 'Option 1', 'text_domain' ),
				'option_2' => __( 'Option 2', 'text_domain' ),
				'option_3' => __( 'Option 3', 'text_domain' ),
			);

			// Loop through options and add each one to the select dropdown
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';

			} ?>
			</select>
		</p>

	<?php*/ 
	}

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['formAction']       = isset( $new_instance['formAction'] ) ? wp_strip_all_tags( $new_instance['formAction'] ) : '';
		$instance['title']            = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		//$instance['text']     = isset( $new_instance['text'] ) ? wp_strip_all_tags( $new_instance['text'] ) : '';
		$instance['description']      = isset( $new_instance['description'] ) ? wp_kses_post( $new_instance['description'] ) : '';
//		$instance['checkbox'] = isset( $new_instance['checkbox'] ) ? 1 : false;
		$instance['vehicleTypeLabel'] = isset( $new_instance['vehicleTypeLabel'] ) ? wp_strip_all_tags( $new_instance['vehicleTypeLabel'] ) : '';
		$instance['makeLabel']        = isset( $new_instance['makeLabel'] ) ? wp_strip_all_tags( $new_instance['makeLabel'] ) : '';
		$instance['modelLabel']       = isset( $new_instance['modelLabel'] ) ? wp_strip_all_tags( $new_instance['modelLabel'] ) : '';
		$instance['generationLabel']  = isset( $new_instance['generationLabel'] ) ? wp_strip_all_tags( $new_instance['generationLabel'] ) : '';
		$instance['seriesLabel']      = isset( $new_instance['seriesLabel'] ) ? wp_strip_all_tags( $new_instance['seriesLabel'] ) : '';
		$instance['trimLabel']        = isset( $new_instance['trimLabel'] ) ? wp_strip_all_tags( $new_instance['trimLabel'] ) : '';
		$instance['equipmentLabel']   = isset( $new_instance['equipmentLabel'] ) ? wp_strip_all_tags( $new_instance['equipmentLabel'] ) : '';
		$instance['submitButtonText'] = isset( $new_instance['submitButtonText'] ) ? wp_strip_all_tags( $new_instance['submitButtonText'] ) : '';
		return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {
		extract( $args );

		// Check the widget options
		$formAction       = $instance['formAction'] ?: '';
		$title            = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$description      = $instance['description'] ?: '';
		$vehicleTypeLabel = $instance['vehicleTypeLabel'] ?: '';
		$makeLabel        = $instance['makeLabel'] ?: '';
		$modelLabel       = $instance['modelLabel'] ?: '';
		$generationLabel  = $instance['generationLabel'] ?: '';
		$seriesLabel      = $instance['seriesLabel'] ?: '';
		$trimLabel        = $instance['trimLabel'] ?: '';
		$equipmentLabel   = $instance['equipmentLabel'] ?: '';
		$submitButtonText = $instance['submitButtonText'] ?: '';

		// WordPress core before_widget hook (always include )
		echo $before_widget;
		(new Car2db_Public($this->get_plugin_name(), $this->get_version()))->view([
		    'formAction'       => $formAction,
		    'title'            => $title,
		    'description'      => $description,
		    'vehicleTypeLabel' => $vehicleTypeLabel,
		    'makeLabel'        => $makeLabel,
		    'modelLabel'       => $modelLabel,
		    'generationLabel'  => $generationLabel,
		    'seriesLabel'      => $seriesLabel,
		    'trimLabel'        => $trimLabel,
		    'equipmentLabel'   => $equipmentLabel,
		    'submitButtonText' => $submitButtonText,
		]);
		
		

		// WordPress core after_widget hook (always include )
		echo $after_widget;

	}

	
	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
	    return $this->plugin_name;
	}
	
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
	    return $this->version;
	}
}

// Register the widget
function register_car2db_widget() {
	register_widget( 'Car2db_Widget' );
}
add_action( 'widgets_init', 'register_car2db_widget' );