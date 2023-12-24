<?php
    include('connection.php');
    if(isset($_REQUEST['CategoryID'])){
        $CID=$_REQUEST['CategoryID'];
        $query="DELETE FROM Category WHERE CategoryID='$CID'";
        $result=mysqli_query($connection,$query);
        if ($result) {
            echo"<script>window.alert('Category Record Delete Successful');</script>";
            echo "<script>window.location='CategoryEntry.php';</script>";
        }
        else
        {
            echo"<script>window.alert('Category Record cannot delete');</script>";
            echo "<script>window.location='CategoryEntry.php';</script>";
        }
    }
    else{
        echo "<script>window.location='CategoryEntry.php';</script>";
    }
?>