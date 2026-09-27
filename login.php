<?php
require_once 'config.php';
if (user()) redirect('account.php');
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  verify_csrf();
  $email = strtolower(trim($_POST['email'] ?? '')); $password = $_POST['password'] ?? '';
  $stmt = db()->prepare('SELECT * FROM users WHERE email = ? LIMIT 1'); $stmt->execute([$email]); $found = $stmt->fetch();
  if (!$found || !password_verify($password, $found['password_hash'])) $error = 'E-posta veya parola hatalı.';
  else { unset($found['password_hash']); $_SESSION['user'] = $found; flash('Hoş geldin, ' . $found['name'] . '.'); redirect('account.php'); }
}
$page_title = 'Giriş yap — Nexora'; include 'includes/header.php';
?><main class="auth-page container"><form class="panel auth-card" method="post"><span class="eyebrow">Nexora account</span><h1>Tekrar hoş geldin.</h1><p class="muted">Hesabına giriş yap ve ürünlerle etkileşime geç.</p><?php if ($error): ?><div class="error-box"><?= e($error) ?></div><?php endif; ?><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><label>E-posta<input type="email" name="email" required autocomplete="email"></label><label>Parola<input type="password" name="password" required autocomplete="current-password"></label><button class="primary-btn" type="submit">Giriş yap</button><p class="form-foot">Hesabın yok mu? <a href="register.php">Hesap oluştur</a></p></form></main><?php include 'includes/footer.php'; ?>
