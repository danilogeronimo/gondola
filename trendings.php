
<html>
	<head>

		<link rel="stylesheet" href="css/trend.css">
		<script src='http://code.jquery.com/jquery-latest.min.js' type='text/javascript'></script>
	</head>
<body>
	<div class="trendings">
		<h3>Trending:</h3>

		<div>			
			<ol id="trending">				
			</ol>
		</div>
	</div>

<script>
	
	$(document).ready(function(){

		jQuery.ajaxPrefilter(function(options) {
		    if (options.crossDomain && jQuery.support.cors) {
		        options.url = 'https://cors-anywhere.herokuapp.com/' + options.url;
		    }
		});

		var node,textnode,a;
		
		$.getJSON("https://a.4cdn.org/wsg/1.json?callback", function(json) {
			for(var i = 1; i < json.threads.length; i++){
				node = document.createElement("li");
				a = document.createElement('a');
				textnode = document.createTextNode(json.threads[i].posts[0].sub);
				a.id=i;
				a.appendChild(textnode);
				a.href="http://boards.4chan.org/wsg/thread/"+json.threads[i].posts[0].no;			
				document.getElementById("trending").appendChild(node).appendChild(a);
			}
		});		
	});

</script>
</body>

</html>