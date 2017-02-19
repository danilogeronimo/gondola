<?php 
function parseLinks($url){
	$html = file_get_contents($url);
	$dom = new DOMDocument;
	$arrDom = array();
	$arrLinks = array();
	$arrVideos = array();
	$compareWebms = "";
	
	@$dom->loadHTML($html); // Error control operator, should not use! http://pt.stackoverflow.com/questions/84178/por-que-dizem-que-utilizar-arroba-pra-suprimir-erros-%c3%a9-uma-m%c3%a1-pr%c3%a1tica

	//get all links from DOM
	$links = $dom->getElementsByTagName('a');

	//pushs into array links that container the href atrribute
	foreach ($links as $link) {		
		array_push($arrDom,  $link->getAttribute('href'));
	}	

	//filter only .webm
	$arrLinks = array_filter($arrDom,function($value){
		if(stripos($value, '.webm')){	
			return true;
		}		
	});

	//when the site gives two links for the same webm this take just one and pushs
	foreach ($arrLinks as $a){
		if($a == $compareWebms){
			array_push($arrVideos, $a);
		}
		$compareWebms = $a;
	}
	return $arrVideos;
}
