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
	
	
	// Initialise the Events 
	// This could be updated for a static version to use it like
	// Event::add('event', 'method');
	$app = new Event();
	

	$app->add('init', 'fix');
	
	$app->add('header', 'box_red');
	
	$app->add('content', 'box', array('height'=>'300px', 'background'=>'url(http://orig09.deviantart.net/bcf8/f/2013/174/3/e/recycled_texture_background_by_sandeep_m-d6aeau9.jpg) center center no-repeat' ));
	
	
/*	*
	*	How to add functions to events
	* * * * * * * * * * * * * * * * * * * * *
	* 	To add functions to events, you call the Event method "add" width params.
	*	First parameter is the Event you wanna apply to
	*		This is the event name, which you will call later.
	*		
	* 	Second parameter is the function you want to add to.
	*   	It should be possible to add Object Methods with array('OBJECT', 'METHOD'),
	*		as it will be called thought call_user_func($func, $args);
	**/
	
	// Here are some Examples 			
	$app->add('header', 'load_header');
	
	// This adds the method load_content_normal to the event content
	$app->add('content', 'load_content_normal');
	
	// This adds the method load_content to the event content, but with arguments!
	$app->add('content', 'load_content', array('additional'=>'background', 'URI'=>'post'));
	
	// Another basic function apply to the event footer.
	$app->add('footer', 'load_footer');
	
	
	
/*	*
	*	Run your events
	* * * * * * * * * * * * * * * * * * * *
	*	Here you go and run your events.
	*	Please notice, that the events will just run if they are available and exists in the event list.
	* 	Same goes for the functions, methods and Object calls.
	* 	I have created a Class for this and called all events on the order i specified.
	* 	You can call the Events also in any place else you want.
	*	Be sure you add first your events to the Eventlist.
	*
	* 	You can have a look in my Event Order list in /class/eventview.php	 
	*	This could be a normal file also, it don't have to be in a class. 
	*
	**/
	
	
	new EventView($app);	
	/*
	$app->run('init');				
	$app->run('header');	
	$app->run('navigation');	
	$app->run('content');	
	$app->run('footer');		
	*/
	
	
/*	*
	*	Debug and see your Events
	* * * * * * * * * * * * * * * * * * * *	
	*	This will provice you an print_r of the Event Class
	* 	Run this and see what's inside, in which order and it's params and stuff.
	*	Could be usefull in development states.
	
	// Just lists the Events	
	$app->ListEvents();
	
	// Shows you the whole Event Object
	$app->debug();
	**/



	
/*	*
	*	Debug and see your Events
	* * * * * * * * * * * * * * * * * * * *		
	*	Some stuff playing arround with Events.
	*	In this case, I remove the whole event 'footer' 
	*	and modify an existing method in the event content with other params.
	* 
	
	
	// Removes the event 'footer', with all it's functions! DANGER!
	$app->remove('footer');
	
	// Add method to event with modified $args;
	$app->add('content', 'load_content', array('new_content'=>true));
	
	// Show me what changed.
	$app->ListEvents();
	
	**/