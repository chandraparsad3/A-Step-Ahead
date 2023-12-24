<?php
    include('connection.php');
    if(isset($_REQUEST['StudentID'])){
        $SID=$_REQUEST['StudentID'];
        $query="DELETE FROM Student WHERE StudentID='$SID'";
        $result=mysqli_query($connection,$query);
        if ($result) {
            echo"<script>window.alert('Student Record Delete Successful');</script>";
            echo "<script>window.location='StudentRegister.php';</script>";
        }
        else
        {
            echo"<script>window.alert('Student Record cannot delete');</script>";
            echo "<script> window.location='StudentRegister.php';</script>";
        }
    }
    else{
        echo "<script> window.location='StudentRegister.php';</script>";
    }
?>