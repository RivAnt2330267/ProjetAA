import bme280
import smbus2
import sqlite3
import RPi.GPIO as GPIO
import time
from datetime import datetime
import mysql.connector
SENSOR = Adafruit_DHT.DHT22
PIN = 4
GPIO.setmode(GPIO.BCM)
GPIO.setup(27,GPIO.OUT)
GPIO.setup(17,GPIO.OUT)

port = 1
address = 0x76 
bus = smbus2.SMBus(port)

bme280.load_calibration_params(bus,address)

def read_temperature():
    ambient_temperature = bme280_data.temperature
    if ambient_temperature is not None:
        return ambient_temperature
    else:
        print("Failed to get reading. Try again!")
        return None

def connect_to_db():
    connect = mysql.connector.connect('cake_cms.sql')
    return connect

def create_table(connect):
    cursor = connect.cursor()
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS temperature (
            donneeId INTEGER PRIMARY KEY AUTOINCREMENT,
            time TEXT,
            temperature REAL
        )
    ''')
    connect.commit()

def insert_temperature(connect, temperature):
    cursor = connect.cursor()
    timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    cursor.execute('''
        INSERT INTO temperature (time, temperature)
        VALUES (?, ?)
    ''', (time, temperature))
    connect.commit()

def main():
    connect = connect_to_db()
    create_table(connect)

    try:
        while True:
            temperature = read_temperature()
            if temperature is not None:
                insert_temperature(connect, temperature)
                print(f"Inserted: {temperature}°C at {datetime.now()}")
            time.sleep(60) 
    except KeyboardInterrupt:
        print("Program terminated")
    finally:
        connect.close()


""""import bme280

import smbus2
import RPi.GPIO as GPIO
from time import sleep

GPIO.setmode(GPIO.BCM)
GPIO.setup(27,GPIO.OUT)
GPIO.setup(17,GPIO.OUT)


port = 1
address = 0x76 
bus = smbus2.SMBus(port)

bme280.load_calibration_params(bus,address)

def verifAmbient(temp_min, temp_max) :
    if ambient_temperature < temp_min:
        GPIO.output(27, GPIO.HIGH)
        GPIO.output(17, GPIO.LOW)
    elif ambient_temperature > temp_max :
        GPIO.output(27, GPIO.HIGH)
        GPIO.output(17, GPIO.LOW)
    else :
        GPIO.output(27, GPIO.LOW)
        GPIO.output(17, GPIO.LOW)

    
    

verif = False
while verif == False :
    choix = input('Quelle plantation souhaitez-vous optimiser ?')
    if(choix == 'TOMATE' or choix == 'CAROTTE' or choix == 'CONCOMBRE') :
        verif = True

while True:
    bme280_data = bme280.sample(bus,address)
    ambient_temperature = bme280_data.temperature
    if choix == 'TOMATE' :
       verifAmbient(20, 25)
    elif choix == 'CAROTTE':
        verifAmbient(16, 23)
    elif choix == 'CONCOMBRE' :
        verifAmbient(18, 26)
    print( ambient_temperature)
    sleep(1)"""



