<?php

class PeThemeViewLayoutModuleThreadStats extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Stats",'Pixelentity Theme/Plugin')
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
				"stats" => array(
					"label"        => __("Stats",'Pixelentity Theme/Plugin'),
					"type"         => "Items",
					"description"  => __("Add one or more statistic.",'Pixelentity Theme/Plugin'),
					"button_label" => __("Add Statistic",'Pixelentity Theme/Plugin'),
					"sortable"     => true,
					"auto"         => __("icon icon-hourglass",'Pixelentity Theme/Plugin'),
					"unique"       => false,
					"editable"     => false,
					"legend"       => false,
					"fields"       => array(
						array(
							"name"        => "icon",
							"label"       => __("Icon",'Pixelentity Theme/Plugin'),
							"type"        => "icon",
							"description" => __("Icon representing this statistic.",'Pixelentity Theme/Plugin'),
							"default"     => 'icon-hourglass',
						),
						array(
							"name"    => "title",
							"type"    => "text",
							"width"   => 300, 
							"default" => __("284 HOURS",'Pixelentity Theme/Plugin'),
						),
						array(
							"name"    => "detail",
							"type"    => "text",
							"width"   => 300, 
							"default" => __("per project",'Pixelentity Theme/Plugin'),
						),
					),
				),
			);
	}

	public function name() {
		return __("Stats",'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __("Section",'Pixelentity Theme/Plugin');
	}

	public function templateName() {
		return "stats";
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
		return __("Add a Stats section.",'Pixelentity Theme/Plugin');
	}

}

?>
