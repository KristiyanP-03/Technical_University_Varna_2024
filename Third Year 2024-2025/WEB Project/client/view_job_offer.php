<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'], $_POST['job_id'])) {
    $comment = trim($_POST['comment']);
    $job_id = (int)$_POST['job_id'];
    $user_id = $_SESSION['user_id'];

    if (!empty($comment)) {
        $insert_comment_sql = "INSERT INTO comments (user_id, job_id, comment) VALUES (?, ?, ?)";
        $insert_comment_stmt = $conn->prepare($insert_comment_sql);
        $insert_comment_stmt->bind_param("iis", $user_id, $job_id, $comment);

        if ($insert_comment_stmt->execute()) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            echo "Error posting comment: " . $conn->error;
        }
        $insert_comment_stmt->close();
    } else {
        echo "Comment cannot be empty.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like'], $_POST['job_id'])) {
    $job_id = (int)$_POST['job_id'];
    $user_id = $_SESSION['user_id'];

    $check_like_sql = "SELECT id FROM likes WHERE user_id = ? AND job_id = ?";
    $check_like_stmt = $conn->prepare($check_like_sql);
    $check_like_stmt->bind_param("ii", $user_id, $job_id);
    $check_like_stmt->execute();
    $check_like_stmt->store_result();

    if ($check_like_stmt->num_rows > 0) {
        $delete_like_sql = "DELETE FROM likes WHERE user_id = ? AND job_id = ?";
        $delete_like_stmt = $conn->prepare($delete_like_sql);
        $delete_like_stmt->bind_param("ii", $user_id, $job_id);
        $delete_like_stmt->execute();
        $delete_like_stmt->close();

        $decrement_likes_sql = "UPDATE job_offers SET likes = likes - 1 WHERE id = ?";
        $decrement_likes_stmt = $conn->prepare($decrement_likes_sql);
        $decrement_likes_stmt->bind_param("i", $job_id);
        $decrement_likes_stmt->execute();
        $decrement_likes_stmt->close();
    } else {
        $insert_like_sql = "INSERT INTO likes (user_id, job_id) VALUES (?, ?)";
        $insert_like_stmt = $conn->prepare($insert_like_sql);
        $insert_like_stmt->bind_param("ii", $user_id, $job_id);
        $insert_like_stmt->execute();
        $insert_like_stmt->close();

        $increment_likes_sql = "UPDATE job_offers SET likes = likes + 1 WHERE id = ?";
        $increment_likes_stmt = $conn->prepare($increment_likes_sql);
        $increment_likes_stmt->bind_param("i", $job_id);
        $increment_likes_stmt->execute();
        $increment_likes_stmt->close();
    }

    $check_like_stmt->close();
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}

$job_id = isset($_GET['job_id']) ? (int)$_GET['job_id'] : 0;

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
<html>
<head>
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
        <p><b>Posted By:</b> <?php echo htmlspecialchars($job['username']); ?></p>
        <p><b>Description:</b> <?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
        <p><b>Phone:</b> <?php echo htmlspecialchars($job['phone_number']); ?></p>
        <p><b>Likes:</b> <?php echo htmlspecialchars($job['likes']); ?></p>

        <?php if (!empty($job['images'])): ?>
            <p><b>Images:</b></p>
            <?php $images = explode(',', $job['images']); ?>
            <?php foreach ($images as $image): ?>
                <img src="<?php echo htmlspecialchars($image); ?>" alt="Job Image" class="job-image">
            <?php endforeach; ?>
        <?php endif; ?>

        <p><em>Posted on: <?php echo htmlspecialchars($job['created_at']); ?></em></p>
    </div>

    <?php if ($job['user_id'] != $_SESSION['user_id']): ?>
        <form method="POST">
            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
            <button type="submit" name="like" class="like-btn"><?php echo $liked ? 'Unlike' : 'Like'; ?></button>
        </form>
    <?php endif; ?>

    <div class="comments-section">
        <h3>Comments</h3>

        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p><b><?php echo htmlspecialchars($comment['username']); ?>:</b> 
                    <?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
                    <p><em><?php echo htmlspecialchars($comment['created_at']); ?></em></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No comments yet.</p>
        <?php endif; ?>

        <form method="POST">
            <textarea name="comment" rows="4" placeholder="Write your comment..." required></textarea>
            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
            <button type="submit">Post Comment</button>
        </form>
    </div>
</div>

</body>
</html>
