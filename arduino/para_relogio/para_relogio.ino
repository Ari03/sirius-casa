#define piscina 24
#define jardim 26

char b;

void setup() {
  pinMode(piscina, OUTPUT);
  pinMode(jardim, OUTPUT);
  Serial.begin(9600);

}

void loop() {
  while (Serial.available() == 0);

  b = Serial.read();

  Serial.print(b);

  if (b == '1') {
    digitalWrite(piscina, HIGH);
    digitalWrite(jardim, HIGH);
    delay(500);
  }
  if (b == '2') {
    digitalWrite(piscina, LOW);
    digitalWrite(jardim, LOW);
    delay(300);
  }

}
