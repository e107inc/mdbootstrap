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


		switch($style)
		{
 
			case "footer": 
				if(!empty($caption))
				{
					echo '<h5 class="text-uppercase font-weight-bold">' . $caption . '</h5>';
					echo '<hr class="white mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">';
				}
				echo $text;
			break;


			case "main":   //for style with name main, mainly for frontpage
				if(!empty($caption))
				{
					echo '<div class="my-4">' . $caption . '</div>';
				}
				echo $text;
			break;

			case "default":   //for style with name default
				if(!empty($caption))
				{
					echo '<div class="my-4">' . $caption . '</div>';
				}
				echo $text;
			break;			
		
			default:  //if there is no style

			if(!empty($caption))
			{
				echo '<div class="my-4">' . $caption . '</div>';
			}
			echo $text;
		}
		return;
	}

}
 