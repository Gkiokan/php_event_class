<?php
	
	class EventView {
		
		
		public function __construct($app){
			$app->run('init');
						
			$app->run('header');
			
			$app->run('navigation');
			
			$app->run('content');
			
			$app->run('footer');
		}
		
	}