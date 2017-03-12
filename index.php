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
	<form action="resources/Download.php" method="post">
	<?php
		if(isset($_GET['url'])){
			require_once("./resources/GetDomElements.php");
			$elements = new GetDomElements($_GET['url']);
			$videos = $elements->getLinks();
			if(!is_String($videos)){
				foreach ($videos as $video) {?>
					<div class="thumbnail col-sm-2">
						<a href="<?=$video['link']?>" target="_blank"><?=$video['name']?></a>
						<video controls width="175" height="180">
							<source type="video/webm" src="<?=$video['link']?>">
						</video>	
						<input type="checkbox" name="link[]" value="<?=$video['link']?>|<?=$video['name']?>">
					</div><!-- videos -->		
				<?php
				}		
			}
		}
	?>	<input type="submit" name="formSubmit" value="Download">
	</form>
</div><!-- row -->	
<?php require_once("footer.php");?>