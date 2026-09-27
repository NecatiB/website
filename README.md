<div align="center">

✦ NEXORA

Soft Modern Digital Store — PHP & MySQL

Geliştiriciler ve teknoloji meraklıları için hazırlanmış; canlı araçlar, dijital ürün mağazası, kullanıcı hesapları ve admin paneli içeren responsive PHP web uygulaması.

<p>
<img src="https://img.shields.io/badge/PHP-8%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8+">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/InfinityFree-Hosting-6f42c1?style=for-the-badge" alt="InfinityFree">
  <img src="https://img.shields.io/badge/Responsive-Mobile-7c3aed?style=for-the-badge" alt="Responsive">
</p> <p>
  <a href="#infinityfree-yayınlama">InfinityFree yayınlama</a> ·
  <a href="#phpmyadmin-kurulumu">phpMyAdmin</a> ·
  <a href="#admin-hesabı">Admin hesabı</a> ·
  <a href="#dosya-yapısı">Dosya yapısı</a>
</p> </div>




Proje hakkında

Nexora, PHP ve MySQL ile hazırlanmış soft-modern bir dijital ürün mağazasıdır. Açık beyaz zemin, lavanta tonları ve koyu mor tipografi kullanır. Tema düğmesiyle koyu/açık görünüm arasında geçiş yapılabilir.

Ziyaretçiler ürünleri ve canlı araçları görüntüleyebilir. Kayıtlı kullanıcılar sepete ürün ekleyebilir ve sipariş talebi oluşturabilir. Admin kullanıcılar ürünleri, siparişleri ve geri bildirimleri yönetebilir.

Özellikler

Özellik
Açıklama

Durum

Soft modern tasarım
Beyaz, lavanta ve koyu mor renk paleti✅

Responsive yapı

Mobil, tablet ve masaüstü uyumu✅

Koyu/açık tema

Tema düğmesi ve tarayıcıda kayıt✅

Canlı saat

Ziyaretçinin yerel saatini gösterir✅

Ankara hava durumu

Open-Meteo üzerinden canlı veri alır✅

Hesap makinesi

Dört işlem ve yüzde hesabı✅

Kullanıcı sistemi

Kayıt, giriş ve güvenli çıkış✅

Dijital ürün mağazası

Ürün listeleme ve kategori yapısı✅

Sepet

Ürün ekleme, adet değiştirme ve silme✅

Sipariş

Sepeti sipariş talebine dönüştürme✅

Admin paneli

Ürün, sipariş ve geri bildirim yönetimi✅

Geri bildirim

Şikâyet, öneri ve iş birliği formu✅




Teknoloji yığını

Teknoloji
Kullanım alanı
PHP 8+
Sayfalar, oturum ve iş mantığı
PDO
MySQL bağlantısı ve prepared statements
MySQL / MariaDB
Kullanıcı, ürün, sipariş ve mesaj verileri
HTML5
Sayfa yapısı
CSS3
Soft-modern tasarım ve responsive yapı
Vanilla JavaScript
Saat, hava durumu, tema ve hesap makinesi
InfinityFree
PHP/MySQL hosting




Dosya yapısı

Plain Text


Nexora-PHP/
│
├── index.php                    # Ana sayfa, canlı araçlar ve mağaza
├── config.php                   # MySQL bağlantısı ve ortak yardımcılar
├── account.php                  # Kullanıcı hesap merkezi
├── login.php                    # Giriş sayfası
├── register.php                 # Kullanıcı kaydı
├── logout.php                   # Oturum kapatma
├── cart.php                     # Sepet ve sipariş işlemleri
├── feedback.php                 # Geri bildirim kaydı
├── admin.php                    # Admin paneli
│
├── assets/
│   ├── style.css                # Soft-modern tasarım ve tema stilleri
│   └── app.js                   # Canlı araçlar ve tema JavaScript’i
│
├── includes/
│   ├── header.php               # Ortak üst menü
│   └── footer.php               # Ortak alt bilgi
│
├── database.sql                 # Genel MySQL SQL dosyası
├── database-infinityfree.sql    # InfinityFree uyumlu SQL dosyası
├── PHPMYADMIN-KURULUM.md        # Veritabanı kurulum rehberi
└── README.md                    # Bu doküman



InfinityFree’de yayınlama

1. Hosting hesabını oluştur

InfinityFree hesabını oluşturduktan sonra site panelinden hosting hesabını aç. Site dosyalarının yükleneceği ana klasör genellikle:

Plain Text


htdocs



2. MySQL veritabanı oluştur

InfinityFree panelinde MySQL Databases bölümünden bir veritabanı oluştur. InfinityFree veritabanı adına otomatik ön ek ekler. Örnek:

Plain Text


Database Name: if0_43023642_nexora
MySQL Username: if0_43023642
MySQL Hostname: sql300.infinityfree.com
MySQL Port: 3306



Panelde görünen gerçek bilgileri kullan. Örnek değerleri kendi hesabındaki bilgilerle değiştir.

3. InfinityFree phpMyAdmin’i aç

InfinityFree panelinden oluşturduğun veritabanının yanındaki phpMyAdmin bağlantısını aç. Localhost phpMyAdmin’i kullanma:

Plain Text


http://localhost/phpmyadmin



InfinityFree’de şu veritabanını seç:

Plain Text


if0_43023642_nexora



4. Tabloları içe aktar

InfinityFree için hazırlanmış dosyayı kullan:

Plain Text


database-infinityfree.sql



phpMyAdmin’de:

1.Doğru veritabanını seç.

2.Import / İçe aktar sekmesine gir.

3.database-infinityfree.sql dosyasını seç.

4.Go / Git butonuna bas.

Başarılı olursa şu tablolar görünür:

Plain Text


users
products
orders
order_items
feedback




database-infinityfree.sql dosyasında CREATE DATABASE veya USE nexora komutu yoktur. Bu nedenle dosyayı seçtiğin InfinityFree veritabanının içine doğrudan aktarabilirsin.

5. config.php dosyasını düzenle

config.php içindeki yerel bilgisayar bilgilerini InfinityFree bilgileriyle değiştir:

PHP


const DB_HOST = 'sql300.infinityfree.com';
const DB_NAME = 'if0_43023642_nexora';
const DB_USER = 'if0_43023642';
const DB_PASS = 'KENDI_MYSQL_SIFREN';



•DB_HOST: InfinityFree MySQL hostname

•DB_NAME: InfinityFree’nin verdiği tam veritabanı adı

•DB_USER: InfinityFree MySQL username

•DB_PASS: InfinityFree MySQL parolası


Gerçek parolayı GitHub’a yükleme ve kimseyle paylaşma.

6. PHP dosyalarını yükle

ZIP’i aç ve Nexora-PHP klasörünün içindeki dosyaları InfinityFree’deki htdocs klasörüne yükle.

Doğru yapı:

Plain Text


htdocs/
├── index.php
├── config.php
├── account.php
├── login.php
├── register.php
├── cart.php
├── admin.php
├── assets/
└── includes/



index.php doğrudan şu konumda olmalı:

Plain Text


/htdocs/index.php



Eğer klasörü komple yüklersen site adresinin sonuna klasör adını eklemen gerekir:

Plain Text


https://site-adresin.free.nf/Nexora-PHP/index.php



Ana domainin doğrudan açılmasını istiyorsan dosyaları htdocs içine taşı.

7. Siteyi aç

Dosyalar doğrudan htdocs içindeyse:

Plain Text


https://site-adresin.free.nf/



Gerekirse:

Plain Text


https://site-adresin.free.nf/index.php



İlk yüklemede InfinityFree karşılama sayfası görünürse htdocs içindeki varsayılan index.html dosyasını sil veya yeniden adlandır. Kendi dosyan şu olmalı:

Plain Text


htdocs/index.php



phpMyAdmin kurulumu

Yerel XAMPP için

PHP


const DB_HOST = '127.0.0.1';
const DB_NAME = 'nexora';
const DB_USER = 'root';
const DB_PASS = '';



InfinityFree için

PHP


const DB_HOST = 'sql300.infinityfree.com';
const DB_NAME = 'if0_43023642_nexora';
const DB_USER = 'if0_43023642';
const DB_PASS = 'KENDI_MYSQL_SIFREN';



InfinityFree’ye yüklemeden önce config.php dosyasını hosting bilgilerine göre güncelle.

Admin hesabı

1. Site üzerinden kayıt ol

Plain Text


https://site-adresin.free.nf/register.php



2. phpMyAdmin’de admin rolünü ver

InfinityFree phpMyAdmin’de doğru veritabanını seçip SQL sekmesinde çalıştır:

SQL


UPDATE users
SET role = 'admin'
WHERE email = 'SENIN_EMAIL_ADRESIN';



Kontrol etmek için:

SQL


SELECT id, name, email, role
FROM users
WHERE email = 'SENIN_EMAIL_ADRESIN';



Sonuçta role değeri şöyle olmalı:

Plain Text


admin



3. Yeniden giriş yap

Admin yetkisinin oturuma yansıması için çıkış yapıp tekrar giriş yap:

Plain Text


https://site-adresin.free.nf/logout.php
https://site-adresin.free.nf/login.php



Admin paneli:

Plain Text


https://site-adresin.free.nf/admin.php



Güvenlik notları

•Gerçek MySQL parolanı GitHub’a yükleme.

•config.php dosyasını herkese açık şekilde paylaşma.

•Hosting veya MySQL parolanı sohbetlerde paylaşma.

•Parolalar sistemde password_hash( ) ile saklanır.

•Veritabanı sorgularında PDO prepared statements kullanılır.

•Admin kontrolü server tarafında yapılır.

•InfinityFree’de mail() çalışmayabilir; gerçek e-posta bildirimi için SMTP/PHPMailer gerekebilir.

•Ödeme sistemi bu sürümde bulunmaz; siparişler admin paneline talep olarak düşer.

Geliştirici

<div align="center">

Necati Bulduk




















</div>




<div align="center">

Nexora 

</div>

