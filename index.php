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
	
	function load_content($args=array()){
		echo "<div style='background:green; height:50px; '>";
		print_r($args);
		echo "Content START goes here;";
		echo "</div>";
	}
	
	function load_content_normal(){
		echo "<div style='background:snow; color:red;> This is the load_content_normal Method without any arguments!</div>";
	}
	
	function load_footer(){
		echo "<div style='background:black; height:50px; color:pink; '> FOOTER </div>";
	}
	
	
	
	// Initialise the Events 
	// This could be updated for a static version to use it like
	// Event::add('event', 'method');
	$app = new Event();
	
	$app->add('header', 'load_header');
	
	// This adds the method load_content_normal to the event content
	$app->add('content', 'load_content_normal');
	
	// This adds the method load_content to the event content, but with arguments!
	$app->add('content', 'load_content', array('additional'=>'background', 'URI'=>'post'));
	
	$app->add('footer', 'load_footer');
	
	
	
	// Here you go and rush your methods
	// The Events just runs if they are available
	$app->run('header');
	
	$app->run('content');
	
	// Some regular PHP Output in between;
	echo "<div style='background:maroon; color:#fff; height:200px; '> COMES CONTENT </div>";
	
	$app->run('footer');
	
	
	
	// Give a list with all registred Events
	$app->ListEvents();
	
	// Check the Event Class
	echo "<pre style='padding-top:200px;'>";
	print_r($app);
	
	$app->remove('footer');
	$app->add('content', 'load_content', array('new_content'=>true));
	
	$app->ListEvents();