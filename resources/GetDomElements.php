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

		$i = 0;
		foreach ($links as $link) {		
			$arrDomLinks[$i]['link'] = $link->getAttribute('href');
			$arrDomLinks[$i]['name'] = $link->nodeValue;
			$i++;
		}	

		$arrLinks = array_filter($arrDomLinks,function($value){
			if(stripos($value['link'],'.webm') && stripos($value['name'],'.webm')){
				return true;
			}
		});	

		return $arrLinks;		
	}
}



//getLinks("http://boards.4chan.org/wsg/thread/1559242#");