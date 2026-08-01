<?php
require 'config/database.php';
$pageTitle = 'Contact — Priyansu Shrestha';

$message = '';
$msgType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $body    = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $body === '') {
        $message = 'Please fill in your name, email and message.';
        $msgType = 'err';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
        $msgType = 'err';
    } else {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO contacts (name, email, subject, message) VALUES (:name, :email, :subject, :message)"
            );
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':subject' => $subject,
                ':message' => $body,
            ]);
            $message = 'Message sent — thanks for reaching out. I\'ll reply soon.';
            $msgType = 'ok';
        } catch (Exception $e) {
            $message = 'Something went wrong. Please try again later.';
            $msgType = 'err';
        }
    }
}

include 'includes/header.php';
?>
<section class="page-banner">
  <div class="container">
    <div class="eyebrow">Contact</div>
    <h1>Let's build something</h1>
    <p>Open to internships, freelance web projects, and collaborations. Reach out directly or use the form below.</p>
  </div>
</section>

<section>
  <div class="container contact-grid">
    <div class="contact-info">
      <p>Whether it's a full site build, a database-backed admin tool, or just a technical question —
      I read every message myself.</p>

      <div class="contact-line"><b>Email</b><span>priyansuxtha@gmail.com</span></div>
      <div class="contact-line"><b>Location</b><span>Bharatpur, Chitwan, Nepal</span></div>
      <div class="contact-line"><b>Response</b><span>Usually within 1–2 days</span></div>

<div class="social-row">
        <a href="https://github.com/Priyansu-Shrestha" target="_blank" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
        <a href="https://www.linkedin.com/in/priyansushrestha/" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="https://www.facebook.com/Priyansu.sthaa" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/imnot_priyansu/" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
      </div>
      </div>
    </div>

    <div>
      <?php if ($message): ?>
        <div class="form-msg <?= $msgType ?>"><?= htmlspecialchars($message) ?></div>
      <?php endif; ?>
      <form class="contact-form" method="POST" action="contact.php">
        <div class="form-row">
          <div class="field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
          </div>
        </div>
        <div class="field">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
        </div>
        <div class="field">
          <label for="message">Message</label>
          <textarea id="message" name="message" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn-primary" style="align-self:flex-start;border:none;cursor:pointer">
          <i class="fa-solid fa-paper-plane"></i> Send message
        </button>
      </form>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
