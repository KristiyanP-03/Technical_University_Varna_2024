<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT username, email, img_url, bio FROM users WHERE id = ?";
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

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="static/css/profile.css">
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
        <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h2>
        <p><b>Email:</b> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><b>Bio:</b> <?php echo htmlspecialchars($user['bio'] ?? 'No bio provided.'); ?></p>

        <?php if (!empty($user['img_url'])): ?>
            <img src="<?php echo htmlspecialchars($user['img_url']); ?>" alt="Profile Picture" class="profile-img">
        <?php else: ?>
            <p>No profile picture uploaded.</p>
        <?php endif; ?>

        <a href="edit_profile.php" class="edit-profile-btn">Edit Profile</a>

        <form action="delete_profile.php" method="POST" class="delete-profile-form">
            <button type="submit" class="delete-profile-btn">Delete Profile</button>
        </form>
    </div>
</body>
</html>
