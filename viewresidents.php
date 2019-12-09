<?php $title = 'View Residents';

    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';


    $results = $crud->getResidents();
?>

<table class="table">
<thead class="thead-dark">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php echo $r ['resident_id'] ?></td>
        <td><?php echo $r ['firstname'] ?></td>
        <td><?php echo $r ['lastname'] ?></td>
        <td><?php echo $r ['name'] ?></td>
        <td>
            <a href ="view.php?id=<?php echo $r ['resident_id'] ?>" class="btn btn-primary">View</a>
            <a href ="edit.php?id=<?php echo $r ['resident_id'] ?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to permanently remove this record?');" 
            href ="delete.php?id=<?php echo $r ['resident_id'] ?>" class="btn btn-danger">Delete</a>

        </td>
    </tr>
    <?php }?>

</table>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>