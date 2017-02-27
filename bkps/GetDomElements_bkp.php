<?php 

Class GetDomElements{
	public $url;
	public $links;

	function __construct($url){
		$dom = new DOMDocument;
		$this->url = $url;

		if($url !== ""){
			if(@$html = file_get_contents($url)){
				@$dom->loadHTML($html);
				$this->links = $dom->getElementsByTagName('a');			
			}else{
				return "The thread doesn't exist :p";
			}
		}else{
			return "You forgot to paste a thread :p";
		}
	}

	public function getLinks(){		
		$links = $this->links;
		$arrLinks = array();	
		$arrVideos = array();
		$arrDomLinks = array();
		$compareWebms = "";	

		foreach ($links as $link) {		
			array_push($arrDomLinks,  $link->getAttribute('href'));
		}	

		$arrLinks = array_filter($arrDomLinks,function($value){
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

	public function getNames(){
		$links = $this->links;
		$arrNames = array();
		$arrDomNames = array();

		foreach ($links as $link) {		
			array_push($arrDomNames, $link->nodeValue,PHP_EOL);				
		}	

		$arrNames = array_filter($arrDomNames,function($value){
			if(stripos($value, '.webm')){	
				return true;
			}		
		});	
		return $arrNames;		
	}
}



//getLinks("http://boards.4chan.org/wsg/thread/1559242#");