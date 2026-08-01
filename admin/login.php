<?php
session_start();
require '../config/database.php';

// Already logged in? go straight to the dashboard.
if (!empty($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Please enter both username and password.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username LIMIT 1");
        $stmt->execute([':username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin_id']   = $admin['id'];
            $_SESSION['admin_name'] = $admin['full_name'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Incorrect username or password.';
        }
    }
}

$inAdmin = true;
$pageTitle = 'Admin Login';
include '../includes/header.php';
?>
<main class="admin-shell">
  <div class="admin-card">
    <div class="corner tl"></div><div class="corner br"></div>
    <div class="eyebrow">Restricted — Sheet 00</div>
    <h1>Admin Access</h1>
    <p class="sub">Sign in to manage projects and inquiries.</p>

    <?php if ($error): ?>
      <div class="form-msg err" style="margin-bottom:16px"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="login.php">
      <div class="field">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required autofocus value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Sign in</button>
    </form>

    <p class="admin-footnote">No admin account yet? Run <a href="create_admin.php">create_admin.php</a> once, then delete it.</p>
  </div>
</main>
<?php include '../includes/footer.php'; ?>
