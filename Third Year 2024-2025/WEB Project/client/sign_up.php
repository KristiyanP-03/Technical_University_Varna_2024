<?php
    require 'db.php'; // Include the database connection file

    $signup_success = false;
    $error_message = ''; // Variable to store error messages

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if required fields are set
        if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
            // Get form input values and escape them to prevent SQL injection
            $username = $conn->real_escape_string($_POST['username']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $_POST['password'];

            // Check if username or email already exists in the database
            $check_sql = "SELECT id FROM users WHERE email = ? OR username = ?";
            $stmt = $conn->prepare($check_sql);
            $stmt->bind_param("ss", $email, $username);
            $stmt->execute();
            $result = $stmt->get_result();

            // If username or email already exists, show an error
            if ($result->num_rows > 0) {
                $error_message = "Username or email is already in use.";
            } else {
                // Hash the password before storing it in the database
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user data into the database
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $username, $email, $hashed_password);

                // Execute the query and check for success
                if ($stmt->execute()) {
                    $signup_success = true;
                    // Optionally, auto-login the user after successful signup
                    $_SESSION['user_id'] = $stmt->insert_id; // Store the user ID in session
                    header("Location: profile.php"); // Redirect to the profile page
                    exit;
                } else {
                    $error_message = "Error: " . $stmt->error; // Show error message
                }
            }
            $stmt->close(); // Close the prepared statement
        }
    }

    // Close the database connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <!-- Display success or error message -->
        <?php if ($signup_success): ?>
            <p style="color: green;">Sign up successful! Redirecting to your profile...</p>
        <?php elseif ($error_message): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <!-- Sign up form -->
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
