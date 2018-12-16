<?php
include 'config.php';

$command = $script_sh." plugin ".$_GET['name']." ".$_GET['args'];
chdir($script);
$return = shell_exec("sudo " . $command . " > /dev/null 2>&1 &");

header("Refresh: 0;url=plugin.php?name=" . $_GET['name'] . "&message=Plugin+action+executed!");
?>