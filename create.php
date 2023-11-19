<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $Gender = $_POST['Gender'];
        $classes = $_POST['classes'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $q = " INSERT INTO `home`(`name`, `age`, `dob`, `Gender`, `classes`, `email`, `phone`) VALUES ( '$name', '$age', '$dob', '$Gender', '$classes', '$email', '$phone' )";

        $query = mysqli_query($conn,$q);
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Add</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Teacher Management System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-primary">
 <h1 class="text-white text-center">  Create New Member </h1>
 </div><br>

 <label> NAME: </label>
 <input type="text" name="name" class="form-control"> <br>

 <label> AGE: </label>
 <input type="int" name="age" class="form-control"> <br>

 <label> DATE OF BIRTH: </label>
 <input type="int" placeholder="YYYY-MM-DD" name="dob" class="form-control"> <br>

 <label> GENDER: </label>
 <input type="text" name="Gender" class="form-control"> <br>

 <label> No.of classes: </label>
 <input type="int" name="classes" class="form-control"> <br>

 <label> EMAIL: </label>
 <input type="text" name="email" class="form-control"> <br>

 <label> PHONE: </label>
 <input type="text" name="phone" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="home.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>