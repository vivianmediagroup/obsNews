<?php
$sourceDirectory = 'C:/xampp/obsNews';

if(isset($_GET['complete'])){
	file_put_contents('C:/xampp/htdocs/core.php', file_get_contents($sourceDirectory.'/core.php'));
	rmdir($sourceDirectory);
	echo '<h1>Update Complete! <a href="index.php">Return To obsNews</a></h1>';
	
}else{
	require('core.php');

	echo '<h1>Updating Now, Please Wait...</h1>';

	$command = 'cd C:/xampp && cd && git clone https://github.com/'.$githubUser.'/obsNews';

	$targetDirectory = 'C:/xampp/htdocs';
	function deleteAllExcept($dir, $fileToPreserve1, $fileToPreserve2) {
		foreach (scandir($dir) as $item) {
			if ($item != '.' && $item != '..') {
				$path = $dir . '/' . $item;
				if ($item != $fileToPreserve1 && $item != $fileToPreserve2) {
					if (is_dir($path)) {
						deleteAllExcept($path, $fileToPreserve1, $fileToPreserve2);
						rmdir($path);
					} else {
						unlink($path);
					}
				}
			}
		}
	}
	deleteAllExcept($targetDirectory, 'update.php', 'core.php');
	function moveAllFiles($source, $destination) {
		foreach (scandir($source) as $item) {
			if ($item != '.' && $item != '..') {
				$sourcePath = $source . '/' . $item;
				$destinationPath = $destination . '/' . $item;
				if (is_dir($sourcePath)) {
					mkdir($destinationPath);
					moveAllFiles($sourcePath, $destinationPath);
					rmdir($sourcePath);
				} else {
					copy($sourcePath, $destinationPath);
					unlink($sourcePath);
				}
			}
		}
	}
	moveAllFiles($sourceDirectory, $targetDirectory);

	header("Location: update.php?complete");
	die();
}
?>
