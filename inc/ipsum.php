<?php

function get_welcome() {
	$var="Welcome to the Ipsum Generator.</p><p>Mario Wiimote Nintendo fire flower controller Galaga burger time Sega Snake 1-up. Wiimote 1-up controller Mario burger time Sega Snake Nintendo fire flower Galaga. Burger Time fire flower Sega Galaga Snake Nintendo controller Mario 1-up Wiimote.</p><p>Sega controller burger time Wiimote Galaga Snake Nintendo Mario 1-up fire flower. Mario Wiimote Nintendo 1-up Snake Sega fire flower Galaga controller burger time. Controller Wiimote Nintendo burger time Snake 1-up Galaga Mario fire flower Sega.";
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

	// switch ($ipsum) {
	// 	case 'Video Games':
	// 	$array=list_videogames();
	// 	break;

	// 	case 'RPGs':
	// 	$array=list_videogames();
	// 	break;		

	// 	case 'Fallout':
	// 	$array=list_fallout();
	// 	break;
		
	// 	case 'Star Wars':
	// 	$array=list_starwars();
	// 	break;
		
	// 	default:
	// 	$array=list_videogames();
	// 	break;
	// }
	return $array;
}

function html_print_sentence($sentence_array){
	//prints out the sentence from sentence array
	$counter=1;
	foreach ($sentence_array as $word) {
		//fix capitalization so it only capitalizes the first word
		if ( $counter == 1 ) { echo ucfirst($word); } else { echo $word; }
		// debug if ( $counter == 11 ) { echo ".<span class='markup'>_</span>"; $counter = 1; } else { echo "<span class='markup'>-</span>"; }
		if ( $counter == 11 ) { echo ". "; $counter = 1; } else { echo " "; }
		$counter++;
	}
	//to do: punctuation
}

function randnum($array,$numbers_to_return){

	$array_count=count($array)-1;
	$rand=array();

	for ($count=0; $count <= $numbers_to_return; $count++) { 
		while ( $count<= $numbers_to_return) {
			$random_number=rand(0,$array_count);
			// echo $random_number.",";
			// checks to see if number is already in array
			if ( !in_array($random_number, $rand) ) { $rand[]=$random_number; $count++; }
			// $rand[]=$random_number; 
			// $count++;
		}
	}
	return $rand;
}

function ipsum_text($ipsum,$paragraphs=1) {
	$words_in_sentence=10;
	$sentences_in_paragraph=5;

	if ( is_null($paragraphs) || $paragraphs==0 ) { $paragraphs=1; }
	
	//gets the specific array and counts it
	$array = ipsum_array($ipsum);
	if ( is_null($array) ) { return; }
	$array_count = count($array);
	
	//prints paragraphs
	for ($paragraph_counter=1; $paragraph_counter <= $paragraphs; $paragraph_counter++) 
	{ 
		//prints out sentences
		echo "<p>";
		for ($sentence_counter=1; $sentence_counter <= $sentences_in_paragraph ; $sentence_counter++) { 
		
			//gets randomnumbers array
			$randnums=randnum($array,$words_in_sentence);

			//puts random words into array using rando numbers
			foreach ($randnums as $number) {
				$sentence[]=$array[$number];
			}
			
			html_print_sentence($sentence);
			$sentence=array();
			$randnums=array();
		}
		echo "</p>";
	}
}

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