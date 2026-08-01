<?php
require 'config/database.php';
$pageTitle = 'About — Priyansu Shrestha';
include 'includes/header.php';
?>
<section class="page-banner">
  <div class="container">
    <div class="eyebrow">Sheet 02 — Profile</div>
    <h1>About the builder</h1>
    <p>From reading structural drawings to reading stack traces — the same discipline, a different material.</p>
  </div>
</section>

<section>
  <div class="container about-grid">
    <div>
      <div class="about-frame">
        <div class="corner tl"></div><div class="corner br"></div>
        <img src="assets/images/11 profile.png" alt="Priyansu Shrestha">
      </div>
      <div class="title-block">
        <div><b>Name</b>P. Shrestha</div>
        <div><b>Based in</b>Nepal</div>
        <div><b>Status</b>Available</div>
      </div>
    </div>

    <div class="about-content">
      <h3>Priyansu Shrestha</h3>
      <span class="role-tag">Full Stack Developer &amp; BSc (Hons) IT Student</span>
      <p>I'm currently completing a BSc (Hons) in Information Technology at ISMT College, affiliated with
      the University of Sunderland, based in Bharatpur, Chitwan. My coursework spans web development,
      databases, and applied machine learning, and I pair it with hands-on personal projects to keep the
      skills practical rather than theoretical.</p>
      <p>I didn't start in software. I trained in Civil Engineering before working as a Smart Meter
      Technician — a field job that involved diagnosing real systems under real constraints. Moving into IT
      felt less like a reset and more like swapping materials: the same instinct for planning, structure,
      and careful documentation now goes into schemas, admin panels, and interfaces instead of load-bearing walls.</p>

      <div class="spec-grid">
        <div><strong>Email</strong><span>priyansuxtha@gmail.com</span></div>
        <div><strong>Location</strong><span>Bharatpur, Chitwan, Nepal</span></div>
        <div><strong>Education</strong><span>BSc (Hons) IT — ISMT College</span></div>
        <div><strong>Availability</strong><span>Internships &amp; freelance</span></div>
      </div>

      <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get in touch</a>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="sheet-head">
      <h2>Revision history</h2>
      <div class="sheet-no">Sheet 02.1<br><b>Career log</b></div>
    </div>
    <table class="rev-table">
      <thead>
        <tr><th>Rev</th><th>Year</th><th>Change description</th></tr>
      </thead>
      <tbody>
        <tr>
          <td class="rev-tag">REV A</td>
          <td class="rev-year">Earlier</td>
          <td>Studied Civil Engineering in secondary education — foundation in planning, structure and technical drawing.</td>
        </tr>
        <tr>
          <td class="rev-tag">REV B</td>
          <td class="rev-year">2024</td>
          <td>Worked as a Smart Meter Technician; pivoted into Information Technology and enrolled in BSc (Hons) IT at ISMT College.</td>
        </tr>
        <tr>
          <td class="rev-tag">REV C</td>
          <td class="rev-year">2025</td>
          <td>Built multiple PHP/MySQL and Bootstrap web applications, including full admin-panel systems, across academic and self-directed projects.</td>
        </tr>
        <tr>
          <td class="rev-tag">REV D</td>
          <td class="rev-year">2026</td>
          <td>Focused on full-stack development and applied machine learning, including a research project on student performance prediction.</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<section>
  <div class="container">
    <div class="sheet-head">
      <h2>Core skills</h2>
      <div class="sheet-no">Sheet 02.2<br><b>Reference</b></div>
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
        <h4>Web &amp; Data</h4>
        <div class="node-list">
          <div class="node"><span class="dot"></span>HTML5 / CSS3</div>
          <div class="node"><span class="dot"></span>MySQL</div>
          <div class="node"><span class="dot"></span>SQL Server</div>
          <div class="node"><span class="dot"></span>Bootstrap 5</div>
        </div>
      </div>
      <div class="skill-group">
        <h4>Currently exploring</h4>
        <div class="node-list">
          <div class="node"><span class="dot"></span>Scikit-learn / ML models</div>
          <div class="node"><span class="dot"></span>Node.js &amp; Express</div>
          <div class="node"><span class="dot"></span>REST API design</div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
