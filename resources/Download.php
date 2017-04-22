<?php 

if(isset($_POST['link']) == true){	
	$links = $_POST['link'];
	if(count($links) > 1){		
		$files = array();
		$zip = new ZipArchive();
		$tmp_file = tempnam('.', '');
		$zip->open($tmp_file,ZipArchive::CREATE);

		foreach ($links as $values) {
			list($link, $name) = explode("|", $values);
			$download_file = file_get_contents('http:'.$link);
			$zip->addFromString(basename($name),$download_file);
		}

		$zip->close();

		header('Content-disposition: attachment; filename="Have_a_nice_day.zip"');
		header('Content-type: application/zip');
		readfile($tmp_file);
		unlink($tmp_file);
	}
	else{
		foreach($links as $values){
			list($link, $name) = explode("|", $values);
			$download_file = file_get_contents('http:'.$link);
			header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header("Content-disposition: attachment; filename=".str_replace(' ', '_', $name));
		    header('Content-Length: '.strlen($download_file));
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Expires: 0');
		    header('Pragma: public');
		    echo $download_file;
		    exit;
		}
	}

}



?>
