// Este cogigo se encarga de calcular el % de liquido del deposito.
// Se carga en el arduino numero 3 
#include <Wire.h>

const int Trigger = 3;   //Pin digital 2 para el Trigger del sensor
const int Echo = 4;   //Pin digital 3 para el Echo del sensor
//Se toman las medidas del deposito vacio y lleno de agua.
// distancia vacio 10cm.
// distacian lleno 3cm.
//con ladistacias lleno y vacio podeo s calcular la altura del agua
// esto sera el 100% del deposito.
// para tomar estas medidas simplemnete cargamos el programa y vemos los valores que toma "d"
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
  
//Esta parte del codigo es para calcular el volumen y mostrar los datos por el puerto serie

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

// En la funcion requestEvent() repetimos el calculo para mandar los datos a Wemos
void requestEvent()
{
long t; 
  long d; 
  digitalWrite(Trigger, HIGH);
  delayMicroseconds(10);         
  digitalWrite(Trigger, LOW);
  
  t = pulseIn(Echo, HIGH); 
  d = t/59;             

float distanciaLleno = distanciaVacio - d;
long cantidadLiquido = distanciaLleno * 100 / AlturaAgua;
   
  Wire.write(cantidadLiquido); // con esto mandamos el % de agua a wemos
}
