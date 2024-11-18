<?php
// job_details.php
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
    
    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database_name');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM jobs WHERE job_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
        echo "<h1>" . htmlspecialchars($job['title']) . "</h1>";
        echo "<p>" . htmlspecialchars($job['description']) . "</p>";
    } else {
        echo "Job not found.";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "No job ID provided.";
}
?>
