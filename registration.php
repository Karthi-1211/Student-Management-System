<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"], input[type="password"], input[type="email"], input[type="tel"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <form action="process_registration.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="cgpa">CGPA:</label>
        <input type="text" id="year" name="year" required><br>
        <label for="year">Year:</label>
        <input type="text" id="cgpa" name="cgpa" required><br>
        <label for="backlogs">Backlogs:</label>
        <input type="text" id="backlogs" name="backlogs" required><br>
        <label for="skills">Skills:</label>
        <input type="text" id="skills" name="skills" required><br>
        <label for="leetcode_profile">Leetcode Profile:</label>
        <input type="text" id="leetcode_profile" name="leetcode_profile" required><br>
        <label for="codechef_profile">Codechef Profile:</label>
        <input type="text" id="codechef_profile" name="codechef_profile" required><br>
        <input type="submit" value="Register">
    </form>
    <h3>
        <?php
        error_reporting(0);
        session_start();
        session_destroy();
        echo $_SESSION['warning'];
        ?>
        </h3>
</div>

</body>
</html>