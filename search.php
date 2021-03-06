<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<center>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggest.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>

<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Trebuchet MS, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}

.suggestionsBox {
	position: absolute;
	left: 560px;
	top:55px;
	margin: 26px 0px 0px 0px;
	width: 495px;
	padding:0px;
	background-color: #000;
	border-top: 3px solid #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}

#suggest {
	position:relative;
}

input {
    background:White;
    color:Black;
    padding:10px;
    border-radius:5px;
    border:0px;
    margin:5px 0px;
    margin-top: 40px;
    outline: none;
    resize: none;
}


</style>

<?php
function redirect($target) {
    if (!headers_sent()) {
        header("Location: $target");
    }

    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0; url=$target\">\n";
    echo "<script language=\"javascript\">document.location = '" . $target . "';</script>\n";
    echo "<noscript><p>If you are not automatically redirected, please click <a href=\"".$target."\">here</a></noscript>";
    exit;
}

if(isset($_POST['search'])) {
	$search_query = $_POST['enter'];
	$search_id = getid($search_query);
	$my_id = $_GET['user'];
	redirect("profile?user=$search_id");
}

?>
</head>

<body>

 <form method="POST">
      <input type="text" autocomplete='off' size="75" font="Trebuchet MS" placeholder="Search Anything..." onkeyup="suggest(this.value);" id="country" name="enter" onblur="fill();" class="" />
      <input type="submit" value="Search" name="search" </a>
     
      <div class="suggestionsBox" id="suggestions" style="display: none;"> 
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
   </div>
</form>
</center>


</body>
</html>
