<?php
/**
 * Skrypt pokazujacy jak mozna w php programowac strukturalnie z wykorzystaniem klas
 * @autor: Patryk Jar
 * */

interface Figura
{
	public function pole();
	public function obwod();
}

class Kwadrat implements Figura
{
	const LICZBA_BOKOW = 4;

	protected $bok;

	public function __construct($bok)
	{
		$this->bok = $bok;
	}

	public function pole()
	{
		return $this->bok*$this->bok;
	}

	public function obwod()
	{
		return $this->bok*self::LICZBA_BOKOW;
	}
}

/**
 * Operujac na interfejsie wnetrze obiektu moze ulec sporym zmianom
 * */
class Kwadrat2 extends Kwadrat
{
	const LICZBA_BOKOW = 4;

	protected $pole;

	public function __construct($pole)
	{
		$this->pole = $pole;
	}

	public function pole()
	{
		return $this->pole;
	}

	public function bok()
	{
		if (0 != $this->pole)
		{
			return $this->pole/$this->pole;
		}

		return 0;
	}

	public function obwod()
	{
		return $this->bok*self::LICZBA_BOKOW;
	}
}

class Trojkat implements Figura
{
	const LICZBA_BOKOW = 3;

	protected $podstawa;
	protected $wysokosc;

	public function __construct($podstawa, $wysokosc)
	{
		$this->podstawa = $podstawa;
		$this->wysokosc = $wysokosc;
	}

	public function pole()
	{
		return 1/2 *($this->podstawa*$this->wysokosc);
	}

	public function obwod()
	{
		return $this->podstawa*self::LICZBA_BOKOW;
	}
}

?>
