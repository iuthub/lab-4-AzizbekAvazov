<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>

		<div id="listarea">
			<ul id="musiclist">
				<?php 

					if(isset($_REQUEST["playlist"])){
						$var = $_REQUEST["playlist"];
						$lines = file("songs/" . $var);
				?>
				<?php
						foreach ($lines as $line) {
							$song_arr = $line;
							$dir3 = "songs/" . $song_arr;
							$path = realpath("songs/" . $line);
				?>
							<li class="mp3item">
								<a href="<?=$dir3?>"><?= basename($song_arr) . " (" . filesize($path) . " b)" ?></a>
							</li>
				<?php 	}
					} 
					else {
					$dir = "songs/*.mp3";
					foreach(glob($dir) as $file) { ?>
						<li class="mp3item">
							<a href="<?=$file?>"><?= basename($file) . " (" . filesize($file) . " b)" ?></a>
						</li>
 				<?php }?>
 				
				<?php
					$dir2 = "songs/*.txt";
					foreach(glob($dir2) as $playl) { ?>
						<li class="playlistitem">
							<a href="music.php?playlist=<?= basename($playl);?>"><?= basename($playl) ?></a>
						</li>
				<?php } }?>
			</ul>	
		</div>
		
	</body>
</html>



			







