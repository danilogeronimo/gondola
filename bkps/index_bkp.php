<?php  
	require_once("./resources/config.php");	
	require_once("header.php");
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
<div class="row">
<?php
	if(isset($_GET['url'])){
		require_once("./resources/GetDomElements.php");
		$videos = getLinks($_GET['url']);
		if(!is_String($videos)){
			foreach ($videos as $video) { ?>
				<div class="thumbnail col-sm-2 ">
					<a href="<?=$video?>" target="_blank">Download</a>
					<video controls width="175" height="180">
						<source type="video/webm" src="<?=$video?>">
					</video>	
				</div><!-- videos -->		
			<?php
			}		
		}else{
			echo $videos;
		}
	}
?>
</div><!-- row -->	
<?php require_once("footer.php");?>