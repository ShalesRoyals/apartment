<?php
  include_once "includes/session.php"
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <!--- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/site.css" />

    <title>Residents - <?php echo 'Success'?> </title>
  </head>
 
<style>
body {
	background-image: url("houses/bg1.jpg");
        background-repeat:no-repeat;
       background-size:cover;
} 

</style>

  
  <body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Royals Housing</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
          <li><a href="viewresidents.php">View Residents</a></li>
          <li  class="active"><a href="editresident.php">View</a></li>
        </ul>
      </li>
    <ul class="nav navbar-nav navbar-right">
    <?php 
              if(!isset($_SESSION['userid'])){
          ?>
      <li><a class="nav-item nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
          <?php } else { ?></a></li>
      <li> <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
          <?php } ?></li>
    </ul>
  </div>
  </nav>
  
<div class="container">
<?php 
        require_once 'db/conn.php';
        require_once 'sendemail.php';
    
            //Get values from post operation
            if(isset($_POST['submit'])){        //extract values from the $_POST array<?php
                $id = $_POST['id'];
                $fname = $_POST['firstname'];
                $lname = $_POST['lastname'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $members = $_POST['members'];
                $contact = $_POST['phone'];

            $result = $crud->editResidents($id,$fname,$lname,$email,$gender,$members,$contact,$address);
            $addressName= $crud->getAddressById($address);
            if($result){
                header("Location: viewresidents.php");
            }else{
                //echo 'error';
                include 'includes/errormessage.php';

            }
        }else{
            //echo 'error';
            include 'includes/errormessage.php';
        }
?>
  
           