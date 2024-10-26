<?php
include("studenthome.php");
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}
$sql = "SELECT id, Company_name, Role FROM interview_details";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title> 
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="content">
        <h1>Job Listings</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Job Name</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["Role"]; ?></td>
                    <td><?php echo $row["Company_name"]; ?></td>
                    <td>
      <?php 
      echo "<a onclick=\"javascript:return confirm('Are you sure you wana update this');\" href='apply.php?job_id={$row["id"]}'>View</a>";
        ?>
      </td>
     
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
