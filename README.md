# Mini PHP Blog System

## Features
- List, add, and delete blog posts
- Modern interface: HTML + CSS
- Data is stored in `data/posts.json`

## Setup & Run

1. Place the `php-simple-blog` folder on your web server or start the built-in server:
   ```
   php -S localhost:8000 -t public
   ```
2. Open your browser and go to: `http://localhost:8000`
3. You can add and delete blog posts through the web interface.

## Project Structure

```
public/
  index.php
  add.php
  delete.php
  assets/style.css
src/
  Blog.php
data/
  posts.json
README.md
```