<?php

class PeThemeViewLayoutModuleThreadLogo extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Logo",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				"link" => array(
					"label"       => __("Link",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Optional link for the logo.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"logo" => array(
					"label"       => __("Logo",'Pixelentity Theme/Plugin'),
					"type"        => "Upload",
					"description" => __("Upload logo here.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
			);
		
	}

	public function name() {
		return __("Logo",'Pixelentity Theme/Plugin');
	}

	public function group() {
		return "logo";
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __("Use this block to add a new logo.",'Pixelentity Theme/Plugin');
	}

}

?>