		<div class="footer navbar navbar-default navbar-fixed-bottom">
			Copyright
		</div>
</div> <!-- main -->
</div> <!-- container -->
<script>
	$(document).ready(function(){		
    	var submit = $("#btnSub").hide(),
        	cbs = $('input[name="link[]"]').click(function() {
           submit.toggle( cbs.is(":checked") );
       	});

        if (document.addEventListener) {
	        document.addEventListener('contextmenu', function(e) {
	            var links = this.activeElement.attributes[1].value;
	            copyToClipboard(links);
	            e.preventDefault();
	        }, false);
  		}    
	});
	
	function copyToClipboard(text) {
    	window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	}

	window.onscroll = function() {
		scrollFunction();
	};	

	function scrollFunction() {
	    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	        document.getElementById("myBtn").style.display = "block";
	    } else {
	        document.getElementById("myBtn").style.display = "none";
	    }
	}
	function topFunction() {
	    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
	    document.documentElement.scrollTop = 0; // For IE and Firefox
	}
</script>
</body>
</html>