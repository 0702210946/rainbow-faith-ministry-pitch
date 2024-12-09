<!-- admin_dashboard.php -->
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'Admin') {
    header('Location: login.html');
    exit();
}
?>

<h1>Admin Dashboard</h1>
<p>Manage users, content, and settings here.</p>
