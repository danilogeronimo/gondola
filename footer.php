		<div class="footer navbar navbar-default navbar-fixed-bottom">
			Copyright
		</div>
</div> <!-- main -->
</div> <!-- container -->
<script>
	$(document).ready(function() {

    var $submit = $("#btnSub").hide(),
        $cbs = $('input[name="link[]"]').click(function() {
            $submit.toggle( $cbs.is(":checked") );
        });

});
</script>
</body>
</html>