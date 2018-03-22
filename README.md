# VBAN manager
VBAN Manager is a simple web interface to manage [VBAN for Linux](https://github.com/quiniouben/vban).

## Install
 * Install [VBAN for Linux](https://github.com/quiniouben/vban)
 * Copy all this repo to an apache2/php server
 * Edit **/etc/sudoers.d/mount** or create it and add:
 ```
 www-data ALL=(ALL:ALL) NOPASSWD:/var/www/html/script/vban.sh
 ```
 (just replace */var/www/html/* with the path of your install if needed)
 * Open your computer's IP with a browser

## Create new server
 * Go to the interface
 * Go to **New server**
 * Select server type and enter args:
  ```
 -i DESTINATION/SOURCE -p 6980 -s STREAMNAME
  ```
  * Click on Change, Back and Start
