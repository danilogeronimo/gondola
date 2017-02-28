<?php 
$names = $_POST['names'];
$links = $_POST['links'];
if(!empty($names)){
	$c = count($links);
	for($i=0; $i<$c;$i++){
		$content = file_get_contents('http:'.$links[$i]);
		$fp = fopen("../Downloads/$names[$i]","w");
		fwrite($fp, $content);
		fclose($fp);		
	}
	header('Location: ../index.php');
}
?>