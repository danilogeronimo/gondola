<?php 
$links = $_POST['link'];
$c = count($links);

foreach($links as $name){
	$namesLinks = explode("|",$name);
	foreach($namesLinks as $nl){
		$pattern = "/^\/\//";
		if(preg_match($pattern,$nl,$matches)){
			$content = file_get_contents('http:'.$nl);	

			$zipname = 'haveaniceday.zip';
			$zip = new ZipArchive;
			$zip->open($zipname, ZipArchive::CREATE);
			$zip->addFile($content);
			$zip->close();		
			header('Content-Type: application/zip');
			header('Content-disposition: attachment; filename='.$zipname);
			header('Content-Length: ' . filesize($zipname));
			readfile($zipname);
		}
		else{

			$zipname = 'haveaniceday.zip';
			$zip = new ZipArchive;
			$zip->open($zipname, ZipArchive::CREATE);
			//$content = file_get_contents('http://'.$nl);		
			$zip->addFile($content);
			$zip->close();

			// header('Content-Type: application/zip');
			// header('Content-disposition: attachment; filename='.$zipname);
			// header('Content-Length: ' . filesize($zipname));
			// readfile($zipname);

			// header('Content-Description: File Transfer');
		 //    header('Content-Type: application/octet-stream');
		 //    header("Content-disposition: attachment; filename=$nl");
		 //    header('Content-Length: '.strlen($content));
		 //    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		 //    header('Expires: 0');
		 //    header('Pragma: public');
		 //    echo $content;
		 //    exit;
			
			// $fp = fopen("ftp.rf.gd/$nl","w");				
			// fwrite($fp, $content);
			// fclose($fp);
			
		}			
	}
}

// echo "
// 	<script>
// 		(function (){
// 			javascript:history.go(-1);
// 			alert('Downloaded $c webms');	
// 		})();
// 	</script>
// ";

?>
