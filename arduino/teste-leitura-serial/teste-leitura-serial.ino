#define ANALOG_PIN 4 // Declaração da constante ANALOG_PIN na porta 4

void setup() {
  Serial.begin(9600);
}

void loop() {
  if (Serial.available() > 0) {
    if (Serial.read() == 1)
      Serial.print(analogRead(ANALOG_PIN), DEC);
  }
}
