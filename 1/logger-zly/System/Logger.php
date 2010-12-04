<?php
/**
 * Klasa odpowiedzialna za zapis danych do loga systemowego
 * @autor: Patryk Jar
 * */

class System_Logger
{
	private $type;
	private $file;

	public function __construct($type)
	{
		$this->type = $type;
		// jesli to jest plik tekstowy
		if ($this->type == 1)
		{
			$this->file = fopen('log.txt', 'a+');
		}
	}

	public function warning($content)
	{
		switch($this->type)
		{
			// jesli mamy zapisywac w pliku tekstowym
			case 1:
				fwrite($this->file, "info:\n" . $content);
			break;

			// wysylamy e-maila 
			case 2:
				mail('jar.patryk@gmail.com', 'warning', $content);
			break;
		}
	}

	public function info($content)
	{
		switch($this->type)
		{
			// jesli mamy zapisywac w pliku tekstowym
			case 1:
				fwrite($this->file, "info:\n" . $content);
			break;

			// wysylamy e-maila 
			case 2:
				mail('jar.patryk@gmail.com', 'warning', $content);
			break;
		}
	}
}

$oLogger = new System_Logger(1);
$oLogger->warning('Zapisuję warning');
$oLogger->info('Zapisuję info');
