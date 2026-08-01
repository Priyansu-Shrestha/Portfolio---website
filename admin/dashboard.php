<?php
require 'includes/auth_check.php';
require '../config/database.php';

$contactCount = $pdo->query("SELECT COUNT(*) c FROM contacts")->fetch()['c'];
$projectCount = $pdo->query("SELECT COUNT(*) c FROM projects")->fetch()['c'];
$messages     = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC LIMIT 15")->fetchAll();
$projects     = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll();

$inAdmin = true;
$pageTitle = 'Admin Dashboard';
include '../includes/header.php';
?>
<div class="admin-topbar">
  <div class="container">
    <span class="logo">Priyansu<span>.</span> <small>Admin Panel</small></span>
    <div style="display:flex;align-items:center;gap:20px;font-family:var(--font-mono);font-size:.82rem">
      <span style="color:var(--slate)">Signed in as <?= htmlspecialchars($_SESSION['admin_name']) ?></span>
      <a href="../index.php" style="color:var(--blueprint);text-decoration:none">View site</a>
      <a href="logout.php" class="link-danger">Log out</a>
    </div>
  </div>
</div>

<div class="container admin-wrap">

  <div class="eyebrow">Sheet 00 — Control panel</div>
  <h1 style="font-family:var(--font-display);font-size:2rem;margin-bottom:36px">Dashboard</h1>

  <div class="admin-stats">
    <div><b><?= $contactCount ?></b><span>Total inquiries</span></div>
    <div><b><?= $projectCount ?></b><span>Projects listed</span></div>
    <div><b><?= date('M Y') ?></b><span>Current period</span></div>
  </div>

  <!-- ============ MESSAGES ============ -->
  <div class="sheet-head">
    <h2>Inquiries</h2>
    <div class="sheet-no">Latest 15<br><b>Newest first</b></div>
  </div>

  <?php if (empty($messages)): ?>
    <p style="color:var(--slate);margin-bottom:60px">No messages yet.</p>
  <?php else: ?>
  <div style="overflow-x:auto;margin-bottom:70px">
    <table class="data-table">
      <thead>
        <tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Received</th><th></th></tr>
      </thead>
      <tbody>
        <?php foreach ($messages as $m): ?>
        <tr>
          <td><?= htmlspecialchars($m['name']) ?></td>
          <td><?= htmlspecialchars($m['email']) ?></td>
          <td><?= htmlspecialchars($m['subject'] ?: '—') ?></td>
          <td style="max-width:280px"><?= htmlspecialchars(mb_strimwidth($m['message'], 0, 120, '…')) ?></td>
          <td><span class="badge"><?= date('d M Y', strtotime($m['created_at'])) ?></span></td>
          <td>
            <form method="POST" action="actions.php" onsubmit="return confirm('Delete this message?')">
              <input type="hidden" name="action" value="delete_contact">
              <input type="hidden" name="id" value="<?= $m['id'] ?>">
              <button type="submit" class="link-danger" style="background:none;border:none;cursor:pointer">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>

  <!-- ============ PROJECTS ============ -->
  <div class="sheet-head">
    <h2>Projects</h2>
    <div class="sheet-no">Manage listing<br><b>Add / remove</b></div>
  </div>

  <div style="overflow-x:auto;margin-bottom:40px">
    <table class="data-table">
      <thead>
        <tr><th>Title</th><th>Technologies</th><th>Added</th><th></th></tr>
      </thead>
      <tbody>
        <?php if (empty($projects)): ?>
          <tr><td colspan="4" style="color:var(--slate)">No projects added yet.</td></tr>
        <?php endif; ?>
        <?php foreach ($projects as $p): ?>
        <tr>
          <td><?= htmlspecialchars($p['title']) ?></td>
          <td><?= htmlspecialchars($p['technologies']) ?></td>
          <td><span class="badge"><?= date('d M Y', strtotime($p['created_at'])) ?></span></td>
          <td>
            <form method="POST" action="actions.php" onsubmit="return confirm('Delete this project?')">
              <input type="hidden" name="action" value="delete_project">
              <input type="hidden" name="id" value="<?= $p['id'] ?>">
              <button type="submit" class="link-danger" style="background:none;border:none;cursor:pointer">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="admin-card" style="max-width:640px;margin:0">
    <h1 style="font-size:1.2rem;text-align:left">Add a project</h1>
    <p class="sub" style="text-align:left;margin-bottom:22px">Appears immediately on the public Projects page.</p>
    <form method="POST" action="actions.php">
      <input type="hidden" name="action" value="add_project">
      <div class="field"><label>Title</label><input type="text" name="title" required></div>
      <div class="field"><label>Description</label><textarea name="description" required></textarea></div>
      <div class="field"><label>Technologies (comma separated)</label><input type="text" name="technologies" placeholder="PHP, MySQL, JS" required></div>
      <div class="form-row">
        <div class="field"><label>GitHub URL</label><input type="url" name="github" placeholder="https://github.com/..."></div>
        <div class="field"><label>Live demo URL</label><input type="url" name="live_demo" placeholder="https://..."></div>
      </div>
      <button type="submit">Add project</button>
    </form>
  </div>

</div>
<?php include '../includes/footer.php'; ?>
