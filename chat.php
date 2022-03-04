
<?php
 session_start();
 if (!isset($_SESSION["unique_id"])) {
    header('Location: login.php');
    
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
        <section class="chat-area">
            <header>
            <?php 
                include_once "php/config.php";
                $user_id = mysqli_real_escape_string($conn,$_GET['user_id']);
                $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = '{$user_id}'");
                if (mysqli_num_rows($sql)>0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?=$row['img']?>" alt="profile picture">
                <div class="details">
                    <span><?= $row['fname'] ." " . $row['lname']?></span>
                    <p><?= $row['status']?></p>
                </div>
            </header>
            <div class="chat-box">
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?=$_SESSION['unique_id'] ?>" hidden>
                <input type="text" name="incoming_id" value="<?=$user_id ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="javascript/chat.js"></script>
</body>
</html>