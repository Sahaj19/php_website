<?php
    include("connection.php");
?>

<!---------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Records Page</title>
    <style>
        .create_btn{
            display: block;
            margin: 4rem 1rem;
            font-size: 1.5rem;
        }

        .user_info {
            box-shadow: 0 0 2px 2px #000;
            margin: 1rem 0;
            padding: 1rem;
            max-width: 800px;
        }

        .user_info p {
            font-size: 1.5rem;
        }

        .update_btn {
            margin-right: 2rem;
        }

        .update_btn,
        .delete_btn {
            font-size: 1.5rem;
        }

        
    </style>
</head>
<body>

    <?php
        $sql = "SELECT * FROM info";
        $result = mysqli_query($connection , $sql);

        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $name = $row["name"];
                $email = $row["email"];
                $phone = $row["phone"];
                $sex = $row["sex"];
                $location = $row["location"];
                $age = $row["age"];
                $qualification = $row["qualification"];

                echo "<div class='user_info'>
                <p><strong>Name : </strong>{$name}</p>
                <p><strong>Email : </strong>{$email}</p>
                <p><strong>Phone : </strong>{$phone}</p>
                <p><strong>Gender : </strong>{$sex}</p>
                <p><strong>Location : </strong>{$location}</p>
                <p><strong>Age : </strong>{$age}</p>
                <p><strong>Qualification : </strong>{$qualification}</p>
                <a href='edit.php?editId={$id}' class='update_btn'>Update</a>
                <a href='delete.php?deleteId={$id}' class='delete_btn'>Delete</a>
            </div>";
            }
        }
    ?>
    <a href="new.php" class="create_btn" >Create a new Record</a>
</body>
</html>