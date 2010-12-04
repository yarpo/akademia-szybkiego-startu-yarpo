<?php
/**
 * Skrypt pokazujacy:
 *  - autoloader
 *  - dziedziczenie
 *  - polimorfizm
 * */

function __autoload($name)
{
	$dirs = explode('_', $name);
	$path = implode('/', $dirs) . '.php';
	echo $path . '<hr />';
	if (file_exists($path))
	{
		require_once $path;
	}
	else
	{
		die('błąd');
	}
}

$oLogger = System_Logger::getInstance(System_Logger::MAIL_LOGGER, 'jar.patryk@gmail.com');
$oLogger->warning('To jest ostrzeżenie');
$oLogger->info('To jest informacja');

//$oLogger = System_Logger::getMailLogger('aaaa@a.pl');
