<?php
/*
  Plugin Name: task
  Plugin URI: http://task.com/
  Description: Analytify makes Google Analytics simple for everything in WordPress (posts,pages etc). It presents the statistics in a beautiful way under the WordPress Posts/Pages at front end.
  Version: 1.0
  Author: Abroo Jalil
  Author URI: http://twitter.com/abroo.jalil
  License: GPLv2+
  Text Domain: wp-task
*/
/*function theme_styles() {
 wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
 wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
 wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
 wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap_js'), '', true );
}
 add_action( 'wp_enqueue_scripts', 'theme_styles' ); */
    add_action('wp_footer', 'wpshout_action_example'); 
    function wpshout_action_example() { 
    echo esc_attr( get_option('map_option_2') ); 
    
}
    add_action('admin_menu', function() {
    add_options_page( 'plugin settings', 'gz_base', 'manage_options', 'gz-base-plugin', 'gz_base_plugin_page' );
});
 add_action( 'init', 'create_my_post_types' );
 
 add_action( 'admin_init', function() {
    register_setting( 'gz_base_plugin_page', 'map_option_1' );
    register_setting( 'gz_base_plugin_page', 'map_option_2' );
    register_setting( 'gz_base_plugin_page', 'map_option_3' );
    register_setting( 'gz_base_plugin_page', 'map_option_4' );
    register_setting( 'gz_base_plugin_page', 'map_option_5' );
    register_setting( 'gz_base_plugin_page', 'map_option_6' );
});
 
 
function gz_base_plugin_page() {
  ?>
    <div class="wrap">
      <form action="options.php" method="post">
 
        <?php
          settings_fields( 'gz_base_plugin_page' );
          do_settings_sections( 'gz_base_plugin_page');
        ?>
        <table>
             
            <tr>
                <th>Your name</th>
                <td><input type="text" placeholder="Your name" name="map_option_1" value="<?php echo esc_attr( get_option('map_option_1') ); ?>" size="50" /></td>
            </tr>
            <tr>
                <th>site intro</th>
                <td><textarea placeholder="site intro" name="map_option_2" rows="5" cols="50"><?php echo esc_attr( get_option('map_option_2') ); ?></textarea></td>
            </tr>
 
            <tr>
            /
                </td>
            </tr>
 
            <tr>
                <td><?php submit_button(); ?></td>
            </tr>
 
        </table>
 
      </form>
    </div>
  <?php
}
 

function create_my_post_types() {
    
    register_post_type(
                        'reviews',
                        array(
                        'labels' => array(
                        'name' => __( 'reviews' ),
                        'singular_name' => __( 'reviews' ),
                        'add_new'=>'add review',
		        'all_items'=>'all reviews',
                        'search_item'=>'search reviews',
                                    ),
                        'description' => __( 'description' ),
                        'menu_icon' => get_stylesheet_directory_uri().'/images/review.png',
                        'supports' => array(
                        'title',
                        'editor',
                        'excerpt',
                        'custom-fields',
                        'thumbnail' 
                                      ),
                        'public' => true,
                        'capability_type'=>'post',
                        'hierarchical'=>'false',
   		        'taxonomies'=>array('category','post_tag'),
		       )
    );
               
    
}


   add_action( 'init', 'my_post_types' );

function my_post_types() {
	
    register_post_type( 'previews', 
		        array(
                        'labels' => array(
			'name' => __( 'previews' ),
			'singular_name' => __( 'previews' )
			            ),
			'public' => true,
		        )
    );

   
}



