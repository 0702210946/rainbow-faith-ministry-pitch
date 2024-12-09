<!-- login.php -->
<?php
session_start();

// Assume a database connection $conn
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['loggedin'] = true;
    $_SESSION['role'] = $user['role'];

    switch ($user['role']) {
        case 'Admin':
            header('Location: admin_dashboard.php');
            break;
        case 'SermonUploader':
            header('Location: upload_sermons.php');
            break;
        case 'MessageResponder':
            header('Location: manage_messages.php');
            break;
    }
} else {
    echo 'Invalid credentials. Please try again.';
}
?>
