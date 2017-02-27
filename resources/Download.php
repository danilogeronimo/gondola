<?php 
if(isset($_POST['download'])){
	
	if(!empty($_POST['check_list'])) {
		// Counting number of checked checkboxes.
		$checked_count = count($_POST['check_list']);
		echo "You have selected following ".$checked_count." option(s): <br/>";
		// Loop to store and display values of individual checked checkbox.
		foreach($_POST['check_list'] as $selected) {			
			$content = file_get_contents('http:'.$selected);
			$fp = fopen("./Downloads/t.webm","w");
			fwrite($fp,$content);
			fclose($fp);
		}
	}else{
		echo "you selected nothing. :p";
	}
}
?>