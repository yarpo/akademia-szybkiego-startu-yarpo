<?php
/**
 * Skrypt pokazujacy jak mozna w php programowac strukturalnie z wykorzystaniem klas
 * @autor: Patryk Jar
 * */

class Funkcje
{
	public static function poleKwadratu( Kwadrat $kwadrat )
	{
		return $kwadrat->bok * $kwadrat->bok;
	}

	public static function poleTrojkata( Trojkat $trojkat )
	{
		return 1/2 * ($trojkat->podstawa * $trojkat->wysokosc);
	}
}

/**
 * Struktura danych przechowujaca dane o kwadracie
 * */
class Kwadrat
{
	public $bok;
}


/**
 * Struktura danych przechowujaca dane o Trojkacie
 * */
class Trojkat
{
	public $podstawa;
	public $wysokosc;
}

?>
