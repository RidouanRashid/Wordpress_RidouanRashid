# Atletiek Wereldrecords Website

Dit project is een WordPress-applicatie ontworpen voor het beheren en presenteren van atletiek wereldrecords. De website biedt een eenvoudige weergave van recordhouders, prestaties en informatie over atletische mijlpalen.

## Project Links
* [Trello Board](https://trello.com/b/dt31cDE7/wordpress)
* [GitHub Repository](https://github.com/RidouanRashid/Wordpress_RidouanRashid)

## Inhoudsopgave
* Projectdoelstellingen
* Technische Specificaties
* Installatie Instructies
* Gebruikte Plugins en Widgets
* Secure Custom Fields Implementatie
* Functionaliteiten
* Project Structuur
* Testen en Validatie

## Projectdoelstellingen
Deze atletiek wereldrecords website is ontwikkeld met de volgende doelstellingen:

* presentatie van atletiek wereldrecords
* Gemakkelijk beheer van record informatie en gegevens
* Responsief design voor alle apparaten
* Snelle zoeking en filtering op atletische disciplines
* Gestructureerde opslag van record metadata
* Visueel aantrekkelijke weergave van records met afbeeldingen

## Technische Specificaties
* WordPress versie: 6.4.1
* PHP versie: 8.2
* Database: MySQL 8.0
* Webserver: Apache 2.4
* Custom Theme: eigen-thema
* Custom Field Solution: Secure Custom Fields (SCF)

## Gebruikte Plugins en Widgets

### Mijn Widget Plugin (mijn-widget-plugin.php)
Het eerste widget systeem in dit project. Dit plugin toont informatieve teksten en beschrijvingen.

**Functionaliteit:**
* Weergeeft beschrijvende inhoud over wereldrecords
* Toont inspirerende boodschap over atletische prestaties
* Widget titel aanpasbaar in het dashboard
* Eenvoudige backend interface

**Impact op project:**
* Biedt informatieve context aan bezoekers
* Bevordert engagement door inspirerende inhoud

### Info Blok Widget (mijn-widget-plugin2.php)
Het geavanceerde widget systeem voor het beheren van informatieblokken met links naar records.

**Functionaliteit:**
* Aanpasbare titel en inhoud
* Direct linken naar specifieke record posts via post_id
* Type selectie (informatie, waarschuwing, succes)
* URL configuratie voor flexibele linkering
* Volledige WordPress widget API integratie

**Onderdelen:**
* Frontend rendering met styled blokken
* Backend formulier voor eenvoudig beheer
* Update functie voor instelling opslag
* Direct link naar record detail pagina's

**Impact op project:**
* Verhoogt gebruikerservaring door aangepaste blokken
* Koppelt overzichtspagina direct aan record detail pagina
* Maakt het eenvoudig om records te linken zonder URL's handmatig in te voeren

### Eerste Plugin (eerste-plugin.php)
Een basis plugin voor het tonen van aangepaste berichten op de website.

**Functionaliteit:**
* Admin menu voor instellingen
* Opslag van aangepaste boodschappen
* Weergave van berichten met styling

### Anchor Links Plugin (anchor-links-plugin.php)
Plugin voor het creëren van inhoudsopgaven met smooth scrolling naar sections.

**Functionaliteiten:**
* Shortcode [anchor_links] voor lijsten met hyperlinks
* Shortcode [anchor_target] voor doelsecties
* Smooth scroll animatie
* Ideaal voor lange pagina's met meerdere secties

## Secure Custom Fields (SCF) Implementatie

### Wat is SCF?
Secure Custom Fields is een veilige manier om aangepaste metadata aan posts toe te voegen in WordPress. Dit project gebruikt SCF voor het opslaan van atletiek recordgegevens.

### SCF Velden voor Atletiek Records

De volgende SCF velden zijn gedefinieerd voor elk record:

* **atleet**: Naam van de recordhouder
* **datum**: Datum waarop het record werd behaald
* **evenement**: De atletische discipline of evenement
* **tijd**: De recordtijd of afstand
* **land**: Land van herkomst van de recordhouder
* **afbeelding**: Foto van de atleet of evenement

### Hoe SCF Wordt Gebruikt

In `single.php` wordt SCF data opgehaald met de `get_post_meta()` functie:

```php
$atleet = get_post_meta( get_the_ID(), 'atleet', true );
$datum = get_post_meta( get_the_ID(), 'datum', true );
$evenement = get_post_meta( get_the_ID(), 'evenement', true );
$tijd = get_post_meta( get_the_ID(), 'tijd', true );
$land = get_post_meta( get_the_ID(), 'land', true );
$afbeelding = get_post_meta( get_the_ID(), 'afbeelding', true );
```

### Voordelen van SCF

* Veilige opslag van custom data
* Geen database aanpassingen nodig
* Flexibele veldstructuur
* Gemakkelijk toegankelijk via WordPress functies
* Perfecte integratie met het record detail systeem

## Functionaliteiten

### Records Beheer
* Toevoegen van nieuwe atletiek records
* Bewerken van bestaande records
* Upload en beheer van atleet afbeeldingen
* Gestructureerde metadata met SCF

### Frontend Features

**Overzichtspagina:**
* Grid weergave van alle records
* Hover effecten op record kaarten
* Link naar detail pagina's
* Responsive design

**Detail Pagina:**
* Two-column layout voor optimale presentatie
* Linkerkant: Record informatie en beschrijving
* Rechterkant: Afbeelding van atleet of evenement
* Volledig responsive op mobiele apparaten
* Professionele styling met schaduweffecten

**Info Blokken:**
* Aangepaste informatieblokken op homepagina
* Direct linkend naar specifieke records
* Visueel onderscheid met type classificering

## Project Structuur

### Template Bestanden
* `single.php`: Detail weergave van individuele records met SCF data
* `index.php`: Homepagina met info blokken en overzicht
* `page-records.php`: Pagina template voor alle records
* `header.php`: Thema header met navigatie
* `footer.php`: Thema footer
* `functions.php`: Custom WordPress functies

### Plugin Bestanden
* `mijn-widget-plugin.php`: Basis widget voor beschrijvingen
* `mijn-widget-plugin2.php`: Geavanceerde info blok widget
* `mijn-widget-plugin3.php`: Media uploader script
* `eerste-plugin.php`: Basis plugin met berichten
* `anchor-links-plugin.php`: Anchor link generatie

### Styling
* `style.css`: Geheel thema styling inclusief:
* Record grid layouts
* Widget styles
* Responsive design
* Shadow box effecten
* Typography

## Workflow: Van Record naar Weergave

1. **Invoer via WordPress Admin:**
   * Admin voegt nieuw record post toe
   * Vult SCF velden in (atleet, datum, evenement, etc.)
   * Upload afbeelding via media library

2. **Opslag:**
   * Post data opgeslagen in wp_posts
   * SCF metadata opgeslagen in wp_postmeta
   * Afbeeliding opgeslagen via attachment

3. **Weergave:**
   * Info blok widget toont record link op homepagina
   * Gebruiker klikt op link via widget
   * `single.php` laadt post en haalt SCF data op
   * Data weergegeven in twee-kolommen layout

## Testen en Validatie

### Browser Compatibiliteit
* Chrome/Edge: Volledig ondersteund
* Firefox: Volledig ondersteund
* Safari: Volledig ondersteund
* Mobiele browsers: Responsive tested

### Performance
* Snelle laadtijden
* Geoptimaliseerde afbeeldingen
* Minimale database queries

### Veiligheid
* Escaping van alle data met esc_html() en esc_url()
* Veilige SCF opslag
* CSRF protection via WordPress nonces



