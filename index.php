<?php $title = 'Index';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud->getAddresses();

?>
    

    <h1 class= "text-center">Welcome to Royals Housing System</h1>
        <!--<form method="get" action="success.php">-->

      <div class="jumbotron">
        <form method="post" action="success.php">
         <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">First Name</span>
                </div>
                <input required type="text" class="form-control" id="firstname" name="firstname">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Last Name</span>
                </div>
                <input required type="text" class="form-control" id="lastname" name="lastname">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Gender</span>
                </div>
             <select class="form-control" id="gender" name="gender">
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
                        <option value= "<?php echo $r['address_id']?>"><?php echo $r['name']; ?></option>
                   <?php } ?>
                </select>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Marital Status</span>
                </div>
             <select class="form-control" id="mstatus" name="mstatus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
             </select>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Number of Household Members</span>
                </div>
                <input required type="text" class="form-control" id="members" name="members">
            </div><br>
            <div class="input-group">
            <div class="input-group-prepend">
                    <span class="input-group-text">Contact Number</span>
            </div>
                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            </div>
            <br>
            <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
                <label class="custom-file-label" for="avatar">Choose File</label>
                <small id="avatar" class="form-text text-info">File Upload is Optional</small>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
        </form>
     </div>
     
     
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>



