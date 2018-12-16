<?php
include 'config.php';

$command = $script_sh." args ".$_POST['nb']." ".$_POST['type'];

foreach ($_POST as $key => $value) {
    if(strlen($key) == 1 && strlen($value) != ""){
        $command .= " -" . $key . " " . $value;
    }
}
chdir($script);
$return = shell_exec("sudo " . $command . " > /dev/null 2>&1 &");

header("Refresh: 0;url=server.php?id=" . $_POST['nb'] . "&message=Arguments+changed!");
?>