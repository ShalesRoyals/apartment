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
          <li  class="active"><a href="edit.php">View</a></li>
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
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 


    $results = $crud->getAddresses();

    if(!isset($_GET['id']))
    {
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewresidents.php");
    }
    else{
        $id = $_GET['id'];
        $resident = $crud->getResidentDetails($id);
    
    
?>

       
    <h1 class="text-center">Edit Record </h1>
    <div class = "jumbotron">

        <form method="post" action="editresident.php">
        <input type="hidden" name="id" value="<?php echo $resident['resident_id'] ?>" />    
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">First Name</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $resident['firstname'] ?>" id="firstname" name="firstname">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Last Name</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $resident['lastname'] ?>" id="lastname" name="lastname">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input type="email" class="form-control" value="<?php echo $resident['emailaddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Gender</span>
                </div>
             <select class="form-control" value="<?php echo $resident['gender'] ?>" id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
             </select>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address</span>
                </div>
                <select class="form-control" id="address" name="address">
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                        <option value= "<?php echo $r['address_id']?>"<?php if($r['address_id'] == $resident['address_id']) echo 'selected' ?>>
                        <?php echo $r['name']; ?>
                        </option>
                   <?php } ?>
                </select>
            </div><br>
           
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Number of Household Members</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $resident['members'] ?>" id="members" name="members">
            </div><br>
            <div class="input-group">
            <div class="input-group-prepend">
                    <span class="input-group-text">Contact Number</span>
            </div>
                <input type="text" class="form-control" value="<?php echo $resident['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            </div>
            <br>
            <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" value="<?php echo $resident['avatar'] ?>"id="avatar" name="avatar" >
                <label class="custom-file-label" for="avatar"></label>
            </div>
        <a href="viewresidents.php" class="btn btn-default">Back To List</a>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
     </form>
     </div>
     
           
    <?php } ?>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>