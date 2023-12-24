<?php
    include('connection.php');
    if(isset($_REQUEST['LecturerID'])){
        $LID=$_REQUEST['LecturerID'];
        $query="DELETE FROM Lecturer WHERE LecturerID='$LID'";
        $result=mysqli_query($connection,$query);
        if ($result) {
            echo"<script>window.alert('Lecturer Record Delete Successful');</script>";
            echo "<script> window.location='LecturerEntry.php';</script>";
        }
        else
        {
            echo"<script>window.alert('Lecturer Record cannot delete');</script>";
            echo "<script> window.location='LecturerEntry.php';</script>";
        }
    }
    else{
        echo "<script> window.location='LecturerEntry.php';</script>";
    }
?>