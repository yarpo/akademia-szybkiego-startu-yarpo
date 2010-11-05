<?php
	require 'inc/comments.php';
	$oCom = new Comments();
	$addingResult = $oCom->handleAddingRequest();
	$comments = $oCom->get();
	$pageCount = ceil($oCom->getCommentsNumber() / Comments::COMMENTS_ON_PAGE);
	
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>HTML 5</title>
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link href="css/pager.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.pager.js" type="text/javascript"></script>
	<script type="text/javascript">

		$(document).ready(function() {
			$("#pager").pager({ pagenumber: 1, pagecount: <?php echo $pageCount; ?>, buttonClickCallback: PageClick });
		});

		PageClick = function(pageclickednumber) {
			$("#pager").pager({ pagenumber: pageclickednumber, pagecount: <?php echo $pageCount; ?>, buttonClickCallback: PageClick });
			$.ajax({
				url: "pager.php",
				type: 'get',
				dataType: 'text',
				data: 'offset=' + (pageclickednumber-1),
				success: function(data) {
					$("#result").fadeOut().html(data).fadeIn();
					var body = document.getElementsByTagName('body')[0];
					window.setTimeout(function() {
						body.scrollTop = body.scrollHeight;
					}, 550);
				}
			});
		};
	</script>
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

	<?php	if ($addingResult) : ?>
	<p class="<?php echo $addingResult['class']; ?>"><?php echo $addingResult['text']; ?></p>
	<?php endif; ?>

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
	<div id="result">
<?php

	$n = count($comments);
	if ($n > 0)
	{
		for($i = 0; $i < $n; $i++)
		{
			echo '<div class="comment"><p class="nick">' . $comments[$i][Comments::NICK] . '</p><p>'.
				$comments[$i][Comments::CONTENT] . '</p></div>';
		}
	}
?>
	</div>
	<div id="pager"></div>
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
