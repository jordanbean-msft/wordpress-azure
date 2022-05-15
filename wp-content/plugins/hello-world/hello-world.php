<?php
/**
 * Hello World
 *
 * @package     HelloWorld
 * @author      Jordan Bean
 * @copyright   2022 Jordan Bean
 * @license     MIT
 *
 * @wordpress-plugin
 * Plugin Name: Hello World
 * Plugin URI:  
 * Description: This plugin prints "Hello World" inside an admin page.
 * Version:     1.0.0
 * Author:      Jordan Bean
 * Author URI:  
 * Text Domain: hello-world
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */
 */


function helloworld_add_menu() {
	add_submenu_page("options-general.php", "helloworld Plugin", "helloworld Plugin", "manage_options", "helloworld-hello-world", "helloworld_hello_world_page");
}
add_action("admin_menu", "helloworld_add_menu");

function helloworld_hello_world_page()
{
?>
<div class="wrap">
	<h1>
		Hello World Plugin Template By <a
			href="https://helloworld.com/optimized-sharing-premium/" target="_blank">helloworld</a>
	</h1>
 
	<form method="post" action="options.php">
            <?php
	settings_fields("helloworld_hello_world_config");
	do_settings_sections("helloworld-hello-world");
	submit_button();
?>
         </form>
</div>
 
<?php
}
 
function helloworld_hello_world_settings() {
	add_settings_section("helloworld_hello_world_config", "", null, "helloworld-hello-world");
	add_settings_field("helloworld-hello-world-text", "This is sample Textbox", "helloworld_hello_world_options", "helloworld-hello-world", "helloworld_hello_world_config");
	register_setting("helloworld_hello_world_config", "helloworld-hello-world-text");
}
add_action("admin_init", "helloworld_hello_world_settings");
 
function helloworld_hello_world_options() {
?>
<div class="postbox" style="width: 65%; padding: 30px;">
	<input type="text" name="helloworld-hello-world-text"
		value="<?php
	echo stripslashes_deep(esc_attr(get_option('helloworld-hello-world-text'))); ?>" />
	Provide any text value here for testing<br />
</div>
<?php
}

add_filter('the_content', 'helloworld_com_content');
function helloworld_com_content($content) {
	return $content . stripslashes_deep(esc_attr(get_option('helloworld-hello-world-text')));
}