<?php

class PeThemeViewLayoutModuleThreadColumns extends PeThemeViewLayoutModuleThreadContainer {

	public static $translate = 
		array(
			'1/1' => 'large-12',
			"1/3" => "large-4",
			"1/2" => "large-6",
			"1/4" => "large-3",
			"2/3" => "large-9",
			"1/6" => "large-2",
			"last" => 'end',
		);

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __("Columns",'Pixelentity Theme/Plugin')
				  );
	}

	public function fields() {
		return
			array(
				"columns" => array(
					"label"       => __("Layout",'Pixelentity Theme/Plugin'),
					"description" => __("Select the columns layout",'Pixelentity Theme/Plugin'),
					"type"        => "Select",
					"groups"      => true,
					"options"     => apply_filters('pe_theme_shortcode_columns_options',PeGlobal::$config["columns"]),
				),
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
			);
	}

	public function name() {
		return __("Columns",'Pixelentity Theme/Plugin');
	}

	public function create() {
		return "ThreadText";
	}

	public function force() {
		return "ThreadText";
	}

	public function allowed() {
		return "column";
	}

	public function group() {
		return "section";
	}
	
	public function type() {
		return __("Section",'Pixelentity Theme/Plugin');
	}


	public function template() {
		
		if (empty($this->conf->items) || !is_array($this->conf->items)) {
			return;
		}

		$translate = PeThemeViewLayoutModuleThreadColumns::$translate;

		if (empty($this->data->columns)) {
			$cols = count($this->conf->items);
		} else {
			$layout = explode(" ",strtr($this->data->columns,$translate));
			$cols = count($layout);
		}

		$style = '';

		if ( ! empty( $this->data->bgcolor ) ) $style .= 'background-color: ' . $this->data->bgcolor . ';';
		if ( ! empty( $this->data->bgimage ) ) $style .= 'background-image: url(\'' . $this->data->bgimage . '\');';
		if ( ! empty( $style ) ) $style = 'style="' . $style . '"';

		$idx = 0;
		$last = count($this->conf->items)-1;

		$open = '<div class="row">';
		$close = '</div>';

		printf('<section class="' . $this->data->padding . ' bg-cover ' . $this->data->typography . ' section-type-column" %s id="section-%s">', $style, empty( $this->data->name ) ? $this->conf->bid : $this->data->name );
		foreach ($this->conf->items as $item) {
			if (($idx % $cols) === 0) echo $open;
			printf('<div class="%s columns">',empty($layout[$idx % $cols]) ? '' : $layout[$idx % $cols],$idx,$cols);
			$this->outputModule($item);
			echo "</div>";
			if ($idx === $last || ($idx % $cols) === ($cols-1)) echo $close;
			$idx++;
		}
		print '</section>';

	}

	public function tooltip() {
		return __("Use this block to add columns of content to your layout.",'Pixelentity Theme/Plugin');
	}

}

?>