<?php
/**
 * Klasa pozawalajaca wyswietlac zawartosc katalogu
 * 
 * @autor: Patryk yarpo Jar
 * @data: 5 listopada 2010 r.
 * */

class DirContent
{
	const DEFAULT_PATH = './';
	private $path;
	private $dontDisplay = array('.', '..', '.svn');

	public function __construct( $path = self::DEFAULT_PATH )
	{
		$this->path = $path;
	}

	public function getList( $dont = array())
	{
		$list = array();
		$this->dontDisplay = array_merge($this->dontDisplay, $dont);

		DirDoesNotExistException::raise($this->path);

		$dir = opendir($this->path);

		while ($file = readdir($dir))
		{
			if ($this->isAcurateDir($file))
			{
				$list[] = $file;
			}
		}

		closedir($dir);
		return $list;
	}

	private function isAcurateDir( $item )
	{
		return is_dir($this->path.$item) && !in_array($item, $this->dontDisplay);
	}
}

class DirDoesNotExistException extends Exception 
{
	static public function raise( $path )
	{
		if (!file_exists($path) || !is_dir($path))
		{
			throw new self('Podana ścieżka [' . $path . '] nie odnosi się się do katalogu.');
		}
	}
}
