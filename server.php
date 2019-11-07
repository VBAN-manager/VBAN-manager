<?php
//if (!isset($_GET['refresh'])){
    //header("Cache-Control: no-cache, must-revalidate" );
//}
include 'top.php';

$page = "server";

function after ($thiss, $inthat)
{
    if (!is_bool(strpos($inthat, $thiss)))
        return substr($inthat, strpos($inthat,$thiss)+strlen($thiss));
};

function before ($thiss, $inthat)
{
    return substr($inthat, 0, strpos($inthat, $thiss));
};

$id = $_GET['id'];
$argsfile = $args . $id . '.txt';

if (!isset($_GET['new'])){
    $argscontent = file_get_contents($argsfile);
    $type = before(" ", $argscontent);
    $arguments = after(" ", $argscontent);

    preg_match_all("/-(.) ([^ ]+) /", $arguments . " ",$argsar);
    $args = array();
    for ($i = 0; $i < count($argsar[1]); $i++) {
        $args[$argsar[1][$i]] = $argsar[2][$i];
    }
}else{
    $type = "";
}

?>
		<div class="col-md-8">
			<h3>
				Server #<?php echo $id; ?>
			</h3>
			<div class="btn-group btn-group-lg" role="group">
                <button class="btn btn-secondary btn-info" type="button">
                    <?php
                    include("status.php");
                    echo $status;
                    ?>
                </button>
                <?php
                if (!isset($_GET['new'])){
                ?>
				<button class="btn btn-secondary btn-success" type="button" onclick="location.href='action.php?type=start&id=<?php echo $id; ?>';">
					Start
				</button> 
				<button class="btn btn-secondary btn-danger" type="button" onclick="location.href='action.php?type=stop&id=<?php echo $id; ?>';">
					Stop
				</button>
          </div>
          <div class="btn-group btn-group-lg" role="group">
                <button class="btn btn-secondary btn-warning" type="button" onclick="window.prompt('Enter this command in a terminal to start server at boot (or replace enable with disable to stop starting at boot)','sudo systemctl enable vban@<?php echo $id; ?>');">
					Enable/disable start at boot
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
					<label for="i">
						Source/Destination IP
					</label>
					<input class="form-control" name="i" id="i" type="text" value="<?php if (isset($args["i"])){echo $args["i"];}; ?>">
                    <label for="p">
						Port (default: 6980)
					</label>
                    <input class="form-control" name="p" id="p" type="text" value="<?php if (isset($args["p"])){echo $args["p"];}else{echo "6980";} ?>">
                    <label for="s">
						Stream name
					</label>
                    <input class="form-control" name="s" id="s" type="text" value="<?php if (isset($args["s"])){echo $args["s"];}; ?>">
                    <label for="b">
						Backend (default: alsa, only alsa supported on emitter)
					</label>
                    <select class="form-control" id="b" name="b">
                        <?php if (isset($args["b"])){ ?>
                            <option selected hidden><?php echo $args["b"]; ?></option>
                            <option>alsa</option>
                        <?php }else{ ?>
                            <option selected>alsa</option>
                        <?php } ?>
                        <option>pulseaudio</option>
                        <option>jack</option>
                        <option>pipe</option>
                        <option>file</option>
                    </select>
                    <?php if ($type == "receptor"){ ?>
                        <label for="q">
                            Quality (default: 1)
                        </label>
                        <select class="form-control" id="q" name="q">
                            <option>0</option>
                            <?php if (isset($args["q"])){ ?>
                                <option selected hidden><?php echo $args["q"]; ?></option>
                                <option>1</option>
                            <?php }else{ ?>
                                <option selected>1</option>
                            <?php } ?>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    <?php }elseif ($type == "emitter"){ ?>
                         <label for="r">
                            Rate (default: 44100)
                        </label>
                        <input class="form-control" name="r" id="r" type="text" value="<?php if (isset($args["r"])){echo $args["r"];} ?>">
                        <label for="n">
                            Audio device number of channels (default: 2)
                        </label>
                        <input class="form-control" name="n" id="n" type="text" value="<?php if (isset($args["n"])){echo $args["n"];} ?>">
                        <label for="f">
                            Audio device sample format (default: 16I)
                        </label>
                        <input class="form-control" name="f" id="f" type="text" value="<?php if (isset($args["f"])){echo $args["f"];} ?>">
                    <?php } ?>
                    <label for="c">
						Channels (optional)
					</label>
                    <input class="form-control" name="c" id="c" type="text" value="<?php if (isset($args["c"])){echo $args["c"];} ?>">
                    <label for="d">
						Audio device (optional)
					</label>
                    <input class="form-control" name="d" id="d" type="text" value="<?php if (isset($args["d"])){echo $args["d"];} ?>">
                    <label for="l">
						Log level (default: 1)
					</label>
                    <select class="form-control" id="l" name="l">
                        <option>0</option>
                        <?php if (isset($args["l"])){ ?>
                            <option selected hidden><?php echo $args["l"]; ?></option>
                            <option>1</option>
                        <?php }else{ ?>
                            <option selected>1</option>
                        <?php } ?>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
				</div>
				<button type="submit" class="btn btn-primary">
					Change
				</button>
                <button type="button" class="btn btn-danger" onclick="location.href='action.php?type=remove&id=<?php echo $id; ?>';">
					Remove
				</button>
                <div class="form-group">
                    <label for="log">Log:</label>
                    <iframe id="log" src="log.php?id=<?php echo $id; ?>" style="width:100%;height:250px;border:1px solid rgba(0,0,0,.15);border-radius:.25rem;"></iframe>
                </div>
			</form>
		</div>
<?php include 'bottom.php'; ?>
