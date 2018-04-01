<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VBAN manager</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
      

    <div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <?php
            if ($_GET['message']){
            ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo $_GET['message']; ?></strong>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
	<div class="row">
		<div class="col-md-4">
			<ul class="nav flex-column nav-pills">
				<li class="nav-item">
					<a class="nav-link" id="page-welcome" href="index.php">Welcome</a>
				</li>
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="page-server" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servers</a>
                    <div class="dropdown-menu" aria-labelledby="page-server">
                <?php
                $files = glob($script . 'args-*.txt');
                $id = 1;
                foreach($files as $file){
                    $id = substr($file, $args_sub, -4);
                ?>
					<a class="dropdown-item" href="server.php?id=<?php echo $id; ?>">Server #<?php echo $id; ?></a>
                <?php
                }
                ?>
					<a class="dropdown-item" href="server.php?id=<?php echo $id + 1; ?>&new=true">New server</a>
                    </div>
				</li>
                <?php
                $plugins = glob($plugins_folder . '*', GLOB_ONLYDIR);
                foreach($plugins as $plugin){
                    $name = substr($plugin, $plugins_sub);
                ?>
                    <li class="nav-item">
                        <a class="nav-link" id="page-plugins-<?php echo $name; ?>" href="plugin.php?name=<?php echo $name; ?>"><?php echo $name; ?></a>
                    </li>
                <?php
                }
                ?>
				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">About</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						 <a class="dropdown-item" href="https://github.com/VBAN-manager/VBAN-manager">View project on Github</a>
                        <a class="dropdown-item" href="https://github.com/quiniouben/vban">VBAN Linux adaptation</a>
                        <a class="dropdown-item" href="https://www.vb-audio.com/Voicemeeter/vban.htm">VBAN</a>
					</div>
				</li>
			</ul>
		</div>
