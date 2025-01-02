<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $images = $conn->real_escape_string($_POST['images']);
    $user_id = $_SESSION['user_id'];
    $likes = 0;
    $comments = '';

    $sql = "INSERT INTO job_offers (user_id, title, description, phone_number, images, likes, comments)
            VALUES ('$user_id', '$title', '$description', '$phone_number', '$images', '$likes', '$comments')";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Job Offer</title>
    <link rel="stylesheet" href="static/css/create_job_offer.css">
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

    <div class="main-content">
        <h2>Create Job Offer</h2>

        <form action="create_job_offer.php" method="POST">
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title" required><br><br>

            <label for="description">Job Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea><br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required><br><br>

            <label for="images">Job Images (URLs, comma separated):</label>
            <input type="text" id="images" name="images" placeholder="e.g. http://image1.jpg, http://image2.jpg"><br><br>

            <button type="submit">Submit Job Offer</button>
        </form>
    </div>

</body>
</html>
