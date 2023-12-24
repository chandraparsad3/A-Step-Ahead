<?php
    include('connection.php');
    if(isset($_REQUEST['AdminID'])){
        $AID=$_REQUEST['AdminID'];
        $query="DELETE FROM Admin WHERE AdminID='$AID'";
        $result=mysqli_query($connection,$query);
        if ($result) {
            echo"<script>window.alert('Admin Record Delete Successful');</script>";
            echo "<script> window.location='AdminRegister.php';</script>";
        }
        else
        {
            echo"<script>window.alert('Admin Record cannot delete');</script>";
            echo "<script> window.location='AdminRegister.php';</script>";
        }
    }
    else{
        echo "<script> window.location='AdminRegister.php';</script>";
    }
?>