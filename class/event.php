<?php
	/*
		Project: PHP Event Class
		Author: Gkiokan Sali
		URI: http://www.gkiokan.net
		Version: 0.3
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
			$uid = uniqid();															// generates a UniqID for later purpose
			
			$EventObject = new EventObject($event, $function, $args, $priority);		// Creates the EventObject with Params
			
			$this->events[$event][$function] = $EventObject;							// adds the EventObject to the Private Array List 
		}
		
		// This method runs the Event if it#s already registred 
		public function run($event=null, $args=array()){
			if(array_key_exists($event, $this->events)):								// Checks if the event exists
				$events = $this->events[$event];										// Gets all the EventObjects
				foreach($events as $event):												// Loops thought the Events
					$func  = $event->func;												// get the function of the EventObject
					$args  = $event->args;												// get the arguments of the EventObject
				
					call_user_func($func, $args);										// Call the Function with it's params.
				endforeach;
			endif;
		}
		
		
		// This method removes a Event out of the list
		public function remove($event){
			if(array_key_exists($event, $this->events)):								// Checks if Event exists
				unset($this->events[$event]);											// Delete Event from the List
			endif;
		}
		
		
		// Outputs a List of all registred Events
		public function listEvents(){
			echo "<pre>";
			echo "<h3>List of avaible Events </h3>";
			print_r($this->events);
			return false;
			foreach($this->events as $event)
				print_r($event);
				echo "<br><br>";
			echo "</pre>";
		}
		
		// Debug Method to see whats going on on the Event Object
		public function debug(){
			echo "<pre style='margin-top:200px; border-top:gray 1px solid;'>";
			echo "<h3>Event Class Object Overview</h3>";
			print_r($this);
			echo "</div>";		
		}
		
	}
	
	
	// Create the Base Interface for the Event
	Interface EventInterfaceController {
		public function add($event, $function, $args, $priority);	
		public function run($event, $args);
		public function remove($event);	
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