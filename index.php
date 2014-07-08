<?php 
require "inc/ipsum.php" ;
$ipsum = $_POST["ipsum"];
$paragraphs = $_POST["paragraphs"];
;?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>One Ipsum to Rule Them All</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/normalize.css">
</head>
<body>
	
	<div class="container">

		<h1><a href="./">Ipsum Generator</a></h1>
		<form method="post" action="<?php echo $PHP_SELF; ?>">
			
			Select Your Flavor: 
			<select name="ipsum">
			<?php  html_option_ipsums(); ;?>
			</select><br>

			Number of paragraphs: <input type="text" name="paragraphs" value="3"><br>
			<?php if ( is_null($ipsum) ) { $value="submit"; } else { $value="refresh"; } ;?>
			<input type="submit" value="<?php echo $value ;?>" name="<?php echo $value ;?>">

		</form>
		<p><?php if ( is_null($ipsum) && is_null($array) ) { echo get_welcome(); } else { ipsum_text($ipsum,$paragraphs) ; } ?></p>

	</div>

	<!-- dev -->
	<div class="dev"><?php echo " ipsum: ".$ipsum.", paragraphs: ".$paragraphs;?></div>
	
	<footer>
		<div class="container">
			inspired by: <a href="http://www.rikeripsum.com/" target='_blank'>Riker Ipsum</a>, <a href="http://hipsum.co" target='_blank'>Hipster Ipsum</a>
		</div>	
	</footer>
</body>
</html>