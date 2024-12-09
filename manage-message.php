<!-- manage_messages.php -->
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'MessageResponder') {
    header('Location: login.html');
    exit();
}
?>

<h1>Manage Messages</h1>
<p>View and reply to user messages here.</p>
