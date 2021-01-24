//Este codigo  es el encargado de  calcular  el  % de volumen del deposito. Se carga en el Arduino numero 2.
// se ira explicando las partes mas importantes
#include <Wire.h>

const int Trigger = 3;   //Pin digital 2 para el Trigger del sensor
const int Echo = 4;   //Pin digital 3 para el Echo del sensor
// Altura del agua con deposito lleno, distancia en vacío y disytancia lleno
// distacian lleno 3cm.
//con ladistacias lleno y vacio podeo s calcular la altura del agua
// esto sera el 100% del deposito
const float AlturaAgua = 7; 
const float distanciaVacio = 10;
void setup() {

{
  Wire.begin(3);                // Este Esclavo es el número 3
  Wire.onRequest(requestEvent); // Cuando el Maestro le hace una petición,
                                // realiza el requestEvent
}
  
  Serial.begin(9600);//iniciailzamos la comunicación
  pinMode(Trigger, OUTPUT); //pin como salida pin 2
  pinMode(Echo, INPUT);  //pin como entrada pin 3
  digitalWrite(Trigger, LOW);//Inicializamos el pin con 0
   
 }

void loop()
{

  long t; //timepo que demora en llegar el eco
  long d; //distancia en centimetros

  digitalWrite(Trigger, HIGH);
  delayMicroseconds(10);          //Enviamos un pulso de 10us
  digitalWrite(Trigger, LOW);
  
  t = pulseIn(Echo, HIGH); //obtenemos el ancho del pulso
  d = t/59;             //escalamos el tiempo a una distancia en cm

float distanciaLleno = distanciaVacio - d;
long cantidadLiquido = distanciaLleno * 100 / AlturaAgua;
  Serial.print("Distancia: ");
  Serial.print(d);      //Enviamos serialmente el valor de la distancia
  Serial.print("cm");
  Serial.println();
   Serial.print(cantidadLiquido);
   Serial.println(" en %");
   
 
  delay(1000);          //Hacemos una pausa de 100ms

}
void requestEvent()
{
long t; //timepo que demora en llegar el eco
  long d; //distancia en centimetros
  digitalWrite(Trigger, HIGH);
  delayMicroseconds(10);          //Enviamos un pulso de 10us
  digitalWrite(Trigger, LOW);
  
  t = pulseIn(Echo, HIGH); //obtenemos el ancho del pulso
  d = t/59;             //escalamos el tiempo a una distancia en cm

float distanciaLleno = distanciaVacio - d;
long cantidadLiquido = distanciaLleno * 100 / AlturaAgua;
   
 
 
  Wire.write(cantidadLiquido);
}
