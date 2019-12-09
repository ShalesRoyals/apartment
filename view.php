<?php $title = 'View';

    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if(!isset($_GET['id'])){
        //echo "<h1 class='text-danger'>Please confirm that your details are correct and try again.</h1>";
        include 'includes/errormessage.php';
    }else{
        $id = $_GET['id'];
        $result =$crud->getResidentDetails($id);
    
?>

<img src="<?php echo empty($result ['avatar_path']) ? "uploads/download.jpg" : $result ['avatar_path']; ?>" class="rounded-circle" style="width: 30%; height: 30%"/>

    <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php  echo  $result ['firstname'] .' '. $result ['lastname'] ?> </h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo  $result ['name'] ?></h6>
                <p class="card-text">Email Address: <?php echo  $result ['emailaddress']; ?></p>
                <p class="card-text">Gender: <?php echo  $result ['gender']; ?></p>
                <p class="card-text">Marital Status: <?php echo  $result ['mstatus']; ?></p>
                <p class="card-text">Household Size: <?php echo  $result ['members']; ?></p>
                <p class="card-text">Contact Number: <?php echo  $result ['contactnumber']; ?></p>
            </div>
    </div>
    <br>
            <a href ="view.php" class="btn btn-info">Back to List</a>
            <a href ="edit.php?id=<?php echo $result ['resident_id'] ?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to permanently remove this record?');" 
            href ="delete.php?id=<?php echo $result ['resident_id'] ?>" class="btn btn-danger">Delete</a>

<?php } ?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>