LaineMoonloaderRepository (Project name)
=======

### this project is no longer maintained due to more usable **"dependency manager"** and also im abandoned PHP progamming for a long time

A simple repository that was created specifically for the Moonloader. and allows you to download files, easy version control, easy customization of dependencies and **much more**.

Server written on vanila version of PHP and without dependencies

Client written on SA Moonloader 0.25 and LuaSocket
## TODO:
**Server**

*Packages manage/Upload: 90% done

*Admin panel/Repository manage: 70% done

*Design: 90% done


**Client**

Version control/Autoupdate: 50% done

**Install Server**
the installation is stupidly simple.

1. Clone this repository

2. Create folders ``accounts`` and ``data`` in main repository folder

3. Upload this on any hosting with PHP 5/7 support

**Install Client** 
Requires moonloader 0.25 or above (on older versions not tested but it should work)

1. Download file ``client/LMR-Client.lua``

2. Install LuaSocket in ``mooonloader/lib``

3. Launch game! Enter chat command `mr_install package-version` to install packages!
