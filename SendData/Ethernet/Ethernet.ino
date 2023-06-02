#include <SPI.h>
#include <Ethernet.h>

byte mac[] = {0xA8, 0x61, 0x0A, 0xAE, 0x97, 0xE3};

IPAddress ip(192, 168, 137, 2);       // IP-Adresse des Arduino
IPAddress serverIP(192, 168, 137, 1); // IP-Adresse des Servers, an den du Daten senden möchtest
int serverPort = 80;                  // Port des Servers

EthernetClient client;

void setup()
{
  Ethernet.begin(mac, ip);
  delay(1000);
  Serial.begin(9600);

  Serial.print("Verbindung hergestellt");
}

void loop()
{
  if (client.connect(serverIP, serverPort))
  {
    Serial.println("Verbunden mit dem Server");

    // Daten löschen
<<<<<<< HEAD
    // client.println("GET /wetterstation/Website/PHP/clear_datas.php");
    // client.println("POST /wetterstation/Website/PHP/upload_data.php")
    // client.print("Host: ");
    // client.println(serverIP);
    // client.println("Connection: close");
    // client.println();
=======
    //client.println("GET /wetterstation/Website/PHP/clear_datas.php");
    //client.println("POST /wetterstation/Website/PHP/upload_data.php")
    //client.print("Host: ");
    //client.println(serverIP);
    //client.println("Connection: close");
    //client.println();
>>>>>>> parent of 88ac6a8 (Update Ethernet.ino)

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
    while (client.available())
    {
      char c = client.read();
      Serial.write(c);
    }

    // Beende die Verbindung
    client.stop();

    Serial.println("POST-Anfrage abgeschlossen");
  }
  else
  {
    Serial.println("Verbindung zum Server fehlgeschlagen");
  }

  delay(5000); // Warte 5 Sekunden, bevor du erneut Daten sendest
}

<<<<<<< HEAD
void sendhttp()
{
  if (client.connect(ip, 80))
  { // Replace it with your IP/Domain | 80 = Default Port for HTTP
    client.print("POST ");
    client.print("/wetterstation/Website/PHP/upload_data.php"); // Path of your File (if your no path replace it with "/uplink.php"
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println(ip); // Replace it with your IP/Domain
=======

void sendhttp() {
  if (client.connect(ip, 80)) { //Replace it with your IP/Domain | 80 = Default Port for HTTP
    client.print("POST ");
    client.print("/wetterstation/Website/PHP/upload_data.php"); //Path of your File (if your no path replace it with "/uplink.php"
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println(ip); //Replace it with your IP/Domain
>>>>>>> parent of 88ac6a8 (Update Ethernet.ino)
    client.println("User-Agent: Arduino/1.0");
    client.println("Connection: close");
    client.print("Content-Length: ");
    client.println("128");
    client.println();
    client.print("wx=7~7~7~7~7");
    client.print("&submit=Submit");
    client.println();

    Serial.print("Sent");
  }
  delay(1000);
<<<<<<< HEAD
  if (client.connected())
  {
=======
  if (client.connected()) {
>>>>>>> parent of 88ac6a8 (Update Ethernet.ino)
    Serial.print("Test");
    client.stop();
  }
}
