<?php

function get_welcome() {
	$var="Welcome to the Ipsum Generator. Tumblr fashion axe locavore, readymade squid 8-bit artisan VHS irony Tonx vegan paleo. Readymade cardigan forage irony. 90's beard Wes Anderson mumblecore Tonx, High Life roof party retro Cosby sweater vinyl. Cardigan mumblecore chillwave +1 gluten-free direct trade. </p><p>Keffiyeh cred Godard dreamcatcher, ennui beard forage slow-carb Neutra. Deep v Williamsburg whatever freegan, 8-bit squid butcher Truffaut banh mi brunch try-hard. Bushwick bitters messenger bag, cliche roof party irony Banksy deep v 3 wolf moon hashtag twee.";
	return $var;
}

function list_ipsums(){
	$array=array(
		"Video Games",
		"RPGs",
		"Fallout",
		"Star Trek",
		"Star Wars",
		"Batman"
	);
	return $array;
}

function html_option_ipsums() {

	$lists=list_ipsums();
	foreach ($lists as $list_item) {
		echo '<option value="'.$list_item.'"';
		//will change the selected option after 'post'
		if ( $ipsum == $list_item ){ echo " selected"; }
		echo ">".$list_item.'</option>';
	}
}

function ipsum_array() {
	
	//the array that stores all the words
	$array=array(
		"Mario",
		"Snake",
		"Galaga",
		"burger time",
		"controller",
		"Sega",
		"Wiimote",
		"1-up",
		"fire flower",
		"ghost",
		"Murasame",
		"Masamune",
		"Tri-force",
		"finish him",
		"hadoken",
		"shoryuken",
		"Sheng Long",
		"Samus",
		"8-bit",
		"Inky",
		"pacu pacu",
		"tanuki suit",
		"cowabunga",
		"auto-fire",
		"cheat code",
		"adventure game",
		"Guybrush Threepwood",
		"Mame",
		"arcade game",
		"console",
		"edutainment",
		"role-playing game",
		"first-person shooter",
		"Nintendo"

	);
	return $array;
}

function html_print_sentence($sentence_array){
	//prints out the sentence from sentence array
	$counter=-1;
	foreach ($sentence_array as $word) {
		$counter++;
		//fix capitalization so it only capitalizes the first word
		if ( $counter==0 ) { echo ucwords($word); } else { 	echo $word; }
		if ( $counter == 10 ) { echo ". "; $counter = 0; } else { 	echo " "; }
	}
	//to do: punctuation
}

function randnum($array,$limit){

	$array_count=count($array);
	for ($count=0; $count < $limit; $count++) { 
		$rand=array();
		while ( $count<= $limit) {
			$random_number=mt_rand(0,$array_count);
			if ( !in_array($random_number, $rand) ) { $rand[]=$random_number; $count++; }
		}
	}
	return $rand;
}

function ipsum_text($paragraphs=3) {
	if ( is_null($paragraphs) || $paragraphs==0 ) { $paragraphs=3; }
	$array = ipsum_array();
	$array_count = count($array);
	
	//prints paragraphs
	for ($paragraph_counter=1; $paragraph_counter <= $paragraphs; $paragraph_counter++) { 
		//prints out sentences
		echo "<p>";
		for ($sentence_counter=1; $sentence_counter <= 3 ; $sentence_counter++) { 
		
			//gets randomnumbers array
			$randnum=randnum($array,10);

			//puts random words into array using rando numbers
			foreach ($randnum as $number) {
				$sentence[]=$array[$number];
			}
			
			html_print_sentence($sentence);
			$sentence=NULL;
		}
		echo "</p>";
	}
}