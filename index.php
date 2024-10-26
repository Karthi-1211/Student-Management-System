
<?php

    error_reporting(0);
    session_start();
    session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
        
    alert('$message');
    
    </script>";
}
?>
<?php

session_start();
$host="localhost";

error_reporting(0);

$user="root";

$password="";

$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error");
}
$sql= "select * from teacher";
$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>STUDENT MANAGEMENT SYSTEM</title>
        <link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
    .admission_form {
      width: 500px;
      margin: 0 auto;
      border: 1px solid #ccc;
      padding: 20px;
    }

    .adm_int {
      margin-bottom: 15px;
    }

    .label_text {
      display: block;
      font-weight: bold;
      text-align:center;
    }

    .btn-primary,.input_deg,.input_txt{
      width: 100%;
      padding: 10px 5px;;
      border: 1px solid #ccc;
      border-radius: 5px;
      
    }
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  /* background:url(../image/T1.jpg); */

  background-image: url(../image/T1.jpg);
}

header {
  background-color: #f2f2f2;
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header h1 {
  font-size: 24px;
  margin: 0;
}

header nav a {
  text-decoration: none;
  color: #000;
  margin-left: 20px;
}

main {
  padding: 20px;
}

section {
  margin-bottom: 20px;
}

section h3 {
  font-size: 20px;
  margin-bottom: 10px;
}

ul {
  list-style: none;
  padding: 0;
}

li {
  margin-bottom: 5px;
}

footer {
  text-align:right;
  margin-top: 20px; /* Adds space above the footer */
  padding: 10px; /* Adds padding inside the footer */
  background-color: black; /* Sets the background color to black */
  color: white; /* Sets the text color to white */
  width: 100%; /* Ensures the footer spans the entire width of the page */
  position: relative; /* Ensures correct positioning in case of conflict */
}

footer p {
  margin: 0; /* Removes any default margin on the paragraph */
}


table {
border: 1px solid #ccc;
}
.bottomrow,.topblock,.adm{
   background-image: linear-gradient(to right, #FCF3CF 0%, #F7DC6F 50%, #F8C471 100%);
   }

        .lastrow{
          background-image: linear-gradient(to right, #FCF3CF 0%, #FCF3CF 50%, #FAD7A0 100%);
        }

        .head{
          background-image: linear-gradient(to right, #A4F88D 0%, #85DE6E 50%, #3EB51E 100%);
          display:inline-block;
          }
          .tb{
            border-color:black;
            /* width:5px; */

          }
          .main{
            background-image: url('../image/wa.jpg');
          }
  </style>

    </head>
    <body>
        
        <nav>
            <label class="logo">Anits College</label>
            <ul>
                <li><a href="">Home </a></li>
                <li><a href="#co">Contact </a></li>
                <li><a href="#ad">Admission</a></li>
                <li><a href="login.php" class="btn btn-success">Login</a></li>
            </ul>
        </nav>

        <div class="main">

        <div class="section1">
            <label class="img_text">We Teach Students With Care</label>
            <img  class = "main_img" src="school_management.jpg">

        </div>

        <div class="container">
            <div class="row topblock">
                <div class="col-md-4">
                    <img class="welcome_img" src="image/bac_t2.jpg">
                </div>

                <div class="col-md-8">
                    <h1>welcome to <span style="color:green;font-style:bold; font-weight:bolder;">A</span>nits college</h1>
                    <p>Nestled within the heart of our vibrant community, 
                        XYZ School stands as a beacon of academic excellence and personal growth. 
                        Our school, guided by a steadfast commitment to nurturing young minds, 
                        is dedicated to fostering an environment where students thrive intellectually, socially, and emotionally. 
                        Our dynamic curriculum, crafted to inspire curiosity and critical thinking, 
                        prepares students for the challenges of an ever-evolving world. 
                        With a team of dedicated educators who bring a wealth of knowledge and passion to the classroom, 
                        our students benefit from a rich tapestry of learning experiences</p>
                </div>

            </div>

        </div>
        <br><br><br>
        <center>
            <h1 class="head">
                &nbsp Our Lectureres &nbsp
            </h1>
        </center>
        
        <div class="container bottomrow">
            <div class="row">
                <?php
                while($info=$result->fetch_assoc())
                {
                ?>
                <div class="col-md-4">
                    <img class="teacher" src="<?php echo "{$info['image']}"?>">
                    <!-- <p></p> -->
                    <h3><?php echo "{$info['name']}"?></h3>
                    <h5><?php echo "Experience:{$info['experience']}"?></h5>
                    <h5><?php echo "Highest Education:{$info['highest_education']}"?></h5>
                </div>
                <?php
                   }
                ?>
            </div>
        </div>
        <br><br><br>
        <center>
            <h1 class="head" style="margin: top 50px;">
             &nbsp   Current top material &nbsp
            </h1>
        </center>
        <div class="container lastrow">
            <?php 

$sqlHighestLikes = "SELECT * FROM `material` ORDER BY Likes DESC LIMIT 5";
$resultHighestLikes = mysqli_query($data, $sqlHighestLikes);

if (!$resultHighestLikes) {
    die("Error fetching material with highest likes: " . mysqli_error($data));
}

// $row = mysqli_fetch_assoc($resultHighestLikes);
?>
   <table class="table tb" border="2">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">owner</th>
                    <!-- <th scope="col">Availability</th> -->
                    <th scope="col">Year</th>
                    <th scope="col">Likes</th>
                    <!-- <th scope="col">Add a like</th> -->
                    <th scope="col">Go to pdf</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($resultHighestLikes)) {
                ?>
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["owner"]; ?></td>
                        <!-- <td><?php echo $row["avail"]; ?></td> -->
                        <td><?php echo $row["year"]; ?></td>
                        <td><?php echo $row["Likes"]; ?></td>
                        <td>
                            <?php
                            if (($row['avail'] == "NO" && $row['year'] == $row1['Year']) || $row['avail'] == "YES") {
                                $nam = $row['name'];
                                $yea = $row['year'];
                                echo "<a href='{$row['file']}' target='_blank'>$nam </a>";
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
        <br><br><br>


        <center  id="ad">
            <h1 class="adm head" style="margin_top:20px;">&nbsp Admission Form &nbsp</h1>
        </center>

        
        <div align="center" class="admission_form adm">
        <form action="datacheck.php" method="POST" >
<div class="form-group">
    <label for="exampleInputEmail1">Roll No</label>
    <input type="text" class="form-control" name="rollno" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Roll No" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Course</label>
    <input type="text" class="form-control" name="course" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter course" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">phone</label>
    <input type="tel" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone" required>
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Additional details</label>
    <br>
    <!-- <input type="textarea" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
    <textarea id="w3review" name="message" rows="4" cols="60">
</textarea>
  </div>
  <button type="submit" name="apply" class="btn btn-primary">Submit</button>
</form>
            </form>
        </div>

        </div>
        <main>
    <section id="co">
      <ul>
        <li><b>Email:</b> bk@Technologics.in</li>
        <li><b>Phone:</b>9999999999</li>
        <li><b>Email:</b> Technicagroup@bk</li>
        <li><b>Helpdesk:</b> 08855-251245</li>
      </ul>
    </section>
    </main>

  <footer>
    <p>&copy; Copyright © 2021 - 2025 BK TECHNOLOGICS - All Rights Reserved. Made by BK TECHNOLOGICS-Web Team </p>
  </footer>
    </body>
</html>
