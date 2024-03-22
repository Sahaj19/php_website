<?php
    include("connection.php");

    // $editId = $_GET["editId"];

    // $sql = "SELECT * FROM crud WHERE id=$editId";
    // $result = mysqli_query($connection , $sql);

    // $row = mysqli_fetch_assoc($result);
    // $name = $row["name"];
    // $email = $row["email"];
    // $mobile = $row["mobile"];
    // $password = $row["password"];

    // if(isset($_POST["edit"])) {
    //     $name = $_POST["name"];
    //     $email = $_POST["email"];
    //     $mobile = $_POST["mobile"];
    //     $password = $_POST["password"];

    //     $sql = "UPDATE crud SET id=$editId , name='$name' , email='$email' , mobile='$mobile' , password='$password' WHERE id=$editId";

    //     $result = mysqli_query($connection , $sql);

    //     if($result) {
    //         header("Location: show.php");
    //     }
    // }
?>

<!---------------------------------------------------------------------------------------------->

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Record Page</title>
    <style>
        label {
            font-size: 2rem;
        }

        input {
            font-size: 1.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            width: 500px;
        }

        button {
            margin-top: 2rem;
            cursor: pointer;
            font-size: 1.5rem;
            padding: 1rem;
            border-radius: 5px;
            background-color: green;
            color: #fff;
            border: none;
        }

        a {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <h1>Create a new record here</h1>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="name">Name</label> <br>
        <input type="text" name="name" id="name" placeholder="Enter your name!" autocomplete="off" autofocus value="<?php echo $name; ?>"> <br>

        <label for="email">Email</label> <br>
        <input type="email" name="email" id="email" placeholder="Enter your email!" autocomplete="off" value="<?php echo $email; ?>"> <br>

        <label for="mobile">Phone no.</label> <br>
        <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile number!" autocomplete="off" value="<?php echo $mobile; ?>"> <br>

        <label for="password">Password</label> <br>
        <input type="password" name="password" id="password" placeholder="Enter your password!"autocomplete="off" value="<?php echo $password; ?>"> <br>

        <button type="submit" name="edit" >Edit</button>
    </form>

    <a href="show.php">Show All Records</a>
</body>
</html> -->

<!---------------------------------------------------------------------------------------------->