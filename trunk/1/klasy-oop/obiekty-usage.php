<?php
function myPrint(Figura $figura)
{
	echo 'To jest figura o polu : ' . $figura->pole . '<br />';
}

$kwadrat = new Kwadrat(10);
$trojkat = new Trojkat(10, 3);

myPrint($kwadrat);
myPrint($trojkat);
