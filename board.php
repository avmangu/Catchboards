<html>
<head>
<title>Snapboards</title>
<body>
<?php include 'connect.php'; ?>

<?php include 'functions.php'; ?>

<?php include 'header.php'; ?><br />
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"> </script>
	
	<!--[if IE]>
	<script>
		$(document).ready(function(){
			$('.img.slideUp').hover(function(){
				$(this).find('img:first').animate({marginTop: '-40%'}, 150);	
			}, function(){
				$(this).find('img:first').animate({marginTop: '0'}, 150);
			});
		});
	</script>
	<![endif]-->	
	
</head>
<body>			

<form method="POST"><div class='container'><center>
	<b><a href="sbcreator" class="classname">Create Catchboard</a><br /><br /><br /><br />
</form>


<?php

		$my_id = $_SESSION['user_id'];
		$me = getuser($my_id, 'username');

		$frnd_query = mysql_query("SELECT * FROM catchboard WHERE user_one='$me' OR user_two='$me' OR user_three='$me' or user_four='$me'");
		while($run_frnd = mysql_fetch_array($frnd_query)) {	
			$title = $run_frnd['title'];
			$summary = $run_frnd['summary'];

			$sb_query = mysql_query("SELECT * FROM catchboard WHERE title='$title' AND (user_one='$me' OR user_two='$me' OR user_three='$me' or user_four='$me')");
				while($run_frnd2 = mysql_fetch_array($sb_query)) {	
					$sb_id = $run_frnd2['sb_id'];
					$user_one = $run_frnd2['user_one'];
				}

				?>

				<div class="img slide">
						<div class="caption bottom ">
							<div class="heading"><?php echo $title ?></div>
							<p><?php echo $summary ?></p>
							<div class="footer">
								<a href="sb?sb=<?php echo $sb_id ?>" class="btn btn-primary pull-right">Enter</a>
							</div>		
						</div>
				</div>	

				<?php
		}
?>

</div>

</html>








