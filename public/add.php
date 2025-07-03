<?php
require_once __DIR__ . '/../src/Blog.php';
$blog = new Blog(__DIR__ . '/../data/posts.json');
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    if ($title && $content) {
        $blog->addPost($title, $content);
        header('Location: index.php');
        exit;
    } else {
        $error = "Başlık ve içerik boş olamaz!";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Yazı Ekle</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Yeni Yazı Ekle</h1>
        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" class="form">
            <label>Başlık
                <input name="title" required>
            </label>
            <label>İçerik
                <textarea name="content" rows="6" required></textarea>
            </label>
            <button class="btn" type="submit">Kaydet</button>
        </form>
        <a class="btn" href="index.php">← Geri Dön</a>
    </div>
</body>
</html>