<?php  
	require_once("./resources/config.php");	
	require_once("header.php");
	
	

	//$links = parseLinks($url);
?>
<h1>Paste a webm thread link</h1>

<form action="" method="get">
	<table class="">
		<tr>
			<td>Url</td>
			<td><input type="text" name="url"></td>
			<td>
				<input type="submit" value="Feel">
			</td>
		</tr>
	</table>
</form>

<?php	
	if(isset($_GET['url'])){
		require_once("./resources/getLinks.php");
		$videos = parseLinks($_GET['url']);	
		foreach ($videos as $video) { ?>
			<video controls width="200" height="200">
				<source type="video/webm" src="<?=$video?>">
			</video>	
		<?php
		}			
	}
?>
<?php require_once("footer.php");?>