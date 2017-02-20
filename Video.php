<?php

Namespace Libs\HTML;

class Video extends Tag {

	protected $source = [];

	public function __construct($attrs = array())
	{
		if(is_array($attrs))
		{
			parent::__construct($attrs);
		}
		else
		{
			$this->setSource(new Source($attrs));
		}
	}

	public function setSource($source)
	{
		$this->source = array_merge($this->source, [$source]);

		return $this;
	}

	public function output()
	{
		if(empty($this->source))
		{
			return '';
		}

		$video = "<video";

		foreach($this->attrs as $key => $value)
		{
			$video .= " " . $key . "='" . $value . "'";
		}

		$video .= ">";

		foreach($this->source as $source)
		{
			$video .= $source->output();
		}

		$video .= " Seu browser não suporta a tag video.</video>";

		return $video;
	}

}
