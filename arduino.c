
#include <SPI.h>      // Librairie SPI pour la communication hardware
#include <Ethernet.h> // Librairie Ethernet
#include <Servo.h> 

Servo serv;
long temps;
long temps24;
bool lumiere;
bool alarme;
bool serrure;
int radiateur;
bool volet;

/*******************************/
/*                CONNEXION               */
/*******************************/
byte mac[] = { // Adresse MAC de l'ethernet shield
  0x90, 0xA2, 0xDA, 0x0F, 0x12, 0xBC };
 
IPAddress server(137, 74, 197, 153); // Adresse IP du serveur distant (ici mon serveur web local)
 
EthernetClient client; // Création d'un objet EthernetClient 
 
/*******************************/
/*    LUMIERE                  */
/*******************************/

const int ledPin = 49;


/*******************************/
/*   SERRURE                  */
/*******************************/

const int serPin = 37;

/*******************************/
/* VOLET                       */
/*******************************/


const int voletFinDeCourseHaut = 13;
const int voletFinDeCourseBas = 11;
int Marche_Av = 1000;
int Marche_Ar = 2000;
int Marche_Stop = 94;
int Broche_serv = 12;


/*******************************/
/*   ALARME                    */
/*******************************/

int calibrationTime = 30;
int inputPin = 39;               //  PIR 
int pirState = LOW;             // start, on commence par no motion detected
int val = 0;         
bool intrusion = false; 
int nbIntrusion = 0;   

/*******************************/
/*    RADIATEUR                */
/*******************************/

int radiateurPin1 = 22;
int radiateurPin2 = 24;


/*******************************/
/*     CHAUDIERE                */
/*******************************/

#define TRIG 28
#define ECHO 29
long retourEcho;
long distance;

/*******************************/
/*      CONSO ELECTRIQUE       */
/*******************************/

/*******************************/
/*      INTRUSION       */
/*******************************/

 

void setup() { 

/*******************************/
/*      SET UP CONNEXION       */
/*******************************/
  Serial.begin(9600);       // Initialisation du port série
 
  if (!Ethernet.begin(mac)) { // Obtention d'une adresse IP par DHCP
    Serial.println(F("Erreur DHCP"));
    for(;;);                  // En cas d'erreur on bloque le programme dans une boucle infini
  }
  Serial.println(F("DHCP OK"));


/*******************************/
/*      SET UP LUMIERE        */
/*******************************/

  pinMode(ledPin, OUTPUT);


/*******************************/
/*       SET UP SERRURE       */
/*******************************/

pinMode(serPin, OUTPUT);

/*******************************/
/*      SET UP VOLET                       */
/*******************************/

  pinMode(voletFinDeCourseHaut,INPUT_PULLUP); //active la résistance pull-up interne
  pinMode(voletFinDeCourseBas,INPUT_PULLUP); //active la résistance pull-up interne
  pinMode(Broche_serv,OUTPUT);
  serv.attach(Broche_serv);

/*******************************/
/*      SET UP ALARME          */
/*******************************/

  pinMode(inputPin, INPUT);     // declare sensor as input

/*******************************/
/*      SET UP RADIATEUR       */
/*******************************/

 pinMode(radiateurPin1, OUTPUT);  // Met la broche en sortie 
 pinMode(radiateurPin2, OUTPUT);  // Met la broche en sortie  

/*******************************/
/*      SET UP CHAUDIERE         */
/*******************************/

 pinMode(TRIG, OUTPUT);
  digitalWrite(TRIG, LOW); 
  pinMode(ECHO, INPUT);  
  Serial.begin(9600); 
  Serial.println("Liaison série en ligne");
  pinMode(ledPin, OUTPUT);  
  Serial.begin(9600);       
  if (!Ethernet.begin(mac)) { 
    Serial.println("Erreur DHCP");    
    for(;;);                    
}
  Serial.println("DHCP OK");
}

/*******************************/
/*    SET UP CONSO ELECTRIQUE  */
/*******************************/

/*******************************/
/*    SET UP INTRUSION         */
/*******************************/
//}

void loop() {



  /* Connexion au serveur et récuperation des informations
  *****************************************************/
  if((millis() - temps) > 2000)
  {
  temps = millis();
  String str; // String contenant une ligne de la réponse HTTP
  char c;     // Char temporaire
 
 
  if (client.connect(server, 80)) {              // Connexion au serveur web
    client.println(F("GET /v3/arduino.php?pass=fdshuh HTTP/1.0")); // Demande de flux.xml en HTTP 1.0
    //client.println(F("Host: svweb.local"));    // Virtual Host 
    client.println(F("Accept: */*")); // */
    // A cause d'un bug de l'ide arduino tout /* d’où avoir son */ associé même dans une chaîne de char
    client.println();
    client.println();
  } else {
    Serial.println(F("Erreur TCP")); // Si erreur lors de la connexion
    return;                          // Quitte loop()
  }
 
  for(;;) { // Boucle infini
   
    if(client.available()) { // Si des données sont disponible sur l'objet EthernetClient
     
      c = client.read();     // Lecture d'un octet
      if(c == '-') {        // Si fin de ligne atteinte
       //Serial.println(c);
        char buf[200]; //make this the size of the String
        str.toCharArray(buf, 200);    
       if(strstr(buf,"<lumiere>on</lumiere>")){lumiere = true; Serial.println("Lumiere on");}
       if(strstr(buf,"<lumiere>off</lumiere>")){lumiere = false; Serial.println("Lumiere off");}

       if(strstr(buf,"<serrure>on</serrure>")){serrure = true; Serial.println("serrure on");}
       if(strstr(buf,"<serrure>off</serrure>")){serrure = false; Serial.println("serrure off");}

       if(strstr(buf,"<volet>on</volet>")){volet = true; Serial.println("volet on");}
       if(strstr(buf,"<volet>off</volet>")){volet = false; Serial.println("volet off");}

       if(strstr(buf,"<alarme>on</alarme>")){alarme = true; Serial.println("alarme on");}
       if(strstr(buf,"<alarme>off</alarme>")){alarme = false; Serial.println("alarme off");}

       if(strstr(buf,"<radiateur>arret</radiateur>")){radiateur = 0; Serial.println("radiateur arret");}
       if(strstr(buf,"<radiateur>hg</radiateur>")){radiateur = 1; Serial.println("radiateur hg");}
       if(strstr(buf,"<radiateur>eco</radiateur>")){radiateur = 2; Serial.println("radiateur eco");}
       if(strstr(buf,"<radiateur>confort</radiateur>")){radiateur = 3; Serial.println("radiateur confort");}
              
       Serial.println("----------------------------------");
       Serial.println(" ");
       
        str = ""; // Vidage de la ligne
      } 
      else
        str += c; // Concaténation de l'octet reçu dans la chaîne de char
    }
 
    if(!client.connected()) // Si la connexion a été perdu
      break;                // Sorti de la boucle infini
  }
 
  client.stop(); // Fermeture de la connexion avec le serveur
  }



   /* Lumiere
   *  bool lumiere = true : signifie que la lumiere doit être activée
   *  bool lumiere = false : signifie que la lumiere doit être éteinte
   ****************************************************/
        if(lumiere == true) // Si le flux contient "on" on allume la LED
          {
            digitalWrite(ledPin, HIGH);   // Allume la LED
         //   Serial.println("on");
          } 
          else if(lumiere == false) // Si le flux contient "off"on éteint la LED
          {
            digitalWrite(ledPin, LOW);   // Éteint la LED
          //  Serial.println("off");
          }
   
   /* Serrure
   *  bool Serrure = true : signifie que la serrure doit être verouillée
   *  bool lumiere = false : signifie que la serrure doit être déverouillé
   ********************************************************/

    if( serrure == true )
   {
     digitalWrite(serPin, HIGH);
   }
   else 
   {
    digitalWrite(serPin, LOW);
   }   
   
   /* Volet
   *  bool volet = true : signifie que le volet doit être ouvert
   *  bool volet = false : signifie que le volet doit être fermé
   *************************************************/

           boolean etatContactH = digitalRead(voletFinDeCourseHaut);
           boolean etatContactB = digitalRead(voletFinDeCourseBas);
           if(volet == true) // Si le flux contient "on" on actionne la levé du volet
          {
            if(!etatContactH){
              serv.write(Marche_Av);
            }else{
              serv.write(Marche_Stop);
            }
          }
          
          if(volet == false) // Si le flux contient "off" on actionne la baisse du volet
          {
            if(!etatContactB){
              serv.write(Marche_Ar);
            }else{
              serv.write(Marche_Stop);
            }
          }
         
   /* Alarme
   *  bool alarme = true : signifie que l'alarme doit être activée
   *  bool alarme = false : signifie que l'alarme doit être désactivée
   ******************************************************/

   if (alarme == true)
{
  intrusion = false;
  val = digitalRead(inputPin);  // read input value
  //Serial.println(val);
  if (val == HIGH) { // check if the input is HIGH
  intrusion = true;
  //Serial.println("Intrusion");
  }
  else {
    intrusion = false;
    //Serial.println("Pas intrusion");
  } 
}

   /* radiateur
  * int radiateur = 0 signifie que le radiateur doit être à l'arrêt
  * int radiateur = 1 signifie que le radiateur doit être en hg
  * int radiateur = 2 signifie que le radiateur doit être en eco
  * int radiateur = 3 signifie que le radiateur doit être en confort
   ***************************************************/ 

     if(radiateur == 0) // Si le flux contient "1" on allume la LED
  {
    digitalWrite(radiateurPin1, HIGH);   // Ferme le cricuit et laisse le courant de le relais ch1
    digitalWrite(radiateurPin2, LOW);    // Laisse ouvert le circuit du relais et le courant ne passe pas dans ch2
    //Serial.println("arret");
  } 
  else if(radiateur == 2) // Si le flux contient "2" on éteint la LED
  {
    digitalWrite(radiateurPin1, HIGH);   // Ferme le cricuit et laisse le courant de le relais ch1
    digitalWrite(radiateurPin2, HIGH);    // Laisse ouvert le circuit du relais et le courant ne passe pas dans ch2
    //Serial.println("eco");
  }
  else if(radiateur == 3) // Si le flux contient "2" on éteint la LED
  {
    digitalWrite(radiateurPin1, LOW);   // Ferme le cricuit et laisse le courant de le relais ch1
    digitalWrite(radiateurPin2, LOW);    // Laisse ouvert le circuit du relais et le courant ne passe pas dans ch2
    //Serial.println("confort");
  }
  else if(radiateur == 1) // Si le flux contient "2" on éteint la LED
  {
    digitalWrite(radiateurPin1, LOW);   // Ferme le cricuit et laisse le courant de le relais ch1
    digitalWrite(radiateurPin2, HIGH);    // Laisse ouvert le circuit du relais et le courant ne passe pas dans ch2
    //Serial.println("hg");
  }

  /* chaudière
  * Lien d'envoie des données v3/arduino.php&niveau=variableDuNiveau AEnvoyer
   ***************************************************/

     if((millis() - temps24) > 60000)
  {
    temps24 = millis();
    digitalWrite(TRIG, HIGH);
    digitalWrite(TRIG, LOW);
    
    retourEcho = pulseIn(ECHO, HIGH);
    
    distance = retourEcho / 58;
    
    Serial.print("Distance cm : ");
    Serial.println(distance);
    if (client.connect(server, 80)) {       
      client.print("GET /v3/arduino.php?pass=fdshuh&niveau="); 
      client.println(distance); 
      client.println(" HTTP/1.0");
      client.println("Accept: */*"); 
    } else {
      Serial.println("Erreur TCP");
        return;               
    }
    client.stop();
    
  }

   /* chaudière
  * Lien d'envoie des données v3/arduino.php&conso=variableDeLaConsoAEnvoyer
   ***************************************************/ 

    /* Intrusion
  * Lien d'envoie des données v3/arduino.php&intrusion=true
   ***************************************************/ 
}
