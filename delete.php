<?php
    include("connection.php");

    if(isset($_GET["deleteId"])) {
        $id = $_GET["deleteId"];

        $sql = "DELETE FROM info WHERE id=$id";
        $result = mysqli_query($connection , $sql);

        if($result) {
            header("Location: show-records.php");
        }
    }
?>