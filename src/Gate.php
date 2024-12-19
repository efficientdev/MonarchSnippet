<?php

namespace Efficientdev\MonarchSnippet;
/**
 * 19 dec 2024
 */
class Gate
{
	public $st=false;
	
	function __construct()
	{ 
		if (isset($_POST['sendmany']) && !empty($_POST)) { 
			$this->st=true;
		}
	}
	public static function isAllowed(){
		$t=new Gate();
		return $t->st;
	} 
}