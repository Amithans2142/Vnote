<?php include_once 'header.php' ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vnote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  </head>


<!-- Connect to the database -->
<?php
$insert=false;
$update=false;
$delete=false;
$servername="localhost";
$username="root";
$password="";
$database="notes";

$conn= mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die ("Failed to connect:". mysqli_connect_error());
     
}
else{
 
}
   if(isset($_GET['delete'])){
    $sno=$_GET['delete'];
   $delete=true;
   $sql="DELETE FROM `notest` WHERE `sno`=$sno";
   $result =mysqli_query($conn,$sql);
   }
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['snoEdit'])){
        // Update the record
        $sno=$_POST["snoEdit"];
        $title= $_POST['titleEdit'];
        $description=$_POST['descriptionEdit'];
        $sql = "UPDATE `notest` SET `title` = '$title', `description`='$description' WHERE `notest`.`sno` = $sno";
        $result = mysqli_query($conn,$sql);
        if ($result){
            $update=true;
        }
        
    } else {
    $title= $_POST['title'];
    $description=$_POST['description'];
    $sql = "INSERT INTO `notest` ( `title`, `description`) VALUES ( '$title', '$description')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
       $insert=true;
    }
    else {
        echo "failed:". mysqli_error($conn);
    }
}
}
?>





<?php
if ($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been saved.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
?>
<?php
if ($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
?>
<?php
if ($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
?>





        <?php include_once 'footer.php' ?>
