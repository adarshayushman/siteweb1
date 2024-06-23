<?php

require '../database/db.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    #prevent sql injection
    $sql = "SELECT id, password FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        
        
        $stmt->execute();
        $result = $stmt->get_result();

        
        if ($row = $result->fetch_assoc()) {
            
            if (password_verify($password, $row['password'])) {
                
                $_SESSION['user_id'] = $row['id'];

                
                header("location: ../myspace/my_space.php");
                exit;
            } else {
                echo "Wrong password,please try again.";
            }
        } else {
            echo "Couldn't find your account";
        }

        $stmt->close();
    } else {
        
        echo "SQL Error: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Log In - Megajoy</title>
<link href="../style/login.css" rel="stylesheet">
</head>
<body>

<?php require '../header/header1.php'; ?>

<div class="center-container">
<div class="login-container">
    <h2>Log In</h2>
    <form action="login.php" method="post"> 
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Log In</button>
    </form>
    <p class="signup-prompt">Don't have an account? <a href="../signup/signup.php">Sign up</a></p>
</div>
</div>

<?php require '../footer/footer.php'; ?>

</body>
</html>