<?php
/**
 * Klasa pozawalajaca dodawac i odczytywac komentarze
 * 
 * @autor: Patryk Jar
 * @data: 5 11 2010 r.
 * */

class Comments
{
	const NICK    = 'nick';
	const CONTENT = 'content';
	const SEND    = 'send';

	public function handleAddingRequest()
	{
		if (isset($_POST[self::SEND]))
		{
			return $this->add($_POST);
		}

		return null;
	}

	public function add( array $input )
	{
		try
		{
			$this->validate($input);
			$this->save($input);
			$result = array(
				'class' => 'success',
				'text'  => 'Dziękujemy za dodanie komentarza.'
			);
		}
		catch(noNickException $e)
		{
			$result = array(
				'class' => 'fail',
				'text'  => 'Proszę podać nick.'
			);
		}
		catch(noContentException $e)
		{
			$result = array(
				'class' => 'fail',
				'text'  => 'Proszę podać treść komentarza.'
			);
		}

		return $result;
	}

	private function save( &$input )
	{
		$pdo = new PDO(
			'mysql:host=localhost;dbname=comments',
			'root',
			'123');
		$sql = "INSERT INTO comments VALUES (NULL, "
			. "'" . $this->escape($input[self::NICK]) . "'," 
			. "'" . $this->escape($input[self::CONTENT]) . "')";

		$res = $pdo->exec($sql);

		return $res;
	}

	private function escape($string)
	{
		return addslashes(htmlspecialchars($string));
	}

	private function validate( &$input )
	{
		noNickException::raise($input);
		noContentException::raise($input);
	}

	public function get( $offset = 0 )
	{
		$pdo = new PDO(
			'mysql:host=localhost;dbname=comments',
			'root',
			'123');

		$sql = "
			SELECT 
				* 
			FROM `comments`
			ORDER BY id ASC
			LIMIT ". intval($offset) .", 10";

		$res = $pdo->query($sql);
		$data = $res->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}
}


class CommentsException extends Exception {}

class noNickException extends CommentsException
{
	static public function raise( array $input )
	{
		if (empty($input[Comments::NICK]))
		{
			throw new self('Nie podałeś nicka');
		}
	}
}

class noContentException extends CommentsException
{
	static public function raise( array $input )
	{
		if (empty($input[Comments::CONTENT]))
		{
			throw new self('Nie podałeś treści komentarza');
		}
	}
}
