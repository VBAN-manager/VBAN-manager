<?php
include 'top.php';
?>
		<div class="col-md-8">
			<h3>
				Server action done !
			</h3>
            <?php
            $command = $script_sh." ".$_GET['type']." ".$_GET['id'];
            echo "Command: " . $command . "<br />";
            chdir($script);
            echo shell_exec("sudo " . $command . " > /dev/null 2>&1 &");
            ?>
            <form action="server.php" method="get">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <input type="hidden" name="refresh" value="<?php echo time(); ?>" />
                <button class="btn btn-primary" type="submit">
                        Back
                </button>
            </form>
        </div>
<?
include 'bottom.php';
?>