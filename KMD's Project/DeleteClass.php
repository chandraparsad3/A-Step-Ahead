<?php
    include('connection.php');
    if(isset($_REQUEST['ClassID'])){
        $CID=$_REQUEST['ClassID'];
        $query="DELETE FROM Class WHERE ClassID='$CID'";
        $result=mysqli_query($connection,$query);
        if ($result) {
            echo"<script>window.alert('Class Record Delete Successful');</script>";
            echo "<script>window.location='Add_Class.php';</script>";
        }
        else
        {
            echo"<script>window.alert('Class Record cannot delete');</script>";
            echo "<script>window.location='Add_Class.php';</script>";
        }
    }
    else{
        echo "<script>window.location='Add_Class.php';</script>";
    }
?>