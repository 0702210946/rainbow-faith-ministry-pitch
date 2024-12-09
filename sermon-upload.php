<!-- upload_sermons.php -->
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'SermonUploader') {
    header('Location: login.html');
    exit();
}
?>

<h1>Upload Sermons</h1>
<form action="upload_sermon.php" method="post" enctype="multipart/form-data">
    <label for="sermon_title">Sermon Title:</label>
    <input type="text" id="sermon_title" name="sermon_title" required>
    <br>
    <label for="sermon_file">Upload Sermon:</label>
    <input type="file" id="sermon_file" name="sermon_file" required>
    <br>
    <input type="submit" value="Upload">
</form>
