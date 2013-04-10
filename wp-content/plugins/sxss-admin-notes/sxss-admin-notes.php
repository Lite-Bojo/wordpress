<?php
/*
Plugin Name: sxss Admin Notes
Plugin URI: http://sxss.info
Description: Offers a text editor on the dashboard.
Author: sxss
Version: 1.2
*/

// I18n
load_plugin_textdomain('sxss_an', false, basename( dirname( __FILE__ ) ) . '/languages' );

// get notes
function sxss_an_get()
{
	$note = get_option('sxss_an');

	$note = html_entity_decode($note);

	$note = stripslashes($note);

	return $note;
}

// filter notes
function sxss_an_set()
{
	$sxss_an = $_POST['sxss_an'];

	$sxss_an = wp_filter_post_kses($sxss_an);
	
	update_option('sxss_an', $sxss_an);
	
	$sxss_an_update = time() + get_option('gmt_offset') * (60*60);
	
	$sxss_an_update = date("Y-m-d H:i", $sxss_an_update);

	$gmt_offset = get_option('gmt_offset');
	
	update_option('sxss_an_update', $sxss_an_update);

	return $sxss_an;
}

// init dashboard widget
function sxss_an_init_dashboard_widgets()
{
	$access = get_option('sxss_an_role');
	
	if( $access == "" ) $access = "administrator";
	
	if( true == current_user_can( $access ) )
	{
		global $wp_meta_boxes;

		wp_add_dashboard_widget('custom_help_widget', __('Admin Notes', 'sxss_an'), 'sxss_an_dashboard_widget');
	}
}

add_action('wp_dashboard_setup', 'sxss_an_init_dashboard_widgets');


function sxss_an_dashboard_widget() 
{
	// save admin notes
	if ($_POST['sxss_an_save'] == 'yes')
	{
		$sxss_an = sxss_an_set();
		
		$message = ' <span style="color: green;" class="fade"> <strong>' . __('saved', 'sxss_an') . '</strong></span>'; 
	} 
	
	// save options
	elseif ( $_POST['sxss_an_settings_save'] == 'yes' && true == current_user_can( 'administrator' ))
	{
		// save role
		$role = $_POST["sxss_an_role"];
		
		if( $role == "read" || 
			$role == "edit_posts" || 
			$role == "edit_published_posts" || 
			$role == "moderate_comments" || 
			$role == "activate_plugins" )
		{
			update_option('sxss_an_role', $role);
		}
		
		// save color
		if( true == preg_match('/^#[a-f0-9]{6}$/i', $_POST["sxss_an_bgcolor"]) )
		{
			update_option('sxss_an_bgcolor', $_POST["sxss_an_bgcolor"]);
		}
						
	} 

	// get informations
	$sxss_an = sxss_an_get();
	
	$sxss_an_update = get_option('sxss_an_update');
	
	$sxss_an_role = get_option('sxss_an_role');
	$checked[$sxss_an_role] = "selected";
	
	$sxss_an_bgcolor = get_option('sxss_an_bgcolor');
	if( $sxss_an_bgcolor == "" ) $sxss_an_bgcolor = "#FFFFFF";
	
	// if first time activated
	if( $sxss_an_update == "") $sxss_an = __('/* Save your admin notes right here */', 'sxss_an');

	echo '
	
	<script type="text/javascript">
		
		// save button
		jQuery(document).ready(function($) {$(".fade").fadeTo(5000,1).fadeOut(1000);});
		
		// settings form
		jQuery(document).ready(function() {
		
			jQuery("#sxss_an_settings_button").click(function() {
		
				jQuery("#sxss_an_settings_form").toggle(1000);
			
			});
		
		});
		
		// farbtastic
		jQuery(document).ready(function() {
    
			jQuery("#sxss_colorpicker").hide();
    
			jQuery("#sxss_colorpicker").farbtastic("#sxss_an_bgcolor");
    
			jQuery("#sxss_an_bgcolor").click(function(){jQuery("#sxss_colorpicker").slideToggle()});
		});
	
	</script>

	<div class="wrap">

		<form method="post" action="">

			<input type="hidden" name="sxss_an_save" value="yes" />

			<p><textarea style="padding: 6px; width: 100%; height: 150px; background-color: ' . $sxss_an_bgcolor . ';" id="sxss_an" name="sxss_an">'.$sxss_an.'</textarea></p>

			<div style="line-height: 18px; text-align: right; float: right; color: #C0C0C0;">
			
				' . __('Last saved', 'sxss_an') . ': ' . $sxss_an_update . '<br />
				
				<a style="color: #C0C0C0;" target="_blank" href="http://www.sxss.info">' . __('Admin Notes', 'sxss_an') . ' @ sxss.info</a>
				
			</div>
		
			<input type="submit" class="button-primary" value="' . __('Save notes', 'sxss_an') . '" /> <a id="sxss_an_settings_button" href="#" class="button">' . __('Settings', 'sxss_an') . '</a> '.$message.'<br style="clear: both;">

		</form>
		
		<form style="color: #8F8F8F; display: none;" id="sxss_an_settings_form" method="post" action="">
		
			<input type="hidden" name="sxss_an_settings_save" value="yes" />
		
			<p style="padding: 5px 0 5px; font-size: 14px; border-bottom: 1px solid #E1E1E1;">' . __('Settings', 'sxss_an') . '</p>
			
			<p>' . __('Who can see & edit the notes? ', 'sxss_an') . '
				
				<select name="sxss_an_role">
				
					<option value="read" ' . $checked["read"] . '>' . __('Subscriber', 'sxss_an') . '</option>
					<option value="edit_posts" ' . $checked["edit_posts"] . '>' . __('Contributer', 'sxss_an') . '</option>
					<option value="edit_published_posts" ' . $checked["edit_published_posts"] . '>' . __('Author', 'sxss_an') . '</option>
					<option value="moderate_comments" ' . $checked["moderate_comments"] . '>' . __('Editor', 'sxss_an') . '</option>
					<option value="activate_plugins" ' . $checked["activate_plugins"] . '>' . __('Administrator', 'sxss_an') . '</option>
					
				</select>
				
			</p>
			
			<p>' . __('Textbox background?', 'sxss_an') . ' <input id="sxss_an_bgcolor" name="sxss_an_bgcolor" type="text" value="' . $sxss_an_bgcolor . '"> </p>
			
			<div id="sxss_colorpicker"></div>
			
			<input type="submit" class="button-primary" value="' . __('Save settings', 'sxss_an') . '" />
			
		</form>
		
	</div>';
}

// colorpicker
function sxss_an_farbtastic()
{
	wp_enqueue_style( 'farbtastic' );

	wp_enqueue_script( 'farbtastic' );
}

add_action('init', 'sxss_an_farbtastic');


	

function sxss_an_register_meta_box() 
{
	add_meta_box('sxss_an_meta_box', __('sxss Admin Notes' , 'sxss_an'), 'sxss_an_meta_box', 'post', 'normal', 'high');
	add_meta_box('sxss_an_meta_box', __('sxss Admin Notes' , 'sxss_an'), 'sxss_an_meta_box', 'page', 'normal', 'high');
}

add_action('admin_menu', 'sxss_an_register_meta_box');


function sxss_an_meta_box() {

		$sxss_an = sxss_an_get();
		
		$sxss_an_update = get_option('sxss_an_update');

		echo '<p><textarea style="padding: 6px; width: 100%; height: 150px;" id="sxss_an" name="sxss_an">'.$sxss_an.'</textarea></p>
		
				<div style="line-height: 18px; text-align: left; float: left; color: #C0C0C0;">&nbsp;<br />' . __('Notice: read only!', 'sxss_an') . '</div>
				
				<div style="line-height: 18px; text-align: right; float: right; color: #C0C0C0;">
			
				' . __('Last saved', 'sxss_an') . ': ' . $sxss_an_update . '<br />
				
				<a style="color: #C0C0C0;" target="_blank" href="http://www.sxss.info">' . __('Admin Notes', 'sxss_an') . ' @ sxss.info</a></div><br style="clear: both;" />';

	}
?>