<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Fetch user_id from the database based on the username
    $query = "SELECT id FROM user WHERE username='$username'";
    $result_user_id = mysqli_query($data, $query);
    if ($result_user_id && mysqli_num_rows($result_user_id) > 0) {
        $row = mysqli_fetch_assoc($result_user_id);
        $user_id = $row['id'];
    } else {
        echo "<p class='error-message'>Error: User not found.</p>";
    }
} else {
    echo "<p class='error-message'>You need to login to apply.</p>";
}

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    $sql = "SELECT * FROM interview_details WHERE id='$job_id'";
    $result = mysqli_query($data, $sql);

    if (!$result) {
        echo "Error fetching records: " . mysqli_error($data);
    }
}

if (isset($_POST['apply'])) {
    if (isset($user_id)) {
        $job_id = $_POST['job_id'];
        
        $sql_insert_applied = "INSERT INTO applied (user_id, company_id) VALUES ('$user_id', '$job_id')";
        $result_insert_applied = mysqli_query($data, $sql_insert_applied);
        
        if ($result_insert_applied) {
            echo "<p class='success-message'>Applied successfully!</p>";
        } else {
            echo "<p class='error-message'>Error applying to the job: " . mysqli_error($data) . "</p>";
        }
    } else {
        echo "<p class='error-message'>You need to login to apply.</p>";
    }
}
if (isset($_POST['apply1'])) {
    if (isset($user_id)) {
        $job_id = $_POST['job_id'];
        
        $sql_insert_applied = "INSERT INTO matched (user_id, company_id) VALUES ('$user_id', '$job_id')";
        $result_insert_applied = mysqli_query($data, $sql_insert_applied);
        
        if ($result_insert_applied) {
            echo "<p class='success-message'>Applied successfully!</p>";
        } else {
            echo "<p class='error-message'>Error applying to the job: " . mysqli_error($data) . "</p>";
        }
    } else {
        echo "<p class='error-message'>You need to login to apply.</p>";
    }
}
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
                
                // Check if user has already applied for this job
                if (isset($user_id)) {
                    $sql_check_applied = "SELECT * FROM applied WHERE user_id='$user_id' AND company_id='$job_id'";
                    $result_check_applied = mysqli_query($data, $sql_check_applied);
                    if ($result_check_applied && mysqli_num_rows($result_check_applied) > 0) {
                        echo "<p class='error-message'>You have already applied for this job.</p>";
                    } else {
                        echo "<form action='' method='POST'>";
                        echo "<input type='hidden' name='job_id' value='{$row['id']}'>"; 
                        echo "<button type='submit' name='apply' class='btn btn-primary'>Apply</button>";
                        echo "</form>";
                    }
                   
                } else {
                    echo "<p class='error-message'>You need to login to apply.</p>";
                }
                
                echo "</div>";
            }
        } else {
            echo "<p class='error-message'>No interview details found for this student.</p>";
        }
        ?>
    </div>
</body>
</html>