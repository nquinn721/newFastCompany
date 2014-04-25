<?php
if(!isset($_GET['token']))
	exit();
?>

<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

<div class="container">
	<div class="head">
		<img src="../img/logo-large.jpg">
	</div>
	<div class="body">
		<div class="header">
			Download Directory	
		</div>
		Thanks for purchasing directory
		<br>
		<br>
		<form action='/lib/download.php'>
			<input type='submit' class='btn btn-info' value="Download">
		</form>
		<div class="foot">
			Copyright &copy; 2014 Fast Company
		</div>
	</div>

	
</div>

<style type="text/css">
	.container{margin-top:50px;}
	.head{
		text-align: center;
	}
	.head img{
		width:400px;
	}
	form{
		border-bottom: 1px solid #999;
		padding-bottom: 20px;
	}
	.foot{
		font-size: 12px;
		color:#777;
	}
/*	input[type="submit"] {
	    
	    border: 1px solid black;
	    color: white;
	    padding: 5px 10px;
	}*/

	div.body .header{
	    font-size: 36px;
	    color: #444;
	}
	.body{
		
		font-family: 'Open Sans',"Gill Sans",Avantgarde,"Century Gothic",CenturyGothic,"AppleGothic",sans-serif;
		width: 90%;
		margin: auto;
		margin-top: 50px;
	}
</style>