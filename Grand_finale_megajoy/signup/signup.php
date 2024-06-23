<?php
require '../database/db.php';

session_start();
$errors = array();
$registrationSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $phoneNumber = trim($_POST['phoneNumber']);

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($phoneNumber)) {
        array_push($errors, "Please fill in all the required information.");
    }

    if ($password !== $confirmPassword) {
        array_push($errors, "The two passwords you entered did not match.");
    }

    if (strlen($password) < 8 || !preg_match("#[0-9]+#", $password) || !preg_match("#[0-9]+#", $phoneNumber)) {
        array_push($errors, "The phone number must include 10 digits");
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        array_push($errors, "This email has been signed up");
    }
    $stmt->close();

    if (count($errors) == 0) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (first_name, last_name, email, password, phone_number) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssss", $firstName, $lastName, $email, $passwordHash, $phoneNumber);

            if ($stmt->execute()) {
                $registrationSuccess = true;
            } else {
                array_push($errors, "Failed please try again later.");
            }
            $stmt->close();
        } else {
            array_push($errors, "SQL error: " . $conn->error);
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Définition de l'encodage du document -->
        <meta charset="UTF-8">
        <!-- Titre de la page -->
        <title>Sign up Page</title>
        <!-- Liaison vers la feuille de style CSS externe -->
        <link href="../style/style.css" rel="stylesheet">
    </head>

	<body>

		<?php require '../header/header1.php'; ?>

		<div class="container">
			<div class="signup-container">
				<form class="signup-form" action="signup.php" method="post">
					<h2>Sign up </h2>

					<label for="firstName">First Name :</label>
					<input type="text" id="firstName" name="firstName" required>

					<label for="lastName">Family Name :</label>
					<input type="text" id="lastName" name="lastName" required>

					<label for="email">Email :</label>
					<input type="email" id="email" name="email" required>

					<label for="password">Password (at least 8 characters including capitals, lowercases and numbers) :</label>
					<input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" required>
					<small>The password must contain at least 8 characters, including a lowercase letter, an uppercase letter and a number.</small>

					<label for="confirmPassword">Confirm your password :</label>
					<input type="password" id="confirmPassword" name="confirmPassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" required>

					<label for="phoneNumber">Phone number :</label>
					<input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required>
					<small>Enter a validate number phone (with 10 numbers).</small>

					<button type="submit">Submit</button>
				</form>
			</div>
		</div>

		<?php require '../footer/footer.php'; ?>

         <script>
        window.onload = function() {
            if (<?php echo json_encode($registrationSuccess); ?>) {
                alert("You have signed up successfully");
                window.location.href = '../login/login.php';
            }
        };
    </script>
	</body>
</html>