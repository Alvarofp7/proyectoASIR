//este codigo es el encargado de hacer las peticiones a los esclavos y subir los datos a la web
// Se carga en wemos D1

#include <ESP8266WiFi.h> // libreria para usar el IDE de arduino
#include <WiFiClient.h>  // Para realizar la conexion wifi
#include <Wire.h>       // Para la comunicaion Bus
#include <Ethernet.h>
//-------------------VARIABLES GLOBALES--------------------------
int contconexion = 0;
// se cambia el nombre de conexion y la contraseña de red 
const char* ssid = "XXXXXXX";
const char* password = "XXXXXX";

unsigned long previousMillis = 0;

char host[48];
//se pone la IP del servidor y la direccion de la pagina para mandar los datos
String strhost = "192.168.0.250";
String strurl = "/datos/riego/sensor_prueba.php";


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
  // Lee todas las lineas que recibe del servidor y las imprime por la terminal serial
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
  
  Serial.println("");

 
  

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
//prueba para subir datosa manoo a usuario. Esta parte del codigo es para hacer pruebas de subida 
//de datos

//int id = 5; //este ID esta vinculado a un usuario de la Base de datos
//int humedad =62;
//int volumen = 100;
//Serial.print("usuario udentificador  ");
//Serial.println(id); 
//Serial.print("humedad manual ");
//Serial.println(humedad); 
//Serial.print("volumen manual:  ");
//Serial.println(volumen);    
//enviardatos("id=" + String(id) + "&humedad=" + String(humedad));
//enviardatos("id=" + String(id) + "&volumen=" + String(volumen));
 //delay(5000);


 //la siguiente parte del codigo corresponde a la peticion y subida de datos del esclavo 2
 Wire.requestFrom(2, 1);    // Le pide 1 bytes al Esclavo 2
 unsigned long currentMillis = millis();
if (currentMillis - previousMillis >= 10000) { //envia la humedad cada 10 segundos
    previousMillis = currentMillis;
  while(Wire.available())    // 
  { 
    int usuario = 5; 
    int humedad = Wire.read(); 
    // Recibe byte a byte
    Serial.print("humedad ");
    Serial.println(humedad);        // Presenta los caracteres en el Serial Monitor
    // enviamos el id del usuario y la lectura de humedad. 
    enviardatos("Usuario=" + String(usuario) + "&humedad=" + String(humedad));
    
Serial.print("usuario"); 
Serial.println(usuario); 
  }
  
    Serial.println();       // Cámbia de línea en el Serial Monitor.
    delay(500);
   
}
 //////// Petición al esclavo 3. Repetimos la misma operacion que con el esclavo 2
  Wire.requestFrom(3,1);    // Le pide 1 bytes al esclavo 3

  while(Wire.available())    // 
  { 
   int usuario = 5;
    float volumen = Wire.read();   // Recibe byte a byte
    Serial.print("volumen:  ");
    Serial.println(volumen);        // Presenta los caracteres en el Serial Monitor
  enviardatos("Usuario=" + String(usuario) + "&volumen=" + String(volumen));
 Serial.println(usuario); 
  }
  
    Serial.println();       // Cámbia de línea en el Serial Monitor.
    delay(500);
}
