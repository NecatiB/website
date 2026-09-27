<?php
require_once 'config.php';
require_login();
$_SESSION['cart'] ??= [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  verify_csrf(); $action = $_POST['action'] ?? ''; $id = (int)($_POST['product_id'] ?? 0);
  if ($action === 'add') $_SESSION['cart'][$id] = min(20, ($_SESSION['cart'][$id] ?? 0) + 1);
  if ($action === 'remove') unset($_SESSION['cart'][$id]);
  if ($action === 'change') $_SESSION['cart'][$id] = max(1, min(20, (int)($_SESSION['cart'][$id] ?? 1) + (int)($_POST['delta'] ?? 0)));
  redirect('cart.php');
}
if (isset($_GET['checkout'])) {
  if (!$_SESSION['cart']) { flash('Sepetin boş.','error'); redirect('index.php#shop'); }
  $ids = array_keys($_SESSION['cart']); $marks = implode(',', array_fill(0, count($ids), '?')); $stmt = db()->prepare("SELECT * FROM products WHERE id IN ($marks) AND is_active = 1"); $stmt->execute($ids); $items = $stmt->fetchAll(); $total = 0;
  foreach ($items as $item) $total += $item['price_cents'] * $_SESSION['cart'][$item['id']];
  $pdo = db(); $pdo->beginTransaction(); try { $stmt = $pdo->prepare('INSERT INTO orders (user_id,customer_name,customer_email,total_cents) VALUES (?,?,?,?)'); $stmt->execute([user()['id'],user()['name'],user()['email'],$total]); $orderId = (int)$pdo->lastInsertId(); $line = $pdo->prepare('INSERT INTO order_items (order_id,product_id,product_name,price_cents,quantity) VALUES (?,?,?,?,?)'); foreach ($items as $item) $line->execute([$orderId,$item['id'],$item['name'],$item['price_cents'],$_SESSION['cart'][$item['id']]]); $pdo->commit(); $_SESSION['cart'] = []; flash("Sipariş talebin #$orderId olarak alındı."); redirect('account.php'); } catch (Throwable $e) { $pdo->rollBack(); flash('Sipariş oluşturulamadı.','error'); redirect('cart.php'); }
}
$ids = array_keys($_SESSION['cart']); $items = [];
if ($ids) { $marks = implode(',', array_fill(0, count($ids), '?')); $stmt = db()->prepare("SELECT * FROM products WHERE id IN ($marks)"); $stmt->execute($ids); $items = $stmt->fetchAll(); }
$total = 0; foreach ($items as $item) $total += $item['price_cents'] * $_SESSION['cart'][$item['id']];
$page_title = 'Sepetim — Nexora'; include 'includes/header.php';
?><main class="container cart-page"><div class="section-heading"><div><span class="eyebrow">Nexora basket</span><h1>Sepetin</h1></div><a class="secondary-btn" href="index.php#shop">Mağazaya dön</a></div><?php if (!$items): ?><div class="empty-card">Sepetin boş. <a href="index.php#shop">Ürünleri keşfet.</a></div><?php else: ?><div class="cart-list"><?php foreach ($items as $item): ?><article class="cart-row"><span class="product-icon"><?= e($item['icon']) ?></span><div><b><?= e($item['name']) ?></b><small><?= money((int)$item['price_cents']) ?></small></div><div class="quantity"><form method="post"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><input type="hidden" name="action" value="change"><input type="hidden" name="product_id" value="<?= $item['id'] ?>"><input type="hidden" name="delta" value="-1"><button>−</button></form><span><?= $_SESSION['cart'][$item['id']] ?></span><form method="post"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><input type="hidden" name="action" value="change"><input type="hidden" name="product_id" value="<?= $item['id'] ?>"><input type="hidden" name="delta" value="1"><button>+</button></form></div><strong><?= money((int)$item['price_cents'] * $_SESSION['cart'][$item['id']]) ?></strong><form method="post"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><input type="hidden" name="action" value="remove"><input type="hidden" name="product_id" value="<?= $item['id'] ?>"><button class="remove-btn">Sil</button></form></article><?php endforeach; ?></div><div class="cart-total"><span>Toplam</span><strong><?= money($total) ?></strong><a class="primary-btn" href="cart.php?checkout=1">Sepeti onayla</a></div><?php endif; ?></main><?php include 'includes/footer.php'; ?>
