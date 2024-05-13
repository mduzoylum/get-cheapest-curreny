
## Döviz Kuru Karşılaştırma Uygulaması
Bu uygulama, farklı döviz kuru API'larından veri alarak en ucuz döviz kurlarını karşılaştırır ve kullanıcıya sunar.

### Dosyalar ve Klasörler
#### Commands/FetchCurrencyRates.php: 
> Bu dosya, konsoldan çalıştırılarak döviz kurlarını API'lerden alır ve veritabanına kaydetmeye yarayan komut dosyasını içerir.

#### Guzzle/Api1Client.php: 
> Bu sınıf, ilk API'den döviz kurlarını almak için kullanılır.
#### Guzzle/Api2Client.php: 
> Bu sınıf, ikinci API'den döviz kurlarını almak için kullanılır.

#### Guzzle/ApiClientInterface.php:
> Bu arayüz, API istemcileri için bir şablondur ve tüm API istemcilerinin uygulaması gereken metotları tanımlar.

#### Models/Currencies.php: 
> Bu model, döviz kurlarını veritabanında temsil eder.

#### Services/CurrencyService.php: 
> Bu servis sınıfı, console komutu tarafından çağrılarak bind edilen kurları alıp ve veritabanına kaydetmeye yarayan metotları içerir.

#### Exceptions/ApiException.php:
> Bu sınıf, API isteklerinde oluşan hataları temsil eder ve özel hata mesajları içerir.

#### Controller/CurrencyController.php
> Bu dosya, uygulamanın döviz kurlarını karşılaştırmak için kullanılan controller sınıfını içerir. compareCurrencies metodu, veritabanındaki tüm döviz kurlarını alır ve currency.blade.php şablonuna geçirir.

### API Erişimleri
#### Api1Client: 
> Api1 API üzerinden döviz kurlarını alır.
#### Api2Client:
> Api2 API üzerinden döviz kurlarını alır.

### Kurulum ve Çalıştırma
Projeyi klonlayın: 
```sh
https://github.com/mduzoylum/get-cheapest-curreny.git
```
Proje klasörüne gidin:
```sh
cd get-cheapest-curreny
```
Composer paketlerini yükleyin: 
```sh
composer install
```
.env dosyasını oluşturun ve gerekli bilgileri ekleyin
Veritabanını oluşturun: 
```sh
php artisan migrate
```

### Konsoldan uygulamayı çalıştırın: 
```sh
php artisan currency:fetch
```

### Url üzerinden görüntülemek:
```sh
php artisan serve
```
```http
localhost:8000/currency
```
