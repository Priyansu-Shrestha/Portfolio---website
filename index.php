<?php
require 'config/database.php';
$pageTitle = 'Priyansu Shrestha — Full Stack Developer';
include 'includes/header.php';

// Pull featured projects from DB if available, else fall back to sample content
try {
    $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 3");
    $projects = $stmt->fetchAll();
} catch (Exception $e) {
    $projects = [];
}
if (empty($projects)) {
    $projects = [
        ['title' => 'AI Solutions — Corporate Website', 'description' => 'A multi-page PHP/MySQL business site with an admin panel for managing inquiries and content.', 'technologies' => 'PHP, MySQL, JS', 'github' => '#', 'live_demo' => '#'],
        ['title' => 'Student Performance Predictor', 'description' => 'A Python machine learning project comparing algorithms to predict academic outcomes.', 'technologies' => 'Python, Scikit-learn', 'github' => '#', 'live_demo' => '#'],
        ['title' => 'POS System', 'description' => 'A point-of-sale desktop application for retail transactions and inventory tracking.', 'technologies' => 'C#, SQL Server', 'github' => '#', 'live_demo' => '#'],
    ];
}
?>
<main>

<section id="home" class="hero">
  <div class="container hero-grid">

    <div class="hero-left">
      <div class="eyebrow">Introduction</div>
      <h1>Building software<br>the way engineers<br>draft <span class="accent">structures.</span></h1>
      <div class="role-line"><span id="typing"></span><span class="cursor">&nbsp;</span></div>
      <p class="lead">I'm a BSc (Hons) Information Technology student in Chitwan, Nepal, who started out
      in Civil Engineering. That background stuck with me — I still plan before I build, and every project
      here is documented like it matters.</p>

      <div class="hero-actions">
        <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Start a project</a>
        <a href="assets/cv.pdf" class="btn-secondary"><i class="fa-solid fa-download"></i> Download résumé</a>
      </div>

      <div class="hero-stats">
        <div><b>3+</b><span>Yrs in tech &amp; field work</span></div>
        <div><b>10+</b><span>Web apps shipped</span></div>
        <div><b>6</b><span>Core languages</span></div>
      </div>
    </div>

    <div class="hero-right">
      <div class="portrait-wrap">
        <div class="portrait">
          <img src="assets/images/11 profile.png" alt="Portrait of Priyansu Shrestha">
        </div>
        <span class="callout c1">Full Stack Developer</span>
        <span class="callout c2">Bharatpur, Nepal</span>
        <span class="callout c3">Available for internship</span>
      </div>
      <div class="title-block">
        <div><b>Drawn by</b>P. Shrestha</div>
        <div><b>Scale</b>1:1</div>
        <div><b>Status</b>In progress</div>
      </div>
    </div>

  </div>
</section>

<section id="about-preview">
  <div class="container">
    <div class="sheet-head">
      <h2>About the builder</h2>
      <div class="sheet-no">Sheet 02<br><b>See full profile →</b></div>
    </div>
    <div class="about-grid">
      <div class="about-frame">
        <div class="corner tl"></div><div class="corner br"></div>
        <img src="assets/images/11 profile.png" alt="Priyansu Shrestha">
      </div>
      <div class="about-content">
        <h3>Priyansu Shrestha</h3>
        <span class="role-tag">Full Stack Developer &amp; IT Student</span>
        <p>I design and build multi-page web applications end to end — schema, backend, and the interface
        people actually touch. Most of my recent work has centered on PHP and MySQL systems with secure
        admin panels, alongside Python for machine learning coursework.</p>
        <p>Before IT, I studied Civil Engineering and worked as a Smart Meter Technician — hands-on work
        that taught me to read systems carefully before changing them. That habit now shows up in how I
        structure code.</p>
        <a href="about.php" class="btn-secondary">Read the full story</a>
      </div>
    </div>
  </div>
</section>

<section id="skills">
  <div class="container">
    <div class="sheet-head">
      <h2>Technical stack</h2>
      <div class="sheet-no">Sheet 03<br><b>Schematic view</b></div>
    </div>
    <div class="skills-groups">
      <div class="skill-group">
        <h4>Languages</h4>
        <div class="node-list">
          <div class="node"><span class="dot"></span>PHP</div>
          <div class="node"><span class="dot"></span>Python</div>
          <div class="node"><span class="dot"></span>JavaScript</div>
          <div class="node"><span class="dot"></span>C#</div>
        </div>
      </div>
      <div class="skill-group">
        <h4>Data &amp; Backend</h4>
        <div class="node-list">
          <div class="node"><span class="dot"></span>MySQL</div>
          <div class="node"><span class="dot"></span>SQL Server</div>
          <div class="node"><span class="dot"></span>PDO &amp; prepared statements</div>
          <div class="node"><span class="dot"></span>Session-based auth</div>
        </div>
      </div>
      <div class="skill-group">
        <h4>Frontend</h4>
        <div class="node-list">
          <div class="node"><span class="dot"></span>HTML5 &amp; CSS3</div>
          <div class="node"><span class="dot"></span>Responsive design systems</div>
          <div class="node"><span class="dot"></span>Bootstrap 5</div>
          <div class="node"><span class="dot"></span>Vanilla JS interactions</div>
        </div>
      </div>
      <div class="skill-group">
        <h4>Tools &amp; Practice</h4>
        <div class="node-list">
          <div class="node"><span class="dot"></span>Git &amp; GitHub</div>
          <div class="node"><span class="dot"></span>XAMPP / local hosting</div>
          <div class="node"><span class="dot"></span>draw.io documentation</div>
          <div class="node"><span class="dot"></span>Scikit-learn (ML coursework)</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="projects">
  <div class="container">
    <div class="sheet-head">
      <h2>Selected work</h2>
      <div class="sheet-no">Sheet 04<br><b>3 of <?= count($projects) ?> shown →</b></div>
    </div>
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
    <div style="text-align:center;margin-top:44px">
      <a href="projects.php" class="btn-secondary">View all projects</a>
    </div>
  </div>
</section>

<section id="contact-preview">
  <div class="container" style="text-align:center">
    <div class="eyebrow" style="justify-content:center">Sheet 05 — Contact</div>
    <h2 style="font-family:var(--font-display);font-size:clamp(1.8rem,3.6vw,2.8rem);margin-bottom:18px">Have a project in mind?</h2>
    <p style="color:var(--slate);max-width:52ch;margin:0 auto 30px">I'm currently available for internships and freelance web work. Send a message and I'll reply within a day or two.</p>
    <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get in touch</a>
  </div>
</section>

</main>
<?php include 'includes/footer.php'; ?>
