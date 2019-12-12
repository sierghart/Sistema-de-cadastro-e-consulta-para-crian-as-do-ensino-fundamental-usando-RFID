

#include <SPI.h>
#include <MFRC522.h>
#include <WiFi.h>
#include <HTTPClient.h>

#define RST_PIN         22         
#define SS_PIN          5
MFRC522 mfrc522(SS_PIN, RST_PIN);  

const char* ssid     = "GVT-78F4";
const char* password = "junior041299";


IPAddress local_IP(192, 168, 25, 115);
IPAddress gateway(192, 168, 25, 1);
IPAddress subnet(255, 255, 255, 0);
IPAddress primaryDNS(8, 8, 8, 8); //optional
IPAddress secondaryDNS(8, 8, 4, 4); //optional

void setup()
{
  Serial.begin(115200);
  SPI.begin();      
  mfrc522.PCD_Init();

  if (!WiFi.config(local_IP, gateway, subnet, primaryDNS, secondaryDNS)) {
    Serial.println("STA Failed to configure");
  }

  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  
}

void loop()
{

  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }


String conteudo= "";
 
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     conteudo.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     conteudo.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  
conteudo.toUpperCase();

 
  delay(1000);
  

  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;
  HTTPClient http;

  String mandar = "teste=" + conteudo;

  http.begin("http://192.168.25.228/escola/php_action/cartao.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpResponseCode =  http.POST(mandar);
      
      
  if(httpResponseCode>0){
      String response = http.getString();
      
      
      Serial.println(response);
    
    
        
      }

      http.end();
      

      delay(1000);
     

  
}
