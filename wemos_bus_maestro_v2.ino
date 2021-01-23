#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <Wire.h>
#include <TimeLib.h>

//#include <SPI.h>
#include <Ethernet.h>
//-------------------VARIABLES GLOBALES--------------------------
int contconexion = 0;
const char* ssid = "vodafoneA90A";
const char* password = "7CNE2AYR6RDQQX";

unsigned long previousMillis = 0;

char host[48];
String strhost = "192.168.0.250";
String strurl = "/datos/riego/sensor_prueba.php";
String chipid = "";

//Inicializar instancia de la libreria ethernet
EthernetClient client;

//-------Función para Enviar Datos a la Base de Datos SQL--------

String enviardatos(String datos) {
  String linea = "error";
  WiFiClient client;
  strhost.toCharArray(host, 49);
  if (!client.connect(host, 80)) {
    Serial.println("Fallo de conexion");
    return linea;
  }

  client.print(String("POST ") + strurl + " HTTP/1.1" + "\r\n" + 
               "Host: " + strhost + "\r\n" +
               "Accept: */*" + "*\r\n" +
               "Content-Length: " + datos.length() + "\r\n" +
               "Content-Type: application/x-www-form-urlencoded" + "\r\n" +
               "\r\n" + datos);           
  delay(10);             
  
  Serial.print("Enviando datos a SQL...");
  
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println("Cliente fuera de tiempo!");
      client.stop();
      return linea;
    }
  }
  // Lee todas las lineas que recibe del servidro y las imprime por la terminal serial
  while(client.available()){
    linea = client.readStringUntil('\r');
  }  
  Serial.println(linea);
  return linea;
}

//-------------------------------------------------------------------------

void setup() {

  // Inicia Serial
  Wire.begin();        // Conexión al Bus I2C
  Serial.begin(9600);
  setTime(15,13,00,28,12,2020);
  Serial.println("");

  Serial.print("chipId: "); 
  chipid = String(ESP.getChipId());
  Serial.println(chipid); 

  // Conexión WIFI
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED and contconexion <50) { //Cuenta hasta 50 si no se puede conectar lo cancela
    ++contconexion;
    delay(500);
    Serial.print(".");
  }
  if (contconexion <50) {
      //para usar con ip fija
      IPAddress ip(192,168,0,200); 
      IPAddress gateway(192,168,0,1); 
      IPAddress subnet(255,255,255,0); 
      WiFi.config(ip, gateway, subnet); 
      
      Serial.println("");
      Serial.println("WiFi conectado");
      Serial.println(WiFi.localIP());
  }
  else { 
      Serial.println("");
      Serial.println("Error de conexion");
  }
}

//--------------------------LOOP--------------------------------
void loop() {
//prueba para subir datosa manoo a usuario pruba4
int id = 5;
int humedad =62;
int volumen = 100;


Serial.print("usuario udentificador  ");
    Serial.println(id); 
Serial.print("humedad manual ");
    Serial.println(humedad); 
  Serial.print("volumen manual:  ");
    Serial.println(volumen);    
enviardatos("id=" + String(id) + "&humedad=" + String(humedad));
 enviardatos("id=" + String(id) + "&volumen=" + String(volumen));

 
 
 delay(5000);
 //////  
 Wire.requestFrom(2, 1);    // Le pide 10 bytes al Esclavo 2
 unsigned long currentMillis = millis();
if (currentMillis - previousMillis >= 10000) { //envia la temperatura cada 10 segundos
    previousMillis = currentMillis;
  while(Wire.available())    // slave may send less than requested
  { 
    int usuario = 4;
    int humedad = Wire.read(); 
    // Recibe byte a byte
    Serial.print("humedad ");
    Serial.println(humedad);        // Presenta los caracteres en el Serial Monitor 
    enviardatos("Usuario=" + String(usuario) + "&humedad=" + String(humedad));
    
Serial.print("usuario"); 
Serial.println(usuario); 
  }
  
    Serial.println();       // Cámbia de línea en el Serial Monitor.
    delay(500);
   
}
 //////// Petición al Esclavo 3
  Wire.requestFrom(3,1);    // Le pide 17 bytes al Esclavo 3

  while(Wire.available())    // slave may send less than requested
  { 
   int usuario = 4;
    float volumen = Wire.read();   // Recibe byte a byte
    Serial.print("volumen:  ");
    Serial.println(volumen);        // Presenta los caracteres en el Serial Monitor
  enviardatos("Usuario=" + String(usuario) + "&volumen=" + String(volumen));
 Serial.println(usuario); 
  }
  
    Serial.println();       // Cámbia de línea en el Serial Monitor.
    delay(500);
}
