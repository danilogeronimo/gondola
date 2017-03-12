<?php 
$links = $_POST['link'];

foreach($links as $name){
	$namesLinks = explode("|",$name);
	foreach($namesLinks as $nl){
		$pattern = "/^\/\//";
		if(preg_match($pattern,$nl,$matches)){
			$content = file_get_contents('http:'.$nl);			
		}
		else{
			$fp = fopen("../../Downloads/$nl","w");	
			fwrite($fp, $content);
			fclose($fp);			
		}			
	}
}
header('Location: ../index.php');

?>
