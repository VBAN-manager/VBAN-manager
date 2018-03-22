<?php
include 'top.php';
?>
		<div class="col-md-8">
			<h3>
				Server changed !
			</h3>
            <?php
            $command = $script_sh." args ".$_POST['nb']." ".$_POST['type']." ".$_POST['args'];
            echo "Command: " . $command . "<br />";
            chdir($script);
            echo shell_exec("sudo " . $command . " > /dev/null 2>&1 &");
            ?>
            <form action="server.php" method="get">
                <input type="hidden" name="id" value="<?php echo $_POST['nb']; ?>" />
                <input type="hidden" name="refresh" value="<?php echo time(); ?>" />
                <button class="btn btn-primary" type="submit">
                        Back
                </button>
            </form>
        </div>
<?
include 'bottom.php';
?>