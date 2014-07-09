<?php 
require "inc/ipsum.php" ;
$ipsum = $_POST["ipsum"];
$paragraphs = $_POST["paragraphs"];
$default_paragraph_value="3";
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
			<?php  html_option_ipsums();?>
			</select><br>

			Number of paragraphs: <input type="text" name="paragraphs" value="<?php if(is_null($paragraphs)){ echo $default_paragraph_value;} else {echo $paragraphs;}?>"><br>
			<?php if ( is_null($ipsum) ) { $value="submit"; } else { $value="refresh"; } ;?>
			<input type="submit" value="<?php echo $value ;?>" name="<?php echo $value ;?>">

		</form>
		<p><?php if ( is_null($ipsum) && is_null($array) ) { echo get_welcome(); } else { ipsum_text($ipsum,$paragraphs) ; } ?></p>

	</div>
	
	<footer>
		<div class="container">
			Inspired by: <a href="http://www.rikeripsum.com/" target='_blank'>Riker Ipsum</a>, <a href="http://hipsum.co" target='_blank'>Hipster Ipsum</a><br>
			Copyright &copy; <?php $date=get_date();echo $date["year"];?> <a href="http://www.rayuen.com" target='_blank'>Raymond Yuen</a>
		</div>	
	</footer>

	<!-- dev -->
	<!-- <div class="dev"><?php echo " ipsum: ".$ipsum.", paragraphs: ".$paragraphs;?></div> -->

</body>
</html>