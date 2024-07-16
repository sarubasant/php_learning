<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body>
<?php
if(isset($_POST['btnSubmit'])){
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
//$err = [];
$err = validateData($full_name,$email,$username,$password);

if (count($err)==0){
    $con = new mysqli('localhost','root','','bca_2022');
    if($con->connect_errno!=0){
        die('connection erro');
    }

    $sql = "insert into tbl_users(full_name,email,username,password) 
    values('$full_name','$email','$username','$password')";
    $result= $con->query($sql);
    if($result)
{
echo "Success";

}
else
{
echo "Error";

}
}
}
function validateData($full_name,$email,$username,$password){
    $err=[];
    $full_name = trim($full_name);
    if(strlen($full_name)>40){
        $err['full_name'] = 'Full name must be less than 40 characters';
    }else if(empty($full_name)){
        $err['full_name'] = 'Enter your full name';
    }

    $email = trim($email);
    if(empty($email)){
        $err['email'] = 'Enter your email';
    }
   else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $err['email'] = 'Enter valid email';
    }

    $username = trim($username);
    if(empty($username)){
        $err['username'] = 'Enter your username';
    }
   else if(!preg_match('/^[a-zA-Z]+[0-9]/',$username)){
        $err['username'] = 'Enter valid username';
    }

    $password = trim($password);
    if(empty($password)){
        $err['password'] = 'Enter your password';
    }else if(strlen($password)<8){
        $err['password'] = 'Password must be at least 8 characters';
    }
    return $err;

}
?>
    <form action="" method="post">
        <fieldset style="width:20%;">


            <legend>Register</legend>
            <p>* is required field</p>
            <label for="">Full Name*</label>
            <input type="text" name="full_name" id=""><br>
            <p class="error">
            <?php
            if (isset($err['full_name'])) {
                echo$err['full_name'];
            }
            ?>
            </p>
            <br>
            <label for="">Email*</label>
            <input type="text" name="email" id=""><br>
            <p class="error">
            <?php
            if (isset($err['email'])) {
                echo $err['email'];
            }
            ?>
            </p>
            <br>

            <label for="">User Name*</label>
            <input type="text" name="username" id=""><br>
            <p class="error">
           <?php
            if (isset($err['username'])) {
                echo $err['username'];
            }
            ?>
            </p>
            <br>
            <label for="">Password*</label>
            <input type="password" name="password" id=""><br>
            <p class="error">
           <?php
            if (isset($err['password'])) {
                echo $err['password'];
            }
            ?>
            </p>
            <br>
            <br>
            <input type="submit" value="Submit" name="btnSubmit">

        </fieldset>


    </form>
</body>

</html>

