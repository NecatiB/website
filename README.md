<div align="center">

# ✦ NEXORA

### Digital Playground — PHP & MySQL Edition

Geliştiriciler, üreticiler ve teknoloji meraklıları için hazırlanmış; canlı araçlar, dijital ürün mağazası ve kullanıcı hesap sistemi içeren modern PHP web uygulaması.

<p>
  <img src="https://img.shields.io/badge/PHP-8%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8+">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/HTML5-Markup-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-Responsive-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/JavaScript-Interactive-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
</p>

<p>
  <a href="#kurulum">Kurulum</a> ·
  <a href="#özellikler">Özellikler</a> ·
  <a href="#dosya-yapısı">Dosya yapısı</a> ·
  <a href="#admin-hesabı">Admin hesabı</a>
</p>

</div>

---

## Proje hakkında

**Nexora**, doğrudan XAMPP/WAMP üzerinde çalıştırılabilen PHP tabanlı bir dijital ürün ve canlı araç platformudur.

Ziyaretçiler ürünleri inceleyebilir; hesap oluşturan kullanıcılar ürünleri sepete ekleyebilir, sipariş talebi gönderebilir ve sipariş geçmişini takip edebilir. Admin kullanıcılar ise ürünleri, siparişleri ve geri bildirimleri yönetebilir.

## Özellikler

| Modül | Açıklama | Durum |
|---|---|:---:|
| Canlı saat | Tarayıcı saatini saniyelik olarak günceller | ✅ |
| Ankara hava durumu | Open-Meteo üzerinden canlı veri alır | ✅ |
| Hesap makinesi | Dört işlem ve yüzde hesabı | ✅ |
| Kullanıcı kaydı | Güvenli parola hash ile hesap oluşturma | ✅ |
| Giriş sistemi | Oturum açma ve güvenli çıkış | ✅ |
| Ürün mağazası | Ürünleri listeleme ve kategori bilgileri | ✅ |
| Sepet | Ekleme, artırma, azaltma ve ürün silme | ✅ |
| Sipariş | Sepeti sipariş talebine dönüştürme | ✅ |
| Hesap sayfası | Profil ve sipariş geçmişi | ✅ |
| Admin paneli | Ürün, sipariş ve geri bildirim yönetimi | ✅ |
| Geri bildirim | Şikâyet, öneri ve iş birliği formu | ✅ |
| Tema | Koyu/açık tema değişimi | ✅ |
| Responsive tasarım | Mobil, tablet ve masaüstü uyumu | ✅ |

## Kullanıcı erişim sistemi

| Kullanıcı tipi | Yapabilecekleri |
|---|---|
| Ziyaretçi | Ana sayfayı, canlı araçları ve ürünleri görüntüleyebilir |
| Kayıtlı kullanıcı | Ürünleri sepete ekleyebilir, sipariş gönderebilir ve geçmişini görebilir |
| Admin | Ürün, sipariş ve geri bildirimleri yönetebilir |

> Ürünle etkileşim, sepet ve sipariş işlemleri için kullanıcı girişi zorunludur.

## Ekranlar

```text
Ana sayfa       → index.php
Hesap merkezi   → account.php
Giriş           → login.php
Hesap oluştur   → register.php
Sepet           → cart.php
Admin paneli   → admin.php
Geri bildirim   → index.php#feedback
```

## Teknoloji yığını

| Teknoloji | Kullanım alanı |
|---|---|
| PHP 8+ | Backend, oturum ve iş mantığı |
| PDO | MySQL bağlantısı ve prepared statements |
| MySQL / MariaDB | Kullanıcı, ürün, sipariş ve mesaj verileri |
| HTML5 | Sayfa yapısı |
| CSS3 | Responsive ve tema tasarımı |
| Vanilla JavaScript | Saat, hava durumu, tema ve hesap makinesi |
| XAMPP / WAMP | Yerel geliştirme ortamı |

## Dosya yapısı

```text
Nexora-PHP/
│
├── index.php                 # Ana sayfa, mağaza ve canlı araçlar
├── account.php               # Misafir / kullanıcı hesap sayfası
├── login.php                 # Giriş sayfası
├── register.php              # Hesap oluşturma
├── logout.php                # Oturum kapatma
├── cart.php                  # Sepet ve sipariş işlemleri
├── feedback.php              # Şikâyet/öneri kaydı
├── admin.php                 # Admin paneli
├── config.php                # MySQL ve ortak yardımcı fonksiyonlar
├── database.sql              # phpMyAdmin veritabanı dosyası
│
├── includes/
│   ├── header.php            # Ortak üst menü
│   └── footer.php            # Ortak footer
│
├── assets/
│   ├── style.css             # Tüm tasarım ve responsive stiller
│   └── app.js                # Canlı araçlar ve tema JavaScript’i
│
├── PHPMYADMIN-KURULUM.md     # Ayrıntılı bağlantı rehberi
└── KOPYALA-BASLA.txt         # Kısa başlangıç notları
```

## Kurulum

### 1. Projeyi XAMPP klasörüne kopyala

```text
C:\xampp\htdocs\Nexora-PHP
```

### 2. Servisleri başlat

XAMPP Control Panel üzerinden:

- Apache → **Start**
- MySQL → **Start**

### 3. Veritabanını oluştur

Tarayıcıdan phpMyAdmin’i aç:

```text
http://localhost/phpmyadmin
```

Daha sonra:

1. **İçe aktar / Import** sekmesine gir.
2. Projedeki `database.sql` dosyasını seç.
3. **Git / Go** butonuna bas.

### 4. MySQL bağlantısını kontrol et

`config.php` dosyasındaki bilgileri kendi bilgisayarına göre düzenle:

```php
const DB_HOST = '127.0.0.1';
const DB_NAME = 'nexora';
const DB_USER = 'root';
const DB_PASS = '';
```

### 5. Siteyi aç

```text
http://localhost/Nexora-PHP/index.php
```

## Admin hesabı

Önce sitedeki `register.php` sayfasından bir kullanıcı hesabı oluştur. Sonra phpMyAdmin → **SQL** bölümünde şu sorguyu çalıştır:

```sql
UPDATE users
SET role = 'admin'
WHERE email = 'bulduknecati726@gmail.com';
```

Çıkış yapıp tekrar giriş yaptıktan sonra üst menüde **Admin** bağlantısı görünür.

## Güvenlik notları

- Parolalar `password_hash()` ile hashlenir.
- Veritabanı sorgularında PDO prepared statements kullanılır.
- Formlarda CSRF token kontrolü vardır.
- Admin erişimi sadece menüde değil, server tarafında da kontrol edilir.
- Gerçek hosting’de `config.php` içindeki veritabanı bilgilerini GitHub’a yükleme.
- Ödeme sistemi bu sürümde yoktur; siparişler admin onayına düşen taleplerdir.

## Geri bildirim e-postası

Geri bildirimler veritabanına kaydedilir ve PHP `mail()` fonksiyonu ile şu adrese gönderilmeye çalışılır:

```php
const CONTACT_EMAIL = 'bulduknecati726@gmail.com';
```

Localhost ortamında `mail()` otomatik çalışmayabilir. Gerçek hosting’de SMTP veya PHPMailer yapılandırması gerekir.

## Geliştirici

<div align="center">

### Necati Bulduk

[![GitHub](https://img.shields.io/badge/GitHub-NecatiB-181717?style=for-the-badge&logo=github)](https://github.com/NecatiB)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Necati_Bulduk-0A66C2?style=for-the-badge&logo=linkedin)](https://www.linkedin.com/in/necati-bulduk-b83a1843a)

</div>

---

<div align="center">

**Nexora — Build useful things.**

</div>
