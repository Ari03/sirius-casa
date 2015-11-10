
#include<Servo.h>
#define pino 3

Servo motor;
int angulo;
char c;


void setup() {
  Serial.begin(9600);
  motor.attach(pino);

}

void loop() {
  c = Serial.read();

  // espera receber '1' quando apertar abrir garagem
  // converter em numero essa string


  if (c == '1') { // Fechar porta
    motor.write(90);
    delay(20);
  }
  
  if (c == '2') { // Abrir porta
    motor.write(0);
    delay(20);
  }
}



