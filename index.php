<?php
require("core.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>obsNews - Simple News Solution for OBS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap">
    <style>
        body {
            font-family: 'Lexend Deca', sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .dropdown {
            margin: 10px;
            border: 1px solid #fff;
            background-color: #222;
        }

        .dropdown-header {
            background-color: #333;
            padding: 10px;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            padding: 10px;
        }

        .dropdown.open .dropdown-content {
            display: block;
        }
		
        .header {
            background-color: #111;
            text-align: center;
            padding: 10px;
        }

        .header h1 {
            font-size: 36px;
        }
		
		.header h2 {
            font-size: 25px;
        }
		
        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
		
        button:hover {
            background-color: #555;
        }
		
		input[type="submit"] {
		  background-color: #333;
		  color: #fff;
		  border: none;
		  padding: 10px 20px;
		  border-radius: 5px;
		  cursor: pointer;
		}
		
		input[type="submit"]:hover {
		  background-color: #555;
		}
		
		a {
			color: white;
		}
    </style>
</head>
<body>
    <div class="header">
        <h1>obsNews</h1>
		<h2>Simple News Solution for OBS</h2>
    </div>
    <div class="dropdown open">
        <div class="dropdown-header">From obsNews</div>
        <div class="dropdown-content">
			<textarea style="width:100%; height:10vh; font-size:17px;" readonly><?php echo $fromObsNews; ?></textarea>
        </div>
    </div>

	
    <div class="dropdown">
        <div class="dropdown-header">Required Apps</div>
        <div class="dropdown-content">
		<h3>Disclaimer</h3>
		<p>This prerequisite list is intended for Windows OSes. You can still use obsNews on other OSes, however this list will be inaccurate. For Windows users, ensure everything below in <b>App Status</b> is installed to ensure obsNews functions properly.</p>
		<h3>App Status</h3>
            <ul>
				<li>OBS: <b><?php
$obsFolders = array(
    "C:\\Program Files\\obs-studio",
    "C:\\Program Files (x86)\\obs-studio"
);

$obsFolderExists = false;

foreach ($obsFolders as $obsFolder) {
    if (is_dir($obsFolder)) {
        $obsFolderExists = true;
        break;
    }
}

if ($obsFolderExists) {
    echo "<span style='color:green;'>Installed</span>";
} else {
    echo "<span style='color:red;'>Not Installed <a href='https://obsproject.com/'>(Install?)</a></span>";
}
?>
</b></li>
<li>XAMPP: <b><?php
$xamppPath = "C:\\xampp";

if (is_dir($xamppPath)) {
    echo "<span style='color:green;'>Installed</span>";
} else {
    echo "<span style='color:red;'>Not Installed <a href='https://www.apachefriends.org/'>(Install?)</a></span>";
}
?></b></li>
			</ul>
        </div>
    </div>
	
	<h2>Administrative Stuff</h2>
    <div class="dropdown">
        <div class="dropdown-header">Storage Saver</div>
        <div class="dropdown-content">
			<h3>Clear Logs</h3>
            <p>Whenever you visit this page or an obsNews feature is accessed in OBS, XAMPP logs it for some odd reason. Currently <b><?php echo round(array_sum(array_map('filesize', glob('C:/xampp/apache/logs/*'))) / (1024 * 1024), 2); ?> MB</b> of storage is being wasted on these logs. To clear up that space, click the button below to clear the logs.</p>
			<a href="actions.php?a=clearlogs"><button>Clear Logs (+<?php echo round(array_sum(array_map('filesize', glob('C:/xampp/apache/logs/*'))) / (1024 * 1024), 2); ?> MB)</button></a>
        </div>
    </div>
	
    <div class="dropdown">
        <div class="dropdown-header">Upgrade obsNews to Latest Release</div>
        <div class="dropdown-content">
            <h3>Repo Information</h3>
			<?php
			echo '<p>Your obsNews core.php file is configured to check for updates from the repo <b>'.$githubUser.'/obsNews</b>.</p>
			<p>Note the official obsNews repo is <b>vivianmediagroup/obsNews</b>. All other repos are not maintained by Vivian Media Group.</p>
			<h3>Version Information</h3>
			<p>You are running Version <b>'.$currentVer.'</b></p>
			<p>The latest release is Version <b>'.$latestVer.'</b></p>';
			if($currentVer == $latestVer){
				echo '<h3>No Action Required</h3><p>You are running the latest version of obsNews!</p>';
			}else{
				echo '<h3>Action Required</h3><p>You are running an outdated version of obsNews! For all the latest features, <a href="update.php">click here to update</a>. <b style="color:red;">obsNews may not be functional until the update is complete, so do not update while streaming!</b></p>';
			}
			?>
        </div>
    </div>
	
<h2>Newsroom Essentials</h2>
    <div class="dropdown">
        <div class="dropdown-header">News Ticker</div>
        <div class="dropdown-content">
			<h2>Add Feature To OBS</h2>
			<p>Create a browser source to <b>http://localhost/obs.php?ticker</b></p>
			<hr>
			<h3>Populate Ticker</h3>
			<ul>
				<li>For every new line, add a title you want shown in the ticker. This is called populating the ticker <b>manually</b>.</li>
				<ul>
					<li>When populating manually, you can also style your text! To do this, <textarea style="width:100%; height:3vh;" readonly><span style="color:red;">Make a span and add the CSS you want.</span></textarea></li>
				</ul>
				<li>To populate the ticker from an <b>RSS feed</b>, on a new line, paste the .rss link. The link must end in .rss. If the link is selected, obsNews will grab a random story title from the feed.</li>
			</ul>
			<form action="actions.php" method="post">
			<textarea style="width:100%; height:25vh; font-size:17px;" id="tickercontent" name="tickercontent"><?php 
if(file_exists('obsnewsstorage/ticker.txt')){
	echo file_get_contents('obsnewsstorage/ticker.txt');
}
?></textarea><br>
<input type="submit" value="Save">
</form>
        </div>
    </div>


    <div class="dropdown">
        <div class="dropdown-header">Spinny Logo</div>
        <div class="dropdown-content">
			<h2>Add Feature To OBS</h2>
			<p>Create a browser source to <b>http://localhost/obs.php?spinnylogo</b></p>
			<hr>
			<h3>Upload Logo</h3>
			<p>Reccomended to be a square, must be a JPG</p>
    <form action="actions.php" method="POST" enctype="multipart/form-data">
        <label for="logo">Select:</label>
        <input type="file" name="logo" id="logo" accept=".jpg, .jpeg" required>
        <br>
        <input type="submit" value="Upload">
    </form>
        </div>
    </div>

    <div class="dropdown">
        <div class="dropdown-header">Weather</div>
        <div class="dropdown-content">
			<h2>Add Feature To OBS</h2>
			<p>Create a browser source to <b>http://localhost/obs.php?weather</b></p>
			<hr>
			<h3>Change What's In Program</h3>
			<p>The weather information will be for your location, as determined by your IP Address. Powered by the tomorrow.io API. All program options will include the current weather, in addition to the content you want.</p>
			<p>Please note it may take 2 seconds to change what's in program.</p>
    <form action="actions.php" method="POST">
<select id="weather" name="weather">
  <option value="aqiMini">Air Quality</option>
  <option value="aqiPollutant">Air Quality + Pollutants</option>
  <option value="aqiPollen">Air Quality + Pollen</option>
  <option value="upcoming">Upcoming Days</option>
</select>

        <input type="submit" value="Put In Program">
    </form>
        </div>
    </div>


    <script>
        const dropdowns = document.querySelectorAll(".dropdown");

        dropdowns.forEach(dropdown => {
            const header = dropdown.querySelector(".dropdown-header");

            header.addEventListener("click", () => {
                dropdown.classList.toggle("open");
            });
        });
    </script>
</body>
</html>
