<?php
/**
 * Plugin Name: Kunal Test Plugin saving data.
 * Plugin URI: http://ikunal.in
 * Description: A brief description of the plugin.
 * Version: 0.1
 * Author: Kunal Gautam
 * Author URI: http://blog.ikunal.in
 */

// Uninstall hook
register_deactivation_hook( __FILE__, 'uninstall_kunal_test' ); 

function uninstall_kunal_test() {
	 delete_option( 'kunal_test_plugin_option' ); 
}


// Hook for adding admin menus
add_action('admin_menu', 'add_kunal_pages');

// action function for above hook
function add_kunal_pages() {
     add_menu_page( 'Kunal Test Plugin Settings Heading', 'Kunal Test Plugin Settings 1', 'manage_options', 'kunal-menu-slug', 'kunal_settings_page' );
  
}

// mt_settings_page() displays the page content for the Test settings submenu
function kunal_settings_page() {
   ?>
   <div class="wrap">
<h2>Your Plugin Page Title</h2>
<form method="post" action="">
	<label for="num_elements">
        url to save
    </label> 
     <?php 
     $get_option_value = get_option("kunal_test_plugin_option");
     ?>
    <input type="text" name="url" value="<?php echo $get_option_value; ?>"/>
	
	<?php submit_button(); ?>
</form>
</div>
   
   <?php
}



if (isset($_POST["url"])) {
   
   $url = esc_attr($_POST["url"]);   
update_option("kunal_test_plugin_option", $url);
   echo "<div id=\"message\" class=\"updated\">Settings saved</div>";
   
   
}



?>
