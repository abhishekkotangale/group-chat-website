<?php 
    session_start();
        
        include('connection.php');
        $adid = $_SESSION['adid'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        if(isset($_SESSION['id'])){
        if(!empty($message)){
            $sql = mysqli_query($con, "INSERT INTO appchat (uid, message)
                                        VALUES ( {$incoming_id}, '{$message}')") or die();
        }
        }else if(isset($_SESSION['adid'])){
            if(!empty($message)){
                $sql = mysqli_query($con, "INSERT INTO appchat ( message , adid)
                                            VALUES ( '{$message}','{$adid}')") or die();
            }
        }


    
?>