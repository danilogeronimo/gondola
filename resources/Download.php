<?php 
if(isset($_POST['download'])){	
	if(!empty($_POST['check_list'])) {
		$selecteds = $_POST['check_list'];
		$checked_count = count($selecteds);
		echo "You have selected following ".$checked_count." option(s): <br/>";
		
		for($i=0; $i<$checked_count;$i++){
			$content = file_get_contents('http:'.$selecteds[$i]);
			$fp = fopen("./Downloads/$i.webm","w");
			fwrite($fp, $content);
			fclose($fp);
		}
		header('Location: ../index.php');
		
	}else{
		echo "you selected nothing. :p";
	}
}
?>