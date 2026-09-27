<?php
require_once 'config.php';
if (user()) redirect('account.php');
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  verify_csrf(); $name = trim($_POST['name'] ?? ''); $email = strtolower(trim($_POST['email'] ?? '')); $password = $_POST['password'] ?? '';
  if (mb_strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) $error = 'Ad, geçerli e-posta ve en az 6 karakter parola gir.';
  else { try { $stmt = db()->prepare('INSERT INTO users (name,email,password_hash) VALUES (?,?,?)'); $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]); flash('Hesabın oluşturuldu. Şimdi giriş yapabilirsin.'); redirect('login.php'); } catch (PDOException $e) { $error = str_contains($e->getMessage(), 'Duplicate') ? 'Bu e-posta zaten kayıtlı.' : 'Kayıt sırasında hata oluştu.'; } }
}
$page_title = 'Hesap oluştur — Nexora'; include 'includes/header.php';
?><main class="auth-page container"><form class="panel auth-card" method="post"><span class="eyebrow">Yeni hesap</span><h1>Nexora’ya katıl.</h1><p class="muted">Ürünleri sepete eklemek ve sipariş göndermek için hesabını oluştur.</p><?php if ($error): ?><div class="error-box"><?= e($error) ?></div><?php endif; ?><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><label>Ad soyad<input name="name" required autocomplete="name"></label><label>E-posta<input type="email" name="email" required autocomplete="email"></label><label>Parola<input type="password" name="password" required minlength="6" autocomplete="new-password"></label><button class="primary-btn" type="submit">Hesap oluştur</button><p class="form-foot">Zaten hesabın var mı? <a href="login.php">Giriş yap</a></p></form></main><?php include 'includes/footer.php'; ?>
