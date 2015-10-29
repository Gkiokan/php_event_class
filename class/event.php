<?php
	/*
		Project: PHP Event Class
		Author: Gkiokan Sali
		URI: http://www.gkiokan.net
		Version: 0.1
		Comments: -//-
	*/
	
	Class Event implements EventInterfaceController {
		public $time;
		private $events = array();
		private $deleted_events = array();
		
		public function __construct(){
			$this->time = time();
		}
		
		// Creates a Event 
		public function add($event=null, $function=null, $args=NULL, $priority=10){
			$t = uniqid();
			
			$EventObject = new EventObject($event, $function, $args, $priority);
			
			$this->events[$event][$function] = $EventObject;
		}
		
		// This method runs the Event if it#s already registred 
		public function run($event=null, $args=array()){
			$events = $this->events[$event];
			if(!empty($events)):
				foreach($events as $event):					
					$func  = $event->func;
					$args  = $event->args;
				
					call_user_func($func, $args);
				endforeach;
			endif;
		}
		
		
		// This method removes a Event out of the list
		public function remove($event){
			if(array_key_exists($event, $this->events)):
				unset($this->events[$event]);
			endif;
		}
		
		
		// Outputs a List of all registred Events
		public function listEvents(){
			echo "<pre>";
			echo "<b>List of avaible Events </b><br>";
			print_r($this->events);
			return false;
			foreach($this->events as $event)
				print_r($event);
				echo "<br><br>";
			echo "</pre>";
		}
		
	}
	
	
	// Create the Base Interface for the Event
	Interface EventInterfaceController {
		
		public function add($event, $function, $args, $priority);	
		public function remove($event);	
		public function run($event, $args);
		
	}
	
	
	// Event Method
	class EventObject {
		public $event, $func, $args, $priority;
		
		public function __construct($event=null, $function=NULL, $args=array(), $priority=10){
			$this->event = $event;
			$this->func = $function;
			$this->args = $args;
			$this->priority = $priority;
		}
	}