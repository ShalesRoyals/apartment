<?php $title = 'Edit Record';

    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getAddresses();
    if(!isset($_GET['id'])){
       // echo 'error';
       include 'includes/errormessage.php';
       header("Location: viewreidents.php");
    }else{
        $id = $_GET['id'];
        $attendee =$crud->getResidentDetails($id);

?>

        <h1 class= "text-center">Edit Record</h1>
            <!--<form method="get" action="success.php">-->
          
      <div class="jumbotron">
        <form method="post" action="success.php">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">First and Last name</span>
                </div>
            <input type="text" aria-label="First name" class="form-control">
            <input type="text" aria-label="Last name" class="form-control">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div><br>
                <div class="input-group-prepend">
                    <span class="input-group-text">Gender</span>
                </div>
            <br>
            <div class="custom-control custom-radio custom-control-inline">
                <br>
                <input type="radio" id="male" name="male" class="custom-control-input">
                <label class="custom-control-label" for="male">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="female" name="female" class="custom-control-input">
                <label class="custom-control-label" for="female">Female</label>
            </div><br><br>
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
            <div class="input-group-prepend">
                    <span class="input-group-text">Marital Status</span>
            </div>
            <br>
            <div class="custom-control custom-radio custom-control-inline">
                <br>
                <input type="radio" id="single" name="single" class="custom-control-input">
                <label class="custom-control-label" for="single">Single</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="married" name="married" class="custom-control-input">
                <label class="custom-control-label" for="married">Married</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="divorced" name="divorced" class="custom-control-input">
                <label class="custom-control-label" for="divorced">Divorced</label>
            </div><br><br>
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
                <label class="custom-file-label" for= "avatar">Choose File</label>
                <small id="avatar" class="form-text text-info"> File upload is optional.</small>
            </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
            </form>
           
    <?php } ?>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>