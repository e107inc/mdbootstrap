<?php

if(!defined('e107_INIT'))
{
	exit();
}



class theme implements e_theme_render
{

	function __construct()
	{
		define("CORE_CSS", false);

		e107::css('url', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap');
		e107::css('theme', 'assets/css/mdb.min.css');
		e107::css('theme', 'assets/css/style.css');

		e107::js('theme', 'assets/js/mdb.min.js', 'jquery');
	}
	function tablestyle($caption, $text, $mode='', $options = array())
	{

		$style = varset($options['setStyle'], 'default');

		// default style
		// only if this always work, play with different styles

		if(!empty($caption))
		{
			echo '<div class="my-4">' . $caption . '</div>';
		}
		echo $text;

		return;
	}

}
 