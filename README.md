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
Plik klient.php ...

##
