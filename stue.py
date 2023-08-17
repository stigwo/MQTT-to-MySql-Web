

import paho.mqtt.client as mqtt
import json
import pymysql
pymysql.install_as_MySQLdb()
import MySQLdb
import time
from datetime import datetime, timedelta


db= MySQLdb.connect("localhost", "username", "password", "database_name")
cursor=db.cursor()

broker_address= "142.01.3.2"          #Broker address
port = 1883                          #Broker port
user = "username"         #Connection username
password = "password"     #Connection password

def on_connect(client, userdata, flags, rc):  # The callback for when the client connects to the broker
    print("Connected with result code {0}".format(str(rc)))  # Print result of connection attempt
    client.subscribe("glasshouse/stue/#")

def on_message(client, userdata, msg):  # The callback for when a PUBLISH message is received from the server.
    cursor.execute ("select * from sensordata2")
    numrows = int (cursor.rowcount)
    newrow = numrows + 1

    now = datetime.now() + timedelta(hours=8)
    formatted_date = now.strftime('%Y-%m-%d %H:%M:%S')

    payload = json.loads(msg.payload.decode('utf-8'))
    print("New row: "+str(newrow))
    temperature = float(payload["temperature"])
    humidity = float(payload["humidity"])
    print("Temperature: "+str(temperature))
    print("Humidity: "+str(humidity))
    print("DateTime: "+str(formatted_date))
    if (( temperature > -20) and (temperature < 40)) and ((humidity >= 0) and (humidity <= 100)):
      cur = db.cursor()
      cur.execute("INSERT INTO sensordata2 (idx, temperature, humidity, timestamp) VALUES ("+str(newrow)+", "+str(temperature)+", "+str(humidity)+", %s)", (formatted_date))
      db.commit()
      print("data received and imported in MySQL")
    else:
      print("data exceeded limits and is NOT imported in MySQL")


client = mqtt.Client("stue-script")
client.username_pw_set(user, password=password)
client.on_connect = on_connect  # Define callback function for successful connection
client.on_message = on_message  # Define callback function for receipt of a message
client.connect(broker_address, port=port)          #connect to broker
# client.loop_forever()  # Start networking daemon
client.loop_start() #start the loop
time.sleep(20) # wait
client.loop_stop() #stop the loop
