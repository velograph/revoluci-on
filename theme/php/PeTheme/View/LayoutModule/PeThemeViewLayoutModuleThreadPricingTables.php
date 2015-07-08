<?php

class PeThemeViewLayoutModuleThreadPricingTables extends PeThemeViewLayoutModuleContainer {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Pricing Tables",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				"name" => array(
					"label"       => __("Link Name",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Used when linking to the section in a page (eg, from the menu).",'Pixelentity Theme/Plugin'),
					"default"     => "",
				),
				"bgcolor" => array(
					"label"       => __("Background color",'Pixelentity Theme/Plugin'),
					"type"        => "Color",
					"description" => __("Background color of the section.",'Pixelentity Theme/Plugin'),
					"default"     => "#F7F7F7",
				),
				"bgimage" => array(
					"label"       => __("Background image",'Pixelentity Theme/Plugin'),
					"type"        => "Upload",
					"description" => __("Background image of the section.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"typography" => array(
					"label"       => __("Typography color",'Pixelentity Theme/Plugin'),
					"type"        => "RadioUI",
					"description" => __("Choose between light and dark type. You will want to adjust this based on your background and overlay.",'Pixelentity Theme/Plugin'),
					"options"     => array(
						__( 'Dark' ,'Pixelentity Theme/Plugin')   => '',
						__( 'Light' ,'Pixelentity Theme/Plugin')  => 'text-white',
					),
					"default"     => '',
				),
				"padding" => array(
					"label"       => __("Section padding",'Pixelentity Theme/Plugin'),
					"type"        => "RadioUI",
					"description" => __("Specify what form of padding should the section use.",'Pixelentity Theme/Plugin'),
					"options"     => array(
						__( 'Both' ,'Pixelentity Theme/Plugin')   => 'pad-large',
						__( 'Top' ,'Pixelentity Theme/Plugin')    => 'pad-top',
						__( 'Bottom' ,'Pixelentity Theme/Plugin') => 'pad-bottom',
						__( 'None' ,'Pixelentity Theme/Plugin')   => '',
					),
					"default"     => 'pad-large',
				),
				'calltoaction' => array(
					"label"        => __("Call to action",'Pixelentity Theme/Plugin'),
					"type"         => "Text",
					"description"  => __("Text displayed at the bottom of this section.",'Pixelentity Theme/Plugin'),
					"default"      => '',
				),
				"button_text" => array(
					"label"       => __("Button text",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Text of the button",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"button_url" => array(
					"label"       => __("Button url",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Link of the button.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
			);
	}

	public function name() {
		return __("Pricing Tables",'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __("PricingTables",'Pixelentity Theme/Plugin');
	}

	public function create() {
		return "ThreadPricingTable";
	}

	public function force() {
		return "ThreadPricingTable";
	}
	
	public function allowed() {
		return "pricingtable";
	}

	public function group() {
		return "section";
	}

	public function setTemplateData() {
		// override setTemplateData so to also pass the item array to the template file
		// this way the markup for the child blocks can also be generated in the container/parent template
		// We're not interested in builder related settings so we rebuild the array
		// to only include the data we going to use.
		
		$items = array();
		if (!empty($this->conf->items)) {
			foreach($this->conf->items as $item) {
				$item = (object) shortcode_atts(
												array(
													  'plan'        => '',
													  'superscript' => '',
													  'price'       => '',
													  'subscript'   => '',
													  'features'    => array(),
													  'button_text' => '',
													  'button_link' => '',
													  'featured'    => 'no',
													  ),
												$item["data"]
												);
				
				$items[] = $item;
			}
		}

		peTheme()->template->data($this->data,$items,$this->conf->bid);
	}

	public function template() {
		peTheme()->get_template_part("viewmodule",empty($this->data->layout) ? "pricingtables" : $this->data->layout);
	}

	public function tooltip() {
		return __("Use this block to add a Pricing section.",'Pixelentity Theme/Plugin');
	}

}

?>
