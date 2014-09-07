<?php
use Colibri\Application\API as ColibriAppAPI;


/**
 * 
 */
class API extends ColibriAppAPI
{
	/**
	 * @var CUser
	 */
	public		static	$user=null;
	
	
static
	public		function	catchSessionByPost()
	{
		if (!isset($_POST['PHPSESSID']))
			throw new Exception('illegal request');
		self::catchSession($_POST['PHPSESSID']);
	}
}
