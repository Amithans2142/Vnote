<?php include_once 'header.php' ?>
<?php include_once 'conn.php' ?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vnote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  </head>
   
  <body>
         

  <!-- FORM -->

<div class="container my-4">
    <h2 class="text-center">Add A Note</h2>
    <form action="index.php" method="post">
        <div class="mb-3">
            <label  for="title"  class="form-label">Note Title</label>
            <input required type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label  for="description" class="form-label">Note Description</label>
            <textarea required class="form-control"  id="description" name="description"></textarea>
            
        </div>
        
        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
    </div>



      



       
      
</body>

</html>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include_once 'footer.php' ?>