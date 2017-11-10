<?php

function wpcf7_current_action() {
	if ( isset( $_REQUEST['action'] ) && -1 != $_REQUEST['action'] ) {
		return $_REQUEST['action'];
	}

	if ( isset( $_REQUEST['action2'] ) && -1 != $_REQUEST['action2'] ) {
		return $_REQUEST['action2'];
	}

	return false;
}

function wpcf7_admin_has_edit_cap() {
	return current_user_can( 'wpcf7_edit_contact_forms' );
}

function wpcf7_add_tag_generator( $name, $title, $elm_id, $callback, $options = array() ) {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	return $tag_generator->add( $name, $title, $callback, $options );
}


function plugin_admin_init() {
     //All callbacks must be valid names of functions, even if provided functions are blank
     register_setting( 'option_group', 'option_name', 'sanitize_callback' );
     add_settings_section( 'section_id', 'section_title', 'section_callback', 'section_page_type' );
     add_settings_field( 'field_id', 'field_title', 'field_callback', 'section_page_type', 'section_id' );
}
add_action( 'admin_init', 'plugin_admin_init' );

function add_menus() {
     add_menu_page( 'menu_page_title', 'menu_title', 'menu_capability', 'menu_slug', 'menu_callback');
     add_submenu_page( 'menu_slug', 'submenu_page_title', 'submenu_title', 'submenu_capability', 'submenu_slug', 'submenu_callback' );
}
add_action( 'admin_menu', 'add_menus' );

function submenu_callback() {
     ?>
     <div class='wrap'>
          <h2>Settings</h2>
          <form method='post' action='options.php'>
          <?php 
               /* 'option_group' must match 'option_group' from register_setting call */
               settings_fields( 'option_group' );
               do_settings_sections( 'section_page_type' );
          ?>
               <p class='submit'>
                    <input name='submit' type='submit' id='submit' class='button-primary' value='<?php _e("Save Changes") ?>' />
               </p>
          </form>
     </div>
     <?php
}
