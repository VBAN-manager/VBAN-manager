<?php
$command = $script_sh." is-active ".$_GET['id'];
chdir($script);
$status = shell_exec($command);
if(\strpos($status,"unknown") !== false){
  $status = "Stopped";
}elseif(\strpos($status,"inactive") !== false){
  $status = "Stopped (start at boot)";
}elseif(\strpos($status,"active") !== false){
  $status = "Active";
}
?>