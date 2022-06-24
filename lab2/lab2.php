<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<body style="background-color:Blue"  

<?php
$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodgrpErr = "";
$name = $email = $dob = $gender = $degree = $bloodgrp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    }
    else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }
    else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["dob"])) {
        $dobErr = "DOB is required";
    }
    else {
        $dob = test_input($_POST["dob"]);
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    }
    else {
        $gender = test_input($_POST["gender"]);
    }
    if (empty($_POST["degree"])) {
        $degreeErr = "At least 2 degree have to select";
    }
    else {
        $str = implode(", ", $_POST["degree"]);
        $degree = test_input($str);
    }
    if (empty($_POST["bloodgrp"])) {
        $bloodgrpErr = "Must be Selected";
    }
    else {
        $bloodgrp = test_input($_POST["bloodgrp"]);
    }
}
function test_input($data)

{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<h2><b>FORM</b></h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
  <B>NAME:</b> <input type="text" name="name" value="<?php echo $name; ?>">
  <span class="error">* <?php echo $nameErr; ?></span>
  <br><br>
  <b>E-MAIL:</b> <input type="text" name="email" value=" <?php echo $email; ?>">
  <span class="error">* <?php echo $emailErr; ?></span>
  <br><br>
  <b>DOB:</b> <input type="date" name="dob" value="<?php echo $dob; ?>">
  <span class="error">*<?php echo $dobErr; ?></span>
  <br><br>
  
  <b>GENDER:</b>
  <br><br>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female")
    echo "checked"; ?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male")
    echo "checked"; ?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other")
    echo "checked"; ?> value="other">Other  
  <span class="error">* <?php echo $genderErr; ?></span>
  <br><br>
  
  <b>DEGREE:</b>
  <br><br>
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree == "SSC")
    echo "checked"; ?> value="SSC">SSC
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree == "HSC")
    echo "checked"; ?> value="HSC">HSC
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree == "BSc")
    echo "checked"; ?> value="BSc">BSc
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree == "MSc")
    echo "checked"; ?> value="MSc">MSc
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree == "PhD")
    echo "checked"; ?> value="PhD">PhD
  <span class="error">* <?php echo $degreeErr; ?></span>
  <BR><BR>
  
  <b>BLOOD:</b>
  <select  name="bloodgrp" >
  <option value=""></option>  
    <option value="A+"<?php if (isset($bloodgrp) && $bloodgrp == "A+") {
    echo ' selected="selected"';
}?>>A+</option>
    <option value="A-"<?php if (isset($bloodgrp) && $bloodgrp == "A-") {
    echo ' selected="selected"';
}?>>A-</option>
    <option value="B+"<?php if (isset($bloodgrp) && $bloodgrp == "B+") {
    echo ' selected="selected"';
}?>>B+</option>
	<option value="B-"<?php if (isset($bloodgrp) && $bloodgrp == "B-") {
    echo ' selected="selected"';
}?>>B-</option>
    <option value="O+"<?php if (isset($bloodgrp) && $bloodgrp == "O+") {
    echo ' selected="selected"';
}?>>O+</option>
	<option value="O-"<?php if (isset($bloodgrp) && $bloodgrp == "O-") {
    echo ' selected="selected"';
}?>>O-</option>
	<option value="AB+"<?php if (isset($bloodgrp) && $bloodgrp == "AB+") {
    echo ' selected="selected"';
}?>>AB+</option>
	<option value="AB-"<?php if (isset($bloodgrp) && $bloodgrp == "AB-") {
    echo ' selected="selected"';
}?>>AB-</option>
	</select>
	<span class="error">* <?php echo $bloodgrpErr; ?> </span>
	<br><br>
  <input type="submit" name="submit" value="submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
print_r($degree);
echo "<br>";
echo $bloodgrp;
?>

</body>
</html>