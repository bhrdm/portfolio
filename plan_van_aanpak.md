@ -0,0 +1,125 @@
# Plan van Aanpak

## - projectnaam : ..... 
## - opdrachtgever : ......
## - Teamleden :  Beyza Herdem en Sueda Herdem
## - Datum : startdatum 21/10/2024 einddatum .......
-----------------------------------------------------

## Introductie

Dit project gaat over het bouwen van een online marktplaats waar mensen 2dehands producten kunnen kopen en verkopen. Het kan van alles zijn: kleding, boeken, meubels, electronica etc. Het platform wordt een plek waar verkopers makkelijk hun producten kunnen aanbieden en waar kopers eenvoudig door een breed aanbod kunnen scrollen en veleig hun aankopen kunnen doen. 

Dit plan beschirjft hoe we dit project gaan aanpakken, wat we precies gaan bouwen en hoe we de taken verdelen. Ons doel is vooral om een gebruiksvriendlijke veilige en betrouwbare platform op te leveren.

-----------------------------------------------------

## Doel van het project

Het idee is om een functioneel platform te bouwen dat zowel verkopers als kopers helpt bij het veilig handelen van tweedehands spullen. Voor de koper is het belangrijk dat ze snel de producten kunnen vinden die ze zoeken, en voor de verkoper is het belangrijk dat het plaatsen van producten eenvoudig en snel verloopt.

Doelstellingen:

- Kopers moeten eenvoudig producten kunnen vinden en kopen.
- Verkopers moeten snel hun producten kunnen toevoegen en beheren.
- Een veilige betalingsomgeving voor beide partijen.
- Gebruikerservaring: Het platform moet toegankelijk zijn, ongeacht of je koper of verkoper bent.

-----------------------------------------------------

## projectscope

In dit project focussen we op het bouwen van een marktplaats die de belangrijjkste functies bevat, maar ook uitbreidbaar is voor later. Dit houdt in:

-Front end: dit is wat de gebruiker ziet en gebruikt. we zorgen ervoor dat de interface simpel en oversichtleijk blijft zodat de gebruikers makkelijk hun weg kunnen vinden. denk hierbij aan de inlogpagina's ,producteoverzicht ,winkelmandje etc.

-Backend : hier regelen we alle logica achter de schermen. Dit omvat het opslaann van gegevens, aythenticatie en betalingen.

-Database: we slaan gegevens op van gebruikers, producten en bestellingen. deze data word gebruikt voor het afhandelen van orders

-Beveiliging: De site moet veilig zijn, vooral voor persoonlijke gegevens van gebuikers en betalingen. We zorgen ervoor dat wachtwoorden versleuteld worden en dat betalingen veilig verlopen.

-----------------------------------------------------

## Functionaliteiten
Must-haves: Dit zijn de functies die echt af moeten zijn om het platform goed te laten werken.

- Gebruikersregistratie en login: Gebruikers moeten een account kunnen aanmaken en inloggen om producten te kopen of verkopen.
- Productbeheer voor verkopers: Verkopers moeten makkelijk producten kunnen toevoegen, bewerken en verwijderen, inclusief foto's, beschrijving, prijs en productstatus.
- Zoeken en filteren: Kopers moeten eenvoudig producten kunnen zoeken en filteren op basis van prijs, categorie, locatie en staat (bijv. nieuw of tweedehands).
- Winkelmand en Afrekenen: Kopers kunnen meerdere producten in hun winkelmandje plaatsen en veilig betalen via een betaalgateway (bijv. iDeal, PayPal).
- Orderbeheer: Kopers en verkopers kunnen hun orders volgen. Kopers kunnen zien waar hun bestelling is, en verkopers kunnen orders beheren en de status bijwerken (bijv. verzonden of betaald).

Should-haves: dit zijn functies die de gebruikerservaring verbeteren, maar niet noodzakelijk zijn voor de basisfunctionaliteit.

- Beoordelingssysteem: Kopers kunnen verkopers beoordelen en reviews achterlaten na een aankoop, zodat andere gebruikers weten of een verkoper betrouwbaar is.

- Wishlist: Kopers kunnen producten opslaan in een wishlist, zodat ze later kunnen terugkomen om het product te kopen.

- Biedingssysteem: Kopers kunnen een bod doen op producten, en verkopers kunnen deze accepteren of afwijzen.

Could-haves 
Als er nog tijd over is, kunnen we extra functies toevoegen zoals:

- Notificaties: Zowel kopers als verkopers krijgen meldingen wanneer er iets belangrijks gebeurt, zoals een nieuwe bestelling of een review.
- Mobiele App: Als we tijd hebben, kunnen we een simpele mobiele versie van de marktplaats ontwikkelen of zelfs beginnen aan een native app.
_____________________________________________________

## Gebruikte Technologieën en Programmeertalen

Voor het ontwikkelen van de marktplaats gebruiken we de volgende technologieën:

- Front-end:
HTML5 & CSS3: Voor de structuur en styling van de website.
JavaScript: Voor interactieve elementen zoals zoekfilters en de winkelmand.
Bootstrap: Voor een responsive design dat goed werkt op alle apparaten.
- Back-end:
PHP: Voor server-side verwerking en gebruikersbeheer.
Python (Flask/Django): Voor het bouwen van API’s en afhandeling van data.
- Database:
MySQL: Voor het opslaan van gebruikers, producten en bestellingen.
- Extra Tools:
Git & GitHub: Voor versiebeheer en samenwerking.
PayPal/Stripe API: Voor het verwerken van veilige betalingen.
______________________________________________________

## werkverdeling en planning

we werken in een team van 2 mensen en hebben omgeveer 4 tot5 uur per dag . Hieornder is te zien hoe we een globale indeling hebben gemaakt om ervoor te zorgen dit project op tijd te kunnen leveren.

- Fase 1: opzetten van Git repository (1 dag)
          maken vanuser stories, plan van aanpak en dashboard
- Fase 2: front-end en ontwikkeling (7 dagen)
          registratie en inlogpagina
          productpaginas en zoekfunctie
          winkelmand en afrekenen
- Fase 3: back-end ontwikkeling (10 dagen)
          gebruikersauthenticatie = inloggen registreren en sessies
          productbeheer voor verkopers= toevoegen, bewerken en verwijderen van advertenties
          orderen en betalingen = veilig betaling plaatsen
- Fase 4: Testen en debuggen(3 dagen)
          Alles testen, errors fixen en ervoor zorgen dat alle functies goed werken
- Fase 5: Documentatie en afronding
          schrijven van de nodige documentaties en afronden van het project bijvoorbeeld eindpresentatie.

-----------------------------------------------------

## Risico's en Beperkingen
Risico's:
- Tijdsdruk: Als sommige functies complexer blijken te zijn dan verwacht, kunnen we tijd tekort komen. We focussen ons daarom eerst op de must-haves.
- Technische Complexiteit: Vooral bij het implementeren van veilige betalingen en gebruikersverificatie kunnen technische uitdagingen opduiken.

Beperkingen:
- Technologiekeuze: We blijven bij de technologieën die we kennen (PHP, Python, SQL, etc.) om het project binnen de geplande tijd te houden.

-----------------------------------------------------

## Communicatie
- dagelijkse updates op school
- gebruik van github dashboard om de voortgang bij te houden
- wekelijkse stand up

-----------------------------------------------------

## Conclusie
Dit is onze plan van aanpak. Wij gaan ervoor zorgen dat de belangrijjkste functies eerst worden afgerond en daarna als we tijd hebben bouwen wij de extra functie nog. We hopen op een goede werkende platform te kunnen bouwen.