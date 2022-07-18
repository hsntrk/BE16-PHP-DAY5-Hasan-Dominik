<?php 
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {  
   $name = $_POST['name'];
   $price = $_POST['price'];
   $uploadError = '';
   //this function exists in the service file upload.
   $picture = file_upload($_FILES['picture']);  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
<div class="container">
           <div class="mt-3 mb-3">
               <h1>Create request response</h1>
           </div>
           <div class="alert alert-<?=$class;?>" role="alert">
               <p></p>
               <p></p>
               <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
           </div>
       </div>

</body>
</html>