<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "User is not logged in.";
    header("location: login.php");
    exit();
}
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "SELECT * FROM `user` WHERE username='" . $_SESSION['username'] . "'";
$result1 = mysqli_query($data, $sql1);

if (!$result1) {
    die("Error fetching user information: " . mysqli_error($data));
}

$row1 = $result1->fetch_assoc();

$sql = "SELECT * FROM `material` where year='1'";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("Error fetching material information: " . mysqli_error($data));
}

if (isset($_POST['like'])) {
    $materialId = $_POST['material_id'];
    $checkLikeSQL = "SELECT * FROM `likes` WHERE user_id = {$row1['id']} AND material_id = $materialId";
    $checkLikeResult = mysqli_query($data, $checkLikeSQL);

    if (!$checkLikeResult) {
        die("Error checking likes: " . mysqli_error($data));
    }

    if (mysqli_num_rows($checkLikeResult) == 0) {
        $updateLikesSQL = "UPDATE `material` SET Likes = Likes + 1 WHERE id = $materialId";
        $updateLikesResult = mysqli_query($data, $updateLikesSQL);

        if (!$updateLikesResult) {
            die("Error updating Likes count: " . mysqli_error($data));
        }

        // Record the like in the database
        $recordLikeSQL = "INSERT INTO `likes` (user_id, material_id) VALUES ({$row1['id']}, $materialId)";
        $recordLikeResult = mysqli_query($data, $recordLikeSQL);

        if (!$recordLikeResult) {
            die("Error recording like: " . mysqli_error($data));
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        .teacher {
            width: 100px;
        }

        .main {
            display: flex;
        }

        .main1 {
            width: 25%;
        }

        table {
            border: 1px solid black;
        }

        th {
            padding: 20px;
            font-size: 20px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light gray background */
        }

        .content {
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px; /* Limit content width */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40; /* Dark gray text color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff; /* White background for table */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6; /* Light border between rows */
        }

        th {
            background-color: #e9ecef; /* Light gray background for table header */
            font-weight: bold;
            color: #495057; /* Dark gray text color */
        }

        td {
            color: #495057; /* Dark gray text color */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff; /* White text color */
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="content">
        <h1>Materials details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">owner</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Year</th>
                    <th scope="col">Likes</th>
                    <th scope="col">Add a like</th>
                    <th scope="col">Go to pdf</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["owner"]; ?></td>
                        <td><?php echo $row["avail"]; ?></td>
                        <td><?php echo $row["year"]; ?></td>
                        <td><?php echo $row["Likes"]; ?></td>
                        <td>
                            <?php
                            if (isset($_SESSION['username']) && (($row['avail'] == "NO" && $row['year'] == $row1['Year']) || $row['avail'] == "YES")) {
                                $materialId = $row['id'];
                                echo "<form method='post'>
                                            <input type='hidden' name='material_id' value='$materialId'>
                                            <button type='submit' name='like' class='btn btn-primary'>Add Like</button>
                                          </form>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (($row['avail'] == "NO" && $row['year'] == $row1['Year']) || $row['avail'] == "YES") {
                                $nam = $row['name'];
                                echo "<a href='{$row['file']}' target='_blank'>$nam</a>";
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
