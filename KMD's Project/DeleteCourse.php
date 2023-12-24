<?php
    include('connection.php');
    if(isset($_REQUEST['CourseID'])){
        $CID=$_REQUEST['CourseID'];
        $query="DELETE FROM Course WHERE CourseID='$CID'";
        $result=mysqli_query($connection,$query);
        if ($result) {
            echo"<script>window.alert('Course Record Delete Successful');</script>";
            echo "<script> window.location='CourseEntry.php';</script>";
        }
        else
        {
            echo"<script>window.alert('Course Record cannot delete');</script>";
            echo "<script>window.location='CourseEntry.php';</script>";
        }
    }
    else{
        echo "<script> window.location='CourseEntry.php';</script>";
    }
    ?>