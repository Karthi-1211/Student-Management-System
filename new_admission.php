<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "User is logged in: " . $_SESSION['username'];

} else {
    echo "User is not logged in.";
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="datacheck.php">
<div class="form-group">
    <label for="exampleInputEmail1">Roll No</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Roll No">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="Name"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Course</label>
    <input type="text" class="form-control" name="course" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter course">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">phone</label>
    <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone">
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Additional details</label>
    <br>
    <!-- <input type="textarea" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
    <textarea id="w3review" name="message" rows="4" cols="50">
</textarea>
  </div>
  <button type="submit" name="apply" class="btn btn-primary">Submit</button>
</form>
</body>
</html>