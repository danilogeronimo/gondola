<?php 
function parseLinks($url){
	$html = file_get_contents($url);
	$dom = new DOMDocument;
	$arrDom = array();
	$arrLinks = array();
	$arrVideos = array();
	$compareWebms = "";
	
	@$dom->loadHTML($html);

	$links = $dom->getElementsByTagName('a');

	foreach ($links as $link) {		
		array_push($arrDom,  $link->getAttribute('href'));
	}	
	$arrLinks = array_filter($arrDom,function($value){
		if(stripos($value, '.webm')){	
			return true;
		}		
	});

	foreach ($arrLinks as $a){
		if($a == $compareWebms){
			array_push($arrVideos, $a);
		}
		$compareWebms = $a;
	}
	return $arrVideos;
}
