
<?php
require_once("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="cstyle.css">
</head>
<body>
    <center>
    <div class="container">
        <h1 class="top-heading">TO-DO LIST</h1>
        <form action="handle.php" method="post">
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox" required>
                <button type="submit" id="add" name="add">ADD</button>
            </div>
        </form>
        <ul class="list">
            <?php 
              $itemList = get_items();
              while ($row = $itemList->fetch_assoc()) {
            ?>
            <li class="item">
                <p><?php echo $row["task"]; ?></p>
                <div class="icon-container">
                    <form action="handle.php" method="post" style="display:inline;">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"]; ?>"><i class="fa-regular fa-circle-check"></i></button>
                    </form>
                    <form action="handle.php" method="post" style="display:inline;">
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            </li>
            <?php } ?>
        </ul>
        <hr>
        <ul class="list">
            <?php 
              $checkedItemList = get_items_checked();
              while ($row = $checkedItemList->fetch_assoc()) {
            ?>       
            <li class="item fade">
                <p class="deleted-text"><span><?php echo $row["task"]; ?></span></p>
                <div class="icon-container">
                    <form action="handle.php" method="post" style="display:inline;">
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    </center>
    <script src="https://kit.fontawesome.com/7a241e819f.js" crossorigin="anonymous"></script>
</body>
</html>



