<!doctype html>
<html lang="en">
<?php include 'class.php';
ob_start();
session_start();
if(isset($_SESSION['user'])){
    header('location:index.php');
  }
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Dashboard Template · Bootstrap</title>
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
    <form action="" class="mt-5 container" method="post">
        <h2>Sign In</h2>
        <div class="mt-3">
            Username
            <input type="text" placeholder="eg. sanjay" name="uname" id="1" class="form-control">
        </div>
        <div class="mt-3">
            Password
            <input type="password" placeholder="123@123" name="cpass" id="6" class="form-control">
        </div>
        <div class="mt-3">
            User Type
            <select class="form-control" name="user_type" id="">
                <option value="teacher">Teacher</option>
                <option value="student">student</option>
            </select>
        </div>
        <div class="mt-3">
            <input type="submit" placeholder="123@123" value="Log In" id="u" class="mx-2 btn btn-danger">
            <a href="file/forget.php"><button type="button" class="btn mx-2 btn-success">Forget Password</button></a>
            <a href="reg.php"><button type="button" class="btn mx-2 btn-success">Teacher Sign Up</button></a>
        </div>
        <div class="text-center text-danger">
            <?php
            $math = rand(111,999);
            $sessionId = "SI_{$math}";
                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user = $_POST['uname'];
                    $pass = $_POST['cpass'];
                    $type = $_POST['user_type'];
        
                    if ($user == "" || $pass == "" ||$type == "") {
                        $error = "Please fill All fields";
                        echo $error;
                    } else {
                        $obj = new student();
                        $data = $obj->getrow($type,'cpass, email, id, fname','uname',$user,'1');
                        if($data == "No Found"){
                            Echo "Wrong Email or Password !!";
                        }
                        else{
                            foreach($data as $row){
                                $passs = $row['cpass'];
                                $email = $row['email'];
                                $name = $row['fname'];
                                $id = $row['id'];
                            }
                            // $pass;
                            if(password_verify($pass,$passs)){
                                
                                $_SESSION['user'] = $name;
                                setcookie('user_email',$email, time() + (86400 * 30), "/");
                                setcookie('sessionID',$sessionId, time() + (86400 * 30), "/");
                                $_SESSION['user_type'] = $type;
                                $_SESSION['user_id'] = $id;
                                header('location:index.php');
                            }
                            else{
                                Echo "Wrong Email or Password !!";
                            }
                        }

                    }
                }
            ?>
        </div>
    </form>
</body>
