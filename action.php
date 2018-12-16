<?php
include 'config.php';

$command = $script_sh." ".$_GET['type']." ".$_GET['id'];
chdir($script);
$return = shell_exec("sudo " . $command . " > /dev/null 2>&1 &");

header("Refresh: 0;url=server.php?id=" . $_GET['id'] . "&message=Action+executed!");
?>