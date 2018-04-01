<?php
include 'config.php';

$command = $script_sh." args ".$_POST['nb']." ".$_POST['type']." ".$_POST['args'];
chdir($script);
$return = shell_exec("sudo " . $command . " > /dev/null 2>&1 &");

header("Location: server.php?id=" . $_POST['nb'] . "&refresh=" . time() . "&message=Arguments+changed!");
?>