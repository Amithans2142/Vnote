<?php
$showAlert= false;
$showError= false;
$servername= "localhost";
$username= "root";
$password= "";
$database="users";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die ("Failed to connect:". mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $existSql="SELECT * FROM `usert` WHERE `username`='$username'";
    $result= mysqli_query($conn,$existSql);
    $numExistRows= mysqli_num_rows($result);
    if ($numExistRows>0){
        $showError="Username Already Exists";
    }else {

        if (($password==$cpassword) ){
        $sql="INSERT INTO `userst` (`username`, `password`, `date`) VALUES ('$username', '$password', '2023-03-11 09:18:35.000000');";
        $result= mysqli_query($conn, $sql);
        if ($result){
            $showAlert=true;
        
        } 
        }
        else {
           $showError="Passwords do not match";
        }
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
          <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Vnote</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
               
            </div>
        </nav>

        <?php
if ($showAlert){

  echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong></strong> Account has been created.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if ($showError){

    echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

?>


        <h1 class="text-center">SignUp</h1>


   <div class="container">
        <form action="signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input required type="text" class="form-control" id="username" name="username" >
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input required type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input required type="password" class="form-control" id="cpassword" name="cpassword">
  </div>
  
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
</div>
</body>



</html>
<?php include_once 'footer.php' ?>
