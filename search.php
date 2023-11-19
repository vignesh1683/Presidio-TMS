<?php
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>search</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Teacher Management System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="btn btn-primary nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="text-center fw-bolder fs-1 text-uppercase">Search</h1><br>
    <div class="container my-5">
        <form method="post">
            <input type="text" placeholder="search" name="search">
            <button class="ctn btn-dark btn-sm" name="submit">Search</button>
        </form>
        <div class="continer">
            <table class="table">
                <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    $sql="select * from `home` where id like '%$search%' or name like '%$search%' or Gender like '%$search%' or email like '%$search%' or phone like '%$search%'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        if(mysqli_num_rows($result)>0){
                            echo'    <thead>
                            <tr>
                              <th>ID</th>
                              <th>NAME</th>
                              <th>AGE</th>
                              <th>DATE OF BITRH</th>
                              <th>GENDER</th>
                              <th>No. of Class</th>
                              <th>EMAIL</th>
                              <th>PHONE</th>
                              <th>JOINING DATE</th>
                            </tr>
                          </thead>';
                          while($row=mysqli_fetch_assoc($result)){
                          echo '<thead>
                          <tr>
                          <td>'.$row["id"].'</td>
                          <td>'.$row["name"].'</td>
                          <td>'.$row["age"].'</td>
                          <td>'.$row["dob"].'</td>
                          <td>'.$row["Gender"].'</td>
                          <td>'.$row["classes"].'</td>
                          <td>'.$row["email"].'</td>
                          <td>'.$row["phone"].'</td>
                          <td>'.$row["join_date"].'</td>
                          </tr></thead>';
                        }}
                        else{
                            echo '<h2 class=text-danger>Data not found</h2>';
                        }
                    }
                }
                ?>    
            </table>
        </div>
    </div>
</body>
</html>