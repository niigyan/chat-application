<?php 


while ($row = mysqli_fetch_assoc($sql)) {

    if ($row['unique_id']==$_SESSION['unique_id']) {
       $output .= '<div></div>';
    }
     else {
        $sql ="SELECT * FROM messages 
        WHERE  (outgoing_msg_id = {$outgo} AND incoming_msg_id = {$incoming_id})
        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query = mysqli_query($conn,$sql);   
      $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
      <div class="content">
          <img src="php/images/'.$row['img'].'" alt="">
          <div class="details">
              <span>'. $row['fname'] . " " .$row['lname'] .'</span>
              <p>This is a text message</p>
          </div>
      </div>
      <div class="status-dot">
          <i class="fas fa-circle"></i>
      </div>
  </a>'; }
  }
?>