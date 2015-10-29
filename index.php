<?php
	
	/*
		Project: PHP Event Class
		Author: Gkiokan Sali
		URI: http://www.gkiokan.net
		Date: 29.10.2015
		Comments:
		This is a little Test and a Demonstration for
		Handling PHP events with a Class.
		
	*/
	
	// Include the basics to start with.
	require_once 'core/init.php';
	
	
	// The Methods you gona register with the Eventsf
	function load_header(){
		echo "<div style='background:darkblue; height:100px; '> HEADER </div>";
	}
	
	function load_content(){
		echo "<div style='background:green; height:50px; '> Content START goes here </div>";
	}
	
	function load_footer(){
		echo "<div style='background:black; height:50px; color:pink; '> FOOTER </div>";
	}
	
	
	
	// Initialise the Events 
	// This could be updated for a static version to use it like
	// Event::add('event', 'method');
	$app = new Event();
	
	$app->add('header', 'load_header');
	
	$app->add('content', 'load_content');
	
	$app->add('footer', 'load_footer');
	
	
	
	// Here you go and rush your methods
	// The Events just runs if they are available
	$app->run('header');
	
	$app->run('content');
	
	echo "<div style='background:maroon; color:#fff; height:200px; '> COMES CONTENT </div>";
	
	$app->run('footer');
	
	
	
	
	// Give a list with all registred Events
	$app->ListEvents();
	
	// Check the Event Class
	echo "<pre style='padding-top:200px;'>";
	print_r($app);