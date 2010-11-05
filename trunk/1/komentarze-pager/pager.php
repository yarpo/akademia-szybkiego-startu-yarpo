<?php

if (isset($_GET['offset']) && is_numeric($_GET['offset']))
{
	require 'inc/comments.php';

	$offset = intval($_GET['offset']);
	$oCom = new Comments();
	$comments = $oCom->get($offset);

	$n = count($comments);
	if ($n > 0)
	{
		for($i = 0; $i < $n; $i++)
		{
			echo '<div class="comment"><p class="nick">' . $comments[$i][Comments::NICK] . '</p><p>'.
				$comments[$i][Comments::CONTENT] . '</p></div>';
		}
	}
}
else
{
	echo '<div class="comment"><p class="nick">administrator</p><p>Wystąpił błąd.</p></div>';
}

