//More information at https://www.aeq-web.com/arduino-wetterstation?ref=arduinoide

#include <Wire.h>
#include <SPI.h>
#include <Ethernet.h>
#include "cactus_io_BME280_I2C.h"

//---------------------BASIC SETTINGS ---------------------------
BME280_I2C bme(0x76); //BME280 I2C Adress
byte mac[] = {0x00, 0x79, 0xA1, 0xDA, 0xC6, 0x2E}; //Mac Adress
int ledpin = 5; //Pin of LED
int send_interval = 30; //Time to wait in seconds
//---------------------BASIC SETTINGS ---------------------------


String temp = "--.--";
String pressure = "--.--";
String humidity = "--.--";
String wind = "--.--";
long cron = millis();
EthernetClient client;
const float windFactor = 2.4;
const int measureTime = 3;
volatile unsigned int windCounter = 0;
float windSpeed = 0.0;
unsigned long time = 0;

void countWind() {
  windCounter ++;
}

void blink_send() {
  int send_i;
  while (send_i < 2) {
    digitalWrite(ledpin, HIGH);
    delay(100);
    digitalWrite(ledpin, LOW);
    delay(100);
    send_i++;
  }
}

void setup() {
  pinMode(ledpin, OUTPUT);
  if (Ethernet.begin(mac) == 0) {
    while (1) {
      digitalWrite(ledpin, HIGH);
      delay(500);
      digitalWrite(ledpin, LOW);
      delay(500);
    }
    delay(1000);
  }
  bme.begin();
}

void loop()
{
  cronjobs();
}

void cronjobs() {
  if (millis() >= cron + send_interval*1000) {
    cron = millis();
    measure();
    sendhttp();
  }

}

void measure() {
  windms();
  bme.readSensor();
  temp = bme.getTemperature_C();
  pressure = bme.getPressure_HP() / 100;
  humidity = bme.getHumidity();
  wind = String(windSpeed);
}

void windms() {
  windCounter = 0;
  time = millis();
  attachInterrupt(1, countWind, RISING);
  delay(1000 * measureTime);
  detachInterrupt(1);
  time = (millis() - time) / 1000;
  windSpeed = (float)windCounter / (float)measureTime * windFactor;
}

void sendhttp() {
  if (client.connect("testserver.aeq-web.com", 80)) { //Replace it with your IP/Domain | 80 = Default Port for HTTP
    client.print("POST ");
    client.print("/weatherstation/uplink.php"); //Path of your File (if your no path replace it with "/uplink.php"
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println("testserver.aeq-web.com"); //Replace it with your IP/Domain
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.println("Connection: close");
    client.print("Content-Length: ");
    client.println("128");
    client.println();
    client.print("wx=");
    client.print(temp);
    client.print("~");
    client.print(pressure);
    client.print("~");
    client.print(humidity);
    client.print("~");
    client.print(wind);
    client.print("~");
    client.print(millis() / 1000);
    client.print("~");
    client.print("&submit=Submit");
    client.println();
  }
  delay(1000);
  if (client.connected()) {
    blink_send();
    client.stop();
  }
}


