//More information at: https://www.aeq-web.com/arduino-wetterstation?ref=arduinoide

#include <Wire.h>
#include "cactus_io_BME280_I2C.h"

BME280_I2C bme(0x76);  // I2C address = 0x76
int LED = 5;
String wind = "--.--";
const int windPin = 3; 
const float windFactor = 2.4;   
const int measureTime = 3;      
volatile unsigned int windCounter = 0;   
float windSpeed = 0.0;
unsigned long time = 0;
void countWind() {
  windCounter ++; 
}

void setup() {
  Serial.begin(9600);
  pinMode(LED, OUTPUT); 
  bme.begin();

}

void loop() {
  
  windms();
  get_data();
}

void get_data() {
  bme.readSensor();
  Serial.print("Pressure: ");
  Serial.print(bme.getPressure_HP() / 100);
  Serial.print(" H/Pa Humidity: ");
  Serial.print(bme.getHumidity());
  Serial.print(" % Temperature: ");
  Serial.print(bme.getTemperature_C());
  Serial.print(" *C Wind: ");
  Serial.print(windSpeed);
  Serial.println(" KM/h");
  digitalWrite(LED, HIGH);
  delay(1000);
  digitalWrite(LED, LOW);
}

void windms(){
  windCounter = 0;
  time = millis();
  attachInterrupt(1,countWind,RISING);
  delay(1000 * measureTime);
  detachInterrupt(1);
  time = (millis() - time) / 1000;
  windSpeed = (float)windCounter / (float)measureTime * windFactor;
}
