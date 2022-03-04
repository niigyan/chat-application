<?php 
   session_start();
   include_once "config.php";
   $sql = mysqli_query($conn,"SELECT * FROM users");
   $outgoing_id = $_SESSION['unique_id'];
   $output = "";
   
   if (mysqli_num_rows($sql)==1) {
      $output .="No users are available to chat";
   } elseif (mysqli_num_rows($sql)>0) {
       while ($row = mysqli_fetch_assoc($sql)) {

         if ($row['unique_id']==$_SESSION['unique_id']) {
            $output .= '<div></div>';
         }
          else {
        $sql2 ="SELECT * FROM messages 
        WHERE  (outgoing_msg_id = '{$outgoing_id}' AND incoming_msg_id = '{$row['unique_id']}')
        OR (outgoing_msg_id = '{$row['unique_id']}' AND incoming_msg_id = '{$outgoing_id}') ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn,$sql2);
        $row2 =mysqli_fetch_assoc($query2) ;

        if (mysqli_num_rows($query2)>0) {
            $result = $row2['msg'];
        } else {
            $result = "No message available";
        }
        //trimming message if word are more than 20
        (strlen($result)>25)? $msg = substr($result,0,25) . "..." : $msg = $result;
        ($outgoing_id == $row['unique_id']) ? $you ="You: " : $you ="";
            $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
            <div class="content">
                <img src="php/images/'.$row['img'].'" alt="">
                <div class="details">
                    <span>'. $row['fname'] . " " .$row['lname'] .'</span>
                    <p>'. $you . $msg .'</p>
                </div>
            </div>
            <div class="status-dot">
                <i class="fas fa-circle"></i>
            </div>
        </a>'; }
       }
   }

   echo $output;

  
?>