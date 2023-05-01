






  <?php

    include 'connection.php';


    $id = $_GET['deleteData'];
    $showquery = "select * from appchat where id='$id' ";
    $showData = mysqli_query($con,$showquery);

    $result = mysqli_fetch_array($showData);


    $updatequery = "update appchat set message = 'This message deleted' where id='$id'";

        $query = mysqli_query($con,$updatequery);

        if($query){
            header('location:home.php');
        }else{
            echo "not inserted";
        }

?>