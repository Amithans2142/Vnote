<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vnote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  </head>
   
<?php include_once 'header.php' ?>
<?php include_once 'conn.php' ?>

<!-- Tables  -->
<div class="container my-4">
    
     <table class="table" id="myTable">
         <thead>
             <tr>
                 <th scope="col">Sno</th>
                 <th scope="col">Title</th>
                 <th scope="col">Description</th>
                 <!-- <th scope="col">Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
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
     $sql=    "SELECT * FROM `notest`"; 
     $result = mysqli_query ($conn,$sql);
     $sno=0;
     while ($row=mysqli_fetch_assoc($result)){
        $sno = $sno +1;
         echo "<tr>
         <th scope='row'>".$sno."</th>
         <td>".$row['title']."</td>
         <td>".$row['description']."</td>
         
         
        
         </tr>";
         
         
         
         
        }
        
        ?>
    
    
</tbody> 
</table>
</div>

<hr>
<?php include_once 'footer.php' ?>