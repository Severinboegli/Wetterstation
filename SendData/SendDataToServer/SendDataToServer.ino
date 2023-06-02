#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xA8, 0x61, 0x0A, 0xAE, 0x97, 0xE3 };

IPAddress ip(192, 168, 137, 2); // IP-Adresse des Arduino
IPAddress serverIP(192, 168, 137, 1); // IP-Adresse des Servers, an den du Daten senden möchtest
int serverPort = 80; // Port des Servers


EthernetClient client;

void setup() 
{
  Ethernet.begin(mac, ip);
  delay(1000);
  Serial.begin(9600);

  Serial.print("Verbindung hergestellt");
}

void loop() {
 if (client.connect(serverIP, serverPort)) {
    Serial.println("Verbunden mit dem Server");

    // Daten löschen
    //client.println("GET /wetterstation/Website/PHP/clear_datas.php");
    //client.println("POST /wetterstation/Website/PHP/upload_data.php")
    //client.print("Host: ");
    //client.println(serverIP);
    //client.println("Connection: close");
    //client.println();

    String postData = "wx=2~2~2~2~2";

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



