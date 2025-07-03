<?php
class Blog {
    private $file;

    public function __construct($file) {
        $this->file = $file;
        if (!file_exists($file)) file_put_contents($file, json_encode([]));
    }

    public function getPosts() {
        $data = json_decode(file_get_contents($this->file), true);
        return $data ?? [];
    }

    public function addPost($title, $content) {
        $posts = $this->getPosts();
        $id = uniqid();
        $posts[] = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'date' => date('c')
        ];
        file_put_contents($this->file, json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function deletePost($id) {
        $posts = $this->getPosts();
        $posts = array_filter($posts, fn($p) => $p['id'] !== $id);
        file_put_contents($this->file, json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}