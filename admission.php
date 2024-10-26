<?php
include("adminhome.php");
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
$sql = "SELECT * FROM admission";
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
}

body {
    display: flex;
    flex-direction: column; /* Stack header and content vertically */
    background-color: #f8f9fa; /* Background color */
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px; /* Space in the header */
    background-color: cyan; /* Header color */
    position: fixed; /* Keep header fixed */
    top: 0; /* Align to top */
    left: 0;
    right: 0;
    height: 100px; /* Header height */
    z-index: 1000; /* Ensure it's above other content */
}

.balu {
    max-width: 600px; /* Reduce width of the container */
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-left: 550px; /* Center and move down below the header */
    margin-bottom:200px;
}

h1 {
    color: #343a40;
    text-align: center;
    margin-bottom: 20px;
}

table {
    margin: 0 auto; /* Center the table */
    width: 80%; /* Reduce the table width */
    border-collapse: collapse;
    border: 1px solid #dee2e6;
  
}

th, td {
    padding: 8px 12px; /* Decrease padding to make the table smaller */
    text-align: center;
    font-size: 14px; /* Reduce font size for a smaller table */
    border: 1px solid #dee2e6;
}

th {
    background-color: #343a40;
    color: #fff;
    font-size: 16px; /* Smaller font size */
}

tr:nth-child(even) {
    background-color: #f8f9fa;
}

tr:hover {
    background-color: #e9ecef;
}

.action-buttons {
    display: flex;
    justify-content: space-evenly;
}

.action-buttons input[type="submit"] {
    padding: 5px 10px; /* Smaller buttons */
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.action-buttons input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="balu">
        <h1>Student Data</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Roll No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Approval</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    if ($row['response'] == 1) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row["id"]; ?></th>
                            <td><?php echo $row["Roll"]; ?></td>
                            <td><?php echo $row["Name"]; ?></td>
                            <td><?php echo $row["Course"]; ?></td>
                            <td>
                                <form method="post" class="action-buttons">
                                    <input type="submit" name="allow" value="Allow" />
                                    <input type="submit" name="deny" value="Deny" />
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

                <?php
                if (isset($_POST['allow'])) {
                    echo "This is Button1 that is selected";
                }
                if (isset($_POST['deny'])) {
                    $response = "UPDATE admission SET response = 0 WHERE id = ?";
                    $stmt = mysqli_prepare($data, $response);
                    mysqli_stmt_bind_param($stmt, "i", $_POST['deny']);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>