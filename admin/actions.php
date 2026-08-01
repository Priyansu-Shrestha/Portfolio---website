<?php
require 'includes/auth_check.php';
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: dashboard.php');
    exit;
}

$action = $_POST['action'] ?? '';

switch ($action) {

    case 'delete_contact':
        $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
        $stmt->execute([':id' => (int) $_POST['id']]);
        break;

    case 'delete_project':
        $stmt = $pdo->prepare("DELETE FROM projects WHERE id = :id");
        $stmt->execute([':id' => (int) $_POST['id']]);
        break;

    case 'add_project':
        $stmt = $pdo->prepare(
            "INSERT INTO projects (title, description, technologies, github, live_demo)
             VALUES (:title, :description, :technologies, :github, :live_demo)"
        );
        $stmt->execute([
            ':title'        => trim($_POST['title'] ?? ''),
            ':description'  => trim($_POST['description'] ?? ''),
            ':technologies' => trim($_POST['technologies'] ?? ''),
            ':github'       => trim($_POST['github'] ?? ''),
            ':live_demo'    => trim($_POST['live_demo'] ?? ''),
        ]);
        break;
}

header('Location: dashboard.php');
exit;
