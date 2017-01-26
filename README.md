# MalinaResponder
Sposób na komunikację zewnętrzną z RaspberryPi bez DynDNS czy VPN

## Co mamy?
Mamy w domu RaspberryPi (to tylko przykład) i na nim skonfigurowany jakś czujnik - dla uproszczenia termometr DS18B20. Potrafimy odczytywać z niego temperaturę i logować ją do pliku tekstowego lub serwować na lokalnej stronie www (localhost).

## Co chcemy robić?
Chcemy mieć dostęp do naszych danych z sieci zewnętrznej - przez Internet.

## Czego chcemy uniknąć?
Chcemy uniknąć kupowania stałego adresu IP, konfigurowania DynDNS, stawiania zewnętrznej strony www lub konfigurowania VPN.

## Czego potrzebujemy?
Potrzebujemy, oprócz naszej Maliny, jakiegokolwiek zewnętrznego hostingu z dostępem do PHP.

## Instalacja
Na serwer zewnętrzny wgrywamy plik server.php. Można zmienić jego nazwę na index.php, żeby uprościć adres URL. W pliku klient.php zmieniamy adres serwisu (linia 28) - wpisując tam adres pod który wrzuciliśmy plik server.php. Odpalamy skrypt klient.php na konsoli CLI naszej Maliny.

## Jak przesyłać rozkazy
Jeśli widzimy konsolę CLI Maliny z odpalonym skryptem, wchodzimy przez np. FTP na nasz serwer zewnętrzy i zmieniamy zawartość pliku orders.txt. Po zapisaniu zmian w piku, wpisany tekst pojawi się na Malinie. Czyli ze Świata przekazaliśmy rozkaz do naszego domu! Jeśli na serwerze mamy dostęp do konsoli, możemy przesyłać komunikaty poleceniem
```bash
echo getTemperature > orders.txt
```
## Co z tym można zrobić dalej?
Mając na Malinie treść rozkazu, możemy dostosować odpowiedź i przesłać ją do serwera metodą POST.

## Jak to działa?
Zajebiście :)
Plik klient.php (Malina) zawiera pętlę nieskończoną z domyślnym interwałem czasowym 1s. Co sekundę odpytuje serwer czy nie ma dla niej jakiegoś rozkazu. Jeśli jest, treść rozkazu zostaje natychmiast przesłana do Maliny w formacie JSON. To klient (Malina) inicjuje cały ruch HTTP, mając dostęp do Internetu jak zwykła przeglądarka WWW. Firewall-e mu nie straszne! Rozkazy od serwera dostaje w formie odpowiedzi na swoje zapytania. Za to mając już odpowiedź na zewnętrznym serwerze, możemy nią zrobić WSZYSTKO!

## UWAGA!
Prezentowany kod jest tylko przykładem zorganizowania komunikacji Malina -> Świat/ Świat -> Malina. Nie ma w nim mechanizmów bezpieczeństwa i nie polecam stosować go poza siecią lokalną.
