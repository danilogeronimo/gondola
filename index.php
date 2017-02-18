<?php  
	require_once("./resources/config.php");	
	require_once("header.php");
?>

<form action="resources/getLinks.php" method="post">
	<table class="">
		<tr>
			<td>Url</td>
			<td><input type="text" name="url"></td>
			<td>
				<button class="btn btn-primary" type="submit">Get</button>
			</td>
		</tr>
	</table>
</form>
</div>
</div>

<?php require_once("footer.php");?>