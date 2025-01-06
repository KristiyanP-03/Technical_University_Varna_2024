<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Step 1: Delete likes associated with the user's job offers
$sql_delete_likes_offers = "DELETE FROM likes WHERE job_id IN (SELECT id FROM job_offers WHERE user_id = ?)";
$stmt_likes_offers = $conn->prepare($sql_delete_likes_offers);
$stmt_likes_offers->bind_param("i", $user_id);
$stmt_likes_offers->execute();
$stmt_likes_offers->close();

// Step 2: Delete likes made by the user
$sql_delete_likes_user = "DELETE FROM likes WHERE user_id = ?";
$stmt_likes_user = $conn->prepare($sql_delete_likes_user);
$stmt_likes_user->bind_param("i", $user_id);
$stmt_likes_user->execute();
$stmt_likes_user->close();

// Step 3: Delete comments associated with the user's job offers
$sql_delete_comments_offers = "DELETE FROM comments WHERE job_id IN (SELECT id FROM job_offers WHERE user_id = ?)";
$stmt_comments_offers = $conn->prepare($sql_delete_comments_offers);
$stmt_comments_offers->bind_param("i", $user_id);
$stmt_comments_offers->execute();
$stmt_comments_offers->close();

// Step 4: Delete comments made by the user
$sql_delete_comments_user = "DELETE FROM comments WHERE user_id = ?";
$stmt_comments_user = $conn->prepare($sql_delete_comments_user);
$stmt_comments_user->bind_param("i", $user_id);
$stmt_comments_user->execute();
$stmt_comments_user->close();

// Step 5: Delete messages where the user is the sender
$sql_delete_messages_sender = "DELETE FROM messages WHERE sender_id = ?";
$stmt_messages_sender = $conn->prepare($sql_delete_messages_sender);
$stmt_messages_sender->bind_param("i", $user_id);
$stmt_messages_sender->execute();
$stmt_messages_sender->close();

// Step 6: Delete messages where the user is the receiver
$sql_delete_messages_receiver = "DELETE FROM messages WHERE receiver_id = ?";
$stmt_messages_receiver = $conn->prepare($sql_delete_messages_receiver);
$stmt_messages_receiver->bind_param("i", $user_id);
$stmt_messages_receiver->execute();
$stmt_messages_receiver->close();

// Step 7: Delete the user's job offers
$sql_delete_offers = "DELETE FROM job_offers WHERE user_id = ?";
$stmt_offers = $conn->prepare($sql_delete_offers);
$stmt_offers->bind_param("i", $user_id);
$stmt_offers->execute();
$stmt_offers->close();

// Step 8: Delete the user record
$sql_delete_user = "DELETE FROM users WHERE id = ?";
$stmt_user = $conn->prepare($sql_delete_user);
$stmt_user->bind_param("i", $user_id);

if ($stmt_user->execute()) {
    // Successfully deleted, end the session and redirect
    session_destroy();
    header("Location: home.php?message=Profile Deleted");
    exit;
} else {
    echo "Error deleting profile: " . $stmt_user->error;
}

$stmt_user->close();
$conn->close();
?>
