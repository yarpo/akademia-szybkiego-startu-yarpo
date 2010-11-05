<?php
	require 'inc/comments.php';
	$oCom = new Comments();
	$addingResult = $oCom->handleAddingRequest();
	$comments = $oCom->get();
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>HTML 5</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" >
</head>
<body>

<section id="wrapper">
	<header>
		<h1>Galeria</h1>
	</header>
	<section class="item">
		<img src="img/empty.png" class="fg" alt="" />
		<img src="img/photo.png" class="bg" alt="" />
	</section>
	<section class="item">
		<img src="img/empty.png" class="fg" alt="" />
		<img src="img/photo.png" class="bg" alt="" />
	</section>
	<section class="item">
		<img src="img/empty.png" class="fg" alt="" />
		<img src="img/photo.png" class="bg" alt="" />
	</section>
	<section class="item">
		<img src="img/empty.png" class="fg" alt="" />
		<img src="img/photo.png" class="bg" alt="" />
	</section>
</section>

<section id="comments">
	<form action="#" method="post">
		<table>
			<tr>
				<td><label for="nick">Nick:</label></td>
				<td><input type="text" name="nick" id="nick"></td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea name="content" cols="30" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="send" value="wyślij"></td>
			</tr>
		</table>
	</form>
<?php
	$n = count($comments);
	if ($n > 0)
	{
		for($i = 0; $i < $n; $i++)
		{
			echo '<div class="comment"><p class="nick">' . $comments[$i][Comments::NICK] . '</p><p>'.
				$comments[$i][Comments::CONTENT] . '</p></div>';
		}
		echo '</ul>';
	}
?>
	</ul>
</section>

<footer>
	<nav>
		<ul>
			<li><a href="#">HOME</a> | </li>
			<li><a href="#">Contact</a></li>
		</ul>
	</nav>
</footer>
</body>
</html>
