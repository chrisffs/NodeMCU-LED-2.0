#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

const char *ssid = ""; // Wifi Name
const char *password = ""; // Wifi Password

const char *host = "http://"; // IP Address

void setup() {
  pinMode(LED_BUILTIN, OUTPUT); 
  pinMode(D0, OUTPUT); 
  pinMode(D1, OUTPUT); 
  pinMode(D2, OUTPUT); 

  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);
  delay(1000);
  WiFi.mode(WIFI_STA);
  
  WiFi.begin(ssid, password);
  Serial.println("");

  Serial.print("Connecting");

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  HTTPClient http;
  WiFiClient client;
  String getData, Link, path;
  path = "/led_code_2/get.php";  
  getData = "?station=A";
  Link = host + path + getData;
  
  http.begin(client, Link);
  
  int httpCode = http.GET();
  String payload = http.getString();

  Serial.println(httpCode);
  Serial.println(payload);
  // Serial.println(payload[0]);
  String ledGreen, ledOrange, ledRed;
  ledGreen = payload[0];
  ledOrange = payload[1];
  ledRed = payload[2];

  if (ledGreen == "1") {
    digitalWrite(D0, HIGH);
    Serial.print("LED1: ON ;");
  } else if (ledGreen == "0") {
    digitalWrite(D0, LOW);
    Serial.print("LED1: OFF ;");
  }
  if (ledOrange == "1") {
    digitalWrite(D1, HIGH);
    Serial.print("LED2: ON ;");
  } else if (ledOrange == "0") {
    digitalWrite(D1, LOW);
    Serial.print("LED2: OFF ;");
  }
  if (ledRed == "1") {
    digitalWrite(D2, HIGH);
    Serial.println("LED3: ON ;");
  } else if (ledRed == "0") {
    digitalWrite(D2, LOW);
    Serial.println("LED3: OFF ;");
  }
  
  http.end();
  delay(1000);
}
