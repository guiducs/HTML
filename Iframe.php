<?php

Namespace Libs\HTML;

class Iframe extends Tag {

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

		$iframe = "<iframe";

		foreach($this->attrs as $key => $value)
		{
			$iframe .= " " . $key . "='" . $value . "'";
		}

		$iframe .= "></iframe>";

		return $iframe;
	}

}
