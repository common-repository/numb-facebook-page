<?php 

class Numn_Facebook_Page_Widget extends WP_Widget {


	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct( 
			'numb_facebook_page_plugin', 
			__( 'Numb Facebook Page Widget', 'numb' ), 
			array(
				'description' => __( 'A descriptive Facebook Page Widget', 'numb' )
			)
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		$value = array();
		$value['page_url'] = $instance['page_url'];
		$value['width'] = esc_attr( $instance['width'] );
		$value['height'] = esc_attr( $instance['height'] );
		$value['adapt'] = esc_attr( $instance['adapt'] );
		$value['show_timeline'] = esc_attr( $instance['show_timeline'] );
		$value['friends_faces'] = esc_attr( $instance['friends_faces'] );
		$value['small_header'] = esc_attr( $instance['small_header'] );
		$value['hide_cover'] = esc_attr( $instance['hide_cover'] );
		$value['call_to_action'] = esc_attr( $instance['call_to_action'] );



		echo $args['before_widget'];

		echo $args['before_title'];
			echo esc_html( $instance['title'] );
		echo $args['after_title'];

?>
<div 
	class="fb-page" data-href="<?php echo esc_url( $value['page_url'] ); ?>"
	<?php if( $value['show_timeline'] == 'true' ) : ?>
	data-tabs="timeline, events, messages"
	<?php endif; ?>
	data-small-header="<?php echo $value['small_header']; ?>" 
	<?php if( $value['adapt'] == 'false' ) : ?>
	data-width="<?php echo $value['width']; ?>"
	data-height="<?php echo $value['height']; ?>"
	<?php else : ?>
	data-adapt-container-width="<?php echo $value['adapt']; ?>"
	<?php endif; ?>
	data-hide-cover="<?php echo $value['hide_cover']; ?>"
	data-show-facepile="<?php echo $value['friends_faces']; ?>"
	data-hide-cta="<?php echo $value['call_to_action']; ?>">
	<blockquote cite="https://www.facebook.com/facebook"
	class="fb-xfbml-parse-ignore">
		<a href="https://www.facebook.com/facebook">Facebook</a>
	</blockquote>
</div> 
<?php

		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		// Get title
		if( isset( $instance[ 'title' ] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Like Us on Facebook', 'numb' );
		}
		// Get page url
		if( isset( $instance[ 'page_url' ] ) ) {
			$page_url = $instance['page_url'];
		} else {
			$page_url = 'https://www.facebook.com/facebook';
		}
		// Adapt to plugin container width
		if( isset( $instance[ 'adapt' ] ) ) {
			$adapt = $instance['adapt'];
		} else {
			$adapt = 'true';
		}
		// Get width
		if( isset( $instance[ 'width' ] ) ) {
			$width = $instance['width'];
		} else {
			$width = '300';
		}
		// Get height
		if( isset( $instance[ 'height' ] ) ) {
			$height = $instance['height'];
		} else {
			$height = '550';
		}
		// Show timeline
		if( isset( $instance[ 'show_timeline' ] ) ) {
			$show_timeline = $instance['show_timeline'];
		} else {
			$show_timeline = 'true';
		}
		// Show friend's faces
		if( isset( $instance[ 'friends_faces' ] ) ) {
			$friends_faces = $instance['friends_faces'];
		} else {
			$friends_faces = 'true';
		}
		// Use small header
		if( isset( $instance[ 'small_header' ] ) ) {
			$small_header = $instance['small_header'];
		} else {
			$small_header = 'false';
		}				
		// Hide cover photo
		if( isset( $instance[ 'hide_cover' ] ) ) {
			$hide_cover = $instance['hide_cover'];
		} else {
			$hide_cover = 'false';
		}
		// Hide call to action
		if( isset( $instance[ 'call_to_action' ] ) ) {
			$call_to_action = $instance['call_to_action'];
		} else {
			$call_to_action = 'false';
		}		

		?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'numb' ); ?></label>
				<input 
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id( 'title' ); ?>"
					name="<?php echo $this->get_field_name( 'title' ); ?>"
					value="<?php echo esc_attr( $title ); ?>"
				>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php _e( 'Page URL', 'numb' ); ?></label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id( 'page_url' ); ?>"
					name="<?php echo $this->get_field_name( 'page_url' ); ?>"
					value="<?php echo esc_attr( $page_url ); ?>"
				>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'adapt' ); ?>"><?php _e( 'Adapt Container Width', 'numb' ); ?></label>
				<select
					class="widefat"
					id="<?php echo $this->get_field_id( 'adapt' ); ?>"
					name="<?php echo $this->get_field_name( 'adapt' ); ?>"
					value="<?php echo esc_attr( $adapt ); ?>"
				>
					<option value="true" <?php echo ( $adapt == 'true' ) ? 'selected' : '' ?>>True</option>
					<option value="false" <?php echo ( $adapt == 'false' ) ? 'selected' : '' ?>>False</option>
			    </select>
			</p>			
			<p>
				<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width (Adapt Container Width should be false)', 'numb' ); ?></label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id( 'width' ); ?>"
					name="<?php echo $this->get_field_name( 'width' ); ?>"
					value="<?php echo esc_attr( $width ); ?>"
				>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height (Adapt Container Width should be false)', 'numb' ); ?></label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id( 'height' ); ?>"
					name="<?php echo $this->get_field_name( 'height' ); ?>"
					value="<?php echo esc_attr( $height ); ?>"
				>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'show_timeline' ); ?>"><?php _e( 'Show Timeline', 'numb' ); ?></label>
				<select
					class="widefat"
					id="<?php echo $this->get_field_id( 'show_timeline' ); ?>"
					name="<?php echo $this->get_field_name( 'show_timeline' ); ?>"
					value="<?php echo esc_attr( $show_timeline ); ?>"
				>
					<option value="true" <?php echo ( $show_timeline == 'true' ) ? 'selected' : '' ?>>True</option>
					<option value="false" <?php echo ( $show_timeline == 'false' ) ? 'selected' : '' ?>>False</option>
			    </select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'friends_faces' ); ?>"><?php _e( 'Show Friend\'s Faces', 'numb' ); ?></label>
				<select
					class="widefat"
					id="<?php echo $this->get_field_id( 'friends_faces' ); ?>"
					name="<?php echo $this->get_field_name( 'friends_faces' ); ?>"
					value="<?php echo esc_attr( $friends_faces ); ?>"
				>
					<option value="true" <?php echo ( $friends_faces == 'true' ) ? 'selected' : '' ?>>True</option>
					<option value="false" <?php echo ( $friends_faces == 'false' ) ? 'selected' : '' ?>>False</option>
			    </select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'small_header' ); ?>"><?php _e( 'Use Small Header', 'numb' ); ?></label>
				<select
					class="widefat"
					id="<?php echo $this->get_field_id( 'small_header' ); ?>"
					name="<?php echo $this->get_field_name( 'small_header' ); ?>"
					value="<?php echo esc_attr( $small_header ); ?>"
				>
					<option value="true" <?php echo ( $small_header == 'true' ) ? 'selected' : '' ?>>True</option>
					<option value="false" <?php echo ( $small_header == 'false' ) ? 'selected' : '' ?>>False</option>
			    </select>
			</p>						
			<p>
				<label for="<?php echo $this->get_field_id( 'hide_cover' ); ?>"><?php _e( 'Hide Cover Photo', 'numb' ); ?></label>
				<select
					class="widefat"
					id="<?php echo $this->get_field_id( 'hide_cover' ); ?>"
					name="<?php echo $this->get_field_name( 'hide_cover' ); ?>"
					value="<?php echo esc_attr( $hide_cover ); ?>"
				>
					<option value="true" <?php echo ( $hide_cover == 'true' ) ? 'selected' : '' ?>>True</option>
					<option value="false" <?php echo ( $hide_cover == 'false' ) ? 'selected' : '' ?>>False</option>
			    </select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'call_to_action' ); ?>"><?php _e( 'Hide CTA Button (if available)', 'numb' ); ?></label>
				<select
					class="widefat"
					id="<?php echo $this->get_field_id( 'call_to_action' ); ?>"
					name="<?php echo $this->get_field_name( 'call_to_action' ); ?>"
					value="<?php echo esc_attr( $call_to_action ); ?>"
				>
					<option value="true" <?php echo ( $call_to_action == 'true' ) ? 'selected' : '' ?>>True</option>
					<option value="false" <?php echo ( $call_to_action == 'false' ) ? 'selected' : '' ?>>False</option>
			    </select>
			</p>

		<?php

	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();

		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['page_url'] = ( !empty( $new_instance['page_url'] ) ) ? strip_tags( $new_instance['page_url'] ) : '';
		$instance['width'] = ( !empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
		$instance['height'] = ( !empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';
		$instance['adapt'] = ( !empty( $new_instance['adapt'] ) ) ? strip_tags( $new_instance['adapt'] ) : '';
		$instance['show_timeline'] = ( !empty( $new_instance['show_timeline'] ) ) ? strip_tags( $new_instance['show_timeline'] ) : '';
		$instance['friends_faces'] = ( !empty( $new_instance['friends_faces'] ) ) ? strip_tags( $new_instance['friends_faces'] ) : '';
		$instance['small_header'] = ( !empty( $new_instance['small_header'] ) ) ? strip_tags( $new_instance['small_header'] ) : '';
		$instance['hide_cover'] = ( !empty( $new_instance['hide_cover'] ) ) ? strip_tags( $new_instance['hide_cover'] ) : '';
		$instance['call_to_action'] = ( !empty( $new_instance['call_to_action'] ) ) ? strip_tags( $new_instance['call_to_action'] ) : '';

		return $instance;

	}

}