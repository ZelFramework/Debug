<?php

use ZelFramework\Debug\Debug;

require 'vendor/autoload.php';

Debug::start();

try {
	class ok {
		public function test()
		{
			$ok = new ok();
			$ok->tt('ok', 'google');
		}
		
		public function tt($t, $d)
		{
			throw new \Exception('Test exception for debug package');
		}
	}
	
	$ok = new ok();
	
	$ok->test();
	$ok->test();
	
	
} catch (\Exception $e) {
	$response = Debug::handle($e);
	$response->send();
}