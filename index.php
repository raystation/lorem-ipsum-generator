<?php 
require "inc/functions.php" ;
$title="One Ipsum to Rule Them All";
$ipsum = $_POST["ipsum"];
$paragraphs = $_POST["paragraphs"];
$default_paragraph_value="3";
include "inc/header.php";
get_dev(false);

;?>

<div class="container">

	<div class="logo"><a href="./">Ipsum Generator</a></div>
	<form method="post" action="<?php echo $PHP_SELF; ?>">
		Select Your Flavor:
		<select name="ipsum">
		<?php html_option_ipsums();?>
		</select><br>

		Number of paragraphs: <input type="text" name="paragraphs" value="<?php if(is_null($paragraphs)){ echo $default_paragraph_value;} else {echo $paragraphs;}?>"><br>
		<?php if ( is_null($ipsum) ) { $value="submit"; } else { $value="refresh"; } ;?>
		<input type="submit" value="<?php echo $value ;?>" name="<?php echo $value ;?>">

	</form>
	<?php if ( is_null($ipsum) && is_null($array) ) { echo get_welcome(); } else { ipsum_text($ipsum,$paragraphs) ; } ?>

</div>

<?php include "inc/footer.php";?>