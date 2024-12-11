import bme280
import smbus2
import sqlite3
import RPi.GPIO as GPIO
import time
from datetime import datetime
import mysql.connector
PIN = 4
GPIO.setmode(GPIO.BCM)
port = 1
address = 0x76 
bus = smbus2.SMBus(port)

calibration_params=bme280.load_calibration_params(bus,address)

def read_temperature():
    
    bme280_data = bme280.sample(bus,address,calibration_params)
    ambient_temperature = bme280_data.temperature
    if ambient_temperature is not None:
        print(ambient_temperature)
        return ambient_temperature
    else:
        print("Failed to get reading. Try again!")
        return None

def connect_to_db():
    connect = mysql.connector.connect('cake_cms.sql')
    return connect


def insert_temperature(connect, temperature):
    cursor = connect.cursor()
    timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    cursor.execute('''
        INSERT INTO donnee (time, temperature)
        VALUES (?, ?)
    ''', (time, temperature))
    connect.commit()

def main():
    connect = connect_to_db()

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
                     




