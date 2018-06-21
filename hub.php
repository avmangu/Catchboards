<html>
<head>
<title>Comment</title>
</head>
<body>
<?php

$act = $_POST['act'];
if($act == "post") {
    $name = $_POST['name'];
    $message  = $_POST ['message'];
    @$fp = fopen("comments.php", 'a');
    if (!$fp) {
        //The file could not be opened
        echo "There was an error! Please try again later!";
        exit;
    } else {
        //The file was successfully opened, lets write the comment to it.
        $outputstring = "<br>Name: " .$name. "<br> Comment:<br>" .$message. "<br>";
        
        //Write to the file
        fwrite($fp, $outputstring, strlen($outputstring));
        
        //We are finished writing, close the file for security / memory management purposes
        fclose($fp);
        
        //Post the success message
        echo "Your post was successfully entered. Click <a href='index.php'>here</a> to continue.";
    }
} else {
    //We are not trying to post a comment, show the form.
?>
<h2>Previous comments:</h2>
<?php include("comments.php"); ?>
<br><br>
<h2>Post a comment:</h2>
<form action="index.php" method="post">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value=""></input></td>
        </tr>
        <tr>
            <td>Comment:</td>
            <td><textarea name="message"></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="act" value="post"></input>
    <input type="submit" name="submit" value="Submit"></input>
</form>
<?php
}
?>
</body>
</html>