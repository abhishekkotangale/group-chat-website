<?php

  session_start();

  
?>

<?php

    include 'assets/connection.php';

    if(isset($_POST['submit'])){
        $filename = $_POST['filename'];
        $filetitle = $_POST['filetitle'];
        $filedesc = $_POST['filedesc'];

        

            $insertquery = "insert into gallery(titleGallery,descGallery,imgGallery) values('$filetitle','$filedesc','$destfile')";

            $query = mysqli_query($con,$insertquery);

            if($query){
                echo "inserted";
                header('location:home.php');
            }else{
                echo "not inserted";
            }
        }
    

?>