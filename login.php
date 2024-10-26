<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .page {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: calc(100% - 16px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .form-group button {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="page">
    <form action="login_check.php" method="POST">
        <h2>USER LOGIN</h2>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="username" autocomplete="off" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" id="pass" name="password" placeholder="Enter password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </div>
    </form>
    
    <?php
    session_start();
    if (isset($_SESSION['warning'])) {
        echo '<div class="error-message">' . $_SESSION['warning'] . '</div>';
        // Clear the session warning after displaying it
        unset($_SESSION['warning']);
    }
    ?>
</div>
</body>
</html>
