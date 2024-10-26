<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}
// Determine the current page
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Panel</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Header adjustments */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px; /* Increase padding for more space */
            background-color: cyan;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 100px; /* Increased height for the header */
            z-index: 1000;
        }

        .header h1 {
            color: black;
            margin: 0;
            font-size: 38px; /* Larger font for the title */
        }

        .user-info {
            color: black;
            font-size: 30px; /* Larger font for user info */
        }

        /* Content adjustments */
       /* Center the content using flexbox */
.content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: calc(100vh - 140px); /* Adjust height according to the header */
    margin-left: 250px; /* To account for the sidebar */
    margin-top: 60px; /* Override the earlier margin-top */
    padding: 20px;
}

.welcome-message {
    text-align: center; /* Center the text */
    background-color: #007bff; /* Background color for the message box */
    color: white;
    padding: 30px 50px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8); /* Add a shadow for a 3D effect */
    max-width: 600px;
    width: 100%;
}

.welcome-message h2 {
    font-size: 36px; /* Increase the font size */
    margin-bottom: 10px;
}

.welcome-message p {
    font-size: 18px;
    margin: 0;
}

        

        /* Sidebar adjustments */
        aside {
            width: 250px;
            height: calc(100% - 100px); /* Adjust height to fill the space below the header */
            position: fixed;
            top: 100px; /* Position below the larger fixed header */
            left: 0;
            background-color: #212529;
            padding: 20px;
            z-index: 100;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        aside .menu {
            flex-grow: 1;
        }

        aside .btn {
            width: 100%;
            text-align: left;
            padding: 10px;
            background-color: #007bff; /* Blue buttons */
            color: white;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        aside .btn:hover {
            background-color: #0056b3;
        }

        .logout-btn .btn {
            background-color: red; /* Red logout button */
        }

        .logout-btn .btn:hover {
            background-color: #d9534f;
        }
    </style>
</head>

<body>
<header class="header">
        <h1><b>Teacher Dashboard</b></h1>
        <div class="user-info">
            <?php echo "User logged in as: " . $_SESSION['username']; ?>
        </div>
    </header>

    <aside>
    <div class="menu">
        <a href="update2.php" class="btn">Update Details</a>
        <a href="add_material1.php" class="btn">Add Materials</a>
        <a href="view_material1.php" class="btn">View materials</a>
    </div>
    <div class="logout-btn">
            <a href="logout.php" class="btn">Logout</a>
    </div>
    </aside>

    <div class="content">
    <?php if ($current_page === 'teacherhome.php') : ?>
        <div class="welcome-message special-admin-home">
            <h2>Welcome to the Teacher Dashboard</h2>
        </div>
    <?php endif; ?>
    </div>
</body>
</html>