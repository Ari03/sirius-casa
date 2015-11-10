#include <Servo.h>

Servo motor;
void setup() {
  motor.attach(3);
 
}

void loop() {
 motor.write(90);
 delay(1000);
 motor.write(9);
 delay(1000);

}
