<?
	require "inc/functions.php" ;
	$title="One Ipsum to Rule Them All";
	$ipsum = (isset( $_POST["ipsum"] ) ? $_POST["ipsum"] : null );
	$paragraphs = (isset( $_POST["paragraphs"] ) ? $_POST["paragraphs"] : null );
	// $ipsum = $_POST["ipsum"];
	// $paragraphs = $_POST["paragraphs"];
	$default_paragraph_value="3";
	include "inc/header.php";
;?>

<div class="row">

	<div class="small-12 columns">
		<div class="logo"><a href="./">Ipsum Generator</a></div>
		<form method="post" action="<? echo $_SERVER['PHP_SELF']; ?>">
	</div>

	<fieldset class="ipsum-form">
		<div class="small-4 columns">
			Select Your Flavor:
		</div>

		<div class="small-4 columns">
			<select name="ipsum">
			<? html_option_ipsums();?>
			</select><br>
		</div>
		<div class="clearfix"></div>


		<div class="small-4 columns">
				Number of paragraphs:
		</div>
		<div class="small-4 columns">
			<input type="text" name="paragraphs" value="<? if(is_null($paragraphs)){ echo $default_paragraph_value;} else {echo $paragraphs;}?>">
		</div>

		<div class="small-4 columns">
			<? if ( is_null($ipsum) ) { $value="submit"; } else { $value="refresh"; } ;?>
			<input type="submit" value="<? echo $value ;?>" name="<? echo $value ;?>">
			</form>
		</div>

	</fieldset>

	<div class="small-12 columns ipsum-text">
		<? if ( !isset($ipsum) && !isset($array) ) { echo get_welcome(); } else { ipsum_text($ipsum,$paragraphs) ; } ?>
	</div>

</div>

<? include "inc/footer.php";?>