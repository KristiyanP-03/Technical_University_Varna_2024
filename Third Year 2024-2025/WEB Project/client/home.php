<?php
session_start();
require 'db.php';

$is_logged_in = isset($_SESSION['user_id']);

$sql = "SELECT job_offers.id, job_offers.title, job_offers.description, job_offers.likes, job_offers.created_at, users.username 
        FROM job_offers
        JOIN users ON job_offers.user_id = users.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jobs.bg</title>
    <link rel="stylesheet" href="static/css/home.css">
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <a href="home.php">Home</a>
        </div>
        <div class="nav-right">
            <?php if ($is_logged_in): ?>
                <a href="profile.php">Profile</a>
                <a href="chat.php">Chat</a>
                <a href="log_out.php">Log Out</a>
                <a href="create_job_offer.php">Create Job Offer</a>
            <?php else: ?>
                <a href="log_in.php">Log In</a>
                <a href="sign_up.php">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="main-content">
        <h2>Welcome to Jobs.bg</h2>
        <p>Your one-stop platform for job opportunities!</p>


        <?php if ($result->num_rows > 0): ?>
            <h3>Available Job Offers</h3>
            <div class="job-offers-list">

                <!-- Всички обяви да бъдат изредени една след една -->
                <?php while($job = $result->fetch_assoc()): ?>
                    <div class="job-offer">
                        <h4><a href="view_job_offer.php?job_id=<?php echo $job['id']; ?>"><?php echo htmlspecialchars($job['title']); ?></a></h4>
                        <p><b>Posted by:</b> <?php echo htmlspecialchars($job['username']); ?></p>
                        <p><b>Description:</b> <?php echo htmlspecialchars(substr($job['description'], 0, 100)) . '...'; ?></p>
                        <p><b>Likes:</b> <?php echo $job['likes']; ?></p>
                        <p>Posted on: <?php echo htmlspecialchars($job['created_at']); ?></p>
                    </div>
                <?php endwhile; ?>

            </div>
        <?php else: ?>
            <p>No job offers available at the moment.</p>
        <?php endif; ?>
    </div>

</body>
</html>


<?php
$conn->close();
?>
