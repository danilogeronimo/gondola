<?php 

//

function parseLinks($url){
	$html = file_get_contents($url);
	$dom = new DOMDocument;
	$arrLinks = array();
	$arrVideos = array();
	$arrFinal = array();

	
	@$dom->loadHTML($html);

	$links = $dom->getElementsByTagName('a');

	foreach ($links as $link) {		
		array_push($arrLinks,  $link->getAttribute('href'));
	}	
	$arrVideos = array_filter($arrLinks,function($value){
		if(stripos($value, '.webm')){	
			return true;
		}		
	});

	$compara = "";
	foreach ($arrVideos as $a){
		if($a == $compara){
			array_push($arrFinal, $a);
		}
		$compara = $a;
	}


	return $arrFinal;
}

?>