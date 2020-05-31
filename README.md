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

## Documentation

Do prawidłowego działania aplikacji wymagane jest posiadanie/instalacja serwera WWW.

Polecam zainstalować XAMPP-a jest to darmowy pakiet serwera WWW dla PHP dostępny pod https://www.apachefriends.org/pl/index.html. 

Po zainstalowaniu i uruchomieniu aplikacji należy uruchomić usługę Apache oraz MySql

![GitHub Logo](/images/xampp.png)

Wszystkie pliki z folderu /app należy umieścić w folderze *htdocs* przykładowa ścieżka: *C:\xampp\htdocs\STRONA*

#### Import bazy danych

Pod adresem: http://localhost/phpmyadmin/index.php mamy dostęp do naszego serwera WWW.
Aby zaimportować bazę danych należy przejść do zakładki *IMPORT* oraz wybrać plik [projekt.sql](/database/projekt.sql)

![GitHub Logo](/images/import.png)


## Licencja

Projekt udostępniony na licencji MIT
