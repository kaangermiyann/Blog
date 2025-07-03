<?php
require_once __DIR__ . '/../src/Blog.php';
$blog = new Blog(__DIR__ . '/../data/posts.json');
$posts = $blog->getPosts();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Mini Blog</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Mini Blog</h1>
        <a class="btn" href="add.php">Yeni Yazı Ekle</a>
        <ul class="post-list">
        <?php foreach (array_reverse($posts) as $post): ?>
            <li class="post-item">
                <div>
                    <strong><?= htmlspecialchars($post['title']) ?></strong>
                    <span class="date"><?= date('d.m.Y H:i', strtotime($post['date'])) ?></span>
                </div>
                <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                <a class="delete-btn" href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Silinsin mi?')">Sil</a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>