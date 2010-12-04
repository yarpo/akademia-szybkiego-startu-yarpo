<?php
/**
 * Klasa odpowiedzialna za zapis danych do loga systemowego
 * @autor: Patryk Jar
 * */

abstract class System_Logger
{
	const MAIL_LOGGER = 1;
	const FILE_LOGGER = 2;

	const WARN_HEADER = "Ostrzeżenie\n";
	const INFO_HEADER = "Wiadomość\n";

	static public function getInstance($type, $target = '')
	{
		switch($type)
		{
			case self::MAIL_LOGGER :
				return new System_LoggerMail($target);
			break;

			case self::FILE_LOGGER :
				return new System_LoggerFile($target);
			break;

			default:
				throw new System_Logger_Exception_UnknownLoggerType(
					'Błędny typ loggera'
				);
		}
	}

	static public function getMailLogger( $address = '' )
	{
		self::getInstance(self::MAIL_LOGGER, $address);
	}

	static public function getFileLogger( $filePath = '' )
	{
		self::getInstance(self::FILE_LOGGER, $filePath);
	}

	abstract public function warning( $content );
	abstract public function info( $content );
}
