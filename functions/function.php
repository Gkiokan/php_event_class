<?php
	
	/*
		Project: PHP Event Class
		File: Demonstration Functions
		Author: Gkiokan Sali
		URI: http://www.gkiokan.net
		
	*/
	
	
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
	
	function box_red(){
		
		echo "<div style='background:red; border:4px solid maroon; height:200px; width:200px; margin:0px auto;'></div>";
	}
	
	function box($args=array()){
		$background = isset($args['background']) ? $args['background'] : '#fff';
		$color 		= isset($args['color']) ? $args['color'] : '#000';
		$height		= isset($args['height']) ? $args['height'] : '100px';		
		$content    = isset($args['content']) ? $args['content'] : null;
		
		$style = "background: $background; color:$color; height:$height; "; 
		
		echo "<div style='$style'> $content </div>";
	}