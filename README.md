<div align="center">

# ✦ NEXORA
### Soft Modern Digital Store — PHP & MySQL

Geliştiriciler ve teknoloji meraklıları için hazırlanmış; canlı araçlar, dijital ürün mağazası, kullanıcı hesapları ve admin paneli içeren responsive PHP web uygulaması.

[**🌐 Canlı Siteyi Ziyaret Et (Live Demo)**](https://nexorasite.free.nf)

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8+">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/InfinityFree-Hosting-6f42c1?style=for-the-badge" alt="InfinityFree">
  <img src="https://img.shields.io/badge/Responsive-Mobile-7c3aed?style=for-the-badge" alt="Responsive">
</p>

[Proje Hakkında](#-proje-hakkında) · [Özellikler](#-özellikler) · [Teknoloji Yığını](#-teknoloji-yığını) · [Dosya Yapısı](#-dosya-yapısı) · [Kurulum ve Yayınlama](#-infinityfreede-yayınlama)

</div>

---

## 📌 Proje Hakkında

Nexora; PHP ve MySQL kullanılarak geliştirilmiş, soft-modern tasarıma sahip bir dijital ürün mağazası ve araç platformudur. Açık beyaz zemin, lavanta tonları ve koyu mor tipografi kombinasyonu ile göz yormayan bir arayüz sunar. Aydınlık ve karanlık mod (Dark/Light Mode) geçiş desteği mevcuttur.

* **Ziyaretçiler:** Ürünleri, canlı saat/hava durumu gibi araçları inceleyebilir ve hesap makinesini kullanabilir.
* **Kullanıcılar:** Üye olup sepete ürün ekleyebilir, sipariş talebi oluşturabilir ve öneri/şikâyet bildirebilir.
* **Admin:** Ürün yönetimi, sipariş takibi ve gelen geri bildirimleri tek bir panelden yönetebilir.

---

## ✨ Özellikler

| Özellik | Açıklama | Durum |
| :--- | :--- | :---: |
| **Soft Modern Tasarım** | Beyaz, lavanta ve koyu mor renk paleti | ✅ |
| **Responsive Yapı** | Tam mobil, tablet ve masaüstü uyumu | ✅ |
| **Koyu / Açık Tema** | Tema değiştirici (LocalStorage destekli) | ✅ |
| **Canlı Araçlar** | Yerel saat ve Open-Meteo ile canlı Ankara hava durumu | ✅ |
| **Mini Hesap Makinesi** | Sayfadan ayrılmadan 4 işlem ve yüzde hesabı | ✅ |
| **Kullanıcı Sistemi** | Güvenli kayıt, giriş ve oturum yönetimi | ✅ |
| **Dijital Mağaza & Sepet**| Ürün listeleme, sepete ekleme, adet güncelleme | ✅ |
| **Admin Paneli** | Ürün, sipariş ve mesaj yönetimi | ✅ |

---

## 🛠 Teknoloji Yığını

* **Backend:** PHP 8+ (PDO & Prepared Statements)
* **Veritabanı:** MySQL / MariaDB
* **Frontend:** HTML5, CSS3, Vanilla JavaScript
* **Hosting:** InfinityFree

---

## 📁 Dosya Yapısı

```text
htdocs/
├── index.php                 # Ana sayfa, canlı araçlar ve mağaza
├── config.php                # Veritabanı bağlantısı ve yardımcı fonksiyonlar
├── account.php               # Kullanıcı hesap paneli
├── login.php                 # Giriş yap sayfası
├── register.php              # Kayıt ol sayfası
├── logout.php                # Oturum kapatma
├── cart.php                  # Sepet ve sipariş işlemleri
├── feedback.php              # Geri bildirim formu
├── admin.php                 # Admin yönetim paneli
├── assets/
│   ├── style.css             # Soft-modern tasarım ve tema stilleri
│   └── app.js                # Canlı araçlar ve dinamik JavaScript
├── includes/
│   ├── header.php            # Ortak üst menü ve navigasyon
│   └── footer.php            # Ortak alt bilgi
├── database.sql              # Yerel (Localhost) veritabanı şeması
└── database-infinityfree.sql # InfinityFree uyumlu veritabanı şeması
