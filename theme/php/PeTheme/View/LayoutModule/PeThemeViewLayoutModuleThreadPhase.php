<?php

class PeThemeViewLayoutModuleThreadPhase extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Phase",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				"icon" => array(
					"label"       => __("Icon",'Pixelentity Theme/Plugin'),
					"type"        => "Icon",
					"description" => __("Phase Icon.",'Pixelentity Theme/Plugin'),
					"default"     => "",
				),
				"title" => array(
					"label"       => __("Title",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Title of the phase.",'Pixelentity Theme/Plugin'),
					"default"     => __("Design",'Pixelentity Theme/Plugin'),
				),
				"steps" => array(
					"label"        => __("Steps",'Pixelentity Theme/Plugin'),
					"type"         => "Items",
					"description"  => __("Add one or more step to this phase.",'Pixelentity Theme/Plugin'),
					"button_label" => __("Add Step",'Pixelentity Theme/Plugin'),
					"sortable"     => true,
					"auto"         => __("Ask questions",'Pixelentity Theme/Plugin'),
					"unique"       => false,
					"editable"     => false,
					"legend"       => false,
					"fields"       => array(
						array(
							"name"    => "step",
							"type"    => "text",
							"width"   => 500, 
							"default" => __("Ask questions",'Pixelentity Theme/Plugin'),
						),
					),
				),
			);
		
	}

	public function name() {
		return __("Phase",'Pixelentity Theme/Plugin');
	}

	public function group() {
		return "phase";
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __("Use this block to add a new phase.",'Pixelentity Theme/Plugin');
	}

}

?>