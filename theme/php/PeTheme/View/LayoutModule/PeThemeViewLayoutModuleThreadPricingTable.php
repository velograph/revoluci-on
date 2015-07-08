<?php

class PeThemeViewLayoutModuleThreadPricingTable extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Pricing Table",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				"plan" => array(
					"label"       => __("Plan",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Pricing plan title.",'Pixelentity Theme/Plugin'),
					"default"     => __("Beginner",'Pixelentity Theme/Plugin'),
				),
				"superscript" => array(
					"label"       => __("Superscript",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Displayed in smaller font, above the price.",'Pixelentity Theme/Plugin'),
					"default"     => __("$",'Pixelentity Theme/Plugin'),
				),
				"price" => array(
					"label"       => __("Price",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Plan price.",'Pixelentity Theme/Plugin'),
					"default"     => '29',
				),
				"subscript" => array(
					"label"       => __("Subscript",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Displayed in smaller font, below the price.",'Pixelentity Theme/Plugin'),
					"default"     => __("pm.",'Pixelentity Theme/Plugin'),
				),
				"features" => array(
					"label"        => __("Features",'Pixelentity Theme/Plugin'),
					"type"         => "Items",
					"description"  => __("Add one or more feature describing this plan.",'Pixelentity Theme/Plugin'),
					"button_label" => __("Add Feature",'Pixelentity Theme/Plugin'),
					"sortable"     => true,
					"auto"         => __("100 Unique Logins",'Pixelentity Theme/Plugin'),
					"unique"       => false,
					"editable"     => false,
					"legend"       => false,
					"fields"       => array(
						array(
							"label"   => "Text",
							"name"    => "text",
							"type"    => "text",
							"width"   => 500, 
							"default" => __("100 Unique Logins",'Pixelentity Theme/Plugin'),
						),
					),
				),
				"button_text" => array(
					"label"       => __("Button text",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Text of the button displayed at the bottom of the table.",'Pixelentity Theme/Plugin'),
					"default"     => __("Sign Up",'Pixelentity Theme/Plugin'),
				),
				"button_link" => array(
					"label"       => __("Button link",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Link of the button displayed at the bottom of the table.",'Pixelentity Theme/Plugin'),
					"default"     => '#',
				),
				"featured" => array(
					"label"       => __("Featured",'Pixelentity Theme/Plugin'),
					"type"        => "RadioUI",
					"description" => __("Should this table be featured.",'Pixelentity Theme/Plugin'),
					"options"     => array(
						__( 'Yes' ,'Pixelentity Theme/Plugin')   => 'yes',
						__( 'No' ,'Pixelentity Theme/Plugin')    => 'no',
					),
					"default"     => 'no',
				),
			);
		
	}

	public function name() {
		return __("Pricing Table",'Pixelentity Theme/Plugin');
	}

	public function group() {
		return "pricingtable";
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __("Use this block to add a new pricing table.",'Pixelentity Theme/Plugin');
	}

}

?>
