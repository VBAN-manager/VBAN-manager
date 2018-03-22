<?php
include 'top.php';

    function after ($this, $inthat)
    {
        if (!is_bool(strpos($inthat, $this)))
        return substr($inthat, strpos($inthat,$this)+strlen($this));
    };

    function before ($this, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $this));
    };

$id = $_GET['id'];
$pidfile = $script . $id . '.pid';
$argsfile = $args . $id . '.txt';

$argscontent = file_get_contents($argsfile);
$type = before(" ", $argscontent);
$arguments = after(" ", $argscontent);
?>
		<div class="col-md-8">
			<h3>
				Server #<?php echo $id; ?>
			</h3>
			<div class="btn-group btn-group-lg" role="group">
                <button class="btn btn-secondary btn-info" type="button">
                    <?php
                    if (file_exists($pidfile)) {
                        echo "Running with PID ";
                        readfile($pidfile);
                    }else{
                        echo "Not running";
                    }
                    ?>
                </button>
                <?php
                if (!$_GET['new']){
                ?>
				<button class="btn btn-secondary btn-success" type="button" onclick="location.href='action.php?type=start&id=<?php echo $id; ?>';">
					Start
				</button> 
				<button class="btn btn-secondary btn-danger" type="button" onclick="location.href='action.php?type=stop&id=<?php echo $id; ?>';">
					Stop
				</button>
                <?php
                }
                ?>
			</div>
			<form role="form" action="modify_args.php" method="post">
                 <div class="form-group">
                    <label for="type">Type:</label>
                    <select class="form-control" id="type" name="type">
                        <option selected hidden><?php echo $type; ?></option>
                        <option>receptor</option>
                        <option>emitter</option>
                    </select>
                </div> 
				<div class="form-group">
                    <input type="hidden" name="nb" value="<?php echo $id; ?>" />
					<label for="args">
						Args
					</label>
					<input class="form-control" name="args" id="args" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;" autocomplete="off" type="text" value="<?php echo $arguments ?>">
				</div>
				<button type="submit" class="btn btn-primary">
					Change
				</button>
                <button type="button" class="btn btn-danger" onclick="location.href='action.php?type=remove&id=<?php echo $id; ?>';">
					Remove
				</button>
			</form>
		</div>
<?php include 'bottom.php'; ?>