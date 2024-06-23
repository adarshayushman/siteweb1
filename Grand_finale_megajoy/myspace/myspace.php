<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
    exit;
}

require '../database/db.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name, last_name, email, password, phone_number FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$conn->close();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>My Space</title>
    <link href="../style/style.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="user-form-container">
            <div class="user-info">
                <h2>User Information</h2>
                <p>First Name: <?php echo htmlspecialchars($user['first_name']); ?></p>
                <p>Last Name: <?php echo htmlspecialchars($user['last_name']); ?></p>
                <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <p>Phone Number: <?php echo htmlspecialchars($user['phone_number']); ?></p>
                <p>Password: <?php echo str_repeat('*', strlen($user['password'])); ?></p>
                <button onclick="location.href='../myspace/modify.php'">Edit</button>
                <a href="../myspace/feedback.php">I have some feedback</a>
            </div>  
        </div>
    </main>
    </body>
</html>