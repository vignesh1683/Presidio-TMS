<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Teacher Management System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="row">
            <div class="col-md-4">
              <a type="button" class="btn btn-primary nav-link active" href="create.php">Add</a>
            </div>
            <div class="col-md-4">
              <a type="button" class="btn btn-primary nav-link active" href="search.php">Search</a>
            </div>
            <div class="col-md-4">
              <a type="button" class="btn btn-primary nav-link active" href="filter.php">Filter</a>
            </div>
          </div>
        </div>
        <form method="post">
              <input class="btn btn-primary nav-link active" type="submit" name="calculate" value="Average">
            </form>
      </div>
    </nav>
    <div class="container my-4">
    <table class="table">
    <thead>
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
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "select * from home";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[id]</th>
        <td>$row[name]</td>
        <td>$row[age]</td>
        <td>$row[dob]</td>
        <td>$row[Gender]</td>
        <td>$row[classes]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[join_date]</td>
        <td>
                  <a class='btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
                  <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a>
                </td>
      </tr>
      ";
        }
        if (isset($_POST['calculate'])) {
        $sql = "SELECT AVG(classes) as average FROM home";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $average = $row["average"];

            echo "<script>alert('The average value is: $average');</script>";
        } else {
            echo "<script>alert('No data available');</script>";
        }}
      ?>
    </tbody>
  </table>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>