<?php 
function parseLinks($url){
	$dom = new DOMDocument;
	$arrDom = array();
	$arrLinks = array();
	$arrVideos = array();
	$compareWebms = "";
 
	if($url !== ""){
		// Error control operator, should not use! http://pt.stackoverflow.com/questions/84178/por-que-dizem-que-utilizar-arroba-pra-suprimir-erros-%c3%a9-uma-m%c3%a1-pr%c3%a1tica
		if(@$html = file_get_contents($url)){
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
		}else{
			return "The thread does'n exist :p";
		}
	}
	else{
		return "You forgot to paste a thread :p";

	}	
	
	
}

//parseLinks("http://boards.4chan.org/wsg/thread/1559242#");