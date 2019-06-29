<?php
if ( ! function_exists('static_url'))
{

	function static_url($uri = '')
	{
		return base_url().$uri;
	}
}

?>