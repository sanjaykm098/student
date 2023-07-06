<!doctype html>
<html lang="en">
<?php include 'class.php';

ob_start();
session_start();
if(isset($_SESSION['user'])){
    if($_SESSION['user_type']=='teacher'){
        header('location:index.php');
    }
    else{
        header('location:acc_den.php');
    }
  }

?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

</head>
<style>
    span {
        color: red;
    }
</style>

<body>
    <form action="" onsubmit="return validation()" name="form" id="form" class="container mt-5" method="post">
        <h2>Sign Up (only for teacher)</h2>
        <div class="mt-2">
        <span>Note: student Don't Try to Sign Up.</span>
    </div>
        <div class="row mt-5">
            <div class="col-sm-2">
                <label for="fname">Full Name</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="fname" id="fname" class="form-control" placeholder="Sanjay Kumar">
                <div class="col-12">
                    <span id="nameErr"></span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="uname">UserName</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="uname" id="uname" class="form-control" placeholder="e.g. @sanjay">
                <div class="col-12">
                    <span id="userErr"></span>
                    <span id="userError"></span>
                </div>
            </div>
        </div>
        <input type="text" class="d-none" name="error1" id="error1">
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="email">Email</label>
            </div>
            <div class="col-sm-10">
                <input type="email" name="email" id="email" class="form-control" placeholder="snajay@sanjaykm.me">
                <div class="col-12">
                    <span id="emailErr"></span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="password">Password</label>
            </div>
            <div class="col-sm-10">
                <div class="row g-3">
                    <div class="col-md">
                        <input type="password" name="cpass" placeholder="Confirm Password" id="cpassword"
                            class="form-control">
                    </div>
                </div>
                <span id="passErr"></span>
            </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn mx-3 btn-outline-success" id="submit">Sign Up</button>
            <a href="login.php"><button type="button" class="btn btn-outline-danger" id="">Log In</button></a>
        </div>
    </form>
    
    <div class=" text-danger text-center">
        <br>
        <br>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['fname'];
            $user = $_POST['uname'];
            $email = $_POST['email'];
            $pass = $_POST['cpass'];
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $error1 = $_POST['error1'];

            if ($name == "" || $user == "" || $email == "" || $pass == "" || $error1 == "User name in already use") {
                $error = "Please fill All fields";
                if ($error1 == "User name in already use") {
                    echo $error = "Please fill All fields <br>";
                    echo "User name in already use";
                } else {
                    echo $error;
                }
            } else {
                $obj = new student();
                $val = array($name, $user, $email, $pass);
                #keys of Table
                $key = array("fname", "uname", "email", "cpass");
                $data = array_combine($key, $val);
                #instering
                $insert = new DB();
                $insert->insert('teacher', $data);
                header("location:login.php");
            }
        }

        ?>
    </div>
    <script>
        $(document).ready(function () {
            $('#uname').on('keyup', function () {
                var sclass = $('#uname').val();
                $.ajax({
                    url: "file/user_verify.php",
                    type: "POST",
                    data: {
                        sclass: sclass,
                    },
                    success: function (data) {
                        $("#userError").html(data);
                        $("#error1").val(data);
                    }
                });
            });
        });
    </script>

</body>