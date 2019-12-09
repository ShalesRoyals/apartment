<?php
    
    require_once 'db/conn.php';

        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $mstatus = $_POST['mstatus'];
            $members= $_POST['members'];
            $contact = $_POST['phone'];
            $address = $_POST['address'];

            $result = $crud->editResidents($id,$fname,$lname,$email,$gender,$mstatus,$members,$contact,$address);
            if($result){
                header("Location: index.php");
            }else{
                //echo 'error';
                include 'includes/errormessage.php';

            }
        }else{
            //echo 'error';
            include 'includes/errormessage.php';
        }
?>