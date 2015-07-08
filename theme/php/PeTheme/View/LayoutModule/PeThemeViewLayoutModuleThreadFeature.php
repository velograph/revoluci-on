<?php

class PeThemeViewLayoutModuleThreadFeature extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Feature",'Pixelentity Theme/Plugin')
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
					"default"     => 'pad-top',
				),
				"title" => array(
					"label"       => __("Title",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Section title.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"features" => array(
					"label"        => __("Features",'Pixelentity Theme/Plugin'),
					"type"         => "Items",
					"description"  => __("Add one or more feature.",'Pixelentity Theme/Plugin'),
					"button_label" => __("Add Feature",'Pixelentity Theme/Plugin'),
					"sortable"     => true,
					"auto"         => __("Feature",'Pixelentity Theme/Plugin'),
					"unique"       => false,
					"editable"     => false,
					"legend"       => false,
					"fields"       => array(
						array(
							"name"    => "feature",
							"type"    => "text",
							"width"   => 500, 
							"default" => __("Feature",'Pixelentity Theme/Plugin'),
						),
					),
				),
				"featured_image" => array(
					"label"       => __("Featured image",'Pixelentity Theme/Plugin'),
					"type"        => "Upload",
					"description" => __("Featured image of the section.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"button1_link" => array(
					"label"       => __("Button 1 link",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Url of the button.",'Pixelentity Theme/Plugin'),
					"default"     => '#',
				),
				"button1_text" => array(
					"label"       => __("Button 1 text",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Text of the button.",'Pixelentity Theme/Plugin'),
					"default"     => __("Purchase",'Pixelentity Theme/Plugin'),
				),
				"button2_link" => array(
					"label"       => __("Button 2 link",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Url of the button.",'Pixelentity Theme/Plugin'),
					"default"     => '#',
				),
				"button2_text" => array(
					"label"       => __("Button 2 text",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Text of the button.",'Pixelentity Theme/Plugin'),
					"default"     => __("Follow",'Pixelentity Theme/Plugin'),
				),
				"buttons_separator" => array(
					"label"       => __("Buttons separator",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Text displayed between two buttons.",'Pixelentity Theme/Plugin'),
					"default"     => __("or",'Pixelentity Theme/Plugin'),
				),
			);
	}

	public function name() {
		return __("Feature",'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __("Section",'Pixelentity Theme/Plugin');
	}

	public function templateName() {
		return "feature";
	}

	public function group() {
		return "section";
	}

	public function setTemplateData() {
		$t =& peTheme();
		peTheme()->template->data($this->data,$this->conf->bid);
	}

	public function template() {
		peTheme()->get_template_part("viewmodule",$this->templateName());
	}

	public function tooltip() {
		return __("Add a Feature section.",'Pixelentity Theme/Plugin');
	}

}

?>
