<?php  
	require_once("./resources/config.php");	
	require_once("header.php");
?>

<div class="search img-thumbnail">
	<h1>Paste a webm thread link</h1>
	<form action="" method="get">
		<table >
			<tr>
				<td>Url</td>
				<td><input type="text" name="url"></td>
				<td>
					<button type="submit" class="btn btn-default btn-success">Feel</button>
				</td>
			</tr>
		</table>
	</form>
</div><!-- search -->
<div class="videos">
	<div class="row">
		<form action="resources/Download.php" method="post">		
		<?php
			if(isset($_GET['url'])){
				require_once("./resources/GetDomElements.php");
				$elements = new GetDomElements($_GET['url']);
				$videos = $elements->getLinks();
				$sub = $elements->getSubject();
				echo $sub;
				if(!is_String($videos)){
					foreach ($videos as $video) {?>					
						<div class="thumbnail col-sm-2">
							<a href="<?=$video['link']?>" target="_blank"><?=$video['name']?></a>
							<input class="checkbox" type="checkbox" name="link[]" value="<?=$video['link']?>|<?=$video['name']?>">
							<video controls loop onmouseover="this.play()" onmouseout="this.pause()">
								<source type="video/webm" src="<?=$video['link']?>">
							</video>							
						</div><!-- thumbnail -->		
					<?php
					}		
				}
			}
		?>	<button type="submit" name="formSubmit" class="btn btn-primary" id="btnSub">
				Download
			</button>
		</form>
	</div><!-- row -->
</div><!-- videos -->
<button class=" btn btn-info"onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<?php require_once("footer.php");?>