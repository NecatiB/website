<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('index.php#feedback');
verify_csrf(); $name = trim($_POST['name'] ?? ''); $email = trim($_POST['email'] ?? ''); $type = $_POST['type'] ?? 'other'; $message = trim($_POST['message'] ?? '');
$allowed = ['suggestion','complaint','partnership','other'];
if (mb_strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || !in_array($type, $allowed, true) || mb_strlen($message) < 10) { flash('Lütfen form alanlarını doğru doldur.','error'); redirect('index.php#feedback'); }
$stmt = db()->prepare('INSERT INTO feedback (name,email,type,message) VALUES (?,?,?,?)'); $stmt->execute([$name,$email,$type,$message]);
@mail(CONTACT_EMAIL, 'Nexora yeni geri bildirim', "Gönderen: $name <$email>\nTür: $type\n\n$message", "Reply-To: $email\r\nContent-Type: text/plain; charset=UTF-8");
flash('Mesajın kaydedildi. Teşekkürler!'); redirect('index.php#feedback');
