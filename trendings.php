<?php 

$jsonurl = "https://a.4cdn.org/wsg/1.json";
$json = file_get_contents($jsonurl);
$json_output = json_decode($json);
//@$json_output->threads[$i]->posts[0]->sub
?>

<html>
	<head>

		<link rel="stylesheet" href="css/trend.css">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
		<script src='http://code.jquery.com/jquery-latest.min.js' type='text/javascript'></script>
	</head>
<body>
	<div class="trendings">
		<h3>Trending:</h3>
		<div>			
			<ol id="trending">
				<?php 
					for($i=1; $i < count($json_output->threads); $i++){
						if(!$name = @$json_output->threads[$i]->posts[0]->sub){
							$name = @$json_output->threads[$i]->posts[0]->no;
						}	
						$link = @$json_output->threads[$i]->posts[0]->no;
				?>
						<script>	
							var nameNode = "<?php echo $name; ?>";
							var linkNode = "http://boards.4chan.org/wsg/thread/"+"<?php echo $link ?>";
							var liNode = document.createElement("li");													
							var textNode = document.createTextNode(nameNode);
							var aNode = document.createElement('a');
							aNode.className="clique";
							aNode.href=linkNode;
							aNode.target="_blank";
							aNode.appendChild(textNode);
							aNode.appendChild(document.createTextNode('  '));							
							document.getElementById("trending").appendChild(liNode).appendChild(aNode);
						</script>

					<?php }
				?>				
			</ol>
		</div>
	</div>

<script>
	
	

</script>
</body>

</html>