<?php

class PeThemeViewLayoutModuleThreadBlogAlternate extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Blog Alternate",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		$fields = peTheme()->data->customPostTypeMbox('post');
		$fields = $fields["content"];

		$fields = array_merge(
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
					"default"     => "#fff",
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
				'subtitle' => array(
					"label"        => __("Subtitle",'Pixelentity Theme/Plugin'),
					"type"         => "Text",
					"description"  => __("Enter a subtitle for the section.",'Pixelentity Theme/Plugin'),
					"default"      => '',
				),
				"title" => array(
					"label"       => __("Title",'Pixelentity Theme/Plugin'),
					"type"        => "Text",
					"description" => __("Section title.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"icon" => array(
					"label"       => __("Icon",'Pixelentity Theme/Plugin'),
					"type"        => "Icon",
					"description" => __("Title Icon.",'Pixelentity Theme/Plugin'),
					"default"     => "",
				),
				"content" => array(
					"label"       => __("Content",'Pixelentity Theme/Plugin'),
					"type"        => "TextArea",
					"description" => __("Section content.",'Pixelentity Theme/Plugin'),
					"default"     => '',
				),
				"columns" => array(
					"label"       => __("Columns Number",'Pixelentity Theme/Plugin'),
					"type"        => "RadioUI",
					"description" => __("Choose between single or two-columns layout.",'Pixelentity Theme/Plugin'),
					"options"     => array(
						__( '1' ,'Pixelentity Theme/Plugin') => 'medium-12',
						__( '2' ,'Pixelentity Theme/Plugin') => 'medium-6',
					),
					"default"     => 'medium-6',
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
			),
			$fields			
		);

		unset( $fields['pager'] );

		/*
		$fields["lightbox"] =
			array(
				  "label"=>__("Use Lightbox",'Pixelentity Theme/Plugin'),
				  "type"=>"RadioUI",
				  "description" => __("Enable/Disable lightbox usage on whole portfolio.",'Pixelentity Theme/Plugin'),
				  "options" => PeGlobal::$const->data->yesno,
				  "default"=>"no"
				  );
		*/
		return $fields;
	}

	public function name() {
		return __("Blog Alternate",'Pixelentity Theme/Plugin');
	}

	public function type() {
		return __("Section",'Pixelentity Theme/Plugin');
	}

	public function templateName() {
		return "blogalternate";
	}

	public function group() {
		return "section";
	}


	public function setTemplateData() {
		// we don't store template data here because we want to avoid it if the custom loop is empty
		// so we'll do it in render();
	}

	public function template() {
		$t =& peTheme();
		if ($loop = $t->data->customLoop($this->data)) {
			$t->template->data($this->data,$this->conf->bid);
			$t->get_template_part("viewmodule",$this->templateName());
			$t->content->resetLoop();
		}
	}

	public function tooltip() {
		return __("Add an alternate Blog section showing posts.",'Pixelentity Theme/Plugin');
	}

}

?>