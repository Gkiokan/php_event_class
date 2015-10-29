<?php
	/*
		Project: PHP Event Class
		Author: Gkiokan Sali
		URI: http://www.gkiokan.net
		Version: 0.1
		Comments: -//-
	*/
	
	Class Event implements BaseEventController {
		public $time;
		public $events = array();
		
		public function __construct(){
			$this->time = time();
		}
		
		// Creates a Event 
		public function add($event=null, $function=null, $args='no arguments', $priority=10){
			
			$this->events[$event]['event'] 	  = $event;
			$this->events[$event]['args'] 	  = $args;
			$this->events[$event]['function'] = $function;
			$this->events[$event]['priority'] = $priority;
			
		}
		
		// This method runs the Event if it#s already registred 
		public function run($event=null, $args=array()){
			if(!empty($this->events[$event])):
				$func  = $this->events[$event]['function'];
				$args  = $this->events[$event]['args'];
				
				call_user_func($func, $args);
			endif;
		}
		
		// Outputs a List of all registred Events
		public function listEvents(){
			echo "<pre>";
			echo "<b>List of avaible Events </b><br>";
			foreach($this->events as $event)
				print_r($event);
				echo "<br><br>";
			echo "</pre>";
		}
		
	}
	
	
	Interface BaseEventController {
		
		public function add($event, $function, $args, $priority);		
		public function run($event, $args);
		
	}