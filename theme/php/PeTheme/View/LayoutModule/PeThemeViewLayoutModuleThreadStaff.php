<?php

class PeThemeViewLayoutModuleThreadStaff extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Team Member",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				"name" => array(
					"label"       => __("Name",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Name of this team member.",'Pixelentity Theme/Plugin'),
					"default"     => 'John Doe',
				),
				"image" => array(
					"label"       => __("Image",'Pixelentity Theme/Plugin'),
					"type"        => "Upload",
					"description" => __("Team Member Image.",'Pixelentity Theme/Plugin'),
					"default"     => "",
				),
				"role" => array(
					"label"       => __("Role",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Name of this team member.",'Pixelentity Theme/Plugin'),
					"default"     => 'Product Manager',
				),
				"social" => array(
					"label"        => __("Social Profile Links",'Pixelentity Theme/Plugin'),
					"type"         => "Items",
					"description"  => __("Add one or more links to social networks.",'Pixelentity Theme/Plugin'),
					"button_label" => __("Add Social Link",'Pixelentity Theme/Plugin'),
					"sortable"     => true,
					"auto"         => __("Layer",'Pixelentity Theme/Plugin'),
					"unique"       => false,
					"editable"     => false,
					"legend"       => false,
					"fields"       => array(
						array(
							"label"   => __("Social Network",'Pixelentity Theme/Plugin'),
							"name"    => "icon",
							"type"    => "select",
							"options" => apply_filters('pe_theme_social_icons',array()),
							"width"   => 185,
							"default" => "",
						),
						array(
							"name"    => "url",
							"type"    => "text",
							"width"   => 300, 
							"default" => "#",
						),
					),
				),
			);
		
	}

	public function name() {
		return __("Team Member",'Pixelentity Theme/Plugin');
	}

	public function group() {
		return "staff";
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __("Use this block to add a new team member.",'Pixelentity Theme/Plugin');
	}

}

?>
