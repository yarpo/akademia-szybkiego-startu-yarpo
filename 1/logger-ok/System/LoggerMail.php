<?php
/**
 * klasa odpowiedzialna za wysylanie informacji z loga na wskazany adres email
 * @autor: Patryk Jar
 * */

class System_LoggerMail extends System_Logger
{
	/* domuyslna sciezka do pliku */
	const DEFAULT_LOG_MAIL = 'jar.patryk@gmail.com';

	private $sMailAddr;

	public function __construct($mailAddress)
	{
		try
		{
			System_Logger_Exception_Email::correct($mailAddress);
			$this->sMailAddr = $mailAddress;
		}
		catch(Exception $e)
		{
			$this->sMailAddr = self::DEFAULT_LOG_MAIL;
			$this->send('Błędny email', $mailAddress);
		}
	}

	public function warning( $content )
	{
		$this->send( self::WARN_HEADER, $content);
	}

	public function info( $content )
	{
		$this->send( self::INFO_HEADER, $content);
	}

	private function send( $subject, $content )
	{
		//mail($this->sMailAddr, $subject, $content );
		echo 'Wysyłam na adres ' . $this->sMailAddr . " wiadomość.\n<br />";
		echo 'o tytule: ' . $subject . "\n<br />";
		echo 'o treści: ' . $content . "\n<br />";
	}
}
