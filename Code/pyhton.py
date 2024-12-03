import Adafruit_DHT
import sqlite3
import time
from datetime import datetime
import mysql.connector
SENSOR = Adafruit_DHT.DHT22

# Function to read temperature from the temperature sensor
def read_temperature():
    humidity, temperature = Adafruit_DHT.read_retry(SENSOR, PIN)
    if temperature is not None:
        return temperature
    else:
        print("Failed to get reading. Try again!")
        return None

# Function to connect to SQLite database
def connect_to_db():
    connect = mysql.connector.connect('cake_cms.sql')
    return connect

# Function to create the table if it doesn't exist
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

# Function to insert temperature data into the database
def insert_temperature(connect, temperature):
    cursor = connect.cursor()
    timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    cursor.execute('''
        INSERT INTO temperature (time, temperature)
        VALUES (?, ?)
    ''', (time, temperature))
    connect.commit()

# Main function to continuously read temperature and store it
def main():
    connect = connect_to_db()
    create_table(connect)

    try:
        while True:
            temperature = read_temperature()
            if temperature is not None:
                insert_temperature(connect, temperature)
                print(f"Inserted: {temperature}°C at {datetime.now()}")
            time.sleep(60)  # Wait for 1 minute before the next reading
    except KeyboardInterrupt:
        print("Program terminated")
    finally:
        connect.close()


