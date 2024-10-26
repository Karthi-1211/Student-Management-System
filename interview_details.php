<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}

// Check if student_id is set in the URL
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Fetch interview details for the specified student_id
    $sql = "SELECT * FROM interview_details WHERE id='$student_id'";
    $result = mysqli_query($data, $sql);

    if (!$result) {
        echo "Error fetching records: " . mysqli_error($data);
    }
}

mysqli_close($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Details</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .interview-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        .interview-item h2 {
            margin-top: 0;
            font-size: 24px;
            color: #007bff;
        }
        .interview-item p {
            margin: 5px 0;
        }
        .error-message {
            color: red;
            font-style: italic;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Interview Details</h1>
        <?php
        if (isset($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='interview-item'>";
                echo "<h2>ID: {$row['id']}</h2>";
                echo "<p><strong>Company Name:</strong> {$row['Company_name']}</p>";
                echo "<p><strong>Role:</strong> {$row['Role']}</p>";
                echo "<p><strong>CGPA:</strong> {$row['CGPA']}</p>";
                echo "<p><strong>Skills Required:</strong> {$row['Skills_req']}</p>";
                echo "<p><strong>Backlog Min:</strong> {$row['backlog_min']}</p>";
                echo "<p><strong>Platform Rating Min:</strong> {$row['Platform_rating_min']}</p>";
                echo "<p><strong>Company Link:</strong> {$row['company_link']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p class='error-message'>No interview details found for this student.</p>";
        }
        ?>
    </div>
</body>
</html>
