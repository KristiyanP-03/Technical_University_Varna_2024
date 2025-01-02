<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit;
}

$user_id = $_SESSION['user_id'];

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    
    $img_url = $user['img_url'];
    if (!empty($_POST['img_url'])) {
        $img_url = $_POST['img_url'];
    }

    $sql_update = "UPDATE users SET username = ?, email = ?, bio = ?, img_url = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssssi", $username, $email, $bio, $img_url, $user_id);
    
    if ($stmt_update->execute()) {
        header("Location: profile.php");
        exit;
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
