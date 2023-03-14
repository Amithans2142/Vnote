<?php include_once 'header.php' ?>
<?php include_once 'conn.php' ?>
<?php
session_start();
if (!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true) {
  header("location:login.php");
  exit;
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vnote-<?php $_SESSION['username']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  </head>
<div class="container my-4">
    
     <table class="table" id="myTable">
         <thead>
             <tr>
                 <th scope="col">Sno</th>
                 <th scope="col">Title</th>
                 <th scope="col">Description</th>
                 <th scope="col">Actions</th>
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
         <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-danger' id=d".$row['sno'].">Delete</button> 
         
         
        
         </tr>";
         
         
         
         
        }
        
        ?>
    
    
</tbody> 
</table>
</div>

<hr>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit This Note</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php" method="post">
      <div class="modal-body">
        <input type="hidden" name="snoEdit" id="snoEdit">
        <div class="mb-3">
            <label for="name" class="form-label">Note Title</label>
            <input type="text" name="titleEdit" class="form-control" id="titleEdit" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="Note" class="form-label">Note Description</label>
            <textarea class="form-control"  id="descriptionEdit" name="descriptionEdit"></textarea>
            
        </div>
        
       
    </div>
    <div class="modal-footer d-block mr-auto">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
    </div>
  </div>
</div>

<script>
            edits = document.getElementsByClassName('edit');
            Array.from(edits).forEach((element)=>{
                element.addEventListener("click",(e)=>{
                    console.log("edit",e);
                    tr = e.target.parentNode.parentNode;
                    title=tr.getElementsByTagName("td")[0].innerText;
                    description=tr.getElementsByTagName("td")[1].innerText;
                    console.log(title,description);
                    titleEdit.value= title;
                    descriptionEdit.value=description;
                    snoEdit.value=e.target.id;
                    $('#editModal').modal('toggle');
        

                })
            })
            deletes = document.getElementsByClassName('delete');
            Array.from(deletes).forEach((element)=>{
                element.addEventListener("click",(e)=>{
                    console.log("delete",e);
                    sno= e.target.id.substr(1,);
                    if (confirm('Are you sure you want to delete this note!')){
                        console.log("yes");
                        window.location=`/vnote/edit.php?delete=${sno}`;
                    }else {
                        console.log("no");
                    }

                })
            })
        </script>

<?php include_once 'footer.php' ?>
