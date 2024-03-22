<?php
    include("connection.php");

    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //Handling form
    if(isset($_POST["submit"])) {

        //sanitization
        $name = filter_input(INPUT_POST , "name" , FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST , "phone" , FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST , "email" , FILTER_SANITIZE_EMAIL);
        $sex =  filter_input(INPUT_POST , "sex" , FILTER_SANITIZE_SPECIAL_CHARS);
        $select_location =  filter_input(INPUT_POST , "location" , FILTER_SANITIZE_SPECIAL_CHARS);
        $other_location = filter_input(INPUT_POST , "other_location" , FILTER_SANITIZE_SPECIAL_CHARS);
        $age = filter_input(INPUT_POST , "age" , FILTER_SANITIZE_NUMBER_INT);
        $qualification =  filter_input(INPUT_POST , "qualification" , FILTER_SANITIZE_SPECIAL_CHARS);

        //validation
        $valid_email = filter_var($email , FILTER_VALIDATE_EMAIL);

        if ($age < 0 || $age >= 120) {
            echo '<script>alert("Age should be positive and less than 120");</script>';
        }

        //If "other" is selected, set $select_location to empty
        if ($select_location === "other") {
            $select_location = "";
        }

        // Determine the location based on the selected option
        $location = !empty($select_location) ? $select_location : $other_location;

        //let's insert our data
        $sql = "INSERT INTO info (name, phone, email, sex, location, age, qualification) VALUES ('$name', '$phone', '$valid_email', '$sex', '$location', '$age', '$qualification')";

        $result = mysqli_query($connection , $sql);

        if($result) {
            header("Location: thank-you.php");
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
            <input type="text" name="name" id="name" placeholder="Enter your name!" autocomplete="off" autofocus maxlength="30" minlength="3" required>
        </div>

        <div class="field">
        <label for="phone">Phone no.</label>
        <input type="number" name="phone" id="phone" placeholder="Enter your mobile number!" autocomplete="off" required> 
        </div>

        <div class="field">
        <label for="email">Email</label> 
        <input type="email" name="email" id="email" placeholder="Enter your email!" maxlength="40" autocomplete="off" required> 
        </div>

        <!-- gender radio buttons -->
        <label>Sex</label> <br>
        <input type="radio" name="sex" value="male" id="male" required >
        <label for="male">Male</label>  <br>
        <input type="radio" name="sex" value="female" id="female" required>
        <label for="female">Female</label>  <br>
        <input type="radio" name="sex" value="other" id="other" required>
        <label for="other">Other</label>  <br> <br> <br>

        <!-- location dropdown -->
        <select name="location" id="location_selector" required>
            <option value="">Select Location</option>
            <option value="noida">Noida</option>
            <option value="gurugram">Gurugram</option>
            <option value="delhi">Delhi</option>
            <option value="ghaziabad">Ghaziabad</option>
            <option value="other">Other</option>
        </select><br>

        <!-- additional other option  -->
        <input type="text" name="other_location" maxlength="40" id="other_location" placeholder="Other Location" ><br>

        <div class="field">
        <label for="age">Age</label> 
        <input type="number" name="age" id="age" placeholder="Enter your age" autocomplete="off" autofocus required>
        </div>

        <!------ Qualification radio buttons  -->
        <label>Education Qualification</label> <br>

        <input type="radio" name="qualification" value="Below 12" id="below_12"  required>
        <label for="below_12">Below 12</label> <br>

        <input type="radio" name="qualification" id="12_pass" value="12th Pass" required> 
        <label for="12_pass">12th Pass</label> <br>

        <input type="radio" name="qualification" id="btech" value="B.Tech" required> 
        <label for="btech">B.Tech</label> <br>

        <input type="radio" name="qualification" id="mtech" value="M.Tech" required>
        <label for="mtech">M.Tech</label>

        <br>
        <!------ submit form button  -->
        <input type="submit" name="submit" value="submit" id="submit_btn" >
        </div>

    </form>

    <a href="show-records.php">Show All Records</a>
</body>
<script>
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //Handling location selection
    const location_selector = document.querySelector("#location_selector");
    const other_location = document.querySelector("#other_location");

    other_location.style.display = "none";

    location_selector.addEventListener("change", function() {
        if (this.value === "other") {
            other_location.style.display = "block";
        } else {
            other_location.style.display = "none";
        }
    });
</script>
</html>

