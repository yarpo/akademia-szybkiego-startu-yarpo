<?php
/**
 * Wyjatek rzucany, gdy wystepuje problem z adresem email
 * @autor: Patryk Jar
 * */

class System_Logger_Exception_Email extends System_Logger_Exception_Default
{
	const MSG = 'Podany adres e-mail (%s) jest niepoprawny';
	const PATTERN = '/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/';

	static public function correct( $mail )
	{
		Validation_Type::isNotEmptyString($mail);

		if (!preg_match(self::PATTERN,  $mail))
		{
			throw new self(sprintf(self::MSG, $mail));
		}
	}
}
