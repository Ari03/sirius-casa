#define led 24

char o;

void setup() {
  pinMode(led, OUTPUT);
  Serial.begin(9600);

}

void loop() {
  while(Serial.available() == 0);
  o = Serial.read();
  Serial.print(o);

  if(o=='1') {
    digitalWrite(led, HIGH);
    delay(500);
  }

  if(o=='2') {
    digitalWrite(led, LOW);
    delay(500);
  }

}
