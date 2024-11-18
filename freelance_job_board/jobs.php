<?php
// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'database_name');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch 5 available jobs
$sql = "SELECT job_id, title, description FROM jobs WHERE status = 'open' LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Jobs</title>
    <link rel="stylesheet" href="assets/style.css">
    <!-- jobs.php -->
<h2><a href="job_details.php?job_id=<?php echo $row['job_id']; ?>">
    <?php echo htmlspecialchars($row['title']); ?>
</a></h2>

</head>
<body>
<div class="job-list">
    <h1>Available Jobs</h1>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="job">
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <form action="apply.php" method="POST">
                    <input type="hidden" name="job_id" value="<?php echo $row['job_id']; ?>">
                    <button type="submit">Apply</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No jobs are currently available.</p>
    <?php endif; ?>
</div>
</body>
</html>

<?php $conn->close(); ?>
