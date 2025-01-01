<?php
session_start();
require 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit;
}

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'], $_POST['job_id'])) {
    $comment = trim($_POST['comment']);
    $job_id = (int)$_POST['job_id'];
    $user_id = $_SESSION['user_id'];

    if (!empty($comment)) {
        // Insert the new comment into the database
        $insert_comment_sql = "INSERT INTO comments (user_id, job_id, comment) VALUES (?, ?, ?)";
        $insert_comment_stmt = $conn->prepare($insert_comment_sql);
        $insert_comment_stmt->bind_param("iis", $user_id, $job_id, $comment);

        // Execute the query and check if it's successful
        if ($insert_comment_stmt->execute()) {
            // After inserting the comment, refresh the page to display the new comment
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            echo "Error posting comment: " . $conn->error;  // Output any database errors
        }
        $insert_comment_stmt->close();
    } else {
        echo "Comment cannot be empty.";
    }
}

// Get the job offer ID from the URL
$job_id = isset($_GET['job_id']) ? (int)$_GET['job_id'] : 0;

// Fetch the job offer details
$sql = "SELECT job_offers.id, job_offers.title, job_offers.description, job_offers.phone_number, 
               job_offers.likes, job_offers.images, job_offers.created_at, 
               users.username, job_offers.user_id
        FROM job_offers
        JOIN users ON job_offers.user_id = users.id
        WHERE job_offers.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Job offer not found.";
    exit;
}

$job = $result->fetch_assoc();
$stmt->close();

// Fetch comments for the job offer
$comments_sql = "SELECT comments.id, comments.comment, comments.created_at, users.username 
                 FROM comments
                 JOIN users ON comments.user_id = users.id
                 WHERE comments.job_id = ?
                 ORDER BY comments.created_at DESC";
$stmt = $conn->prepare($comments_sql);
$stmt->bind_param("i", $job_id);
$stmt->execute();
$comments_result = $stmt->get_result();
$comments = $comments_result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Check if the user has already liked this job offer
$user_id = $_SESSION['user_id'];
$liked = false;
$check_like_sql = "SELECT id FROM likes WHERE user_id = ? AND job_id = ?";
$check_like_stmt = $conn->prepare($check_like_sql);
$check_like_stmt->bind_param("ii", $user_id, $job_id);
$check_like_stmt->execute();
$check_like_stmt->store_result();
if ($check_like_stmt->num_rows > 0) {
    $liked = true;
}
$check_like_stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Job Offer</title>
    <link rel="stylesheet" href="static/css/view_job_offer.css">
</head>
<body>

<div class="navbar">
    <div class="nav-left">
        <a href="home.php">Home</a>
    </div>
    <div class="nav-right">
        <a href="log_out.php">Log Out</a>
    </div>
</div>

<div class="main-content">
    <h2>Job Offer: <?php echo htmlspecialchars($job['title']); ?></h2>

    <div class="job-details">
        <p><strong>Posted By:</strong> <?php echo htmlspecialchars($job['username']); ?></p>
        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($job['phone_number']); ?></p>
        <p><strong>Likes:</strong> <?php echo htmlspecialchars($job['likes']); ?></p>

        <?php if (!empty($job['images'])): ?>
            <p><strong>Images:</strong></p>
            <?php $images = explode(',', $job['images']); ?>
            <?php foreach ($images as $image): ?>
                <img src="<?php echo htmlspecialchars($image); ?>" alt="Job Image" class="job-image">
            <?php endforeach; ?>
        <?php endif; ?>

        <p><em>Posted on: <?php echo htmlspecialchars($job['created_at']); ?></em></p>
    </div>

    <!-- Like/Unlike Button -->
    <?php if ($job['user_id'] != $_SESSION['user_id']): ?>
        <form method="POST">
            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
            <button type="submit" name="like" class="like-btn"><?php echo $liked ? 'Unlike' : 'Like'; ?></button>
        </form>
    <?php endif; ?>

    <!-- Comment Section -->
    <div class="comments-section">
        <h3>Comments</h3>

        <!-- Display existing comments -->
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p><strong><?php echo htmlspecialchars($comment['username']); ?>:</strong> 
                    <?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
                    <p><em><?php echo htmlspecialchars($comment['created_at']); ?></em></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No comments yet.</p>
        <?php endif; ?>

        <!-- Add a new comment form -->
        <form method="POST">
            <textarea name="comment" rows="4" placeholder="Write your comment..." required></textarea>
            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
            <button type="submit">Post Comment</button>
        </form>
    </div>
</div>

</body>
</html>
