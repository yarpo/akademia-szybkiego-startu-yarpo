<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Akademia szybkiego startu - 8 listopada 2010 r.</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>

<body>
<pre>

<?php
	require 'inc/DirContent.php';

	$folder = new DirContent('./');
	print_r($folder->getList(array('inc')));

?>

</pre>
</body>
</html>
