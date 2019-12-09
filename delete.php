<?php 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if(!($_GET['id'])){
       // echo 'error';
       include 'includes/errormessage.php';
       header("Location: viewresidents.php");


    }else{
        $id = $_GET['id'];

        $result = $crud->deleteResident($id);
        if($result){
            header("Location: viewresidents.php");
        }else{
            //echo '';
            include 'includes/errormessage.php';

        }
    }
       
?>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>