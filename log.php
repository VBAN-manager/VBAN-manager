<meta http-equiv="refresh" content="5">
<?php
$myfile = fopen('script/log-' . $_GET['id'] . '.txt', "r") or die("Unable to open file!");
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?> 