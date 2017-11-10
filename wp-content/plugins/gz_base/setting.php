<?php
/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */
/**
 * custom option and settings
 */
function gz_base_settings_init() {
 // register a new setting for "gz_base" page
 register_setting( 'gz_base', 'gz_base_options' );
 
 // register a new section in the "gz_base" page
 add_settings_section(
 'gz_base_section_developers',
 __( 'The Matrix has you.', 'gz_base' ),
 'gz_base_section_developers_cb',
 'gz_base'
 );
 
 // register a new field in the "gz_base_section_developers" section, inside the "gz_base" page
 add_settings_field(
 'gz_base_field_pill', // as of WP 4.6 this value is used only internally
 // use $args' label_for to populate the id inside the callback
 __( 'Pill', 'gz_base' ),
 'gz_base_field_pill_cb',
 'gz_base',
 'gz_base_section_developers',
 [
 'label_for' => 'gz_base_field_pill',
 'class' => 'gz_base_row',
 'gz_base_custom_data' => 'custom',
 ]
 );
}
 
/**
 * register our gz_base_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'gz_base_settings_init' );
 
/**
 * custom option and settings:
 * callback functions
 */
 
// developers section cb
 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function gz_base_section_developers_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'gz_base' ); ?></p>
 <?php
}
 
// pill field cb
 
// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks. */
function gz_base_field_pill_cb( $args ) {
 // get the value of the setting we've registered with register_setting()
 $options = get_option( 'gz_base_options' );
 // output the field
 ?>
 <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
 data-custom="<?php echo esc_attr( $args['gz_base_custom_data'] ); ?>"
 name="gz_base_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
 >
 <option value="red" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'red', false ) ) : ( '' ); ?>>
 <?php esc_html_e( 'red pill', 'gz_base' ); ?>
 </option>
 <option value="blue" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'blue', false ) ) : ( '' ); ?>>
 <?php esc_html_e( 'blue pill', 'gz_base' ); ?>
 </option>
 </select>
 <p class="description">
 <?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'gz_base' ); ?>
 </p>
 <p class="description">
 <?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'gz_base' ); ?>
 </p>
 <?php
}
/**
 * top level menu
 */
function gz_base_options_page() {
 // add top level menu page
 add_menu_page(
 'Gbase',
 'Gbase Options',
 'manage_options',
 'g_base',
 'g_base_options_page_html'
 );
}
 
/**
 * register our g_base_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'gz_base_options_page' );
 
/**
 * top level menu:
 * callback functions
 */
function g_base_options_page_html() {
 // check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 return;
 }
 
 // add error/update messages
 
 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
 if ( isset( $_GET['settings-updated'] ) ) {
 // add settings saved message with the class of "updated"
 add_settings_error( 'g_base_messages', 'g_base_message', __( 'Settings Saved', 'g_base' ), 'updated' );
 }
 
 // show error/update messages
 settings_errors( 'g_base_messages' );
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 <form action="options.php" method="post">
 <?php
 // output security fields for the registered setting "g_base"
 settings_fields( 'g_base' );
 // output setting sections and their fields
 // (sections are registered for "g_base", each field is registered to a specific section)
 do_settings_sections( 'g_base' );
 // output save settings button
 submit_button( 'Save Settings' );
 ?>
 </form>
 </div>
 <?php
}

