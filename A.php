<?php

Namespace Libs\HTML;

class A extends Tag {

	protected static $defaultAttr = "href";
	protected $text;

	public function __construct($attrs = array(), $text = null)
	{
		parent::__construct($attrs);

		$this->setText($text);
	}

	public function setText($text)
	{
		$this->text = $text;

		return $this;
	}

	public function target($argument = null)
    {
    	if(!empty($argument))
    	{
    		return $this->setAttr('target', $argument);
    	}

        $link = prep_url($this->attrs['href']);

        if(is_file($link) OR is_external_url($link))
        {
            return "_blank";
        }
    }

	public function output()
	{
		if(!isset($this->attrs['href']) OR empty($this->attrs['href']))
		{
			return '';
		}

		if(is_null($this->text)) 
		{
			$this->text = $this->attrs['href'];
		}

		//https://dev.to/ben/the-targetblank-vulnerability-by-example
		if($this->target() == "_blank")
		{
			$this->attrs['rel'] = "noopener noreferrer";

			if(!isset($this->attrs['target']))
			{
				$this->attrs['target'] = "_blank";
			}
		}

		$a = "<a";

		foreach($this->attrs as $key => $value)
		{
			$a .= " " . $key . "='" . $value . "'";
		}

		$a .= ">". $this->text . "</a>";

		return $a;
	}

}
