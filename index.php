<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>this is php testing code</h1>

<div class="container">
<form method="post" Action="">
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Name</label>
    <input type="text" name="uname" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


 <?php

//  all detials for server connection 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $db_name = "php_test_db";

//  connection started here 

$con = mysqli_connect ($servername,$username,$password,$db_name);

if(!$con){
    die("connection failed : ". mysqli_connect_error());
}
echo "connected successfully" . "<br> ";

$uname = isset($_POST["uname"]) ? $_POST["uname"] : '';
$uemail = isset($_POST["email"]) ? $_POST["email"] : '';
$upwd = isset($_POST["pwd"]) ? $_POST["pwd"] : '';


echo $uname . " " . $uemail ." ".$upwd;
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $uname = $_POST["uname"];
    $uemail = $_POST["email"];
    $upwd = $_POST["pwd"];

    // Sanitize input data to prevent SQL injection
    $uname = mysqli_real_escape_string($con, $uname);
    $uemail = mysqli_real_escape_string($con, $uemail);
    $upwd = mysqli_real_escape_string($con, $upwd);

    // Hash the password (for security purposes)
    $hashed_pwd = password_hash($upwd, PASSWORD_DEFAULT);

    // SQL query to insert data into the table
    $sql = "INSERT INTO users (name, email, password) VALUES ('$uname', '$uemail', '$hashed_pwd')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
 
session_start();
$_SESSION["username"] = $uname;
$_SESSION["email"] = $uemail;


?>

<form method="post" action="page1.php">
<input type="submit" value="submit to second page">

</form>
    </div> 

    <h1>this is the wrong message </h1>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
</body>
</html>