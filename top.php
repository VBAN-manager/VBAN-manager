<?php
$script = './script/';
$script_sh = './vban.sh';
$args = $script . 'args-';
$args_sub = 14;
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
	<div class="row">
		<div class="col-md-4">
			<ul class="nav flex-column nav-pills">
				<li class="nav-item">
					<a class="nav-link active" href="index.php">Welcome</a>
				</li>
                <?php
                $files = glob($script . 'args-*.txt');
                $id = 1;
                foreach($files as $file){
                    $id = substr($file, $args_sub, -4);
                ?>
				<li class="nav-item">
					<a class="nav-link" href="server.php?id=<?php echo $id; ?>">Server #<?php echo $id; ?></a>
				</li>
                <?php
                }
                ?>
				<li class="nav-item">
					<a class="nav-link" href="server.php?id=<?php echo $id + 1; ?>&new=true">New server</a>
				</li>
				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Plus</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						 <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
						<div class="dropdown-divider">
						</div> <a class="dropdown-item" href="#">Separated link</a>
					</div>
				</li>
			</ul>
		</div>