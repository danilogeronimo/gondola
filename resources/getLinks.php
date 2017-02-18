<?php 
function parseLinks(){
	$html = file_get_contents('https://yuki.la/wsg/1050254');
	$dom = new DOMDocument;
	$arrLinks = array();
	$arrVideos = array();

	@$dom->loadHTML($html);

	$links = $dom->getElementsByTagName('a');

	foreach ($links as $link) {
		array_push($arrLinks,  $link->getAttribute('href'));
	}

	array_filter($arrLinks,function($value){
		if(stripos($value, '.webm')){
			echo "<video controls width='400' heigth='400'>"
			."<source src='{$value}' type='video/webm'>"
			."</video>";
			die();
		}
		
	});

} 

parseLinks();
?>