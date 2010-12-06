<?php
require_once 'PHPUnit/Framework.php';
require_once '../struktury.php';

class StrukturyTest extends PHPUnit_Framework_TestCase
{
	private function getKwadrat( $bok )
	{
		$kwadrat = new Kwadrat();
		$kwadrat->bok = $bok;

		return $kwadrat;
	}

	private function getTrojkat( $podstawa, $wysokosc )
	{
		$trojkat = new Trojkat();
		$trojkat->podstawa = $podstawa;
		$trojkat->wysokosc = $wysokosc;

		return $trojkat;
	}
	
	public function testPoleKwadratuPoprawneDane()
	{
		$bok = 10;

		$obj = $this->getKwadrat($bok);
		$this->assertEquals($bok*$bok, Funkcje::poleKwadratu($obj));
	}

	public function testPoleKwadratuZeroBok()
	{
		$bok = 0;

		$obj = $this->getKwadrat($bok);
		$this->assertEquals($bok*$bok, Funkcje::poleKwadratu($obj));
	}

	public function testPoleTrojkata()
	{
		$h = 10;
		$pod = 5;

		$obj = $this->getTrojkat($pod, $h);
		$this->assertEquals((1/2)*($h*$pod), Funkcje::poleTrojkata($obj));
	}

	public function testPoleTrojkataZeroPodst()
	{
		$h = 10;
		$pod = 0;

		$obj = $this->getTrojkat($pod, $h);
		$this->assertEquals((1/2)*($h*$pod), Funkcje::poleTrojkata($obj));
	}

	public function testPoleTrojkataZeroWys()
	{
		$h = 0;
		$pod = 6;

		$obj = $this->getTrojkat($pod, $h);
		$this->assertEquals((1/2)*($h*$pod), Funkcje::poleTrojkata($obj));
	}
}


?>
