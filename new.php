<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php_form_validation</title>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <?php 
        #Define the variables
        $name = $email = $website = $comment = $gender = "";
        $name_error = $email_error = $website_error = $comment_error = $gender_error = "";

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            #code for name validation
            if (empty($_POST["name"])) {
                $name_error = "Name is required";
            }else {
                $name = test_input($_POST["name"]);
            }
            
            #code for email validation
            if (empty($_POST["email"])) {
                $email_error = "Email is required";
            }else {
                $email = test_input($_POST["emai"]);
                #Check if email is well formed
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "Invalid email format";
                }
            }
        
             #code for website validation
             if (empty($_POST["website"])) {
                $website = "";
            }else {
                $website = test_input($_POST["website"]);
                #Check if url is valid 
                if (filter_var($website, FILTER_VALIDATE_URL)) {
                    $website_error = "Invalid url";
                }
            }
            
            #code for website validation
            if (empty($_POST["comment"])) {
                $comment = "";
            }else {
                $comment = test_input($_POST["comment"]);
            }
        
            #code for gender validation
            if (empty($_POST["gender"])) {
                $gender_error = " Gender is required";
            }else {
                $gender = test_input($_POST["gender"]);
            }
        }
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    
    <h1>PhP Form Validation</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $name_error; ?></span>
        <br><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $email_error; ?></span>
        <br><br>
        Website: <input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error"><?php echo $website_error; ?></span>
        <br><br>
        Comment: <input type="textarea" name="comment" value="<?php echo $comment; ?>">
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked"; ?> value="male">male
        <input type="radio" name="gender" <?php if(isset($gender) && $gender=="other") echo "checked"; ?> value="other">other
        <span class="error">* <?php echo $gender_error; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>

    <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
    ?>
</body>
</html>