<?php require_once 'components/boot.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style type= "text/css">
           fieldset {
               margin: auto;
               margin-top: 100px;
               width: 60% ;
           }  
           .img-thumbnail{
               width: 70px !important;
               height: 70px !important;
           }    
       </style>

</head>
<body>
<fieldset>
           <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='' alt=""></legend>
           <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
               <table class="table">
                   <tr>
                       <th>Name</th>
                       <td><input class="form-control" type="text"  name="name" placeholder ="Product Name" value=""  /></td>
                   </tr>
                   <tr>
                       <th>Price</th>
                       <td><input class="form-control" type= "number" name="price" step="any"  placeholder="Price" value ="" /></td>
                   </tr>
                   <tr>
                       <th>Picture</th>
                       <td><input class="form-control" type="file" name= "picture" /></td>
                   </tr>
                   <tr>
                       <input type= "hidden" name= "id" value= "" />

                        <input type= "hidden" name= "picture" value= "" />
                       <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                       <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                   </tr>
               </table>
           </form>
       </fieldset>
</body>
</html>