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
    <title>filter</title>
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
    <div class="container my-5">
        <h1 class="text-center fw-bolder fs-1 text-uppercase">Filter Results</h1><br>
        <form action="" method="GET">
            <div class="row">
                <div class=col-md-4>
                <select name="age" class="form-select">
                <option value="">Select</option>
                <option value="ageasc"<?=isset($_GET['age']) == true ? ($_GET['age']=='ageasc' ? 'selected':''):''?>>AGE ASCENDING</option>
                <option value="agedesc"<?=isset($_GET['age']) == true ? ($_GET['age']=='agedesc' ? 'selected':''):''?>>AGE DECENDING</option>
                <option value="age20"<?=isset($_GET['age']) == true ? ($_GET['age']=='age20' ? 'selected':''):''?>>AGE 20-30</option>
                <option value="age30"<?=isset($_GET['age']) == true ? ($_GET['age']=='age30' ? 'selected':''):''?>>AGE 30-40</option>
                <option value="age40"<?=isset($_GET['age']) == true ? ($_GET['age']=='age40' ? 'selected':''):''?>>AGE 40-50</option>
                <option value="classasc"<?=isset($_GET['age']) == true ? ($_GET['age']=='classasc' ? 'selected':''):''?>>NO. OF CLASSES ASCENDING</option>
                <option value="classdesc"<?=isset($_GET['age']) == true ? ($_GET['age']=='classdesc' ? 'selected':''):''?>>NO. OF CLASSES DECENDING</option>
                </select>
                </div>
                <div class=col-md-4>
                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                <a href="home.php" class="btn btn-primary">Reset</a>
                </div>
        </form>
        <div class="continer">
            <table class="table">
                <?php
if (isset($_GET['age'])) {
    if ($_GET['age'] == 'ageasc') {
        $sql = "SELECT * FROM `home` ORDER BY age ASC";
    } elseif ($_GET['age'] == 'agedesc') {
        $sql = "SELECT * FROM `home` ORDER BY age DESC";
    }  elseif ($_GET['age'] == 'age20') {
        $sql = "SELECT * FROM `home` WHERE age BETWEEN 20 AND 30";
    } elseif ($_GET['age'] == 'age30') {
        $sql = "SELECT * FROM `home`WHERE age BETWEEN 31 AND 40";
    }  elseif ($_GET['age'] == 'age40') {
        $sql = "SELECT * FROM `home` WHERE age BETWEEN 41 AND 50";
    } elseif ($_GET['age'] == 'classdesc') {
        $sql = "SELECT * FROM `home` ORDER BY classes DESC";
    } elseif ($_GET['age'] == 'classasc') {
        $sql = "SELECT * FROM `home` ORDER BY classes ASC";
    }
    $result = mysqli_query($conn, $sql);
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
                ?>    
            </table>
        </div>
                
    </div>

</body>
</html>