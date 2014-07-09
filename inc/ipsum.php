<?php

// GLOBALS
$words_in_sentence=10;
$sentences_in_paragraph=5;

function get_welcome() {
	$var="
	<p>Welcome to the Ipsum Generator.</p>
	<p>We are aiming to make the only ipsum generator you'll ever need in a wide variety of flavors.</p>
	<h3>What is ipsum?</h3>
	<p>In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content that could be distracting with placeholder text may allow viewers to focus on graphic aspects such as font, typography, and page layout. </p>
	";
	return $var;
}

function ipsum_array($ipsum) {
	require_once 'inc/lists.php';
	$ipsum = $_POST["ipsum"];
	
	//converts title into lowercase and no spaces
	$ipsum = str_replace(" ", "", $ipsum);
	$ipsum = strtolower($ipsum);
	$ipsum="list_".$ipsum;
	$array=$ipsum();
	return $array;
}

//gets the list items and then prints it
function ipsum_text($ipsum,$paragraphs) {

	global $words_in_sentence;
	global $sentences_in_paragraph;
	$total_words=$words_in_sentence*$sentences_in_paragraph;

	//gets the specific array
	$array = ipsum_array($ipsum);

	//prints the paragraphs based on the loop
	for ($paragraph_count=1; $paragraph_count <= $paragraphs ; $paragraph_count++) { 
		
		$random_number_array=array();

		//adds more nmbers to the array if there are not enough
		// if ( count($array) < $total_words ) 
		// {	
		// 	echo "fuck";
		// 	while ( count($new_array) < $total_words )  
		// 	{
		// 		$rand=mt_rand( 0, count($array) );
		// 		$new_array[]=$array[$rand];
				
		// 	}
		// 	echo count($new_array);
		// 	var_dump($new_array);
		// 	$random_number_array=array_rand($new_array,$total_words);
		// 	// $new_array=$array;
		// } 
		
		// else 
		// {
			$random_number_array=array_rand($array,$total_words);
		// }

		shuffle($random_number_array);

		$paragraph_array=array();
		$word_count=1;
		$sentence_count=1;

		//adds punctuation to the words in the array
		foreach ( $random_number_array as $num ) {

			if ( $word_count==1 )
			{ 
				$paragraph_array[]=ucfirst( $array[$num] ); 
				$word_count++;
				$sentence_count++;				
			} 
			//make a comma appear randomly
			elseif ( $word_count < $words_in_sentence && $word_count > 3 && mt_rand(0,100)<10 ) 
			{
				$paragraph_array[]=$array[$num].", "; 
				$word_count++;
			}
			elseif ( $word_count==$words_in_sentence )
			{
				$paragraph_array[]=$array[$num].". "; 
				$word_count=1;
			} 
			else 
			{ 
				$paragraph_array[]=$array[$num]; 
				$word_count++;
			}
		}

		//prints out the paragraph in html
		echo "<p>";
		foreach ($paragraph_array as $key => $word) {
			$key++;
			echo $word." ";
		}
		echo "</p>";
	}
}

//prints out the drop down list
function html_option_ipsums() {
	require_once 'inc/lists.php';
	$lists=list_ipsums();
	global $ipsum;
	foreach ($lists as $list_item) {
		echo '<option value="'.$list_item.'"';
		//will change the selected option after 'post'
		if ( $list_item==$ipsum ){ echo " selected"; }
		echo ">".$list_item.'</option>';
	}
}

function get_date() {
	date_default_timezone_set('America/Los_Angeles');
	$date["year"]=date('Y');
	$date["day"]=date('D');
	return $date;
}

function get_dev(){
	global $ipsum;
	global $paragraphs;
	echo '<div class="dev">';
	echo " ipsum: ".$ipsum.", paragraphs: ".$paragraphs;
	echo "</div>";
}