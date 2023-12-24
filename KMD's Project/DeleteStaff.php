<?php
    include('connection.php');
    if(isset($_REQUEST['StaffID'])){
        $SID=$_REQUEST['StaffID'];
        $query="DELETE FROM Staff WHERE StaffID='$SID'";
        $result=mysqli_query($connection,$query);
        if ($result) {
            echo"<script>window.alert('Staff Record Delete Successful');</script>";
            echo "<script> window.location='staff.php';</script>";
        }
        else
        {
            echo"<script>window.alert('Staff Record cannot delete');</script>";
            echo "<script> window.location='staff.php';</script>";
        }
    }
    else{
        echo "<script> window.location='staff.php';</script>";
    }
?>