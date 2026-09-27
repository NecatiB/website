<?php
require_once 'config.php';
$page_title = 'Hesabım — Nexora';
$orders = [];
if (user()) { $stmt = db()->prepare('SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC'); $stmt->execute([user()['id']]); $orders = $stmt->fetchAll(); }
include 'includes/header.php';
?>
<main class="account-page container">
<?php if (!user()): ?><div class="account-grid"><section class="panel account-hero"><span class="eyebrow">Hesap merkezi</span><h1>Kendi alanını<br><em>oluştur.</em></h1><p>Nexora’da ürünleri sepete eklemek, sipariş göndermek ve sipariş geçmişini görmek için giriş yapman yeterli.</p><a class="primary-btn" href="login.php">Giriş yap / hesap oluştur</a></section><section class="panel"><h2>Hesabın olunca neler açılır?</h2><ul class="benefit-list"><li><b>◈ Ürünlerle etkileşim</b><span>Ürünleri sepete ekle, adetlerini yönet ve sipariş talebi gönder.</span></li><li><b>✓ Sipariş geçmişi</b><span>Daha önce gönderdiğin taleplerin durumunu hesabından takip et.</span></li><li><b>♢ Güvenli oturum</b><span>Nexora parola bilgini güvenli hash olarak saklar.</span></li></ul></section></div><?php else: ?><section class="panel profile-card"><div class="avatar">👤</div><div><span class="eyebrow">Aktif hesap</span><h1><?= e(user()['name']) ?></h1><p><?= e(user()['email']) ?> · <?= e(user()['role']) ?></p></div><a class="secondary-btn" href="logout.php">Oturumu kapat</a></section><div class="section-heading compact"><div><h2>Sipariş geçmişin</h2><p>Sepet onaylarından oluşan taleplerin.</p></div></div><?php if (!$orders): ?><div class="empty-card">Henüz siparişin yok. <a href="index.php#shop">Mağazaya git.</a></div><?php else: ?><div class="orders-list"><?php foreach ($orders as $order): ?><article class="order-card"><div><b>Sipariş #<?= (int)$order['id'] ?></b><small><?= e($order['created_at']) ?></small></div><strong><?= money((int)$order['total_cents']) ?></strong><span class="pill accent"><?= e($order['status']) ?></span></article><?php endforeach; ?></div><?php endif; ?><?php endif; ?>
</main>
<?php include 'includes/footer.php'; ?>
