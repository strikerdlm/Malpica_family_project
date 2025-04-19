<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#000000">
  <?php if ($current_page == 'index.php'): ?>
    <meta name="description" content="Welcome to Badpikaverse - Your Digital Command Center">
    <title>BADPIKAVERSE | Welcome</title>
  <?php elseif ($current_page == 'about.php'): ?>
    <meta name="description" content="About Badpikaverse - Learn more about our digital command center">
    <title>BADPIKAVERSE | About</title>
  <?php elseif ($current_page == 'contact.php'): ?>
    <meta name="description" content="Contact Badpikaverse - Get in touch with us">
    <title>BADPIKAVERSE | Contact</title>
  <?php elseif ($current_page == 'projects.php'): ?>
    <meta name="description" content="Projects - Explore AI, technology, and science projects">
    <title>BADPIKAVERSE | Projects</title>
  <?php endif; ?>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <script>
    // Initialize theme from localStorage before any content is rendered
    (function() {
      const currentTheme = localStorage.getItem('theme') || 'dark';
      if (currentTheme === 'light') {
        document.documentElement.classList.add('light-mode');
      }
    })();
  </script>
</head>
<body>
  <div class="stars"></div>

  <header>
    <div class="logo">BADPIKAVERSE</div>
    <div class="header-controls">
      <nav>
        <ul>
          <li><a href="index.php" <?php echo $current_page == 'index.php' ? 'class="active"' : ''; ?>>HOME</a></li>
          <li><a href="projects.php" <?php echo $current_page == 'projects.php' ? 'class="active"' : ''; ?>>PROJECTS</a></li>
          <li><a href="about.php" <?php echo $current_page == 'about.php' ? 'class="active"' : ''; ?>>ABOUT</a></li>
          <li><a href="contact.php" <?php echo $current_page == 'contact.php' ? 'class="active"' : ''; ?>>CONTACT</a></li>
        </ul>
      </nav>
      <button id="theme-toggle" aria-label="Toggle theme">DARK MODE</button>
    </div>
  </header> 