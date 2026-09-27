<?php require_once __DIR__ . '/../config.php'; $flash = take_flash(); ?>
<!doctype html>
<html lang="tr" data-theme="light">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($page_title ?? 'Nexora — Digital Playground') ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="site-header"><div class="container nav-wrap">
  <a class="brand" href="index.php"><span class="brand-mark">✦</span><span><b>NEXORA</b><small>Digital playground</small></span></a>
  <nav class="main-nav"><a href="index.php#explore">Keşfet</a><a href="index.php#calculator">Hesap makinesi</a><a href="index.php#shop">Mağaza</a><a href="index.php#feedback">Öneri bırak</a><a href="account.php"><?= user() ? 'Hesabım' : 'Hesap oluştur' ?></a><?php if ((user()['role'] ?? null) === 'admin'): ?><a class="admin-link" href="admin.php">Admin</a><?php endif; ?></nav>
  <div class="nav-actions"><button class="icon-btn" data-theme-toggle title="Tema değiştir">☼</button><a class="cart-btn" href="cart.php">🛍 <span><?= array_sum($_SESSION['cart'] ?? []) ?></span></a><?php if (user()): ?><a class="user-chip" href="account.php">👤 <?= e(user()['name']) ?></a><?php else: ?><a class="primary-btn small" href="account.php">Giriş yap</a><?php endif; ?></div>
</div></header>
<?php if ($flash): ?><div class="flash <?= e($flash[1]) ?> container"><?= e($flash[0]) ?></div><?php endif; ?>
