

<?php
    $title = 'Welcome To Royals Housing System'; 
    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 
    
    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);
        $result = $user->getUser($username,$new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            header("Location: residentlist.php");
        }
    }
?>

<h1 class="text-center"><?php echo $title ?> </h1>
<div class="dropdown-menu">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <form class="px-4 py-3">
            <div class="form-group">
            <label for="username">Username</label>
            <input type="email" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" >
            </div>
            <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                <label class="form-check-label" for="dropdownCheck">
                Remember me
                </label>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </form><br/><br/><br/><br/>

<?php include_once 'includes/footer.php'?>
