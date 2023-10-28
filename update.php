<?php
$githubUsername = 'vivianmediagroup'; //You will need to define this here,a lthough it's in core.php
file_put_contents('C:/xampp/htdocs/index.php', file_get_contents('https://cdn.jsdelivr.net/gh/'.$githubUsername.'/obsNews@main/index.php'));
file_put_contents('C:/xampp/htdocs/actions.php', file_get_contents('https://cdn.jsdelivr.net/gh/'.$githubUsername.'/obsNews@main/actions.php'));
file_put_contents('C:/xampp/htdocs/obs.php', file_get_contents('https://cdn.jsdelivr.net/gh/'.$githubUsername.'/obsNews@main/obs.php'));
file_put_contents('C:/xampp/htdocs/core.php', file_get_contents('https://cdn.jsdelivr.net/gh/'.$githubUsername.'/obsNews@main/core.php'));
echo '<h1>Update Complete! <a href="index.php">Return To obsNews</a></h1>';
?>
