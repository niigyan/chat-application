
<?php
session_start();
 if (!isset($_SESSION["unique_id"])) {
     header("location: login.php");
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Chat Application</title>
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php 
                include_once "php/config.php";
                $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql)>0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                <img src="php/images/<?=$row['img']?>" alt="">
                <div class="details">
                    <span><?= $row['fname'] ." " . $row['lname']?></span>
                    <p><?= $row['status']?></p>
                </div>
                </div>
                <a href="#" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>