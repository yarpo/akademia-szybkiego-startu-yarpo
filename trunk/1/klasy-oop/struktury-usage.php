<?php

require_once 'struktury.php';

$kwadrat = new Kwadrat();
$trojkat = new Trojkat();

$kwadrat->bok = 10;
$trojkat->podstawa = 20;
$trojkat->wysokosc = 3;

echo 'pole kwadratu: ' . Funkcje::poleKwadratu($kwadrat) . '<br />';
echo 'pole trojkata: ' . Funkcje::poleTrojkata($trojkat) . '<br />'; 
