<?php
// Figure out relative path prefix so header works from root pages and /admin/
$base = isset($inAdmin) && $inAdmin ? '../' : '';
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?? 'Priyansu Shrestha — Full Stack Developer'; ?></title>
<meta name="description" content="Priyansu Shrestha — BSc (Hons) IT student and full stack developer building web applications with PHP, JavaScript, Python and MySQL.">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="<?= $base ?>assets/css/style.css">
</head>
<body>

<nav>
  <div class="container">
    <a href="<?= $base ?>index.php" class="logo">
      Priyansu codes<span>.</span>
      <small>Full&nbsp;Stack&nbsp;Developer — Rev. 2026</small>
    </a>

    <ul class="nav-links" id="navLinks">
      <li><a href="<?= $base ?>index.php#home">Home</a></li>
      <li><a href="<?= $base ?>about.php">About</a></li>
      <li><a href="<?= $base ?>projects.php">Projects</a></li>
      <li><a href="<?= $base ?>index.php#skills">Skills</a></li>
      <li><a href="<?= $base ?>contact.php">Contact</a></li>
      <li><a class="btn-nav" href="<?= $base ?>assets/cv.pdf">Resume</a></li>
    </ul>

    <button class="nav-toggle" id="navToggle" aria-label="Toggle menu"><i class="fa-solid fa-bars"></i></button>
  </div>
</nav>
