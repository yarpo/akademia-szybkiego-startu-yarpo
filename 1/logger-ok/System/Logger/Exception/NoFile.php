<?php
/**
 * Wyjatek rzucany, gdy nie istnieje plik
 * @autor: Patryk Jar
 * */

class System_Logger_Exception_NoFile extends System_Logger_Exception_Default
{
	const MSG = 'Nie ma plik w lokacji %s';

	static public function exists( $filePath )
	{
		Validation_Type::isNotEmptyString($filePath);
		if (!file_exists($filePath))
		{
			throw new self(sprintf(self::MSG, $filePath));
		}
	}
}
