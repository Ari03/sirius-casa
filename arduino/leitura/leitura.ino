
int led = 24; // Porta a definir

void setup() {
  pinMode(led, OUTPUT);
  Serial.begin(9600);

}

String leStringSerial() {
  String conteudo = "";
  char caractere;

  while (Serial.available() > 0) { //Enquanto recebe algo pela porta serial
    caractere = Serial.read(); // Leitura de byte da serial
    if (caractere != '\n') { //Ignora caracter de quebra linha
      conteudo.concat(caractere);
    }
    delay(10);
  }

  Serial.print("Recebido: ");
  Serial.println(conteudo);

  return conteudo;
}

void loop() {
  if (Serial.available() > 0) { // Verifica se foi recebido algo pela porta serial
    String recebido = leStringSerial(); //Lê toda a string que foi recebida
    if (recebido == "LED1:1") {
      digitalWrite(led, HIGH);
    }
    if (recebido == "LED1:0") {
      digitalWrite(led, LOW);
    }
  }
}

