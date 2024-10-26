<?php
include("adminhome.php");
?>
<?php
// session_start();
if (isset($_SESSION['username'])) {
    echo "User is logged in: " . $_SESSION['username'];
} else {
    echo "User is not logged in.";
    header("location:login.php");
}
?>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        html, body {
            height: 100%; /* Ensure the body takes full height */
            margin: 0; /* Remove default margin */
            display: flex; /* Use flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: flex-start; /* Align at the top */
            width:100%;
        }

        .con {
            max-width: 1200px;
            margin: 20px auto; /* Center the container */
            padding: 20px;
            background-color: #fff; /* White background for the content area */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 170px; /* Reduce top margin to move it upwards */
            margin-right:200px;
            display: flex; /* Use flexbox for centering */
            flex-direction: column; /* Align items vertically */
            align-items: center; /* Center items horizontally */
        }

        h1 {
            color: #343a40;
            text-align: center;
        }

        table {
            width: 100%; /* Make the table full width */
            max-width: 1000px; /* Optional: Set a maximum width for the table */
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: #fff;
            font-size: 18px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        img.teacher {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
        }

        a.delete-link {
            color: #dc3545;
            text-decoration: none;
            cursor: pointer;
        }

        a.delete-link:hover {
            text-decoration: underline;
        }

        .delete-button {
            background-color: #dc3545;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="con">
        <h1>Teacher Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Highest Education</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"><?php echo $row["id"]; ?></th>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["highest_education"]; ?></td>
                    <td><?php echo $row["experience"]; ?></td>
                    <td><img class="teacher" src="<?php echo $row['image']; ?>"></td>
                    <td>
                        <button class='delete-button' onclick="javascript:return confirm('Are you sure you want to delete this?');" href='delete1.php?student_id=<?php echo $row["id"]; ?>'>Delete</button>
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
