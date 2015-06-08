<?php
	/* 
	* Plugin Name: Enjoy apartments affiliate plugin
	* Plugin URI: http://enjoy-apartments.com/en/affiliates-enjoy-apartments.html
	* Description: The official Enjoy-Apartments.com affiliate plugin is a customizable plugin to add the Enjoy-Apartments Iframe or banner to your website.
	* Version: 1.0
	* Author: EnjoyApartments, Jasper Schiks
	* Author URI: http://www.enjoy-apartments.com
	*/
	add_action( 'admin_menu', 'EnjoyPlugin_add_admin_menu' );
	//add settings page to the wordpress dashbord
	add_action( 'admin_init', 'EnjoyPlugin_settings_init' );
	// menu settings
	function EnjoyPlugin_add_admin_menu(  ) {
		add_menu_page( 'Enjoyaffiliate', 'Enjoyaffiliate', 'manage_options', 'EnjoyPlugin', 'EnjoyPlugin_options_page' );
	}

	// what is shown in the menu
	function EnjoyPlugin_settings_init(  ) {
		register_setting( 'pluginPage', 'EnjoyPlugin_settings' );
		add_settings_section('EnjoyPlugin_pluginPage_section', __( 'Enjoy Affiliate Plugin', 'wordpress' ), 'EnjoyPlugin_settings_section_callback', 'pluginPage');
		add_settings_field( 'EnjoyPlugin_text_field_3', __( 'Username', 'wordpress' ), 'EnjoyPlugin_text_field_3_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
		add_settings_field( 'EnjoyPlugin_text_field_2', __( 'Password', 'wordpress' ),  'EnjoyPlugin_text_field_2_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
		add_settings_field( 'EnjoyPlugin_text_field_1', __( 'Domain', 'wordpress' ), 'EnjoyPlugin_text_field_1_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
		add_settings_field( 'EnjoyPlugin_text_field_4', __( 'Sqaure Width', 'wordpress' ), 'EnjoyPlugin_text_field_4_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
		add_settings_field( 'EnjoyPlugin_text_field_5', __( 'Sqaure Height', 'wordpress' ), 'EnjoyPlugin_text_field_5_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
		add_settings_field( 'EnjoyPlugin_select_field_0', __( ' Iframe Language', 'wordpress' ), 'EnjoyPlugin_select_field_0_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
		add_settings_section('EnjoyPlugin_pluginPage_section', __( 'Enjoy Affiliate Plugin', 'wordpress' ), 'EnjoyPlugin_settings_section_callback', 'pluginPage');
		add_settings_field( 'EnjoyPlugin_text_field_7', __( '', 'wordpress' ), 'EnjoyPlugin_text_field_7_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
		add_settings_field( 'EnjoyPlugin_text_field_6', __( 'AffiliateID', 'wordpress' ), 'EnjoyPlugin_text_field_6_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
		add_settings_field( 'EnjoyPlugin_select_field_1', __( ' Banner Language', 'wordpress' ), 'EnjoyPlugin_select_field_1_render', 'pluginPage', 'EnjoyPlugin_pluginPage_section' );
	}

	// Option page functions for the textboxes etc
	function EnjoyPlugin_text_field_1_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
		<input type='text' name='EnjoyPlugin_settings[EnjoyPlugin_text_field_1]' value='<?php  echo $options['EnjoyPlugin_text_field_1']; ?>'>
		<?php
	}

	
	function EnjoyPlugin_text_field_2_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
		<input type='text' name='EnjoyPlugin_settings[EnjoyPlugin_text_field_2]' value='<?php  echo $options['EnjoyPlugin_text_field_2']; ?>'>
		<?php
	}

	
	function EnjoyPlugin_text_field_3_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
		<input type='text' name='EnjoyPlugin_settings[EnjoyPlugin_text_field_3]' value='<?php  echo $options['EnjoyPlugin_text_field_3']; ?>'>
		<?php
	}

	
	function EnjoyPlugin_text_field_4_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$options['EnjoyPlugin_text_field_4'] = '320px';
		?>
	Need a specific width (e.g. 150px)? You can customise the width of your search box easily just fill in your pixel requirements. If you don't change this field, you will get default settings.<br>
		<input type='text' name='EnjoyPlugin_settings[EnjoyPlugin_text_field_4]' value='<?php  echo $options['EnjoyPlugin_text_field_4']; ?>'>
		<?php
	}

	
	function EnjoyPlugin_text_field_5_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$options['EnjoyPlugin_text_field_5'] = '200px';
		?>
	Need a specific height (e.g. 150px)? You can customise the height of your search box easily just fill in your pixel requirements. If you don't change this field, you will get default settings.<br>
		<input type='text' name='EnjoyPlugin_settings[EnjoyPlugin_text_field_5]' value='<?php  echo $options['EnjoyPlugin_text_field_5']; ?>'>
		<?php
	}

	
	function EnjoyPlugin_text_field_6_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
		<input type='text' name='EnjoyPlugin_settings[EnjoyPlugin_text_field_6]' value='<?php  echo $options['EnjoyPlugin_text_field_6']; ?>'>
		<?php
	}

	
	function EnjoyPlugin_text_field_7_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
			<br>
	<b>Banner Settings:</b>
		<?php
	}

	
	function EnjoyPlugin_select_field_0_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
		<select name='EnjoyPlugin_settings[EnjoyPlugin_select_field_0]'>
			<option value='en' <?php  selected( $options['EnjoyPlugin_select_field_0'], en ); ?>>English</option>
			<option value='es' <?php  selected( $options['EnjoyPlugin_select_field_0'], es ); ?>>Spanish</option>
			<option value='nl' <?php  selected( $options['EnjoyPlugin_select_field_0'], nl ); ?>>Dutch</option>
			<option value='de' <?php  selected( $options['EnjoyPlugin_select_field_0'], de ); ?>>German</option>
		</select>
	<?php
	}

	
	function EnjoyPlugin_select_field_1_render(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
		<select name='EnjoyPlugin_settings[EnjoyPlugin_select_field_1]'>
			<option value='en' <?php  selected( $options['EnjoyPlugin_select_field_1'], en ); ?>>English</option>
			<option value='es' <?php  selected( $options['EnjoyPlugin_select_field_1'], es ); ?>>Spanish</option>
			<option value='nl' <?php  selected( $options['EnjoyPlugin_select_field_1'], nl ); ?>>Dutch</option>
		</select>
	<?php
	}

	// function to make variables from the text fields
	// Included the Iframe function in this function because the variables were empty in the other function
	function Creating_Variablehorizontal(  ) {
		global $userName;
		global $passWord;
		global $domain;
		global $squarewidth;
		global $Sqaureheight;
		global $langCode;
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
	<?php
		$userName = $options['EnjoyPlugin_text_field_3'];
		$passWord = $options['EnjoyPlugin_text_field_2'];
		$domain = $options['EnjoyPlugin_text_field_1'];
		$langCode = $options['EnjoyPlugin_select_field_0'];
		?>
	<br>	
	 <iframe style="width:600px; height:120px;" src="http://enjoy-apartments.com/frame/finder_horiz.php?user=<?php  echo $userName     ?>&password=<?php  echo $passWord    ?>&domain=<?php  echo $domain    ?>&lang=<?php  echo $langCode    ?>" seamless></iframe> 
	<br>
	<?php
	}

	add_shortcode('enjoyiframehorizontal', 'Creating_Variablehorizontal');
	function Creating_Variablessquare(  ) {
		global $userName;
		global $passWord;
		global $domain;
		global $langCode;
		$options = get_option( 'EnjoyPlugin_settings' );
		?>
	<?php
		$userName = $options['EnjoyPlugin_text_field_3'];
		$passWord = $options['EnjoyPlugin_text_field_2'];
		$domain = $options['EnjoyPlugin_text_field_1'];
		$squarewidth = $options['EnjoyPlugin_text_field_4'];
		$squareheight = $options['EnjoyPlugin_text_field_5'];
		$langCode = $options['EnjoyPlugin_select_field_0'];
		?>
	<br>	
	 <iframe style="width:<?php  echo $squarewidth     ?>; height:<?php  echo $squareheight     ?>;" src="http://enjoy-apartments.com/frame/finder_square.php?user=<?php  echo $userName     ?>&password=<?php  echo $passWord    ?>&domain=<?php  echo $domain    ?>&lang=<?php  echo $langCode    ?>" seamless></iframe> 
	<br>
	<?php
	}

	add_shortcode('enjoyiframesquare', 'Creating_Variablessquare');
	//Banner functions to create shortcodes
	function Creating_Banner120x240(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy120x240$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner120x240', 'Creating_Banner120x240');
	function Creating_Banner120x2402(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy120x2402$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner120x240-2', 'Creating_Banner120x2402');
	function Creating_Banner120x600(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy120x600$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner120x600', 'Creating_Banner120x600');
	function Creating_Banner125x125(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy125x125$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner125x125', 'Creating_Banner180x125');
	function Creating_Banner180x150(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy180x150$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner180x150', 'Creating_Banner180x150');
	function Creating_Banner234x60(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy234x60$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner234x60', 'Creating_Banner234x60');
	function Creating_Banner336x280(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy336x280$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner336x280', 'Creating_Banner336x280');
	function Creating_Banner336x2802(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy336x2802$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner336x280-2', 'Creating_Banner336x2802');
	function Creating_Banner468x60(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy468x60$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner468x60', 'Creating_Banner468x60');
	function Creating_Banner728x90(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy728x90$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner728x90', 'Creating_Banner728x90');
	function Creating_Banner728x902(  ) {
		$options = get_option( 'EnjoyPlugin_settings' );
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
			<a href="http://enjoy-apartments.com/<?php  echo $Banner   ?>/?id=<?php  echo $affiliateID    ?>">
			<img border="0" alt="Enjoy-Apartments" src="<?php  echo("http://enjoy-apartments.com/affiliate-banners/enjoy728x902$Banner.png"); ?>">
			</a>
			<?php
	}

	add_shortcode('enjoybanner728x90-2', 'Creating_Banner728x902');
	// Options Menu
	function EnjoyPlugin_settings_section_callback(  ) {
		echo __( 'Please fill in your Iframe and/or banner details below', 'wordpress' );
	}

	// Options Menu
	function EnjoyPlugin_options_page(  ) {
		global $userName;
		global $passWord;
		global $domain;
		global $langCode;
		global $squarewidth;
		global $Sqaureheight;
		global $affiliateID;
		$options = get_option( 'EnjoyPlugin_settings' );
		$userName = $options['EnjoyPlugin_text_field_3'];
		$passWord = $options['EnjoyPlugin_text_field_2'];
		$domain = $options['EnjoyPlugin_text_field_1'];
		$squarewidth = $options['EnjoyPlugin_text_field_4'];
		$squareheight = $options['EnjoyPlugin_text_field_5'];
		$affiliateID = $options['EnjoyPlugin_text_field_6'];
		$langCode = $options['EnjoyPlugin_select_field_0'];
		$Banner = $options['EnjoyPlugin_select_field_1'];
		?>
		<form action='options.php' method='post'>
		<h2>EnjoyPlugin</h2>
	        <div class="updated" style="margin-left:1px;"><p><?php  _e( 'Customise your Enjoy Iframe/Banner below. '); ?></p></div> <br>
	<div>
	 <?php  $dir = plugin_dir_path( $file ); ?> 
			<div style="float: left; background: url(&quot;<?php  echo plugins_url( '/sand.jpg' , __FILE__ ); ?>&quot;) repeat-y scroll 60% 0px transparent;width:100%">
	        <div style ="float:left;width:60%">
			<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?> 
		<h3>Add the [enjoyiframehorizontal] Shortcode to the page where you want to display your Iframe. </h3>
		<h3>Or add the [enjoyiframesquare] Shortcode to your page if you want to display a square Iframe.</h3>
			 <!-- Div below is here to display the banner -->
		 <div>
		 <!--Script/function to open window for banner shortcodes -->
	 <script type="text/javascript">
	function openWindow1()
	{
	var URL = "<?php  echo plugins_url( "Banners.php" , __FILE__ ); ?>";
	window.open(URL,"Banners","width=750,height=500,scrollbars=yes");
	}
	</script>
	<a onclick="openWindow1()" href="#"><h3>Click here to view all banners and there shortcodes</h3> </a>
	</div>
	</div>
	<div style="float:left;margin-left:2%;">
	<div style="position:fixed;">
	<h2>Example of your Iframe</h2>
	<?php
 // if statement to check if details are filled in to show an example
if (!empty($userName)) { ?>
	Square:<br><br>
	 <iframe style="width:<?php  echo $squarewidth     ?>; height:<?php  echo $squareheight     ?>;" src="http://enjoy-apartments.com/frame/finder_square.php?user=<?php  echo $userName     ?>&password=<?php  echo $passWord    ?>&domain=<?php  echo $domain    ?>&lang=<?php  echo $langCode    ?>" seamless></iframe> 
	 <br><br><br>
	 Horizontal:<br><br>
	 <iframe style="width:600px; height:120px;" src="http://enjoy-apartments.com/frame/finder_horiz.php?user=<?php  echo $userName     ?>&password=<?php  echo $passWord    ?>&domain=<?php  echo $domain    ?>&lang=<?php  echo $langCode    ?>" seamless></iframe> 
	<br><br>
	<?php
 } else { ?> <h4> Fill in your Iframe details to see an example </h4> <?php  } ?>
	<br>
	</div>
		</div>
		</div>
		</div>
		</form>
		</form>
	<?php
 } ?>