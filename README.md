# Anonimowe-ankiety-web-application
System umożliwiający anonimowe ankiety/głosowanie. Repozytorium w ramach przedmiotu "Projekt inżynierski"





## Wymagania

System zrealizowany w formie aplikacji webowej powinien uwzględniać możliwość oddania głosu lub wyrażenia opinii w taki sposób, aby realizować następujące funkcje:

• informacje przechowywane w bazie danych,


• reprezentacja nie umożliwia powiązania użytkownika z konkretnymi danymi,

• reprezentacja umożliwia sprawdzenie czy dana osoba przekazała dane,

• reprezentacja umożliwia sprawdzenie przez użytkownika czy jego dane są zapisane w bazie.


Implementacja powinna uzględniać responsywny interfejs. Do zapewnienia anonimowości należy wykorzystać techniki kryptograficzne (funkcje skrótu) oraz metody generowania tokenów.

Rekomedowane jest wykorzystanie ogólnodostępnych bibliotek programistycznych.

## Dokumentacja

Do prawidłowego działania aplikacji wymagane jest posiadanie/instalacja serwera WWW.

Polecam zainstalować XAMPP-a jest to darmowy pakiet serwera WWW dla PHP dostępny pod https://www.apachefriends.org/pl/index.html. 

Po zainstalowaniu i uruchomieniu aplikacji należy uruchomić usługę Apache oraz MySql

![GitHub Logo](/images/xampp.png)

Wszystkie pliki z folderu /app należy umieścić w folderze *htdocs* przykładowa ścieżka: *C:\xampp\htdocs\STRONA*

#### Import bazy danych

Pod adresem: http://localhost/phpmyadmin/index.php mamy dostęp do naszego serwera WWW.
Aby zaimportować bazę danych należy przejść do zakładki *IMPORT* oraz wybrać plik [projekt.sql](/database/projekt.sql)

![GitHub Logo](/images/import.png)

#### Zmiana danych łączenia a bazą danych

Parametry łączenia z bazą danych dostępne są w pliku [/app/config.php](/app/config.php)

```
<?
	$host = 'localhost'; //adres serwera
	$db_user = 'root';  //nazwa użytkownika
	$db_password = ''; //hasło użytkownika
	$db_name = 'projekt'; //nazwa bazy danych

?>
```

## Funkcjonalności aplikacji

Dostęp do aplikacji możliwy jest tylko po utworzeniu konta i zalogowania się do serwisu. 
Możliwe jest logowanie jako administrator(login:admin password:testadmin) lub zwykły użytkownik. 
Użytkownik posiada możliwości takie jak:

• wypełnainie ankiet,

• sprawdzenie czy jedgo dane są zapisane w bazie.

Konto administratora oprócz podstawowych funkcjonalności jakie posiada zwykły użytkownik umożliwia:

• tworzenie nowych ankiet,

• dodawanie pytań i odpowiedzi do ankiet,

• sprawdzenie którzy użytkownicy wypełnili ankiety.
## Dokumentacja

[http://html/index.html](http://html/index.html)

## Licencja

Projekt udostępniony na licencji MIT
