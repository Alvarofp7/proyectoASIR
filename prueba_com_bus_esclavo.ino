//Este codigo recoge los datos del sensor de humedad y los anda a wemos.
//se carga en el arrduino 2.

#include <Wire.h>
const int sensorPin = A0;
//se escala la lectura del sensor
// 1020 es 0% de humedad
//310 es 100% de humedad
void setup()
{
  Wire.begin(2);                // Este Esclavo es el número 2
  Wire.onRequest(requestEvent); // Cuando el Maestro le hace una petición,
                                // realiza el requestEvent
}

void loop()
{
  //esta parte es para ver los datos en el puerto serie
  Serial.begin(9600);
  long humedad = analogRead(sensorPin);
  long humedad100 = 300 * 100 / humedad;
   Serial.print("lectura sensor");
   Serial.println(humedad);
   Serial.print("humeda en  %");
   Serial.println(humedad100);
  delay(1000);
  
}

// Esto es lo que envía cuando le hace la petición.
void requestEvent()
{
      
   long humedad = analogRead(sensorPin);
  long humedad100 = 300 * 100 / humedad;
  Wire.write(humedad100); // Envía 10 bytes 
                 
}
