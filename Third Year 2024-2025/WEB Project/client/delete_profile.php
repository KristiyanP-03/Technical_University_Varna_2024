<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sql_delete_offers = "DELETE FROM job_offers WHERE user_id = ?";
$stmt_offers = $conn->prepare($sql_delete_offers);
$stmt_offers->bind_param("i", $user_id);

if ($stmt_offers->execute()) {
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
