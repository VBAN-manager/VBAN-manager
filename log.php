<meta http-equiv="refresh" content="5">
<?php
include 'config.php';
$command = $script_sh." status ".$_GET['id'];
chdir($script);
$return = shell_exec("sudo " . $command);
echo nl2br($return);
?>