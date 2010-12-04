<?php
/**
 * klasa odpowiedzialna za zapis informacji z loga do pliku
 * */

class System_LoggerFile extends System_Logger
{
	/* domuyslna sciezka do pliku */
	const DEFAULT_LOG_FILE = 'log.txt';

	private $hFile = null;
	private $sFilePath;

	public function __construct($filePath)
	{
		try
		{
			System_Logger_Exception_NoFile::exists($filePath);
			$this->sFilePath = $filePath;
		}
		catch(Exception $e)
		{
			$this->sFilePath = self::DEFAULT_LOG_FILE;
		}

		$this->hFile = fopen($this->sFilePath, 'a+');
	}

	public function warning( $content )
	{
		$this->write( self::WARN_HEADER . $content);
	}

	public function info( $content )
	{
		$this->write( self::INFO_HEADER . $content);
	}

	private function write( $content )
	{
		fwrite($this->hFile, $content);
	}
}
