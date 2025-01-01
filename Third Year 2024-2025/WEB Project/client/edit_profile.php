<?php
session_start();
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch the current user's data
$sql = "SELECT username, email, bio, img_url FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Error: User not found.";
    exit;
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    
    // Handle image URL if provided
    $img_url = $user['img_url']; // Default to existing image if not changed
    if (!empty($_POST['img_url'])) {
        $img_url = $_POST['img_url']; // Use the new image URL provided by the user
    }

    // Update user profile details in the database
    $sql_update = "UPDATE users SET username = ?, email = ?, bio = ?, img_url = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssssi", $username, $email, $bio, $img_url, $user_id);
    
    if ($stmt_update->execute()) {
        // Redirect immediately after successful update to avoid any output before header
        header("Location: profile.php");
        exit; // Make sure to call exit after header to stop further execution
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    $stmt_update->close();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="static/css/edit_profile.css">
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <a href="home.php">Home</a>
        </div>
        <div class="nav-right">
            <a href="logout.php">Log Out</a>
        </div>
    </div>

    <div class="profile-content">
        <h2>Edit Profile</h2>
        
        <form action="edit_profile.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio"><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea><br><br>

            <label for="img_url">Profile Picture (URL):</label>
            <input type="text" id="img_url" name="img_url" value="<?php echo htmlspecialchars($user['img_url'] ?? ''); ?>"><br><br>

            <button type="submit">Update Profile</button>
        </form>
    </div>

</body>
</html>
