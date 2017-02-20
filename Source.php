<?php

Namespace Libs\HTML;

class Source extends Tag {

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

		$ext = ext($this->attrs['src']); 

		if(!in_array($ext, ['mp4', 'ogg', 'webm']))
		{
			return '';
		}

		$this->attrs['type'] = 'video/' . $ext;

		$source = "<source";

		foreach($this->attrs as $key => $value)
		{
			$source .= " " . $key . "='" . $value . "'";
		}

		$source .= " />";

		return $source;
	}

}
