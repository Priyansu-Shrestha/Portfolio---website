<?php
/**
 * ONE-TIME SETUP SCRIPT
 * Visit this file once in your browser to create (or reset) the admin
 * account with a properly hashed password, then DELETE this file.
 * Leaving it on a live server would let anyone reset your admin password.
 */
session_start();
require '../config/database.php';

$done = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($fullName === '' || $username === '' || strlen($password) < 6) {
        $error = 'Fill in all fields — password must be at least 6 characters.';
    } else {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $existing = $pdo->prepare("SELECT id FROM admins WHERE username = :u");
        $existing->execute([':u' => $username]);

        if ($existing->fetch()) {
            $stmt = $pdo->prepare("UPDATE admins SET full_name=:n, email=:e, password=:p WHERE username=:u");
            $stmt->execute([':n' => $fullName, ':e' => $email, ':p' => $hash, ':u' => $username]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO admins (full_name, username, email, password) VALUES (:n, :u, :e, :p)");
            $stmt->execute([':n' => $fullName, ':u' => $username, ':e' => $email, ':p' => $hash]);
        }
        $done = true;
    }
}

$inAdmin = true;
$pageTitle = 'Create Admin Account';
include '../includes/header.php';
?>
<main class="admin-shell">
  <div class="admin-card">
    <div class="corner tl"></div><div class="corner br"></div>
    <div class="eyebrow">Setup — Run once</div>
    <h1>Create Admin Account</h1>
    <p class="sub">Delete this file once you're done.</p>

    <?php if ($done): ?>
      <div class="form-msg ok" style="margin-bottom:16px">Admin account saved. You can now <a href="login.php" style="color:inherit">log in</a>.</div>
    <?php else: ?>
      <?php if ($error): ?><div class="form-msg err" style="margin-bottom:16px"><?= htmlspecialchars($error) ?></div><?php endif; ?>
      <form method="POST" action="create_admin.php">
        <div class="field"><label>Full name</label><input type="text" name="full_name" required></div>
        <div class="field"><label>Username</label><input type="text" name="username" required></div>
        <div class="field"><label>Email</label><input type="email" name="email"></div>
        <div class="field"><label>Password</label><input type="password" name="password" required minlength="6"></div>
        <button type="submit">Save admin account</button>
      </form>
    <?php endif; ?>
  </div>
</main>
<?php include '../includes/footer.php'; ?>
