# MQTT-to-MySql-Web
Get MQTT data from published ESP-8266 sensor data to MySql and PHP

Put the tmp.php file in /public_html folder. All other outside of public for safety. 
Edit stye.py with MySql and MQTT data, edit config.ini MySql data.

Run crontab ever 10 minutes:
*/10 * * * * python3 /var/www/mydomain_usr/data/www/stue.py
