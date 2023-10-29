# obsNews - Simple News Solution for OBS
## Latest Version - v1.1
## Description
Want to host a news broadcast using OBS? Look no further than obsNews for all the features you need! You can add a news ticker, spinning logo and weather directly to your OBS live stream via browser sources! More features will come as more updates are released!
## Before You Install
In order to use obsNews, you will need two apps on your computer (both are free and open-source)...
- [Open Broadcaster Software (OBS)](https://obsproject.com/)
- [XAMPP](https://www.apachefriends.org/)
## Install
### One-Click Install (Windows Batch Script)
In Development
### Git
- [Download Git](https://git-scm.com/), if you don't already have it
- Download OBS and XAMPP (links above)
- Navigate to `C:/xampp/htdocs` (this may be different on non-Windows devices)
- Right-click the folder and click `Open in Terminal` (directions for opening a command prompt may be different on non-Windows devices)
- Paste the following code in the command prompt: `git clone https://github.com/vivianmediagroup/obsNews`
- Back in your `htdocs` folder should now be a folder. Open it and drag all its contents into the `htdocs` folder.
- Delete the now-empty folder Git has created
- Open XAMPP and make sure the `Apache` service is started
- [Go to localhost](http://localhost)
### Manually
- Download OBS and XAMPP (links above)
- [Click here to download this repo as a ZIP file](https://github.com/vivianmediagroup/obsNews/archive/refs/heads/main.zip). When downloading, set the download path to `C:/xampp/htdocs` (this may be different on non-Windows devices)
- Unzip the ZIP file
- If the ZIP file extracted and **CREATED A FOLDER**, open it and drag all its contents into the `htdocs` folder. Delete the now-empty folder your ZIP unpacker created.
- If the ZIP file extracted **WITHOUT CREATING A FOLDER**, nothing needs to be done.
- Delete the ZIP file, if it's still there
- Open XAMPP and make sure the `Apache` service is started
- [Go to localhost](http://localhost)
## Update
### In Outdated obsNews
- [Go to localhost](http://localhost)
- Under `Administrative Stuff`, open the `Upgrade obsNews to Latest Release` tab by clicking it
- If you see `You are running the latest version of obsNews!`, you don't have to do anything--you're using the latest version. You can force an update--refer to `Force Update in Up-To-Date obsNews`.
- If you see `You are running an outdated version of obsNews! For all the latest features, click here to update`, click `click here to update`. Please note that obsNews may not be functional until the update is complete, so **DO NOT UPDATE WHILE STREAMING!**
- Wait--do not spam the link, it'll just take longer to update.
- When you see `Update Complete! Return To obsNews`, click `Return to obsNews`--the update is complete.
### Force Update in Up-To-Date obsNews
- [Click here to force an update.](http://localhost/update.php) Please note that obsNews may not be functional until the update is complete, so **DO NOT UPDATE WHILE STREAMING!**
- Wait--do not spam the link, it'll just take longer to update.
- When you see `Update Complete! Return To obsNews`, click `Return to obsNews`--the update is complete.
### Manually
Refer back to the `Install` directions. A fresh install will update to the latest version.
## Credits
- **Vivian from [Vivian Media Group](https://vmg.joindefy.com)** - Development and Matinence
- **[Github](https://github.com/)** - Used for Hosting
- **[jsDelivr](https://www.jsdelivr.com/)** - Used in Update System
## Sponsors
**Your name can be right here!** [Make a donation](https://www.buymeacoffee.com/myvmg) and mention in your `Say something nice...` that you want to support the development of obsNews. You can also donate by scanning the QR Code below...

![Donation QR Code](https://cdn.jsdelivr.net/gh/vivianmediagroup/obsNews@main/donateQr.png)
