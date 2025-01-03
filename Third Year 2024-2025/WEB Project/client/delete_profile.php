<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Изтриване на лайкове по id
$sql_delete_likes = "DELETE FROM likes WHERE user_id = ?";
$stmt_likes = $conn->prepare($sql_delete_likes);
$stmt_likes->bind_param("i", $user_id);
$stmt_likes->execute();
$stmt_likes->close();

// Изтриване на съобщения по id
$sql_delete_comments = "DELETE FROM comments WHERE user_id = ?";
$stmt_comments = $conn->prepare($sql_delete_comments);
$stmt_comments->bind_param("i", $user_id);
$stmt_comments->execute();
$stmt_comments->close();

// Изтриване на публикации по id
$sql_delete_offers = "DELETE FROM job_offers WHERE user_id = ?";
$stmt_offers = $conn->prepare($sql_delete_offers);
$stmt_offers->bind_param("i", $user_id);

if ($stmt_offers->execute()) {
    // Изтриване на потребител по id
    $sql_delete_user = "DELETE FROM users WHERE id = ?";
    $stmt_user = $conn->prepare($sql_delete_user);
    $stmt_user->bind_param("i", $user_id);

    if ($stmt_user->execute()) {
        session_destroy();
        header("Location: home.php?message=Profile Deleted");
        exit;
    } else {
        echo "Error deleting profile: " . $stmt_user->error;
    }
} else {
    echo "Error deleting job offers: " . $stmt_offers->error;
}

$stmt_offers->close();
$stmt_user->close();
$conn->close();
?>
