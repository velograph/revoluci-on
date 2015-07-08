<?php

class PeThemeThread extends PeThemeController {

	public $preview = array();

	public function __construct() {

		// custom post types
		add_action("pe_theme_custom_post_type",array(&$this,"pe_theme_custom_post_type"));

		// wp_head stuff
		add_action("pe_theme_wp_head",array(&$this,"pe_theme_wp_head"));

		// google fonts
		add_filter("pe_theme_font_variants",array(&$this,"pe_theme_font_variants_filter"),10,2);

		// menu
		add_filter("wp_nav_menu_objects",array(&$this,"wp_nav_menu_objects_filter"),10,2);
		add_filter("pe_theme_menu_item_after",array(&$this,"pe_theme_menu_item_after_filter"),10,3);

		// custom menu fields
		add_filter("pe_theme_menu_custom_fields",array(&$this,"pe_theme_menu_custom_fields_filter"),10,3);

		// social links
		add_filter("pe_theme_social_icons",array(&$this,"pe_theme_social_icons_filter"));
		add_filter("pe_theme_content_get_social_link",array(&$this,"pe_theme_content_get_social_link_filter"),10,4);

		// comment submit button class
		add_filter("pe_theme_comment_submit_class",array(&$this,"pe_theme_comment_submit_class_filter"));

		// use prio 30 so gets executed after standard theme filter
		add_filter("the_content_more_link",array(&$this,"the_content_more_link_filter"),30);

		// remove junk from project screen
		add_action('pe_theme_metabox_config_project',array(&$this,'pe_theme_thread_metabox_config_project'),200);

		// add featured image to testimonial
		add_action('init',array(&$this,'pe_theme_thread_testimonial_supports'),200);

		// shortcodes
		add_filter("pe_theme_shortcode_columns_mapping",array(&$this,"pe_theme_shortcode_columns_mapping_filter"));
		add_filter("pe_theme_shortcode_columns_options",array(&$this,"pe_theme_shortcode_columns_options_filter"));
		add_filter("pe_theme_shortcode_columns_container",array(&$this,"pe_theme_shortcode_columns_container_filter"),10,2);

		// portfolio
		add_filter("pe_theme_filter_item",array(&$this,"pe_theme_project_filter_item_filter"),10,4);

		// remove staff meta
		add_action('pe_theme_metabox_config_staff',array(&$this,'pe_theme_metabox_config_staff_action'),11);

		// alter services meta
		add_action('pe_theme_metabox_config_service',array(&$this,'pe_theme_metabox_config_service_action'),11);

		// custom meta for gallery images
		add_filter( 'pe_theme_gallery_image_fields', array( $this, 'pe_theme_gallery_image_fields_filter' ) );

		// custom homepage meta js
		add_action( 'admin_enqueue_scripts', array( $this, 'pe_theme_thread_custom_meta_js' ) );

		// font awesome admin picker
		add_action( 'admin_enqueue_scripts', array( $this, 'pe_theme_font_awesome_icons' ) );

		// custom video metabox
		add_action('pe_theme_metabox_config_video',array(&$this,'pe_theme_metabox_config_video'),99);

		// builder
		add_filter('pe_theme_view_layout_open',array(&$this,'pe_theme_view_layout_no_parent'));
		add_filter('pe_theme_view_layout_close',array(&$this,'pe_theme_view_layout_no_parent'));
		add_filter('pe_theme_layoutmodule_open',array(&$this,'pe_theme_view_layout_no_parent'));
		add_filter('pe_theme_layoutmodule_close',array(&$this,'pe_theme_view_layout_no_parent'));

	}

	public function pe_theme_view_layout_no_parent($markup) {
		return "";
	}

	public function pe_theme_thread_custom_meta_js() {

		PeThemeAsset::addScript("js/thread-homepage-meta.js",array('jquery'),"pe_theme_thread_homepage_meta");

		$screen = get_current_screen();

		if ( is_admin() && ( 'page' === $screen->post_type || 'post' === $screen->post_type ) ) {
			wp_enqueue_script("pe_theme_thread_homepage_meta");
		}

	}

	public function pe_theme_font_awesome_icons() {

		PeThemeAsset::addStyle("css/icons.css",array(),"pe_theme_outlined_iconset_css");

		$screen = get_current_screen();

		if ( is_admin() && ( 'page' === $screen->post_type || 'post' === $screen->post_type || 'project' === $screen->post_type ) ) {
			wp_enqueue_style("pe_theme_outlined_iconset_css");
		}

	}

	public function the_content_more_link_filter($link) {
		return sprintf('<a class="read-more-link" href="%s">%s</a>',get_permalink(),__("Continue Reading..",'Pixelentity Theme/Plugin'));
	}

	public function pe_theme_project_filter_item_filter( $html, $aclass, $slug, $name ) {
		return sprintf( '<li data-category="%s"><div class="%s btn">%s</div></li>', '' === $slug ? '*' : "filter-$slug", '' === $slug ? 'active' : '', $name );
	}

	public function pe_theme_wp_head() {
		$this->font->apply();
		$this->color->apply();

		// custom CSS field
		if ($customCSS = $this->options->get("customCSS")) {
			printf('<style type="text/css">%s</style>',stripslashes($customCSS));
		}

		// custom JS field
		if ($customJS = $this->options->get("customJS")) {
			printf('<script type="text/javascript">%s</script>',stripslashes($customJS));
		}

	}

	public function pe_theme_font_variants_filter($variants,$font) {
		if ($font === "Open Sans") {
			$variants="$font:400italic,300,400,700,800,100";
		}
		else if ($font === "Lato") {
			$variants="$font:300,400,700";
		}
		else if ($font === "Montserrat") {
			$variants="$font:400,700,400italic,700italic";
		}
		else if ($font === "Volkhov") {
			$variants="$font:400italic,700italic,400,700";
		}
		else if ($font === "Roboto") {
			$variants="$font:400,300,700,400italic,700italic,300italic,100";
		}
		else if ($font === "Cardo") {
			$variants="$font:400,700,400italic,700italic";
		}
		else if ($font === "Pathway Gothic One") {
			$variants="$font:400,700,400italic,700italic";
		}

		return $variants;
	}

	public function wp_nav_menu_objects_filter($items,$args) {
		return $items;
	}

	public function pe_theme_menu_custom_fields_filter($options,$depth = false,$item = false) {

		if (!empty($item->object) && $item->object != "page") {
			// if menu item is not a page, no custom option
			return $options;
		}

		$options =
			array(
				  "name" => 
				  array(
						"label"=>__("Section",'Pixelentity Theme/Plugin'),
						"type"=>"Text",
						"description" => __("Optional section link name.",'Pixelentity Theme/Plugin'),
						"default"=> ""
						)
				  );

	
		return $options;

	}

	public function pe_theme_menu_item_after_filter($after,$item,$depth) {
		if ($item->object == 'page' && !empty($item->pe_meta->name)) {
			$section = strtr($item->pe_meta->name,array('#' => ''));
			$item->url .= "#section-$section";
		}
		return $after;
	}

	public function pe_theme_social_icons_filter($icons = null) {
		return 
			array(
				  // label => icon | tooltip text
				__("Blogger",'Pixelentity Theme/Plugin') => "social_blogger|Blogger",
				__("Delicious",'Pixelentity Theme/Plugin') => "social_delicious|Delicious",
				__("deviantART",'Pixelentity Theme/Plugin') => "social_deviantart|deviantART",
				__("Dribbble",'Pixelentity Theme/Plugin') => "social_dribbble|Dribbble",
				__("Facebook",'Pixelentity Theme/Plugin') => "social_facebook|Facebook",
				__("Flickr",'Pixelentity Theme/Plugin') => "social_flickr|Flickr",
				__("Google+",'Pixelentity Theme/Plugin') => "social_googleplus|Google+",
				__("GoogleDrive",'Pixelentity Theme/Plugin') => "social_googledrive|GoogleDrive",
				__("Instagram",'Pixelentity Theme/Plugin') => "social_instagram|Instagram",
				__("LinkedIn",'Pixelentity Theme/Plugin') => "social_linkedin|LinkedIn",
				__("MySpace",'Pixelentity Theme/Plugin') => "social_myspace|MySpace",
				__("Picassa",'Pixelentity Theme/Plugin') => "social_picassa|Picassa",
				__("Pinterest",'Pixelentity Theme/Plugin') => "social_pinterest|Pinterest",
				__("Rss",'Pixelentity Theme/Plugin') => "social_rss|Rss",
				__("Share",'Pixelentity Theme/Plugin') => "social_share|Share",
				__("Skype",'Pixelentity Theme/Plugin') => "social_skype|Skype",
				__("Spotify",'Pixelentity Theme/Plugin') => "social_spotify|Spotify",
				__("StumbleUpon",'Pixelentity Theme/Plugin') => "social_tumbleupon|StumbleUpon",
				__("Tumblr",'Pixelentity Theme/Plugin') => "social_tumblr|Tumblr",
				__("Twitter",'Pixelentity Theme/Plugin') => "social_twitter|Twitter",
				__("Vimeo",'Pixelentity Theme/Plugin') => "social_vimeo|Vimeo",
				__("WordPress",'Pixelentity Theme/Plugin') => "social_wordpress|WordPress",
				__("YouTube",'Pixelentity Theme/Plugin') => "social_youtube|YouTube",
				  );
	}

	public function pe_theme_content_get_social_link_filter($html,$link,$tooltip,$icon) {
		return sprintf('<li><a href="%s" target="_blank" title="%s"><i class="%s"></i></a></li>',$link,$tooltip,$icon);
	}

	public function pe_theme_comment_submit_class_filter() {
		return "contour-btn red";
	}

	public function init() {
		parent::init();

		if (PE_THEME_PLUGIN_MODE) {
			return;
		}
		
		if ($this->options->get("retina") === "yes") {
			add_filter("pe_theme_resized_img",array(&$this,"pe_theme_resized_retina_filter"),10,5);
		} else if ($this->options->get("lazyImages") === "yes") {
			add_filter("pe_theme_resized_img",array(&$this,"pe_theme_resized_img_filter"),10,4);
		}
	}

	public function pe_theme_custom_post_type() {
		$this->gallery->cpt();
		$this->video->cpt();
		$this->project->cpt();
		//$this->ptable->cpt();
		//$this->staff->cpt();
		//$this->service->cpt();
		//$this->testimonial->cpt();
		//$this->logo->cpt();
		//$this->slide->cpt();
		//$this->view->cpt();

	}

	public function pe_theme_shortcode_columns_mapping_filter($array) {
			return array(
				'1/1' => 'large-12 columns',
				"1/3" => "large-4 columns",
				"1/2" => "large-6 columns",
				"1/4" => "large-3 columns",
				"2/3" => "large-9 columns",
				"1/6" => "large-2 columns",
				"last" => 'end',
			);
		}

	public function pe_theme_shortcode_columns_options_filter($array) {
		unset($array['2 Column layouts']['5/6 1/6']);
		unset($array['2 Column layouts']['1/6 5/6']);
		unset($array['2 Column layouts']['1/4 3/4']);
		unset($array['2 Column layouts']['3/4 1/4']);
		unset($array['3 Column layouts']['1/4 1/4 2/4']);
		unset($array['3 Column layouts']['2/4 1/4 1/4']);

		$single['Single column layout']['1/1'] = '1/1';

		$array = 
			array_merge(
						$single,
						$array
						);
		//unset($array['4 Column layouts']);
		//unset($array['6 Column layouts']);

		return $array;
	}

	public function pe_theme_shortcode_columns_container_filter( $template, $content ) {

		return sprintf('<div class="row">%s</div>',$content);

	}


	public function boot() {
		parent::boot();

		
		PeGlobal::$config["content-width"] = 990;
		PeGlobal::$config["post-formats"] = array("video","gallery");
		PeGlobal::$config["post-formats-project"] = array("video","gallery");

		PeGlobal::$config["image-sizes"]["thumbnail"] = array(120,90,true);
		PeGlobal::$config["image-sizes"]["post-thumbnail"] = array(260,200,false);
		

		// blog layouts
		PeGlobal::$config["blog"] =
			array(
				  __("Default",'Pixelentity Theme/Plugin') => "",
				  __("Search",'Pixelentity Theme/Plugin') => "search",
				  __("Alternate",'Pixelentity Theme/Plugin') => "project"
				  );

		PeGlobal::$config["shortcodes"] = 
			array(
				  //"BS_Badge",
				  //"BS_Label",
				  //"BS_Button",
				  //"ThreadNumber",
				  "ThreadButton",
				  //"ThreadIcon",
				  //"ThreadService",
				  //"ThreadNewsletter",
				  "BS_Columns",
				  "BS_Video"
				  );

		PeGlobal::$config["views"] = 
			array(
				"LayoutModuleThreadAbout",
				"LayoutModuleThreadBlog",
				"LayoutModuleThreadBlogAlternate",
				"LayoutModuleThreadColumns",
				"LayoutModuleThreadFeature",
				"LayoutModuleThreadPortfolio",
				"LayoutModuleThreadPricingTable",
				"LayoutModuleThreadPricingTables",
				"LayoutModuleThreadLogos",
				"LayoutModuleThreadLogo",
				"LayoutModuleThreadPhase",
				"LayoutModuleThreadProcess",
				"LayoutModuleThreadQuote",
				"LayoutModuleThreadServices",
				"LayoutModuleThreadService",
				"LayoutModuleThreadStaff",
				"LayoutModuleThreadStats",
				"LayoutModuleThreadTestimonial",
				"LayoutModuleThreadTestimonials",
				"LayoutModuleThreadText",
				);

		PeGlobal::$config["sidebars"] =
			array(
				  "default" => __("Default post/page",'Pixelentity Theme/Plugin'),
				  //"footer" => __("Footer Widgets",'Pixelentity Theme/Plugin')
				  );

		PeGlobal::$config["colors"] = array(
			"color1" => array(
				"label"     => __("Primary Color",'Pixelentity Theme/Plugin'),
				"selectors" => array(
					".page-title h6" => "color",
					".line .icon" => "color",
					".date" => "color",
					".stat .icon" => "color",
					".widget a:hover" => "color",
					".pe-wp-default a" => "color",
					"a:hover" => "color",
					".tags a:hover" => "color",

					".highlight-bg" => "background-color",
					".page-title .line" => "background-color",

					".post.sticky h2 a" => "border-color",
					"blockquote" => "border-color",
				),
				"default" => "#B6A591",
			),
		);
		

		PeGlobal::$config["fonts"] = array(
			"fontPrimary" => array(
				"label"     => __("Primary Font",'Pixelentity Theme/Plugin'),
				"selectors" => array(
					"body",
					".price .terms",
					"#contact-form input",
					".tags a",
					".comment-meta",
					".fn",
					".tagcloud a",
					"#wp-calendar",
				),
				"default" => "Cardo",
			),
			"fontSecondary" => array(
				"label"     => __("Secondary Font",'Pixelentity Theme/Plugin'),
				"selectors" => array(
					".alt-h",
					"#thenavigation .menu li",
					".price",
					".filters li .btn",
					".freelance-theme h1",
					".freelance-theme h2",
					".freelance-theme h3",
					".freelance-theme h4",
					".freelance-theme h5",
					".freelance-theme h6",
				),
				"default" => "Montserrat",
			),
			"fontHeadings" => array(
				"label"     => __("Headings Font",'Pixelentity Theme/Plugin'),
				"selectors" => array(
					"h1",
					"h2",
					"h3",
					"h4",
					"h5",
					"h6",
				),
				"default" => "Pathway Gothic One",
			),
		);		

		$options = array();

		$galleries = $this->gallery->option();

		$none = array( __("None",'Pixelentity Theme/Plugin') => '-1' );

		$galleries = array_merge( $none, $galleries );

		$options = array_merge( $options, array(
			"import_demo" => $this->defaultOptions["import_demo"],
			"logo" => array(
				"label"       => __("Logo",'Pixelentity Theme/Plugin'),
				"type"        => "Upload",
				"section"     => __("General",'Pixelentity Theme/Plugin'),
				"description" => __("This is the main site logo image. The image should be a .png file.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"siteTitle" => array(
				"wpml"        => true,
				"label"       => __("Header Title",'Pixelentity Theme/Plugin'),
				"type"        => "Text",
				"section"     => __("General",'Pixelentity Theme/Plugin'),
				"description" => __("Used if logo is left empty.",'Pixelentity Theme/Plugin'),
				"default"     => "Thread",
			),
			"favicon" => array(
				"label"       => __("Favicon",'Pixelentity Theme/Plugin'),
				"type"        => "Upload",
				"section"     => __("General",'Pixelentity Theme/Plugin'),
				"description" => __("This is the favicon for your site. The image can be a .jpg, .ico or .png with dimensions of 16x16px ",'Pixelentity Theme/Plugin'),
				"default"     => PE_THEME_URL."/favicon.png",
			),
			"customCSS" => $this->defaultOptions["customCSS"],
			"customJS"  => $this->defaultOptions["customJS"],
			"colors"    => array(
				"label"       => __("Custom Colors",'Pixelentity Theme/Plugin'),
				"type"        => "Help",
				"section"     => __("Colors",'Pixelentity Theme/Plugin'),
				"description" => __("In this page you can set alternative colors for the main colored elements in this theme. One color options has been provided. To change the color used on these elements simply write a new hex color reference number into the fields below or use the color picker which appears when each field obtains focus. Once you have selected your desired colors make sure to save them by clicking the <b>Save All Changes</b> button at the bottom of the page. Then just refresh your page to see the changes.<br/><br/><b>Please Note:</b> Some of the elements in this theme are made from images (Eg. Icons) and these items may have a color. It is not possible to change these elements via this page, instead such elements will need to be changed manually by opening the images/icons in an image editing program and manually changing their colors to match your theme's custom color scheme. <br/><br/>To return all colors to their default values at any time just hit the <b>Restore Default</b> link beneath each field.",'Pixelentity Theme/Plugin'),
			),
			"googleFonts" => array(
				"label"       => __("Custom Fonts",'Pixelentity Theme/Plugin'),
				"type"        => "Help",
				"section"     => __("Fonts",'Pixelentity Theme/Plugin'),
				"description" => __("In this page you can set the typefaces to be used throughout the theme. For each elements listed below you can choose any front from the Google Web Font library. Once you have chosen a font from the list, you will see a preview of this font immediately beneath the list box. The icons on the right hand side of the font preview, indicate what weights are available for that typeface.<br/><br/><strong>R</strong> -- Regular,<br/><strong>B</strong> -- Bold,<br/><strong>I</strong> -- Italics,<br/><strong>BI</strong> -- Bold Italics<br/><br/>When decideing what font to use, ensure that the chosen font contains the font weight required by the element. For example, main headings are bold, so you need to select a new font for these elements which supports a bold font weight. If you select a font which does not have a bold icon, the font will not be applied. <br/><br/>Browse the online <a href='http://www.google.com/webfonts'>Google Font Library</a><br/><br/><b>Custom fonts</b> (Advanced Users):<br/> Other then those available from Google fonts, custom fonts may also be applied to the elements listed below. To do this an additional field is provided below the google fonts list. Here you may enter the details of a font family, size, line-height etc. for a custom font. This information is entered in the form of the shorthand 'font:' CSS declaration, for example:<br/><br/><b>bold italic small-caps 1em/1.5em arial,sans-serif</b><br/><br/>If a font is specified in this field then the font listed in the Google font drop menu above will not be applied to the element in question. If you wish to use the Google font specified in the drop down list and just specify a new font size or line height, you can do so in this field also, however the name of the Google font <b>MUST</b> also be entered into this field. You may need to visit the Google fonts web page to find the exact CSS name for the font you have chosen.",'Pixelentity Theme/Plugin'),
			),
			"contactEmail" => $this->defaultOptions["contactEmail"],
			"contactSubject" => $this->defaultOptions["contactSubject"],
			"msgOK" => array(
				"wpml"        => true,
				"label"       => __("Mail Sent Message",'Pixelentity Theme/Plugin'),
				"type"        => "TextArea",
				"section"     => __("Contact Form",'Pixelentity Theme/Plugin'),
				"description" => __("Message shown when form message has been sent without errors",'Pixelentity Theme/Plugin'),
				"default"     => '<strong>Yay!</strong> Message sent.',
			),
			"msgKO" => array(
				"wpml"        => true,
				"label"       => __("Form Error Message",'Pixelentity Theme/Plugin'),
				"type"        => "TextArea",
				"section"     => __("Contact Form",'Pixelentity Theme/Plugin'),
				"description" => __("Message shown when form message encountered errors",'Pixelentity Theme/Plugin'),
				"default"     => '<strong>Error!</strong> Please validate your fields.',
			),
			"footerBackground" => array(
				"label"       => __("Background image",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Upload",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("Image displayed in background of the footer.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"footerAddress" => array(
				"label"       => __("Address",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Text",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("Address displayed in footer.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"footerAddressLink" => array(
				"label"       => __("Address link",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Text",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("Link on Address displayed in footer.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"footerEmail" => array(
				"label"       => __("Email",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Text",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("E-mail address displayed in footer.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"footerEmailLink" => array(
				"label"       => __("Email link",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Text",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("Link onE-mail address displayed in footer.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"footerPhone" => array(
				"label"       => __("Phone number",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Text",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("Phone number displayed in footer.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"footerPhoneLink" => array(
				"label"       => __("Phone number link",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Text",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("Link on Phone number displayed in footer.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"footerSocialLinks" => array(
				"label"        => __("Social Profile Links",'Pixelentity Theme/Plugin'),
				"type"         => "Items",
				"section"      => __("Footer",'Pixelentity Theme/Plugin'),
				"description"  => __("Add one or more links to social networks.",'Pixelentity Theme/Plugin'),
				"button_label" => __("Add Social Link",'Pixelentity Theme/Plugin'),
				"sortable"     => true,
				"auto"         => __("Social Network Name",'Pixelentity Theme/Plugin'),
				"unique"       => false,
				"editable"     => false,
				"legend"       => false,
				"fields"       => array(
					array(
						"label"   => __("Social Network",'Pixelentity Theme/Plugin'),
						"name"    => "name",
						"type"    => "text",
						"width"   => 185,
						"default" => __("Social Network Name",'Pixelentity Theme/Plugin'),
					),
					array(
						"name"    => "url",
						"type"    => "text",
						"width"   => 300, 
						"default" => "#",
					),
				),
				"default" => "",
			),
			"footerCopyright" => array(
				"label"       => __("Copyright",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "TextArea",
				"section"     => __("Footer",'Pixelentity Theme/Plugin'),
				"description" => __("This is the footer copyright message.",'Pixelentity Theme/Plugin'),
				"default"     => '&copy; 2014 Thread One Page',
			),
			"blogHeaderBg" => array(
				"label"       => __("Header image",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Upload",
				"section"     => __("Blog",'Pixelentity Theme/Plugin'),
				"description" => __("Image displayed on top of the blog posts.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"blogHeaderTitle" => array(
				"label"       => __("Header title",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Text",
				"section"     => __("Blog",'Pixelentity Theme/Plugin'),
				"description" => __("Title displayed on top of the header.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
			"blogHeaderSubtitle" => array(
				"label"       => __("Header subtitle",'Pixelentity Theme/Plugin'),
				"wpml"        =>  true,
				"type"        => "Text",
				"section"     => __("Blog",'Pixelentity Theme/Plugin'),
				"description" => __("Subtitle displayed on top of the header.",'Pixelentity Theme/Plugin'),
				"default"     => '',
			),
		));

		foreach( PeGlobal::$const->gmap->metabox["content"] as $key => $value ) {

			PeGlobal::$const->gmap->metabox["content"][ $key ]["section"] = __("Footer",'Pixelentity Theme/Plugin');

		}

		unset( PeGlobal::$const->gmap->metabox["content"]["title"] );
		unset( PeGlobal::$const->gmap->metabox["content"]["description"] );
		
		//$options = array_merge($options, PeGlobal::$const->gmap->metabox["content"]);

		$options = array_merge($options,$this->font->options());
		$options = array_merge($options,$this->color->options());

		//$options["retina"] =& $this->defaultOptions["retina"];
		//$options["lazyImages"] =& $this->defaultOptions["lazyImages"];
		$options["minifyJS"] =& $this->defaultOptions["minifyJS"];
		$options["minifyCSS"] =& $this->defaultOptions["minifyCSS"];

		$options["minifyJS"]['default'] = 'yes';

		$options["adminThumbs"] =& $this->defaultOptions["adminThumbs"];
		if (!empty($this->defaultOptions["mediaQuick"])) {
			$options["mediaQuick"] =& $this->defaultOptions["mediaQuick"];
			$options["mediaQuickDefault"] =& $this->defaultOptions["mediaQuickDefault"];
		}

		$options["adminLogo"] =& $this->defaultOptions["adminLogo"];
		$options["adminUrl"] =& $this->defaultOptions["adminUrl"];

		
		
		PeGlobal::$config["options"] = apply_filters("pe_theme_options",$options);

	}

	public function splash() {

		$splash = array(
			'type'     => '',
			'title'    => __( 'Splash' ,'Pixelentity Theme/Plugin'),
			'priority' => 'core',
			'where'    => array(
				'post' => 'all',
			),
			'content' => array(),
		);

		$splash['content']['splash'] = array(
			'label'       => __( 'Splash section' ,'Pixelentity Theme/Plugin'),
			'type'        => 'RadioUI',
			'description' => __( 'Specify whether you want the splash section on top of this page or not.' ,'Pixelentity Theme/Plugin'),
			'options'     => array(
				__( 'Off' ,'Pixelentity Theme/Plugin') => 'off',
				__( 'On' ,'Pixelentity Theme/Plugin')  => 'on',
			),
			'default' => 'off',
		);

		$splash['content']['type'] = array(
			"label"       => __("Splash type",'Pixelentity Theme/Plugin'),
			"type"        => "RadioUI",
			"description" => __("Should the url be opened in new window?",'Pixelentity Theme/Plugin'),
			"options"     => array(
				__("Fullscreen",'Pixelentity Theme/Plugin') => "fullscreen",
				__("Fixed",'Pixelentity Theme/Plugin')      => "fixed",
			),
			"default"     => "fullscreen",
		);

		$splash['content']['gallery'] = array(
			'label'       => __( 'Gallery' ,'Pixelentity Theme/Plugin'),
			'type'        => 'Select',
			'description' => __( 'Gallery used for splash area. Captions can be added when editing that gallery.' ,'Pixelentity Theme/Plugin'),
			'options'     => $this->gallery->option(),
			'default'     => '',
		);

		$splash['content']['headlines_type'] = array(
			"label"       => __("Headlines type",'Pixelentity Theme/Plugin'),
			"type"        => "RadioUI",
			"description" => __("Should the url be opened in new window?",'Pixelentity Theme/Plugin'),
			"options"     => array(
				__("Simple",'Pixelentity Theme/Plugin')   => "simple",
				__("Detailed",'Pixelentity Theme/Plugin') => "detailed",
			),
			"default"     => "simple",
		);

		return $splash;
	}


	public function pe_theme_metabox_config_video() {
		unset( PeGlobal::$config["metaboxes-video"]['video']['content']['fullscreen'] );
		unset( PeGlobal::$config["metaboxes-video"]['video']['content']['width'] );
	}

	public function pe_theme_metabox_config_post() {
		parent::pe_theme_metabox_config_post();

		unset( PeGlobal::$config["metaboxes-post"]['gallery']['content']['type'] );

	}

	public function pe_theme_metabox_config_page() {
		parent::pe_theme_metabox_config_page();

		$builder = isset(PeGlobal::$config["metaboxes-page"]["builder"]) ? PeGlobal::$config["metaboxes-page"]["builder"] : false;
		$builder = $builder ? array("builder"=> $builder) : array();

		if (PE_THEME_MODE && $builder) {
			// top level builder element can only member of the "section" group
			$builder["builder"]["content"]["builder"]["allowed"] = "section";
		}

		$defaultInfo = '<h2>Contact us.</h2><p>Want to make your website awesome? Just get in touch we don\'t bite.</p>';

		PeGlobal::$config["metaboxes-page"] = array_merge(
			$builder,
			array(
				'splash'         => $this->splash(),
			)
		);		
	}

	public function pe_theme_metabox_config_project() {
		parent::pe_theme_metabox_config_project();

		$galleryMbox = array(
			"title"    => __("Slider",'Pixelentity Theme/Plugin'),
			"type"     => "GalleryPost",
			"priority" => "core",
			"where"    => array(
				"post" => "gallery"
			),
			"content" => array(
				"id" => PeGlobal::$const->gallery->id,
			),
		);

		PeGlobal::$config["metaboxes-project"] =  array(
			"gallery" => $galleryMbox,
			"video"   => PeGlobal::$const->video->metaboxPost,
		);

	}

	public function pe_theme_thread_testimonial_supports() {

		//add_post_type_support( 'service', 'thumbnail' );
		//add_post_type_support( 'testimonial', 'thumbnail' );

	}

	public function pe_theme_thread_metabox_config_project() {

		unset( PeGlobal::$config["metaboxes-project"]['portfolio'] );
		unset( PeGlobal::$config["metaboxes-project"]['info'] );

	}

	public function pe_theme_metabox_config_staff_action() {

		

	}

	public function pe_theme_metabox_config_service_action() {

		

	}

	public function pe_theme_gallery_image_fields_filter( $fields ) {

		unset( $fields['video'] );

		$link = $fields['link'];
		$save = $fields['save'];
		$ititle = $fields['ititle'];
		$caption = $fields['caption'];

		unset( $fields['link'] );
		unset( $fields['save'] );
		unset( $fields['ititle'] );
		unset( $fields['caption'] );

		$caption['type'] = 'TextArea';

		$fields['subtitle_left'] = array(
			"label"=>__("Left subtitle",'Pixelentity Theme/Plugin'),
			"type"=>"Text",
			"section"=>"main",
			"description" => __("Left subtitle of the slide (used only in splash).",'Pixelentity Theme/Plugin'),
			"default"=> ""
		);

		$fields['subtitle_right'] = array(
			"label"=>__("Right subtitle",'Pixelentity Theme/Plugin'),
			"type"=>"Text",
			"section"=>"main",
			"description" => __("Right subtitle of the slide (used only in splash).",'Pixelentity Theme/Plugin'),
			"default"=> ""
		);

		$fields['ititle'] = $ititle;
		$fields['caption'] = $caption;

		$fields['logo'] = array(
			"label"=>__("Logo",'Pixelentity Theme/Plugin'),
			"type"=>"Upload",
			"section"=>"main",
			"description" => __("A small logo displayed on top of splash, has to be 100px wide.",'Pixelentity Theme/Plugin'),
			"default"=> ""
		);

		$fields['save'] = $save;

		return $fields;

	}

	protected function init_asset() {
		return new PeThemeThreadAsset($this);
	}

	

}