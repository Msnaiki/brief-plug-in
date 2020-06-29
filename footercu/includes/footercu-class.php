<?php
/**
 * Adds footer_cu widget.
 */
class footer_cu_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'footercu_widget', // Base ID
			esc_html__( 'footer customize', 'fc_domain' ), // Name
			array( 'description' => esc_html__( 'customize footer when activated', 'fc_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        //Display widget output
        echo '<p>email:'.$instance['emaill'].'</p>
              <p>tel:'.$instance['tel'].'</p>
              <p>tel:'.$instance['cr'].'</p>

        ';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'footer customizer', 'fc_domain' );
        $emaill = ! empty( $instance['emaill'] ) ? $instance['emaill'] : esc_html__( 'mehdisnaiki@gmail.com', 'fc_domain' );
        $tel = ! empty( $instance['tel'] ) ? $instance['tel'] : esc_html__( 'tel', 'fc_domain' );
        $cr = ! empty( $instance['cr'] ) ? $instance['cr'] : esc_html__( '©footercu', 'fc_domain' );
		?>
        <!--tel-->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'tel' ) ); ?>">
        <?php esc_attr_e( 'tel:', 'fc_domain' ); ?>
        </label> 
		<input 
        class="widefat" 
        id="<?php echo esc_attr( $this->get_field_id( 'tel' ) ); ?>" 
        name="<?php echo esc_attr( $this->get_field_name( 'tel' ) ); ?>" 
        type="text" value="<?php echo esc_attr( $tel ); ?>">
		</p>
        <!--email-->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'emaill' ) ); ?>">
        <?php esc_attr_e( 'emaill:', 'fc_domain' ); ?>
        </label> 
		<input 
        class="widefat" 
        id="<?php echo esc_attr( $this->get_field_id( 'emaill' ) ); ?>" 
        name="<?php echo esc_attr( $this->get_field_name( 'emaill' ) ); ?>" 
        type="text" value="<?php echo esc_attr( $emaill ); ?>">
		</p>

        <!--copyright-->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'cr' ) ); ?>">
        <?php esc_attr_e( 'cr:', 'fc_domain' ); ?>
        </label> 
		<input 
        class="widefat" 
        id="<?php echo esc_attr( $this->get_field_id( 'cr' ) ); ?>" 
        name="<?php echo esc_attr( $this->get_field_name( 'cr' ) ); ?>" 
        type="text" value="<?php echo esc_attr( $cr ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['tel'] = ( ! empty( $new_instance['tel'] ) ) ? sanitize_text_field( $new_instance['tel'] ) : '';
        $instance['emaill'] = ( ! empty( $new_instance['emaill'] ) ) ? sanitize_text_field( $new_instance['emaill'] ) : '';
        $instance['cr'] = ( ! empty( $new_instance['cr'] ) ) ? sanitize_text_field( $new_instance['cr'] ) : '';

		return $instance;
	}

} 