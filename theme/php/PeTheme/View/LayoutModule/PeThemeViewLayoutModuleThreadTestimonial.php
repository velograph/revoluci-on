<?php

class PeThemeViewLayoutModuleThreadTestimonial extends PeThemeViewLayoutModuleText {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Testimonial",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				"author" => array(
					"label"       => __("Author",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Testimonial Author.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"image" => array(
					"label"       => __("Image",'Pixelentity Theme/Plugin'),
					"type"        => "Upload",
					"description" => __("Testimonial Author Image.",'Pixelentity Theme/Plugin'),
					"default"     => "",
				),
				"title" => array(
					"label"       => __("Title",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Testimonial title.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"content" => array(
					"label"       => "Content",
					"type"        => "TextArea",
					"description" => __("Testimonial content.",'Pixelentity Theme/Plugin'),
					"default"     => "",
				),
			);
		
	}

	public function name() {
		return __("Testimonial",'Pixelentity Theme/Plugin');
	}

	public function group() {
		return "testimonial";
	}

	public function render() {
		// do nothing here since the rendering happens in the parent template
	}

	public function tooltip() {
		return __("Use this block to add a new testimonial.",'Pixelentity Theme/Plugin');
	}

}

?>
