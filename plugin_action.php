<?php
include 'top.php';
?>
		<div class="col-md-8">
			<h3>
				Plugin action done !
			</h3>
            <?php
            $command = $script_sh." plugin ".$_GET['name']." ".$_GET['args'];
            echo "Command: " . $command . "<br />";
            chdir($script);
            echo shell_exec("sudo " . $command . " > /dev/null 2>&1 &");
            ?>
            <form action="plugin.php" method="get">
                <input type="hidden" name="name" value="<?php echo $_GET['name']; ?>" />
                <input type="hidden" name="refresh" value="<?php echo time(); ?>" />
                <button class="btn btn-primary" type="submit">
                        Back
                </button>
            </form>
        </div>
<?
include 'bottom.php';
?>