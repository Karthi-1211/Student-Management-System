<?php
include("adminhome.php");

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}

if (isset($_GET['student_id'])) {
    $job_id = $_GET['student_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $companyName = mysqli_real_escape_string($data, $_POST['company_name']);
        $role = mysqli_real_escape_string($data, $_POST['role']);
        $cgpa = mysqli_real_escape_string($data, $_POST['cgpa']);
        $skillsReq = mysqli_real_escape_string($data, $_POST['skills_req']);
        $backlogMin = mysqli_real_escape_string($data, $_POST['backlog_min']);
        $platformRatingMin = mysqli_real_escape_string($data, $_POST['platform_rating_min']);
        $companyUrl = mysqli_real_escape_string($data, $_POST['company_url']);

        $update_sql = "UPDATE interview_details SET 
                        Company_name='$companyName', 
                        Role='$role', 
                        CGPA='$cgpa', 
                        Skills_req='$skillsReq', 
                        backlog_min='$backlogMin', 
                        Platform_rating_min='$platformRatingMin', 
                        company_link='$companyUrl' 
                        WHERE id='$job_id'";
        $update_result = mysqli_query($data, $update_sql);

        if ($update_result) {
            header("location:admin_view_teacher.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($data);
        }
    }

    // Fetch existing job details
    $fetch_sql = "SELECT * FROM interview_details WHERE id='$job_id'";
    $fetch_result = mysqli_query($data, $fetch_sql);

    if ($fetch_result && mysqli_num_rows($fetch_result) > 0) {
        $row = mysqli_fetch_assoc($fetch_result);
        $existing_companyName = $row['Company_name'];
        $existing_role = $row['Role'];
        $existing_cgpa = $row['CGPA'];
        $existing_skillsReq = $row['Skills_req'];
        $existing_backlogMin = $row['backlog_min'];
        $existing_platformRatingMin = $row['Platform_rating_min'];
        $existing_companyUrl = $row['company_link'];
    } else {
        echo "Error fetching record: " . mysqli_error($data);
    }
}

mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Job Details</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="content">
        <h1>Update Job Details</h1>
        <div>
            <form action="update3.php?student_id=<?php echo $job_id; ?>" method="POST">
                <div class="one">
                    <label for="company_name">Company Name:</label>
                    <input type="text" name="company_name" value="<?php echo $existing_companyName; ?>" required>
                </div>
                <div class="one">
                    <label for="role">Role:</label>
                    <input type="text" name="role" value="<?php echo $existing_role; ?>" required>
                </div>
                <div class="one">
                    <label for="cgpa">CGPA:</label>
                    <input type="number" name="cgpa" min="0" step="0.01" value="<?php echo $existing_cgpa; ?>" required>
                </div>
                <div class="one">
                    <label for="skills_req">Skills Required:</label>
                    <input type="text" name="skills_req" value="<?php echo $existing_skillsReq; ?>" required>
                </div>
                <div class="one">
                    <label for="backlog_min">Minimum Backlog:</label>
                    <input type="number" name="backlog_min" min="0" value="<?php echo $existing_backlogMin; ?>" required>
                </div>
                <div class="one">
                    <label for="platform_rating_min">Minimum Platform Rating:</label>
                    <input type="text" name="platform_rating_min" min="0" max="10" step="0.1" value="<?php echo $existing_platformRatingMin; ?>" required>
                </div>
                <div class="one">
                    <label for="company_url">Company URL:</label>
                    <input type="url" name="company_url" value="<?php echo $existing_companyUrl; ?>" required>
                </div>
                <button type="submit" name="apply">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
