<?php
    include("connection.php");

    $editId = $_GET["editId"];

    $sql = "SELECT * FROM info WHERE id=$editId";
    $result = mysqli_query($connection , $sql);

    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
    $phone = $row["phone"];
    $email = $row["email"];
    $sex = $row["sex"];
    $location = $row["location"];
    $age = $row["age"];
    $qualification = $row["qualification"];

    if(isset($_POST["edit"])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $sex = $_POST["sex"];
        $location = $_POST["location"];
        $age = $_POST["age"];
        $qualification = $_POST["qualification"];

        $sql = "UPDATE info SET id=$editId , name='$name' , phone='$phone' , email='$email' , sex='$sex' , location='$location', age='$age', qualification='$qualification' WHERE id=$editId";

        $result = mysqli_query($connection , $sql);

        if($result) {
            header("Location: show-records.php");
        }
    }
?>



<!---------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Record Page</title>
    <style>
        form {
            max-width: 800px;
            margin: 2rem auto;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        label , input {
            font-size: 2rem;
        }

        input {
            padding: 1rem;
        }

        select {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            padding: 5px;
        }

        a {
            position: fixed;
            right: 1rem;
            top: 1rem;
            font-size: 1.5rem;
        }

        #next_btn ,
        #submit_btn {
            background-color: green;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            margin-top: 1.5rem;
            margin-bottom: 2rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!--------------------------------------------------------------------------------------->
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" autocomplete="off" autofocus maxlength="30" minlength="3" value="<?php echo $name; ?>" required>
        </div>

        <div class="field">
        <label for="phone">Phone no.</label>
        <input type="number" name="phone" id="phone" autocomplete="off"value="<?php echo $phone; ?>" required> 
        </div>

        <div class="field">
        <label for="email">Email</label> 
        <input type="email" name="email" id="email" maxlength="40" autocomplete="off" value="<?php echo $email; ?>" required> 
        </div>

        <!-- gender radio buttons -->
        <label>Sex</label> <br>
        <input type="radio" name="sex" value="male" id="male" required <?php echo ($sex === 'male') ? 'checked' : ''; ?> >
        <label for="male">Male</label>  <br>
        <input type="radio" name="sex" value="female" id="female" required <?php echo ($sex === 'female') ? 'checked' : ''; ?>>
        <label for="female">Female</label>  <br>
        <input type="radio" name="sex" value="other" id="other" required <?php echo ($sex === 'other') ? 'checked' : ''; ?>>
        <label for="other">Other</label>  <br> <br> <br>

        <!-- additional other option  -->
        <div class="field">
        <label for="location">Location</label>
        <input type="text" name="location" maxlength="40" id="location" value="<?php echo $location; ?>"  ><br>
        </div>

        <div class="field">
        <label for="age">Age</label> 
        <input type="number" name="age" id="age" autocomplete="off" value="<?php echo $age; ?>" required>
        </div>

        <!------ Qualification radio buttons  -->
        <label>Education Qualification</label> <br>

        <input type="radio" name="qualification" value="Below 12" id="below_12"  required <?php echo ($qualification === 'Below 12') ? 'checked' : ''; ?> >
        <label for="below_12">Below 12</label> <br>

        <input type="radio" name="qualification" id="12_pass" value="12th Pass" required <?php echo ($qualification === '12th Pass') ? 'checked' : ''; ?> > 
        <label for="12_pass">12th Pass</label> <br>

        <input type="radio" name="qualification" id="btech" value="B.Tech" required <?php echo ($qualification === 'B.Tech') ? 'checked' : ''; ?> > 
        <label for="btech">B.Tech</label> <br>

        <input type="radio" name="qualification" id="mtech" value="M.Tech" required  <?php echo ($qualification === 'M.Tech') ? 'checked' : ''; ?>>
        <label for="mtech">M.Tech</label>

        <br>
        <!------ submit form button  -->
        <input type="submit" name="edit" value="edit" id="submit_btn" >
        </div>

    </form>

