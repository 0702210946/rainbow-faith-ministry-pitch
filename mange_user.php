<!-- manage_users.php -->
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'Admin') {
    header('Location: login.html');
    exit();
}
?>

<h1>Manage Users</h1>
<form action="create_user.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="role">Role:</label>
    <select id="role" name="role">
        <option value="Admin">Admin</option>
        <option value="SermonUploader">Sermon Uploader</option>
        <option value="MessageResponder">Message Responder</option>
    </select>
    <br>
    <input type="submit" value="Create User">
</form>
