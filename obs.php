<?php
  require("core.php");
  
  //START TICKER
  if(isset($_GET['ticker'])){
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #000, #333);
      font-family: Arial, sans-serif;
      overflow: hidden;
    }

    #news-bar {
      position: fixed;
      bottom: 0;
      left: 0;
      background: #000;
      color: #fff;
      width: 100%;
      padding: 15px;
      text-align: center;
      font-size: 18px;
    }
  </style>
</head>
<body>
  <div id="news-bar">
    <marquee behavior="scroll" direction="left" scrollamount="8" id="news-content">
<?php
function isRSSFeedLink($url) {
    return preg_match("/^(http|https):\/\/(.+)\.rss$/", $url);
}

function getRandomStoryTitleFromRSS($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $rssFeed = curl_exec($ch);
    curl_close($ch);

    if ($rssFeed) {
        $xml = simplexml_load_string($rssFeed);

        if ($xml) {
            $items = $xml->channel->item;

            if (count($items) > 0) {
                // Convert SimpleXMLElement to an array
                $itemsArray = [];
                foreach ($items as $item) {
                    $itemsArray[] = $item;
                }
                $randomItem = $itemsArray[array_rand($itemsArray)];
                return (string)$randomItem->title;
            }
        }
    }

    return false;
}



$filename = 'obsnewsstorage/ticker.txt';

if (!file_exists($filename) || filesize($filename) == 0) {
    echo "News Ticker Courtesy of obsNews by Vivian Media Group - Please Populate Ticker at http://localhost";
} else {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);

    $randomLine = $lines[array_rand($lines)];

    if (isRSSFeedLink($randomLine)) {
        $storyTitle = getRandomStoryTitleFromRSS($randomLine);
        if ($storyTitle) {
            echo $storyTitle;
        } else {
            echo "Feed (domain) Unavailable, Please Reconfigure in obsNews";
        }
    } else {
        echo $randomLine;
    }
}
?>
    </marquee>
  </div>

  <script>
    const newsContent = document.getElementById("news-content");
    const interval = setInterval(() => {
      if (newsContent.offsetWidth + newsContent.scrollLeft >= newsContent.scrollWidth) {
        clearInterval(interval);
        location.href = 'obs.php?ticker';
      }
    }, 10000);
  </script>
</body>
</html>


<?php
  }
  //END TICKER
  
  //START SPINNY LOGO
  if(isset($_GET['spinnylogo'])){
?>
<!DOCTYPE html>
<html>
<head>
<style>
  @keyframes spin {
    0% {
      transform: rotateY(0deg);
    }
    100% {
      transform: rotateY(360deg);
    }
  }

  .cube-container {
    width: 300px;
    height: 300px;
    perspective: 1000px;
    position: relative;
  }

  .cube {
    width: 100%;
    height: 100%;
    position: absolute;
    transform-style: preserve-3d;
    animation: spin 10s linear infinite;
    transform-origin: center;
  }

  .cube div {
    position: absolute;
    width: 200px;
    height: 200px;
    background: url("obsnewsstorage/logo.jpg") center center no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .front { transform: translateZ(100px); }
  .back { transform: rotateY(180deg) translateZ(100px); }
  .left { transform: rotateY(-90deg) translateZ(100px); }
  .right { transform: rotateY(90deg) translateZ(100px); }
  .top { transform: rotateX(90deg) translateZ(100px); }
  .bottom { transform: rotateX(-90deg) translateZ(100px); }
</style>
</head>
<body>
  <div style="padding: 10px;">
  <div class="cube-container">
    <div class="cube">
      <div class="front"></div>
      <div class="back"></div>
      <div class="left"></div>
      <div class="right"></div>
      <div class="top"></div>
      <div class="bottom"></div>
    </div>
  </div>
  </div>
</body>
</html>


<?php
  }
  //END SPINNY LOGO
  
  //START WEATHER
  if(isset($_GET['weather'])){
?>
<!DOCTYPE html>
<html>
<head>
<style>
  body {
    margin: 0;
    overflow: hidden;
  }

  .tomorrow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
  }
</style>
</head>
<body>
<script>
(function(d, s, id) {
    if (d.getElementById(id)) {
        if (window.__TOMORROW__) {
            window.__TOMORROW__.renderWidget();
        }
        return;
    }
    const fjs = d.getElementsByTagName(s)[0];
    const js = d.createElement(s);
    js.id = id;
    js.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";

    fjs.parentNode.insertBefore(js, fjs);
})(document, 'script', 'tomorrow-sdk');
</script>

<div class="tomorrow"
   data-location-id=""
   data-language="EN"
   data-unit-system="IMPERIAL"
   data-skin="dark"
   data-widget-type="<?php if(file_exists('obsnewsstorage/weather.txt')){ echo file_get_contents('obsnewsstorage/weather.txt'); }else{ echo 'upcoming'; } ?>"
   style="padding-bottom: 0;"
>
  <a
    href="https://www.tomorrow.io/weather-api/"
    rel="nofollow noopener noreferrer"
    target="_blank"
    style="position: absolute; bottom: 10px; transform: translateX(-50%); left: 50%;"
  >
</div>
<script defer>
var inProgram = '<?php if(file_exists('obsnewsstorage/weather.txt')){ echo file_get_contents('obsnewsstorage/weather.txt'); }else{ echo 'upcoming'; } ?>';
function fetchWeatherFile() {
  fetch('obsnewsstorage/weather.txt')
    .then(response => {
      if (response.ok) {
        return response.text();
      } else {
        return null;
      }
    })
    .then(data => {
      if (data !== null) {
        var programRequest = data;
        if (programRequest !== inProgram) {
          location.reload();
        }
      }
    })
    .catch(error => {
      console.error(error);
    });
}
window.addEventListener('load', fetchWeatherFile);
setInterval(fetchWeatherFile, 2000);
</script>
</body>
</html>

<?php
}
//END WEATHER
?>
