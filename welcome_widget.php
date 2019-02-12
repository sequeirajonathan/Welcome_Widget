<?php
/**
 * Plugin Name:   Welcome Widget
 * Plugin URI:    http://wordpress.org/extend/plugins/#
 * Description:   Greets visitors with message.
 * Version:       1.0
 * Author: Jonathan Sequeira
 * Author URI: http://vet2dev.com
 */
class welcome_widget extends WP_Widget {
  public function __construct() {
    $widget_options = array( 'classname' => 'welcome_widget', 'description' => 'Vet 2 Dev is a site where I tell my story on how I transitioned from a military career to a career in web development' );
    parent::__construct( 'welcome_widget', 'Welcome Widget', $widget_options );
  }
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $blog_title = get_bloginfo( 'name' );
    $tagline = get_bloginfo( 'description' );
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
    <p><strong>Welcome to <?php echo $blog_title?>!</strong></p>
    <p><strong>Vet 2 Dev is a site where I tell my story on how I transitioned from a military career to a career in web development</strong></p>
    <?php echo $args['after_widget'];
  }
  
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
  }
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }
}
function register_welcome_widget() { 
  register_widget( 'welcome_widget' );
}
add_action( 'widgets_init', 'register_welcome_widget' );
?>