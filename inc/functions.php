<?php

// GLOBALS
$words_in_sentence=10;
$sentences_in_paragraph=5;
$total_words=$words_in_sentence*$sentences_in_paragraph;

function get_welcome() {
	$var="
	<p>Welcome to the Ipsum Generator.</p>
	<p>We are aiming to make the only ipsum generator you'll ever need in a wide variety of flavors.</p>
	<h3>What is ipsum?</h3>
	<p>In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content that could be distracting with placeholder text may allow viewers to focus on graphic aspects such as font, typography, and page layout. </p>
	";
	return $var;
}

function dev_info(){
	echo "<script>document.write('<script src=\"http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1\"></' + 'script>')</script>";
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

function get_csv_path(){
	$ipsum = $_POST["ipsum"];
	$ipsum=downcasespace($ipsum);
	//returns a path where the csv file is located
	$path="lists/".$ipsum.".txt";
	//gets array from csv file
	$array=fgetcsv( fopen( $path, "r") );
	return $array;
}

//gets the list items and then prints it
function ipsum_text($ipsum,$paragraphs) {

	global $words_in_sentence;
	global $sentences_in_paragraph;
	global $total_words;

	//gets the specific array
	$array = ipsum_array($ipsum);

	//prints the paragraphs based on the loop
	for ($paragraph_count=1; $paragraph_count <= $paragraphs ; $paragraph_count++) { 
		
		$random_number_array=array();

		// adds more nmbers to the array if there are not enough
		while ( count($array) < $total_words ) 	{ $array=array_merge($array,$array); } 

		$random_number_array=array_rand($array,$total_words);
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
			elseif ( $word_count < $words_in_sentence -2 && $word_count > 3 && mt_rand(0,100)<20 ) 
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

//converts title into lowercase and no spaces
function downcasespace($string) {
	$string = str_replace(" ", "", $string);
	$string = strtolower($string);
	return $string;
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