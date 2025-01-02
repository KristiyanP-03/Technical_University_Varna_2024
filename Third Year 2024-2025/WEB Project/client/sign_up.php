<?php
    require 'db.php';

    $signup_success = false;
    $error_message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
            $username = $conn->real_escape_string($_POST['username']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $_POST['password'];

            //дублиране на потребител
            $check_sql = "SELECT id FROM users WHERE email = ? OR username = ?";
            $stmt = $conn->prepare($check_sql); // създава се обект от параметри
            $stmt->bind_param("ss", $email, $username); // който се замества в SQL заявката
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error_message = "Username or email is already in use.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); //криптиране на паролата

                //актуализация на БД
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $username, $email, $hashed_password);

                if ($stmt->execute()) {
                    $signup_success = true;
                    $_SESSION['user_id'] = $stmt->insert_id;
                    header("Location: profile.php");
                    exit;
                } else {
                    $error_message = "Error: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="static/css/sign_up.css">
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <a href="home.php">Home</a>
        </div>
    </div>

    <div class="main-content">
        <h2>Sign Up</h2>

        <?php if ($signup_success): ?>
            <p style="color: green;">Sign up successful! Redirecting to your profile...</p>
        <?php elseif ($error_message): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <form action="sign_up.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <button type="submit">Sign Up</button>
        </form>
    </div>

</body>
</html>
