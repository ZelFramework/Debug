<?php


namespace ZelFramework\Debug;


class DebugBar
{
	
	static $startTime;
	private $executionTime;
	
	static $twigStartTime;
	static $twigStopTime;
	
	public function __construct()
	{
		$this->executionTime = microtime(true) - self::$startTime;
		
		
	}
	
	public function getInfo(): array
	{
		$data = [
			'executionTime' => $this->executionTime,
			'httpResponseCode' => http_response_code(),
		];
		
		if (self::$twigStartTime !== null && self::$twigStopTime !== null)
			$data['twigExecutionTime'] = self::$twigStopTime - self::$twigStartTime;
		
		return $data;
	}
	
}