<?php 
    session_start();
    
        include_once "connection.php";
        $outgoing_id = $_SESSION['id'];
        $ad_id = $_SESSION['adid'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $output = "";
        include 'connection.php';
                $selectQuery = "select * from appchat";
                $query = mysqli_query($con , $selectQuery);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['uid'] === $outgoing_id or $row['adid']){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['message'].' <a href="msgdelete.php?deleteData= '.$row['id'].';">delete</a></p>
                                    
                                </div>
                                </div>';
                }else if($row['adid'] === $ad_id){
                    $output .= '<div class="chat admin">
                                <div class="details"> 
                                    <p>'. $row['message'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>'. $row['message'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    

?>