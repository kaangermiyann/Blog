<?php
require_once __DIR__ . '/../src/Blog.php';
$blog = new Blog(__DIR__ . '/../data/posts.json');
$id = $_GET['id'] ?? '';
if ($id) {
    $blog->deletePost($id);
}
header('Location: index.php');
exit;