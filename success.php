<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $mstatus = $_POST['mstatus'];
        $members = $_POST['members'];
        $contact = $_POST['phone'];

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_upload_file($orig_file,$destination);


        //check if insert was successful
        $isSuccess = $crud->insertResidents($fname,$lname,$email,$gender,$address,$mstatus,$members,$contact,$destination);
        $addressName= $crud->getAddressById($address);

        if($isSuccess){
            SendEmail::sendMail($email, 'Welcome to IT Conference 2019', 'You have succesfully registered for this year\'s IT Conference');
           // echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
           include 'includes/successmessage.php';

   
        }
        else{
           // echo '<h1 class="text-center text-danger">There Was An Error In Processing!</h1>';
           include 'includes/errormessage.php';

        }

    }
?>
           
        <!-- Print using $_POST-->
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php  echo  $_POST ['firstname'] .' '. $_POST ['lastname'] ?> </h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo  $addressName ['name'] ?></h6>
                <p class="card-text">Email: <?php echo  $_POST ['email']; ?></p>
                <p class="card-text">Gender: <?php echo  $_POST ['gender']; ?></p>
                <p class="card-text">Marital Status: <?php echo  $_POST ['mstatus']; ?></p>
                <p class="card-text">Number of Household Members: <?php echo  $_POST ['members']; ?></p>
                <p class="card-text">Contact Number: <?php echo  $_POST ['phone']; ?></p>
            </div>
         </div>
   
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>