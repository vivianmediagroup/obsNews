<?php
// DO NOT EDIT UNLESS YOU KNOW EXACTLY WHAT YOU'RE DOING!
$currentVer = 1.1;
$githubUser = 'vivianmediagroup'; //You will need to set this in update.php, as well (since it's separate from the core.php)

$file_path = 'obsnewsstorage/currentVer.txt';
if (file_exists($file_path)) {
    $file_time = filemtime($file_path);
    $current_time = time();
    $time_difference = $current_time - $file_time;

    if ($time_difference < 86400) {
        $latestVer = file_get_contents('obsnewsstorage/currentVer.txt');
    } else {
        $latestVer = file_get_contents('https://cdn.jsdelivr.net/gh/'.$githubUser.'/obsNews-Update-System@main/latestVer.txt');
		file_put_contents('obsnewsstorage/currentVer.txt', $latestVer);
		$latestVer = file_get_contents('obsnewsstorage/currentVer.txt');
    }
} else {
    $latestVer = file_get_contents('https://cdn.jsdelivr.net/gh/'.$githubUser.'/obsNews-Update-System@main/latestVer.txt');
	file_put_contents('obsnewsstorage/currentVer.txt', $latestVer);
	$latestVer = file_get_contents('obsnewsstorage/currentVer.txt');
}

$file_path = 'obsnewsstorage/fromObsNews.txt';
if (file_exists($file_path)) {
    $file_time = filemtime($file_path);
    $current_time = time();
    $time_difference = $current_time - $file_time;

    if ($time_difference < 86400) {
        $fromObsNews = file_get_contents('obsnewsstorage/fromObsNews.txt');
    } else {
        $fromObsNews = file_get_contents('https://cdn.jsdelivr.net/gh/'.$githubUser.'/obsNews-Update-System@main/fromObsNews.txt');
		file_put_contents('obsnewsstorage/fromObsNews.txt', $fromObsNews);
		$fromObsNews = file_get_contents('obsnewsstorage/fromObsNews.txt');
    }
} else {
    $fromObsNews = file_get_contents('https://cdn.jsdelivr.net/gh/'.$githubUser.'/obsNews-Update-System@main/fromObsNews.txt');
	file_put_contents('obsnewsstorage/fromObsNews.txt', $fromObsNews);
	$fromObsNews = file_get_contents('obsnewsstorage/fromObsNews.txt');
}

?>
