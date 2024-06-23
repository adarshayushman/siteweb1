<?php
session_start();

// access right management
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
    exit;
}

require '../database/db.php';
$user_id = $_SESSION['user_id'];
$updateSuccess = false;
$errors = array();


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $sql = "SELECT first_name, last_name, email, phone_number FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
} else {
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];

    

    // update
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET first_name=?, last_name=?, email=?, password=?, phone_number=? WHERE id=?";
        $updatePassword = true;
    } else {
        $sql = "UPDATE users SET first_name=?, last_name=?, email=?, phone_number=? WHERE id=?";
        $updatePassword = false;
    }
    $stmt = $conn->prepare($sql);
    if ($updatePassword) {
        $stmt->bind_param("sssssi", $firstName, $lastName, $email, $passwordHash, $phoneNumber, $user_id);
    } else {
        $stmt->bind_param("ssssi", $firstName, $lastName, $email, $phoneNumber, $user_id);
    }

    if ($stmt->execute()) {
        $updateSuccess = true;
    } else {
        array_push($errors, "Failed to update. Please try again later.");
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMy Space</title>
    <link href="../style/style.css" rel="stylesheet">
</head>

<body>

    <?php require '../header/header1.php'; ?>

    <main>
        <form action="modify.php" method="post">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="phoneNumber">Phone number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo htmlspecialchars($user['phone_number']); ?>" required>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password">

            <button type="submit">Save</button>
        </form>
    </main>

        <?php require '../footer/footer.php'; ?>

       <script>
        window.onload = function() {
            if (<?php echo json_encode($updateSuccess); ?>) {
                alert("Profile updated successfully.");
                window.location.href = '../myspace/my_space.php';
            }
        };
        </script>
    </body>
</html>
