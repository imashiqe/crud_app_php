<?php
 require_once "../db.php";
 session_start();
  $select = "SELECT * FROM users  WHERE status = 1";   
   $query_data = mysqli_query($db, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <!-- js start -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-1.12.4.min.js"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="../js/main.js"></script>
    <title>users</title>
</head>
<body>

  
    
    
  

</body>
</html>

<?php
 require 'includes/header.php';
 require_once "../db.php";
 $select = "SELECT * FROM users  WHERE status = 1";   



  $query_data = mysqli_query($db, $select);
?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Starlight</a>
        <span class="breadcrumb-item active">All Users</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
     <!-- user delete -->
     <?php
       if(isset( $_SESSION ['delete_user'])) : ?>
           <div class="alert alert-danger">
             <span>
             <?php 
             echo $_SESSION ['delete_user'];
             unset($_SESSION ['delete_user']);
             ?>
             
             </span>
           </div>
       <?php endif
     
     ?>
     <!-- user update -->
     <?php
       if(isset( $_SESSION ['update_user'])) : ?>
           <div class="alert alert-success">
             <span>
             <?php 
             echo $_SESSION ['update_user'];
             unset($_SESSION ['update_user']);
             ?>
             
             </span>
           </div>
       <?php endif ;
     
     ?>

       <table class="table" id="myTable">
  <thead>
    <tr>
      <th>Id</th>
      <th>First Name</th>
      <th>Email </th>
    
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
     <?php
     foreach ($query_data as $key => $value) { ?>
           <tr>
      <th scope="row">1</th>
      <td> <?= $value['name'] ?></td>
      <td><?= $value['email'] ?></td>
   

      <td>
          <a href="../user-edit.php?user_id=<?= $value['id'] ?>" class="btn btn-outline-primary">Edit</a>
          <a href="../user-delete.php?user_id=<?= $value['id'] ?>" class="btn btn-outline-danger">Delete</a>
      </td>
   
    </tr>
    <?php
     }
     ?>
  
    
   
  </tbody>
</table>
      
 
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php
 require 'includes/footer.php';
?>
