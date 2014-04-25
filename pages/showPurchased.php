<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=fastcompany', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://checkout.stripe.com/v2/checkout.js"></script>
</head>
<body>
<div id='container' class="col-sm-10 col-sm-offset-1">
<div class="panel panel-success">
	 <div class="panel-heading none success">You have resent email</div>
  <div class="panel-body">

		<table class='table'>
		<tr>
			<th>
				Username
			</th>

			<th>
				Resend Email
			</th>
		</tr>
			

		<?php
		$query = $db->prepare("SELECT username FROM pending_users");
		$query->execute();
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$query->closeCursor();

		if(!$row){
			echo "<tr><td>No records</td></tr>";
		}else{

		foreach($row as $r){
		?>


			<tr>
				<td>
				 <?php echo $r?>
				</td>
			
				<td>
					<span class="glyphicon glyphicon-envelope"></span>
				</td>
			</tr>
			



		<?php
		}
	}
		?>
		</table>
	</div>
</div>
</div>

</body>
</html>
<script type="text/javascript">

$('span').on('click', function () {
	$.post('../lib/save_user.php', {email : $(this).parent().prev().text(), resend : true},function  (data) {
		$('.success').show();
		$('body').append(data);
		setTimeout(function () {
			$('.success').hide();
		}, 3000);
	})
})


</script>
<style type="text/css">
#container{
	margin-top: 50px;
}
.none{display: none;}
span{cursor: pointer;}
</style>