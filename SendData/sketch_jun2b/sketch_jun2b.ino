#include <SPI.h>
#include <Ethernet.h>
#include <Wire.h>
#include <SPI.h>
#include <Adafruit_BMP280.h>

#define BMP_SCK  (13)
#define BMP_MISO (12)
#define BMP_MOSI (11)
#define BMP_CS   (10)

Adafruit_BMP280 bmp; // I2C

byte mac[] = { 0xA8, 0x61, 0x0A, 0xAE, 0x97, 0xE3 };

IPAddress ip(192, 168, 137, 2); // IP-Adresse des Arduino
IPAddress serverIP(192, 168, 137, 1); // IP-Adresse des Servers, an den du Daten senden möchtest
int serverPort = 80; // Port des Servers


EthernetClient client;

void setup() 
{
    Serial.begin(9600);
  while ( !Serial ) delay(100);   // wait for native usb
  Serial.println(F("BMP280 test"));
  unsigned status;
  //status = bmp.begin(BMP280_ADDRESS_ALT, BMP280_CHIPID);
  status = bmp.begin();
  if (!status) {
    Serial.println(F("Could not find a valid BMP280 sensor, check wiring or "
                      "try a different address!"));
    Serial.print("SensorID was: 0x"); Serial.println(bmp.sensorID(),16);
    Serial.print("        ID of 0xFF probably means a bad address, a BMP 180 or BMP 085\n");
    Serial.print("   ID of 0x56-0x58 represents a BMP 280,\n");
    Serial.print("        ID of 0x60 represents a BME 280.\n");
    Serial.print("        ID of 0x61 represents a BME 680.\n");
    while (1) delay(10);
  }

  /* Default settings from datasheet. */
  bmp.setSampling(Adafruit_BMP280::MODE_NORMAL,     /* Operating Mode. */
                  Adafruit_BMP280::SAMPLING_X2,     /* Temp. oversampling */
                  Adafruit_BMP280::SAMPLING_X16,    /* Pressure oversampling */
                  Adafruit_BMP280::FILTER_X16,      /* Filtering. */
                  Adafruit_BMP280::STANDBY_MS_500); /* Standby time. */
  
  Ethernet.begin(mac, ip);
  delay(1000);

  Serial.print("Verbindung hergestellt");
}

void loop() {
      Serial.print(F("Temperature = "));
    Serial.print(bmp.readTemperature());
    Serial.println(" *C");

    Serial.print(F("Pressure = "));
    Serial.print(bmp.readPressure());
    Serial.println(" Pa");

    Serial.print(F("Approx altitude = "));
    Serial.print(bmp.readAltitude(1013.25)); /* Adjusted to local forecast! */
    Serial.println(" m");

    Serial.println();
    delay(2000);

 if (client.connect(serverIP, serverPort)) {
    Serial.println("Verbunden mit dem Server");

    // Daten löschen
    //client.println("GET /wetterstation/Website/PHP/clear_datas.php");
    //client.println("POST /wetterstation/Website/PHP/upload_data.php")
    //client.print("Host: ");
    //client.println(serverIP);
    //client.println("Connection: close");
    //client.println();

    String postData = "wx=" + String(bmp.readTemperature()) + "~" + String(bmp.readPressure()) + "~" + String(bmp.readAltitude(1013.25)) + "~2~2";


    client.println("POST /wetterstation/Website/PHP/upload_data.php HTTP/1.1");
    client.print("Host: ");
    client.println(serverIP);
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.print("Content-Length: ");
    client.println(postData.length());
    client.println("Connection: close");
    client.println();
    client.println(postData);

    // Lies die Antwort des Servers
    while (client.available()) {
      char c = client.read();
      Serial.write(c);
    }
    
    // Beende die Verbindung
    client.stop();

    Serial.println("POST-Anfrage abgeschlossen");

  }
  else {
    Serial.println("Verbindung zum Server fehlgeschlagen");
  }
  
  delay(5000); // Warte 5 Sekunden, bevor du erneut Daten sendest
}





