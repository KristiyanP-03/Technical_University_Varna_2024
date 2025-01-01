<?php
session_start();
require 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch all users except the logged-in user
$sql_users = "SELECT id, username FROM users WHERE id != ?";
$stmt = $conn->prepare($sql_users);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$users_result = $stmt->get_result();
$users = $users_result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Fetch messages if a specific user is selected
$selected_user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : null;
$messages = [];

if ($selected_user_id) {
    $sql_messages = "
        SELECT 
            messages.message, messages.created_at, 
            sender.username AS sender_username, 
            receiver.username AS receiver_username
        FROM messages
        JOIN users AS sender ON messages.sender_id = sender.id
        JOIN users AS receiver ON messages.receiver_id = receiver.id
        WHERE 
            (messages.sender_id = ? AND messages.receiver_id = ?)
            OR (messages.sender_id = ? AND messages.receiver_id = ?)
        ORDER BY messages.created_at ASC
    ";
    $stmt = $conn->prepare($sql_messages);
    $stmt->bind_param("iiii", $user_id, $selected_user_id, $selected_user_id, $user_id);
    $stmt->execute();
    $messages_result = $stmt->get_result();
    $messages = $messages_result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}

// Handle sending a message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'], $_POST['receiver_id'])) {
    $message = trim($_POST['message']);
    $receiver_id = (int)$_POST['receiver_id'];

    if (!empty($message)) {
        $sql_send = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql_send);
        $stmt->bind_param("iis", $user_id, $receiver_id, $message);
        if ($stmt->execute()) {
            header("Location: chat.php?user_id=" . $receiver_id);
            exit;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="static/css/chat.css">
</head>
<body>

<div class="navbar">
    <div class="nav-left">
        <a href="home.php">Home</a>
    </div>
    <div class="nav-right">
        <a href="profile.php">Profile</a>
        <a href="log_out.php">Log Out</a>
    </div>
</div>

<div class="chat-container">
    <div class="users-list">
        <h3>Users</h3>
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <a href="chat.php?user_id=<?php echo $user['id']; ?>">
                        <?php echo htmlspecialchars($user['username']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="chat-box">
        <?php if ($selected_user_id): ?>
            <h3>Chat with <?php 
                $selected_user = array_filter($users, fn($u) => $u['id'] === $selected_user_id);
                echo htmlspecialchars($selected_user[array_key_first($selected_user)]['username']);
            ?></h3>
            <div class="messages">
                <?php foreach ($messages as $msg): ?>
                    <div class="<?php echo $msg['sender_username'] === $_SESSION['username'] ? 'message-sent' : 'message-received'; ?>">
                        <p><strong><?php echo htmlspecialchars($msg['sender_username']); ?>:</strong> <?php echo htmlspecialchars($msg['message']); ?></p>
                        <small><?php echo htmlspecialchars($msg['created_at']); ?></small>
                    </div>
                <?php endforeach; ?>
            </div>
            <form method="POST">
                <textarea name="message" rows="3" placeholder="Type your message here..." required></textarea>
                <input type="hidden" name="receiver_id" value="<?php echo $selected_user_id; ?>">
                <button type="submit">Send</button>
            </form>
        <?php else: ?>
            <p>Select a user to start chatting.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
