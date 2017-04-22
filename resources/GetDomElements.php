<?php 

Class GetDomElements{
	public $url;
	public $links;
	public $subject;
	public $imgs;

	function __construct($url){
		$dom = new DOMDocument;		
		$this->url = $url;
		
		if($url !== ""){
			// Error control operator, should not use! http://pt.stackoverflow.com/questions/84178/por-que-dizem-que-utilizar-arroba-pra-suprimir-erros-%c3%a9-uma-m%c3%a1-pr%c3%a1tica
			if(@$html = file_get_contents($url)){
				@$dom->loadHTML($html);
				$this->links = $dom->getElementsByTagName('a');	
				//$this->subject = $dom->getElementsByTagName('span');
				$teste = $dom->getElementsByTagName('img');

			}else{
				return "The thread doesn't exist :p";
			}
		}else{
			return "You forgot to paste a thread :p";
		}
	}

	public function getLinks(){		
		$links = $this->links;
		if($links == ""){
			echo "<script>
					alert('Thread not found :p');
					(function (){
						window.location.replace('index.php');
					})();
				</script>";
		}else{
			$arrLinks = array();
			$arrDomLinks = array();
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

}



//getLinks("http://boards.4chan.org/wsg/thread/1559242#");