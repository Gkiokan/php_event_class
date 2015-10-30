<?php
	/*
		Project: PHP Event Class
		File: Init file
		Comments: -//-
	*/
	
	define('VIEW', '/view');
	define('CLASS', '/class');
	define('CORE', '/core');
	define('INIT', CORE.'/init.php');
	
	include_once('./functions/function.php');	
	
	spl_autoload_register(function($class){
		$class = mb_strtolower($class);
		
		include("./class/".$class.".php");
	});