<?php
include 'config.php';

$command = $script_sh." plugin ".$_GET['name']." ".$_GET['args'];
chdir($script);
$return = shell_exec("sudo " . $command . " > /dev/null 2>&1 &");

header("Location: plugin.php?name=" . $_GET['name'] . "&refresh=" . time() . "&message=Plugin+action+executed!");
?>