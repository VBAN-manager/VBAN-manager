<meta http-equiv="refresh" content="3">
<?php
$name = 'script/log-' . $_GET['id'] . '.txt';
if (file_exists($name)){
    $myfile = fopen($name, "r") or die("Unable to open file!");
    while(!feof($myfile)) {
      echo fgets($myfile) . "<br>";
    }
    fclose($myfile);
}else{
    echo "No log file";
}
?> 