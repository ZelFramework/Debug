<?php


namespace ZelFramework\Debug;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Debug
{
	
	public static function start()
	{
		return require_once 'DebugFunction.php';
	}
	
	private static function getTwig(): Environment
	{
		$loader = new FilesystemLoader(__DIR__);
		return new Environment($loader);
	}
	
	public static function handle(\Exception $error): Response
	{
		if (http_response_code() === 200)
			http_response_code(500);
		
		return new Response(self::getTwig()->render('debug.html.twig', [
			'error' => $error,
			'httpError' => http_response_code(),
		]));
	}
	
}