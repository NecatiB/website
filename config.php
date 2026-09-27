<?php
// Nexora PHP configuration. Copy this file to your XAMPP/WAMP htdocs folder.
session_start();

const DB_HOST = '127.0.0.1';
const DB_NAME = 'nexora';
const DB_USER = 'root';
const DB_PASS = '';
const CONTACT_EMAIL = 'bulduknecati726@gmail.com';

function db(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    return $pdo;
}

function e(?string $value): string { return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8'); }
function redirect(string $url): never { header('Location: ' . $url); exit; }
function csrf_token(): string { return $_SESSION['csrf'] ??= bin2hex(random_bytes(32)); }
function verify_csrf(): void { if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) { http_response_code(419); exit('Geçersiz güvenlik anahtarı.'); } }
function user(): ?array { return $_SESSION['user'] ?? null; }
function require_login(): void { if (!user()) redirect('account.php'); }
function require_admin(): void { if (!user() || user()['role'] !== 'admin') { http_response_code(403); exit('Bu sayfaya sadece admin erişebilir.'); } }
function flash(string $message, string $type = 'success'): void { $_SESSION['flash'] = [$message, $type]; }
function take_flash(): ?array { $value = $_SESSION['flash'] ?? null; unset($_SESSION['flash']); return $value; }
function money(int $cents): string { return number_format($cents / 100, 2, ',', '.') . ' TL'; }
