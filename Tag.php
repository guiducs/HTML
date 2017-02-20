<?php

Namespace Libs\HTML;

abstract class Tag {

	protected $attrs = array();

	public function __construct($attrs)
	{
		if(!is_array($attrs) AND isset(static::$defaultAttr))
		{
			$attrs = array(static::$defaultAttr => $attrs);
		}

		$this->attrs = array_merge($this->attrs, (Array) $attrs);
	}

	public function __call($name, $arguments)
	{
		if(count($arguments) == 0)
		{
			return $this->getAttr($name);
		}
		
		return $this->setAttr($name, reset($arguments));
	}

	public function __toString()
	{
		return $this->output();
	}

	public function getAttr($key)
	{
		return $this->attrs[$key];
	}

	public function setAttr($key, $value)
	{
		$this->attrs[$key] = $value;

		return $this;
	}

	abstract public function output();
}
