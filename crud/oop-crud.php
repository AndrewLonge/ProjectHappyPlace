<?php include('./server.php');
      require_once('./entity.class.php');?>
<?php      $mysqli = new mysqli("localhost", "root", "", "happyplace");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>
<?php
   if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = $mysqli->query($connection, "SELECT * FROM apprentices WHERE id=$id");
    printf ($connection, $mysqli->error);
    if (is_countable($record) == 1) {
        $n = $record->fetch_array();
        $prename = $n['prename'];
        $lastname = $n['lastname'];
        $place_id = $n['place_id'];
    }
    
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
<?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>

        <?php $results = $mysqli->query( "SELECT * FROM apprentices");?>


    <table>
        <thead>
            <tr>
                <th>prename</th>
                <th>lastname</th>
                <th>place_id</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while ($row = $results->fetch_array()) { ?>
       
            <tr>
                <td><?php echo $row['prename']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['place_id']; ?></td>
                <td>
                    <a href="oop-crud.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
                </td>
                <td>
                    <a href="oop-crud.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>

            <?php } ?>
        
    </table> 

    <?php $results = $mysqli->query("SELECT * FROM places");
    
    ?>


    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
            </tr>
        </thead>
        <?php while ($row = $results->fetch_array()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
            </tr>
        <?php } ?>

        <form method="post" action="../database.class.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
            <label>prename</label>
            <input type="text" name="prename" value="<?php echo $prename; ?>">
        </div>
        <div class="input-group">
            <label>lastname</label>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        </div>
        <div class="input-group">
            <label>place_id</label>
            <input type="text" name="place_id" value="<?php echo $place_id; ?>">
        </div>
        <div class="input-group">
            <?php if ($update = true) : ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;">update</button>
            <?php else : ?>
                <button class="btn" type="submit" name="save">Save</button>
            <?php endif ?>
        </div>
    </form>
    <p class="links1"> <a href="../map/index.php">back to main page</p>
    
</body>

</html>