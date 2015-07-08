<?php

class PeThemeViewLayoutModuleThreadService extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Service",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				"icon" => array(
					"label"       => __("Icon",'Pixelentity Theme/Plugin'),
					"type"        => "Icon",
					"description" => __("Icon representing this service.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"title" => array(
					"label"       => __("Title",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Title of the service.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"subtitle" => array(
					"label"       => __("Subtitle",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Subtitle of the service.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"content" => array(
					"label"       => __("Description",'Pixelentity Theme/Plugin'),
					"type"        => "TextArea",
					"description" => __("Service description.",'Pixelentity Theme/Plugin'),
					"default"     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.',
				),
				"button_link" => array(
					"label"       => __("Button link",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Url of the button.",'Pixelentity Theme/Plugin'),
					"default"     => '#',
				),
				"button_text" => array(
					"label"       => __("Button text",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Text of the button.",'Pixelentity Theme/Plugin'),
					"default"     => __("Enquire",'Pixelentity Theme/Plugin'),
				),
			);
		
	}

	public function name() {
		return __("Service",'Pixelentity Theme/Plugin');
	}

	public function group() {
		return "service";
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __("Use this block to add a new service.",'Pixelentity Theme/Plugin');
	}

}

?>