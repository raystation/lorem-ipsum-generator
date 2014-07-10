<?php 
require "inc/ipsum.php" ;
$title="One Ipsum to Rule Them All";
$ipsum = $_POST["ipsum"];
$paragraphs = $_POST["paragraphs"];
$default_paragraph_value="3";
// get_dev();
;?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Ipsum Generator | <?php echo $title ;?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="<?php echo downcasespace($ipsum)."-body";?>">
	
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
		<?php if ( is_null($ipsum) && is_null($array) ) { echo get_welcome(); } else { ipsum_text($ipsum,$paragraphs) ; } ?>

	</div>
	
	<footer class="<?php echo downcasespace($ipsum)."-footer";?>">
		<div class="container">
			Inspired by: <a href="http://www.rikeripsum.com/" target='_blank'>Riker Ipsum</a>, <a href="http://hipsum.co" target='_blank'>Hipster Ipsum</a><br>
			Yes, I understand this site looks like poop right now. <br>
			All Rights Reserved &copy; <?php $date=get_date();echo $date["year"];?> <a href="http://www.rayuen.com" target='_blank'>Raymond Yuen</a>
		</div>	
	</footer>
</body>
</html>