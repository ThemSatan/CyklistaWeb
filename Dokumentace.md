# DOKUMENTACE
<sup>Tato dokumentace poskytuje podrobný přehled funkčnosti projektu 'CyklistaWeb'</sup>


## Notace

> Téma webu: Cyklistický závod

> Odkaz na Github repositář: https://github.com/ThemSatan/CyklistaWeb/tree/main


### Tabulky a sloupce:
__1.  'note'__ ( 'id', 'shortNote', 'longNote')

__2. 'note_type'__ ( 'id', 'short', 'note')

__3. 'parcour_type'__ ( 'id', 'name', 'icon' )

__4. 'race'__ ( 'id', 'default_name', 'link', 'country', 'type')

__5. 'race_type'__ ( 'short', 'name') 

__6. 'race_year'__ ( 'id', 'real_name', 'id_race', 'year, 'start_date', 'end_date', 'uci_tour', 'logo', 'sex', 'category', 'country') 

__7. 'result'__ ( 'id', 'name_link', 'team_link', 'id_stage', 'id_rider', 'id_team', 'time', 'bonification', 'point', 'rank', 'note', 'type_result') 

__8. 'stage'__ ( 'id', 'number', 'date', 'note', 'departure', 'arrival', 'distance', 'parcour_type', 'vertical_meters', 'profile', 'id_race_year', 'link') 

__9. 'uci_tour_type'__ ( 'id', 'name') 


### Popis prvků
Popis názvů tabulek, sloupců a ID
- Anglicky
- Singulár
- Oddělení ID a cizích ID a dvou slovných názvů pomocí hadí notace
- Malým písmem
> Např. cyclist_name | cyclist | id_cyclist


### Popis názvu proměnných, metod a kontrolerů
- Anglicky
- Singulár
- Oddělení dvou (a více) slovných názvů pomocí velbloudí notace
- Na začátku malé písmeno
> Např. login | loginComplete | cyclistController


### Popis názvu ‚views‘, modelů a tříd
- Anglicky
- Singulár
- Oddělení dvou (a více) slovných názvů pomocí velkého písmena na začátku dalšího slova, bez mezery -> ‚pascal case‘
- Na začátku velké písmeno
> Např. MainPage | Cyclist | Auth


### Popis názvu obrázků __(???) -> dodělat__
- Anglicky
- Oddělení dvou (a více) slovných názvů pomocí velkého písmena na začátku dalšího slova, bez mezery
- Na začátku malé písmeno
> Např. cyclist.jpg


## Externí nástroje

### __[Bootstrap](https://getbootstrap.com)__

__Verze knihovny:__ 5.3.3

__Autor knihovny:__ Mark Otto a Jacob Thornton

__Licence knihovny:__ MIT License



### __[CodeIgniter](https://codeigniter.com)__
__Verze knihovny:__ 4.5.5

__Autor knihovny:__ Rick Ellis, EllisLab, Inc. (nyní spravováno CodeIgniter Foundation)

__Licence knihovny:__ MIT License


### __[Font Awesome](https://fontawesome.com)__
__Verze knihovny:__ 6.5.2

__Autor knihovny:__ Dave Gandy a Travis Chase

__Licence knihovny:__ SIL OFL 1.1 a MIT License


### __[Composer](https://getcomposer.org)__
__Název knihovny:__ Composer

__Verze knihovny:__ 2.7.8

__Autor knihovny:__ Nils Adermann, Jordi Boggiano

__Licence knihovny:__ MIT License


## Rozdělení práce - upravit !!!

_Klára Adámková_ (doplnit)
-	Tabulky - editace
-	Přihlášení a registrace
-	Vzhledové upravení webu (CSS) a stránkování
-	Dropdown
-	Agregační funkce a SQL Joins

_Karla Šoustková_
-	Dokumentace
-	Vlajky (název knihovny)
- Grafy
-	Tabulky - přidávání, mazání, soft deletes
-	Zobrazení - karty
-	Modální okno a alerty

## Popis jednotlivých metod a proměnných - upravit !!!
### Kontrolery

__1. 'Home'__

> Hlavní kontroler

```__construct()```: Nastaví modely pro závody (rModel), etapy (sModel), místa (lModel), jezdce (rdModel), výsledky (reModel), roky (ryModel) a země (cModel). Také vytváří instanci konfigurační třídy ConfModel.

```initController()```: Nahrazuje základní nastavení kontroleru a nastavuje knihovnu _IonAuth_ pro přihlašování uživatelů.

__Hlavní stránky__:

```index():``` Načítá seznam závodů z databáze a zobrazí je na úvodní stránce. Nastavuje stránkování, titulek stránky, přihlášení uživatele a administrátorský přístup.

```year():``` Načítá roky závodů a zobrazuje je na stránce. Spojuje data z tabulek race_year, race a uci_tour_type, nastavuje stránkování a titulek stránky.

```result():``` Načítá výsledky závodů, včetně jmen jezdců, kteří se těchto závodů účastnili. Nastavuje opět data pro zobrazení.

```stage($id):``` Načítá podrobnosti konkrétní etapy podle zadaného ID. Spojuje data z tabulek stage, parcour_type a race_year. Zobrazuje podrobnosti o etapě na stránce.

```graph():``` Zobrazuje stránku grafů a statistik. Nastavuje opět data pro zobrazení.

```riders():``` Načítá seznam jezdců z databáze a zobrazí je na stránce. Nastavuje data pro zobrazení.

```riderInfo($id):``` Načítá podrobnosti o konkrétním jezdci podle zadaného ID a spojuje data z tabulky rider s tabulkou location pro zobrazení místa narození.

-----------------------------------

__Editace__:

```devpage():``` Načítá seznam závodů z databáze a zobrazuje je na stránce pro vývojáře (adminy). Kontroluje, zda je uživatel přihlášen a zda je administrátorem.

```updateRace($id):``` Načítá podrobnosti konkrétního závodu podle zadaného ID a zobrazuje stránku pro úpravu závodu.

```updateForm():``` Zpracovává formulář pro aktualizaci závodu. Ukládá změněné údaje do databáze a nastavuje zprávu o úspěšné aktualizaci. Přesměruje zpět na stránku s vývojovými závody.

__Vytvoření závodu__:

```addNew():``` Načítá seznam závodů z databáze a zobrazuje formulář pro přidání nového závodu. Zobrazí také stav přihlášení.

```createForm():``` Zpracovává formulář pro vytvoření nového závodu. Ukládá nové údaje o závodu do databáze a zobrazuje zprávu o úspěšném vytvoření.

__Smazání závodu__:

```confirmDelete($id):``` Načítá podrobnosti o konkrétním závodu podle zadaného ID a zobrazuje stránku pro potvrzení smazání závodu.

```deleteForm():``` Zpracovává formulář pro smazání závodu. Smaže závod z databáze a nastavuje zprávu o úspěšném smazání.

__Proměnné__:

```$rModel, $sModel, $lModel, $rdModel, $reModel, $ryModel, $cModel:``` Instance modelů pro správu dat o závodech, etapách, místech, jezdcích, výsledcích, ročnících závodů a zemích.

```$config:``` Instance konfigurační třídy ConfModel -> spravuje konfigurační nastavení, jako je například počet položek na stránce (perpage).

```$ionAuth:``` Instance knihovny IonAuth pro autorizaci uživatelů.

```$session:``` Objekt session pro práci se session daty (např. nastavení flash dat - dočasná data uložená v relaci).

__2. 'Auth'__

```initController():``` Nahrazuje základní nastavení kontroleru a inicializuje knihovnu IonAuth pro správu autentizace uživatelů. Tento kontroler využívá IonAuth pro přihlašování a správu uživatelů.

```login():``` Načte přihlašovací formulář. Nastaví proměnné:
- $data['message']: Načte zprávu z session.
- $data['logged']: Zkontroluje, zda je uživatel přihlášen pomocí metody IonAuth.
- $data['title']: Nastaví titulek stránky na "Přihlášení".
Nakonec vrátí view s přihlašovacím formulářem.

```register():``` Načte registrační formulář. Nastaví proměnné podobně jako v metodě login(), ale s titulkem stránky "Registrace". Vrací view s registračním formulářem.

```loginComplete():``` Zpracuje přihlašovací formulář a získá přihlašovací údaje (email a password) z formuláře odeslaného metodou POST. Pomocí IonAuth ověří přihlašovací údaje a pokud je uživatel přihlášen:
- Zkontroluje, zda je uživatel administrátor pomocí isAdmin() -> přesměruje uživatele na administrační panel.
- Pokud uživatel není administrátor, přesměruje jej na hlavní stránku.
- Pokud přihlášení selže, uloží chybovou zprávu do session a přesměruje zpět na přihlašovací stránku.

```logoutComplete():``` Odhlásí aktuálního uživatele pomocí metody IonAuth a přesměruje jej zpět na hlavní stránku.

```registerComplete():``` Zpracuje data z registračního formuláře. Získá údaje z formuláře (email, username, password, name, surname) zaslaného metodou POST. Vytvoří pole s dalšími daty pro uživatele (additional_data), které zahrnuje jméno a příjmení. Pomocí IonAuth vytvoří nového uživatele a následně jej přesměruje na přihlašovací stránku.

__Proměnné:__

```$ionAuth:``` Instance třídy IonAuth. Autorizace uživatelů.

```$session:``` Objekt session pro práci se session daty.



## Zdroje - UPRAVIT!!!

> Z těchto zdrojů jsme čerpali informace a data pro náš web

[1] Oracle Corporation, "Font Awesome Free License," Oracle Industries. *Dostupné:* https://docs.oracle.com/en/industries/financial-services/ofs-analytical-applications/accounting-foundation/24a/alium/font-awesome-free-license.html. [Citováno dne 06.06.2024].

[2] cPanel, "PHP upload path is always defined as /tmp," cPanel Support, *Dostupné:* https://support.cpanel.net/hc/en-us/articles/1500011342461-PHP-upload-path-is-always-defined-as-tmp.

[3] w3schools, "PHP Reference: Array Functions," w3schools, *Dostupné:* https://www.w3schools.com/php/php_ref_array.asp.

[4] Ultahost, "How to fix XAMPP error MySQL shutdown unexpectedly?," Ultahost, *Dostupné:* https://ultahost.com/knowledge-base/fix-xampp-error-mysql-shutdown-unexpectedly/.

[5] w3schools, "PHP MySQL Select Data," w3schools, *Dostupné:* https://www.w3schools.com/php/php_mysql_select.asp.

[6] Stack Overflow, "Count specific data number over total data number," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/28519583/count-specific-data-number-over-total-data-number/28519596.

[7] Stack Overflow, "PHP: Array of Arrays, get a list of values for a given attribute," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/39494867/php-array-of-arrays-get-a-list-of-values-for-a-given-attribute.

[8] Stack Overflow, "PHP show all rows in MySQL that contain the same value in a column," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/40691968/php-show-all-rows-in-mysql-that-contain-the-same-value-in-a-column.

[9] w3schools, "How To - CSS Images Side by Side," w3schools, *Dostupné:* https://www.w3schools.com/howto/howto_css_images_side_by_side.asp.

[10] w3schools, "How To - CSS Image Center," w3schools, [Online]. *Dostupné:* https://www.w3schools.com/howto/howto_css_image_center.asp.

[11] Stack Overflow, "How can I make a CSS table fit the screen width?," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/4237110/how-can-i-make-a-css-table-fit-the-screen-width.

[12] Stack Overflow, "Expand or shrink depending on the screen size using CSS," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/889357/expand-or-shrink-depending-on-the-screen-size-using-css.

[13] Stack Overflow, "How do I replace all my NULL values in a particular field in a particular table?," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/4629202/how-do-i-replace-all-my-null-values-in-a-particular-field-in-a-particular-table.

[14] GeeksforGeeks, "How to upload image into database and display it using PHP?," GeeksforGeeks, *Dostupné:* https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/.

[15] SheCodes, "How to make all images on a page the same size in HTML and CSS," SheCodes, *Dostupné:* https://www.shecodes.io/athena/25432-how-to-make-all-images-on-a-page-the-same-size-in-html-and-css.

[16] Stack Overflow, "How to skip duplicate data in foreach loop?," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/67889461/how-to-skip-duplicate-data-in-foreach-loop.

[17] Stack Overflow, "Get the count of the MySQL query results in PHP," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/34145367/get-the-count-of-the-mysql-query-results-in-php.

[18] Stack Overflow, "Submit a form with a drop-down list doesn't work," Stack Overflow, *Dostupné:* https://stackoverflow.com/questions/14769505/submit-a-form-with-a-drop-down-list-doesnt-work.

[19] Reddit, "Why my path after upload image always store in /tmp?," Reddit, *Dostupné:* https://www.reddit.com/r/laravel/comments/slgbh7/why_my_path_after_upload_image_always_store_in/.
