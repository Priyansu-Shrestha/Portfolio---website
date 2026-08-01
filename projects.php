<?php
require 'config/database.php';
$pageTitle = 'Projects — Priyansu Shrestha';
include 'includes/header.php';

try {
    $projects = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll();
} catch (Exception $e) {
    $projects = [];
}
if (empty($projects)) {
    $projects = [
        ['title' => 'AI Solutions — Corporate Website', 'description' => 'A multi-page PHP/MySQL business site with services, blog, gallery, events, and a password-protected admin panel for managing inquiries.', 'technologies' => 'PHP, MySQL, PDO, JS', 'github' => '#', 'live_demo' => '#'],
        ['title' => 'TechVision Solutions', 'description' => 'A Node.js and Express rebuild of a B2B business website, backed by SQLite for lightweight local data storage.', 'technologies' => 'Node.js, Express, SQLite', 'github' => '#', 'live_demo' => '#'],
        ['title' => 'NextGen Software Solutions', 'description' => 'A Bootstrap 5 and PHP business website emphasizing fast page loads and a clean component structure.', 'technologies' => 'PHP, Bootstrap 5, MySQL', 'github' => '#', 'live_demo' => '#'],
        ['title' => 'Student Performance Predictor', 'description' => 'A comparative machine learning study predicting academic outcomes, built for a university research project.', 'technologies' => 'Python, Scikit-learn, Pandas', 'github' => '#', 'live_demo' => '#'],
        ['title' => 'Point of Sale System', 'description' => 'A desktop POS application handling transactions, receipts and inventory tracking for retail use.', 'technologies' => 'C#, SQL Server', 'github' => '#', 'live_demo' => '#'],
    ];
}
?>
<section class="page-banner">
  <div class="container">
    <div class="eyebrow">Sheet 04 — Portfolio</div>
    <h1>Selected work</h1>
    <p>A working set of academic and self-directed projects — mostly PHP/MySQL systems with real admin tooling, plus a few detours into Python and C#.</p>
  </div>
</section>

<section>
  <div class="container">
    <div class="project-grid">
      <?php foreach ($projects as $i => $p): ?>
      <div class="project-card">
        <span class="project-index">0<?= $i + 1 ?></span>
        <h3><?= htmlspecialchars($p['title']) ?></h3>
        <p><?= htmlspecialchars($p['description']) ?></p>
        <div class="tag-row">
          <?php foreach (explode(',', $p['technologies']) as $t): ?>
            <span><?= htmlspecialchars(trim($t)) ?></span>
          <?php endforeach; ?>
        </div>
        <div class="project-links">
          <?php if (!empty($p['github']) && $p['github'] !== '#'): ?><a href="<?= htmlspecialchars($p['github']) ?>" target="_blank">Code →</a><?php endif; ?>
          <?php if (!empty($p['live_demo']) && $p['live_demo'] !== '#'): ?><a href="<?= htmlspecialchars($p['live_demo']) ?>" target="_blank">Live →</a><?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
