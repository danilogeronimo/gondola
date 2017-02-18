<?php 
$url = $_GET['url'];
//https://yuki.la/wsg/1050254

function parseLinks($url){
	$html = file_get_contents($url);
	$dom = new DOMDocument;
	$arrLinks = array();
	$arrVideos = array();

	@$dom->loadHTML($html);

	$links = $dom->getElementsByTagName('a');

	foreach ($links as $link) {
		array_push($arrLinks,  $link->getAttribute('href'));
	}	

	array_push($arrVideos,"oie");

	$arrVideos = array_filter($arrLinks,function($value){
		if(stripos($value, '.webm')){	
			return true;
		}		
	});
	return $arrVideos;
} 

?>