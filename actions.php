<?php
if(isset($_POST['tickercontent'])){
	file_put_contents('obsnewsstorage/ticker.txt', $_POST['tickercontent']);
	echo 'Ticker Populated';
}

if(isset($_POST['weather'])){
	file_put_contents('obsnewsstorage/weather.txt', $_POST['weather']);
	echo 'Weather In Program (May Take 2 Seconds To Change)';
}

if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
    $uploadDir = 'obsnewsstorage/';
    $uploadFileName = 'logo.jpg'; // Desired filename
    $uploadFile = $uploadDir . $uploadFileName;
    $imageFileType = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));

    if ($imageFileType === 'jpg' || $imageFileType === 'jpeg') {
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadFile)) {
            echo 'Logo Uploaded';
        } else {
            echo 'Error uploading the logo.';
        }
    } else {
        echo 'Invalid file format. Please upload a JPG image.';
    }
}


if(isset($_GET['a'])){
	  if($_GET['a'] == 'clearlogs'){
			$folderPath = "C:/xampp/apache/logs";
			if (is_dir($folderPath)) {
				$files = glob($folderPath . '/*');
				foreach ($files as $file) {
					if (is_file($file)) {
						file_put_contents($file, "");
					}
				}
				echo "Logs Cleared";
			} else {
				echo "Logs Folder Nonexistant";
			}
		}
}
	
	echo '<h2><a href="index.php">Return To obsNews</a></h2>';
?>
