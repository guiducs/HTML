<?php

Namespace Libs\HTML;

class Img extends Tag {

	protected static $defaultAttr = "src";

	public function __construct($attrs = array())
	{
		parent::__construct($attrs);
	}

	public function output()
	{
		if(!isset($this->attrs['src']) OR empty($this->attrs['src']))
		{
			return '';
		}

		//https://davidwalsh.name/accessibility-tip-empty-alt-attributes
		if(!isset($this->attrs['alt']))
		{
			$this->attrs['alt'] = '';
		}

		$img = "<img";

		foreach($this->attrs as $key => $value)
		{
			$img .= " " . $key . "='" . $value . "'";
		}

		$img .= " />";

		return $img;
	}

}
